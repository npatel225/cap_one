<?php
include_once($_SERVER['DOCUMENT_ROOT'] . "/cap_one/stdlib.php");

class Transaction extends BaseObject{

    const TRANSACTION_ID                = 'transaction-id';
    const ACCOUNT_ID                    = 'transaction';
    const RAW_MERCHANT                  = 'raw-merchant';
    const MERCHANT                      = 'merchant';
    const IS_PENDING                    = 'is-pending';
    const TRANSACTION_TIME              = 'transaction-time';
    const AMOUNT                        = 'amount';
    const PREVIOUS_TRANSACTION_ID       = 'previous-transaction-id';
    const CATEGORIZATION                = 'categorization';
    const MEMO_ONLY_FOR_TESTING         = 'memo-only-for-testing';
    const PAYEE_NAME_ONLY_FOR_TESTING   = 'payee-name-only-for-testing';
    const CLEAR_DATE                    = 'clear-date';

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
        parent::set($data);
        if(array_key_exists(self::TRANSACTION_ID, $data))$this->setId($data[self::TRANSACTION_ID]);
        if(array_key_exists(self::ACCOUNT_ID, $data))$this->setAccountId($data[self::ACCOUNT_ID]);
        if(array_key_exists(self::RAW_MERCHANT, $data))$this->setRawMerchant($data[self::RAW_MERCHANT]);
        if(array_key_exists(self::MERCHANT, $data))$this->setMerchant($data[self::MERCHANT]);
        if(array_key_exists(self::IS_PENDING, $data))$this->setPending($data[self::IS_PENDING]);
        if(array_key_exists(self::TRANSACTION_TIME, $data))$this->setTransactionTime($data[self::TRANSACTION_TIME]);
        if(array_key_exists(self::AMOUNT, $data))$this->setAmount($data[self::AMOUNT]);
        if(array_key_exists(self::PREVIOUS_TRANSACTION_ID, $data))$this->setPreviousTransactionId($data[self::PREVIOUS_TRANSACTION_ID]);
        if(array_key_exists(self::CATEGORIZATION, $data))$this->setCategorization($data[self::CATEGORIZATION]);
        if(array_key_exists(self::MEMO_ONLY_FOR_TESTING, $data))$this->setMemoOnlyForTesting($data[self::MEMO_ONLY_FOR_TESTING]);
        if(array_key_exists(self::PAYEE_NAME_ONLY_FOR_TESTING, $data))$this->setPayeeNameOnlyForTesting($data[self::PAYEE_NAME_ONLY_FOR_TESTING]);
        if(array_key_exists(self::CLEAR_DATE, $data))$this->setClearDate($data[self::CLEAR_DATE]);
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

    public function getTransactionMonth(){return (new DateTime($this->transaction_time))->format('m');}
    public function getTransactionYear(){return (new DateTime($this->transaction_time))->format('Y');}
}
?>