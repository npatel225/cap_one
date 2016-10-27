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
    private $account_type;
    private $last_digit = '';
    private $institution_login_id = '';
    private $is_autosave_source = false;
    private $is_autosave_target = false;
    private $can_be_autosave_target = false;
    private $can_be_autosave_funding_source = false;
    private $autosave_account_priority = 0;
    private $asset_account_type;

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
        unset($this->last_digit);
        unset($this->institution_login_id);
        unset($this->is_autosave_source);
        unset($this->is_autosave_target);
        unset($this->can_be_autosave_target);
        unset($this->can_be_autosave_funding_source);
        unset($this->autosave_account_priority);
        unset($this->asset_account_type);
    }

    public function set($data){
        if(array_key_exists(self::PRIMARY_KEY, $data)){
            $this->setAccountId($data[self::PRIMARY_KEY]);
            $this->setInstitutionId($data['institution-id']);
            $this->setInstitutionName($data['institution-name']);
            $this->setActive($data['active']);
            $this->setAccountName($data['account-name']);
            $this->setBalance($data['balance']);
            $this->setAccountType(new AccountType($data['account-type']));
            $this->setLastDigit($data['last-digit']);
            $this->setInstitutionLoginId($data['institution-login-id']);
            $this->setAutoSaveSource($data['is-autosave-source']);
            $this->setAutoSaveTarget($data['is-autosave-targets']);
            $this->setAutoSaveFundingSource($data['can-be-autosave-funding-source']);
            $this->setAutoSaveAccountPriority($data['autosave-account-priority']);
            $this->setAssetAccountType($data['asset-account-type']);
        }
    }

    public function getAccountId(){return $this->account_id;}
    public function setAccountId($account_id){$this->account_id = $account_id;}

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

    public function getAccountType(){return $this->account_type;}
    public function setAccountType($balance){$this->account_type = $balance;}

    public function getLastDigit(){return $this->balance;}
    public function setLastDigit($balance){$this->balance = $balance;}

    public function getInstitutionLoginId(){return $this->balance;}
    public function setInstitutionLoginId($balance){$this->balance = $balance;}

    public function isAutoSaveSource(){return $this->balance;}
    public function setAutoSaveSource($balance){$this->balance = $balance;}

    public function isAutoSaveTarget(){return $this->balance;}
    public function setAutoSaveTarget($balance){$this->balance = $balance;}

    public function isAbleAutoSaveTarget(){return $this->balance;}
    public function canAutoSaveTarget($balance){$this->balance = $balance;}

    public function isAbleToAutoSaveFundingSource(){return $this->balance;}
    public function setAutoSaveFundingSource($balance){$this->balance = $balance;}

    public function getAutoSaveAccountPriority(){return $this->balance;}
    public function setAutoSaveAccountPriority($balance){$this->balance = $balance;}

    public function getAssetAccountType(){return $this->balance;}
    public function setAssetAccountType($balance){$this->balance = $balance;}

} 