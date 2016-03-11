<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

/* load the MX_Loader class */
require APPPATH."third_party/MX/Loader.php";

class MY_Loader extends MX_Loader {
    
    function __construct() {
        parent::__construct();
    }
    
    /**
     * Web Service Client (SOAP/WSDL)
     * @param type $p_config
     */
    function soap_client($p_config, $options=array()) {
        require_once APPPATH . "third_party/wsse/WsseSoapClient.php";

        if (!array_key_exists('api_client', $this->config->item('wad_config'))) {
            show_error("WAF_ERROR:: Missing 'api_client' Configuration (config_wad.php)");
        } else {
            $_temp = $this->config->item('wad_config')['api_client'][$p_config];
            
            if ($_temp['is_wsdl']) {
                $_wsdl = $_temp['wsdl'];
            } else {
                $_wsdl = NULL;
            }
            $_options = $_temp['options'];
            if (count($options)>0){
                $_options = array_merge($_options, $options);
            }

            $_temp_class = new WsseSoapClient($_wsdl, $_options);

            /* WSSE configuration */
            if (array_key_exists('wsse', $_temp)) {
                $_temp_class->useWSSE(TRUE);

                if ($_temp['wsse']['wsse_standard'] == 'UsernameToken') {
                    $_temp_class->useUserNameToken(TRUE);
                    $_temp_class->setUserName($_temp['wsse']['UT_username']);
                    $_temp_class->setPassword($_temp['wsse']['UT_password']);
                    $_temp_class->setPasswordDigest($_temp['wsse']['UT_digest']);
                    $_temp_class->useTimeStamp(TRUE);
                    $_temp_class->setTimeStamp($_temp['wsse']['UT_timestamp']);
                }
            }
            /* End.WSSE configuration */

            $_property = new stdClass();
            $_property->name = 'WebServiceClient';
            $_property->soap = $_temp_class;

            CI::$APP->$p_config = $_property;

            return CI::$APP->$p_config;
        }
    }

}