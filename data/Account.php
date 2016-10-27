<?php
include_once($_SERVER['DOCUMENT_ROOT'] . "/cap_one/stdlib.php");

class Account extends BaseObject{
    const PRIMARY_KEY = 'account-id';

    private $error = '';
    private $account_id = '';
    private $institution_id = 0;
    private $institution_name = '';
    private $active = false;
    private $account_name = '';
    private $balance = 0;

    public function __construct($data=[]){
        if($data != []){
            $this->set($data);
        }
    }

    public function __destruct(){
        unset($this->error);
        unset($this->account_id);
        unset($this->institution_id);
        unset($this->institution_name);
        unset($this->active);
        unset($this->account_name);
        unset($this->balance);
    }

    public function set($data){
        if(array_key_exists(self::PRIMARY_KEY, $data)){
            $this->setAccountId($data[self::PRIMARY_KEY]);
            $this->setInstitutionId($data['institution-id']);
            $this->setInstitutionName($data['institution-name']);
            $this->setActive($data['active']);
            $this->setAccountName($data['account-name']);
            $this->setBalance($data['balance']);
        }
    }


    public function getAccountId(){return $this->account_id;}
    public function setAccountId($account_id){$this->account_id;}

    public function getInstitutionId(){return $this->institution_id;}
    public function setInstitutionId($institution_id){$this->institution_id = $institution_id;}

    public function getInstitutionName(){return $this->institution_name;}
    public function setInstitutionName($institution_name){$this->institution_name = $institution_name;}

    public function getActive(){return $this->active;}
    public function setActive($active){$this->active = $active;}

    public function getAccountName(){return $this->account_name;}
    public function setAccountName($account_name){$this->account_name = $account_name;}

    public function getBalance(){return $this->balance;}
    public function setBalance($balance){$this->balance = $balance;}

} 