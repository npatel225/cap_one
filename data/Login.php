<?php
include_once($_SERVER['DOCUMENT_ROOT'] . "/cap_one/stdlib.php");

/**
 * Class Login
 */
class Login extends BaseObject{

    private $uid = 0;
    private $token = '';

    public function __construct($data = []){
        if($data!=[]){
            $this->set($data);
        }
    }
    public function __destruct(){
        unset($this->uid);
        unset($this->token);
    }

    public function set($data){
        if(array_key_exists('error', $data)) $this->setError($data['error']);
        if(array_key_exists('uid', $data)) $this->setUid($data['uid']);
        if(array_key_exists('token', $data)) $this->setToken($data['token']);
    }

    public function getUid(){return $this->uid;}
    public function setUid($uid){$this->uid=$uid;}

    public function getToken(){return $this->token;}
    public function setToken($token){$this->token = $token;}
}
?>