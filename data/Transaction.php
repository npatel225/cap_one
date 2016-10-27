<?php
include_once($_SERVER['DOCUMENT_ROOT'] . "/cap_one/stdlib.php");

class Transaction extends BaseObject{

    const PRIMARY_KEY = 'transaction-id';

    private $transaction_id = '';
    private $account_id = '';
    private $raw_merchant = '';
    private $merchant = '';
    private $is_pending = false;
    private $transaction_time = '';
    private $amount = 0;
    private $previous_transaction_id = '';
    private $categorization = '';
    private $memo_only_for_testing = '';
    private $payee_name_only_for_testing = '';
    private $clear_date = '';

    public function __construct($data=[]){
        if($data != []){
            $this->set($data);
        }
    }
    public function __destruct(){
        unset($this->transaction_id);
        unset($this->account_id);
        unset($this->raw_merchant);
        unset($this->merchant);
        unset($this->is_pending);
        unset($this->transaction_time);
        unset($this->amount);
        unset($this->previous_transaction_id);
        unset($this->categorization);
        unset($this->memo_only_for_testing);
        unset($this->payee_name_only_for_testing);
        unset($this->clear_date);
    }

    public function set($data){
        if(array_key_exists(self::PRIMARY_KEY, $data)){
            $this->setId($data[self::PRIMARY_KEY]);
            $this->setAccountId($data['account-id']);
            $this->setRawMerchant($data['raw-merchant']);
            $this->setMerchant($data['merchant']);
            $this->setPending($data['set-pending']);
            $this->setTransactionTime($data['transaction-time']);
            $this->setAmount($data['amount']);
            $this->setPreviousTransactionId($data['previous-transaction-id']);
            $this->setCategorization($data['categorization']);
            $this->setMemoOnlyForTesting($data['memo-only-for-testing']);
            $this->setPayeeNameOnlyForTesting($data['payee-name-only-for-testing']);
            $this->setClearDate($data['clear-date']);
        }

        if(array_key_exists('error', $data))$this->setError($data['error']);
    }

    public function getId(){return $this->transaction_id;}
    public function setId($transaction_id){$this->transaction_id = $transaction_id;}

    public function getAccountId(){return $this->account_id;}
    public function setAccountId($action_id){$this->account_id = $action_id;}

    public function getRawMerchant(){return $this->raw_merchant;}
    public function setRawMerchant($raw_merchant){$this->raw_merchant = $raw_merchant;}

    public function getMerchant(){return $this->merchant;}
    public function setMerchant($merchant){$this->merchant = $merchant;}

    public function IsPending(){return $this->is_pending;}
    public function setPending($is_pending){$this->is_pending = $is_pending;}

    public function getTransactionTime(){return $this->transaction_time;}
    public function setTransactionTime($transaction_time){$this->transaction_time = $transaction_time;}

    public function getAmount(){return $this->amount;}
    public function setAmount($amount){$this->amount = $amount;}

    public function getPreviousTransactionId(){return $this->previous_transaction_id;}
    public function setPreviousTransactionId($previous_transaction_id){$this->previous_transaction_id = $previous_transaction_id;}

    public function getCategorization(){return $this->categorization;}
    public function setCategorization($categorization){$this->categorization = $categorization;}

    public function getMemoOnlyForTesting(){return $this->memo_only_for_testing;}
    public function setMemoOnlyForTesting($memo_only_for_testing){$this->memo_only_for_testing = $memo_only_for_testing;}

    public function getPayeeNameOnlyForTesting(){return $this->payee_name_only_for_testing;}
    public function setPayeeNameOnlyForTesting($payee_name_only_for_testing){$this->payee_name_only_for_testing = $payee_name_only_for_testing;}

    public function getClearDate(){return $this->clear_date;}
    public function setClearDate($clear_date){$this->clear_date = $clear_date;}
}
?>