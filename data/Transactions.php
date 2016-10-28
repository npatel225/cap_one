<?php
include_once($_SERVER['DOCUMENT_ROOT'] . "/cap_one/stdlib.php");

/**
 * Class Transactions
 * controller class to do any and all
 * operations with the transactions
 */
class Transactions {

    private $transactions = [];
    private $transaction_breakdown = [];  //debit & credit per month

    public function __construct($transactions= []){
        if($transactions!=[]){
            $this->setTransactions($transactions);
        }
        else{
            $this->setTransactions((new EndPoints())->getAllTransactions());
        }
    }

    public function __destruct(){
        unset($this->transactions);
        unset($this->transaction_breakdown);
    }

    public function getTransactions(){return $this->transactions;}
    private function setTransactions($transactions){$this->transactions = $transactions;}
    private function addTransactions($transactions){$this->transactions = array_merge($this->transactions, $transactions);}
    public function getTransactionById($transaction_id){
        foreach($this->transactions as $t){
            if($t->getId() == $transaction_id){
                return $t;
            }
        }
        return false;
    }
    public function disableTransactionsByMerchant($merchant){
        foreach($this->transactions as &$t){
            if($t->getRawMerchant() == $merchant){
                $t->setDisabled();
            }
        }
    }


    public function getTransactionBreakdown(){return $this->transaction_breakdown;}
    private function addToSpending($year, $month, $amount){
        if(!array_key_exists($year.'-'.$month, $this->transaction_breakdown)){
            $this->transaction_breakdown[$year.'-'.$month] = [];
        }
        if(!array_key_exists('spending', $this->transaction_breakdown[$year.'-'.$month])){
            $this->transaction_breakdown[$year.'-'.$month]['spending'] = 0;
        }
        $this->transaction_breakdown[$year.'-'.$month]['spending'] += abs($amount);
    }
    private function addToMaking($year, $month, $amount){
        if(!array_key_exists($year.'-'.$month, $this->transaction_breakdown)){
            $this->transaction_breakdown[$year.'-'.$month] = [];
        }
        if(!array_key_exists('income', $this->transaction_breakdown[$year.'-'.$month])){
            $this->transaction_breakdown[$year.'-'.$month]['income'] = 0;
        }
        $this->transaction_breakdown[$year.'-'.$month]['income'] += $amount;
    }
    private function addAverage($spending, $income){
        $this->transaction_breakdown['average']['spending'] = $spending;
        $this->transaction_breakdown['average']['income'] = $income;
    }

    /**
     * formatting the currency
     * @param $int
     * @return string
     */
    public static function formatCurrency($int){
        return '$'.number_format($int/10000, 2);
    }

    private function breakDownTransactionsByMonths(){
        foreach($this->getTransactions() as $t){
            if(!$t->isDisabled()){
                $year = $t->getTransactionYear(true);
                $month = $t->getTransactionMonth(true);
                $amt = $t->getAmount();
                if($amt > 0){   //positive is credit
                    $this->addToMaking($year, $month, $amt);
                }
                else{   //negative is debit=spending
                    $this->addToSpending($year, $month, $amt);
                }
            }
        }
    }

    /**
     * calculate the average of spending and making
     * per month and
     */
    public function calculateAverage(){
        $this->breakDownTransactionsByMonths();

        $total_months = 0;
        $total_spending = 0;
        $total_income = 0;
        setlocale(LC_MONETARY, 'en_US');
        foreach ($this->transaction_breakdown as $index => &$value) {

            $total_months++;
            $total_spending += $value['spending'];
            $total_income += $value['income'];

            $value['spending'] = $this->formatCurrency($value['spending']);
            $value['income'] = $this->formatCurrency($value['income']);
        }
        $avg_spending = $total_spending / $total_months;
        $avg_income = $total_income / $total_months;
        $this->addAverage($this->formatCurrency($avg_spending), $this->formatCurrency($avg_income));
    }

    /**
     * retaining the expected transactions
     * for the rest of the month and recalculating
     * the monthly spending & making plus for an
     * average for a month
     * @param $year
     * @param $month
     */
    public function getProjectedTransactionsForMonth($year, $month){
        $projected_transactions = (new EndPoints())->getProjectedTransactionForMonth($year, $month);
        $this->addTransactions($projected_transactions);
        $this->calculateAverage();
    }

    /**
     * removing all the cc bill payments out of the
     * transactions and recalculating monthly spending
     * and making
     */
    public function removeCreditCardPayments(){
        for($i=0; $i<count($this->transactions)-1; $i++){
            $current = &$this->transactions[$i];
            $next = &$this->transactions[$i+1];
            if($next!=null && abs($current->getAmount())==(abs($next->getAmount())) && $current->getAggregationTime()==$next->getAggregationTime()){
                $current->setDisabled();
                $next->setDisabled();
            }
        }
        $this->calculateAverage();
    }

    /**
     * retaining all the disabled transactions
     * @return array
     */
    public function getDisabledTransactions(){
        $response = [];
        foreach($this->transactions as $t){
            if($t->isDisabled()){
                $response[] = $t->printTransaction();
            }
        }
        return $response;
    }
}