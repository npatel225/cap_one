<?php

class CommonArgument{

    private $uid = 0;
    private $token = '';
    private $api_token = '';
    private $json_strict_mode = false;
    private $json_verbose_response =  false;


    public function __construct(){}
    public function __destruct(){}

    public function getUid(){return $this->uid;}
    public function setUid($uid){$this->uid = $uid;}

    public function getToken(){return $this->token;}
    public function setToken($token){$this->token = $token;}

    public function getApiToken(){return $this->api_token;}
    public function setApiToken($api_token){$this->api_token = $api_token;}

    public function getJsonStrictMode(){return $this->json_strict_mode;}
    public function setJsonStrictMode($json_strict_mode){$this->json_strict_mode = $json_strict_mode;}

    public function getJsonVerboseResponse(){return $this->json_verbose_response;}
    public function setJsonVerboseResponse($json_verbose_response){$this->json_verbose_response = $json_verbose_response;}
}

?>