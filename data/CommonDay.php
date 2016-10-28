<?php
include_once($_SERVER['DOCUMENT_ROOT'] . "/cap_one/stdlib.php");

/**
 * Class CommonDay
 */
class CommonDay extends BaseObject{

    private $year = 0;
    private $month = 0;
    private $day = 0;

    public function __construct($data=[]){
        if($data != []){
            $this->set($data);
        }
    }

    public function __destruct(){
        unset($this->year);
        unset($this->month);
        unset($this->day);
    }

    public function set($data){
        if(array_key_exists('year', $data))$this->setYear($data['year']);
        if(array_key_exists('month', $data))$this->setYear($data['month']);
        if(array_key_exists('day', $data))$this->setYear($data['day']);
    }

    public function getYear(){return $this->year;}
    public function setYear($year){$this->year = $year;}

    public function getMonth(){return $this->month;}
    public function setMonth($month){$this->month = $month;}

    public function getDay(){return $this->day;}
    public function setDay($day){$this->day = $day;}

}