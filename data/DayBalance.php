<?php
include_once($_SERVER['DOCUMENT_ROOT'] . "/cap_one/stdlib.php");

class DayBalance extends BaseObject{

    private $day;
    private $balance = 0;
    private $includes_projection = false;

    public function __construct($data = []){
        if($data!=[]){
            $this->set($data);
        }
    }
    public function _construct(){}

    public function set($data){
        if(array_key_exists('day', $data))$this->setDay($data['data']);
        if(array_key_exists('balance', $data))$this->setBalance($data['balance']);
        if(array_key_exists('day', $data))$this->setDay($data['data']);

    }

    public function getDay(){return $this->day;}
    public function setDay($day){$this->day = $day;}

    public function getBalance(){return $this->balance;}
    public function setBalance($balance){$this->balance = $balance;}

    public function includeProjection(){return $this->includes_projection;}
    public function setIncludeProjection($include_projection){$this->includes_projection = $include_projection;}

}