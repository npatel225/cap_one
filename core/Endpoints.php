<?php
include_once($_SERVER['DOCUMENT_ROOT'] . "/cap_one/stdlib.php");

class EndPoints extends BaseObject{

    const LOGIN                                             = 'login';
    const GET_ALL_TRANSACTION                               = 'get-all-transactions';
    const GET_PROJECTED_TRANSACTION_FOR_MONTH               = 'projected-transactions-for-month';
    const GET_RECENT_HISTORICAL_AND_PROJECTED_BALANCED      = 'balances';
    const GET_ACCOUNTS                                      = 'get-accounts';
    const AGGREGATE_TRANSACTIONS                            = 'aggregate-transaction';
    const FIND_SIMILAR_TRANSACTIONS                         = 'find-similar-transactions';

    private $url = '';
    private $page = '';
    private $common_arguments;

    public function __construct($base_url='https://2016.api.levelmoney.com/api/v2/core/', $page = ''){
        $this->setUrl($base_url);
        $this->setUrl($base_url);

        // setting up the default args
        $common_argument = new CommonArgument();
        $common_argument->setUid(1110590645);
        $common_argument->setToken('326AD2EC093AF7AE9877BE03E77343D9');
        $common_argument->setApiToken('AppTokenForInterview');
        $common_argument->setJsonStrictMode(false);
        $common_argument->setJsonVerboseResponse(false);
        $this->setCommonArguments($common_argument);

        $this->login();
    }
    public function __destruct(){
        unset($this->url);
        unset($this->page);
        unset($this->common_arguments);
    }

    public function login(){
        $this->setPage(self::LOGIN);
        $response = $this->execute([
            'email'=>'level@example.com',
            'password'=>'incorrect_password',
        ]);

        if($response != false){
        }
    }

    public function getAllTransactions(){
        $this->setPage(self::GET_ALL_TRANSACTION);
        $call_back = $this->execute([]);
        return $this->extractTransactions($call_back);
    }

    public function getProjectedTransactionForMonth($year, $month){
        $this->setPage(self::GET_PROJECTED_TRANSACTION_FOR_MONTH);
        $call_back = $this->execute([
            "year"=>$year,
            "month"=>$month,
        ]);
        return $this->extractTransactions($call_back);
    }

    public function getRecentHistoricalAndProjectedBalances(){
        $this->setPage(self::GET_RECENT_HISTORICAL_AND_PROJECTED_BALANCED);
    }

    public function getAccounts(){
        $this->setPage(self::GET_ACCOUNTS);
    }

    public function aggregateTransaction(){
        $this->setPage(self::AGGREGATE_TRANSACTIONS);
    }

    public function findSimilarTransactions(){
        $this->setPage(self::FIND_SIMILAR_TRANSACTIONS);
    }

    public function getUrl(){return $this->url;}
    public function setUrl($url){$this->url = $url;}

    public function getPage(){return $this->page;}
    public function setPage($page){$this->page = $page;}

    public function getCommonArguments(){return $this->common_arguments;}
    public function setCommonArguments($common_arguments){$this->common_arguments = $common_arguments;}

    public function extractTransactions($call_back){
        $response = [];
        if($call_back!=false && count($call_back['transactions'])>0){
            foreach($call_back['transactions'] as $t){
                $response[] = new Transaction($t);
            }
        }
        return $response;
    }

    private function execute($args){
        try{

            $args['args'] = $this->getCommonArguments()->buildArray();
            $json_array = json_encode($args);

            $headers = array(
                "Accept: application/json",
                "Content-Type: application/json"
            );

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $this->getUrl().$this->getPage());
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_TIMEOUT, 60);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

            curl_setopt($ch, CURLOPT_POST, TRUE);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $json_array);

            $data = curl_exec($ch);
            if (curl_errno($ch)) {
                //return "Error: " . curl_error($ch);
                return false;
            } else {

                curl_close($ch);
                $response = json_decode($data, true);
                if(array_key_exists('error',$response)){
                    $this->setError($response['error']);
                    //unset($response['error']);
                }
                return $response;
            }

        } catch(Exception $e){
            //return $e->getMessage();
            return false;
        }
    }
}
?>
