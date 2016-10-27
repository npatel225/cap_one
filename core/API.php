<?php
include_once($_SERVER['DOCUMENT_ROOT'] . "/cap_one/stdlib.php");

class API {

    private $url = '';

    public function __construct($url=''){
        $this->setUrl($url);
    }
    public function __destruct(){
        unset($this->url);
    }

    public function login(){

    }

    public function getAllTransactions(){

    }

    public function getProjectedTransactionForMonth(){

    }

    public function getRecentHistoricalAndProjectedBalances(){

    }

    public function getAccounts(){

    }

    public function aggregateTransaction(){

    }

    public function findSimilarTransactions(){

    }

    public function getUrl(){return $this->url;}
    public function setUrl($url){$this->url = $url;}
}

?>