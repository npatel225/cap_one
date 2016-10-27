<?php
include_once($_SERVER['DOCUMENT_ROOT'] . "/cap_one/stdlib.php");

class CommonArgument{

    const UID                   = 'uid';
    const TOKEN                 = 'token';
    const API_TOKEN             = 'api-token';
    const JSON_STRICT_MODE      = 'json-strict-mode';
    const JSON_VERBOSE_RESPONSE = 'json-verbose-response';

    private $uid = 0;
    private $token = '';
    private $api_token = '';
    private $json_strict_mode = false;
    private $json_verbose_response =  false;

    public function __construct($data=[]){
        if($data!=[]){
            $this->set($data);
        }
    }
    public function __destruct(){
        unset($this->uid);
        unset($this->token);
        unset($this->api_token);
        unset($this->json_strict_mode);
        unset($this->json_verbose_response);
    }

    public function set($data_array){
        if(array_key_exists('uid', $data_array)) $this->setUid($data_array[self::UID]);
        if(array_key_exists('token', $data_array)) $this->setToken($data_array[self::TOKEN]);
        if(array_key_exists('api_token', $data_array)) $this->setApiToken($data_array[self::API_TOKEN]);
        if(array_key_exists('json_strict_mode', $data_array)) $this->setJsonStrictMode($data_array[self::JSON_STRICT_MODE]);
        if(array_key_exists('json_verbose_response', $data_array)) $this->setJsonVerboseResponse($data_array[self::JSON_VERBOSE_RESPONSE]);
    }

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

    public function buildArray(){
        return [
            self::UID =>$this->getUid(),
            self::TOKEN =>$this->getToken(),
            self::API_TOKEN =>$this->getApiToken(),
            self::JSON_STRICT_MODE =>$this->getJsonStrictMode(),
            self::JSON_VERBOSE_RESPONSE =>$this->getJsonVerboseResponse(),
        ];
    }
}
?>