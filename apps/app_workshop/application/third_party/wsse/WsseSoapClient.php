<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require(dirname(__FILE__) . '/soap-wsse.php');

class WsseSoapClient extends SoapClient {

    private $v_username = null;
    private $v_password = null;
    private $v_passwordDigest = FALSE;
    private $v_timestamp = 3600;
    
    private $v_useWSSE = FALSE;
    private $v_useUserNameToken = FALSE;
    private $v_useTimeStamp = FALSE;

    function setUserName($p_str) {
        $this->v_username = $p_str;
    }

    function setPassword($p_pstr) {
        $this->v_password = $p_pstr;
    }

    function setPasswordDigest($p_boolean = FALSE) {
        $this->v_passwordDigest = $p_boolean;
    }

    function setTimeStamp($p_secondToExporied = 3600) {
        $this->v_timestamp = $p_secondToExporied;
    }

    function useWSSE($p_boolean = TRUE) {
        $this->v_useWSSE = $p_boolean;
    }

    function useUserNameToken($p_boolean = TRUE) {
        $this->v_useUserNameToken = $p_boolean;
    }

    function useTimeStamp($p_boolean = TRUE) {
        $this->v_useTimeStamp = $p_boolean;
    }

    function __doRequest($request, $location, $saction, $version, $one_way = 0) {
        $doc = new DOMDocument('1.0');
        $doc->loadXML($request);

        if ($this->v_useWSSE == TRUE) {
            $objWSSE = new WSSESoap($doc);
            
            if ($this->v_useUserNameToken == TRUE){
                $objWSSE->addUserToken($this->v_username, $this->v_password, $this->v_passwordDigest);            
            }
            if ($this->v_useTimeStamp == TRUE){
                $objWSSE->addTimestamp($this->v_timestamp);
            }
            
            
            return parent::__doRequest($objWSSE->saveXML(), $location, $saction, $version, $one_way);
        } else {
            return parent::__doRequest($request, $location, $saction, $version, $one_way);
        }
    }

    function soap_request($p_function_name, $p_wrapper = NULL) {
        /** 
         * WARNING!!!
         * We still have a problem with non-WSDL paremeters 
         * Don't use this function for more than 1 paremeter with non-WSDL call function
         * **/
        try {           
            if ($p_wrapper==NULL){
                $p_wrapper = new stdClass();
            }  
            
            $_return = $this->$p_function_name($p_wrapper);
            
            return $_return;
        } catch (SoapFault $fault) {
            show_error("WAF_ERROR::SOAP:: $fault->faultstring [$fault->faultcode]");
        }
    }

}