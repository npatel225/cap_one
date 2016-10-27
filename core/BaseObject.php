<?php
include_once($_SERVER['DOCUMENT_ROOT'] . "/cap_one/stdlib.php");

class BaseObject {

    private $error = '';

    public function __construct(){}
    public function __destruct(){
        unset($this->error);
    }

    public function set($data){
        if(array_key_exists('error', $data))$this->setError($data['error']);
    }

    public function getError(){return $this->error;}
    public function setError($error){$this->error = $error;}
} 