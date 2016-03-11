<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * WAD Configuration
 */

/** SOAP/WSDL Configuration 
 * in Detail: http://php.net/manual/en/soapclient.soapclient.php
 * * */
$wad_config['api_client'] = array(
    /** WSDL Mode * */
    'workshop_ws_wsdl' => array(
        'is_wsdl' => TRUE,
        'wsdl' => __DIR__ . '/wsdl/workshop_dss.wsdl', /* PATH: application/config/wsdl/ */
        'options' => array(
            /* jika http authentication */
            //'login' => 'workshop',
            //'password' => 'workshop',
             /*
             */
            'cache_wsdl' => WSDL_CACHE_NONE, /*  WSDL_CACHE_NONE, WSDL_CACHE_DISK, WSDL_CACHE_MEMORY or WSDL_CACHE_BOTH */
            'soap_version' => SOAP_1_2, /* SOAP_1_1, SOAP_1_2 */
            'trace' => 1, //* TRUE or FALSE, 1 or 0 */
            'exceptions' => TRUE, /* TRUE or FALSE */
            'features' => SOAP_SINGLE_ELEMENT_ARRAYS, /* SOAP_SINGLE_ELEMENT_ARRAYS, SOAP_USE_XSI_ARRAY_TYPE, SOAP_WAIT_ONE_WAY_CALLS */
            'compression' => SOAP_COMPRESSION_ACCEPT | SOAP_COMPRESSION_GZIP, /* SOAP_COMPRESSION_ACCEPT, SOAP_COMPRESSION_DEFLATE, SOAP_COMPRESSION_GZIP */
            'encoding' => 'UTF-8',//'ISO-8859-1',
            'verifypeer' => FALSE,
            'verifyhost' => FALSE,
            //'keep_alive' => TRUE, /** TRUE OR FALSE, PHP 5.4.0+ * */
            //'ssl_method' => SOAP_SSL_METHOD_SSLv3 , /* SOAP_SSL_METHOD_TLS, SOAP_SSL_METHOD_SSLv2, SOAP_SSL_METHOD_SSLv3 or SOAP_SSL_METHOD_SSLv23. PHP 5.5.0+ /
        ),
        /*'wsse' => array(
            'wsse_standard' => 'UsernameToken', // currenly, we are only support UT (UsernameToken) WSSE standard
            'UT_username' => 'workshop',
            'UT_password' => 'workshop',
            'UT_digest' => FALSE,
            'UT_timestamp' => 3600
        )*/
    ),
    /** WSDL Mode * */
    'workshop_esb_wsdl' => array(
        'is_wsdl' => TRUE,
        'wsdl' => __DIR__ . '/wsdl/workshop_esb_xml.wsdl', /* PATH: application/config/wsdl/ */
        'options' => array(
            /* jika http authentication */
            //'login' => 'workshop',
            //'password' => 'workshop',
             /* 
             */
            'cache_wsdl' => WSDL_CACHE_NONE, /*  WSDL_CACHE_NONE, WSDL_CACHE_DISK, WSDL_CACHE_MEMORY or WSDL_CACHE_BOTH */
            'soap_version' => SOAP_1_2, /* SOAP_1_1, SOAP_1_2 */
            'trace' => 1, //* TRUE or FALSE, 1 or 0 */
            'exceptions' => TRUE, /* TRUE or FALSE */
            'features' => SOAP_SINGLE_ELEMENT_ARRAYS, /* SOAP_SINGLE_ELEMENT_ARRAYS, SOAP_USE_XSI_ARRAY_TYPE, SOAP_WAIT_ONE_WAY_CALLS */
            'compression' => SOAP_COMPRESSION_ACCEPT | SOAP_COMPRESSION_GZIP, /* SOAP_COMPRESSION_ACCEPT, SOAP_COMPRESSION_DEFLATE, SOAP_COMPRESSION_GZIP */
            'encoding' => 'UTF-8',//'ISO-8859-1',
            'verifypeer' => FALSE,
            'verifyhost' => FALSE,
            //'keep_alive' => TRUE, /** TRUE OR FALSE, PHP 5.4.0+ * */
            //'ssl_method' => SOAP_SSL_METHOD_SSLv3 , /* SOAP_SSL_METHOD_TLS, SOAP_SSL_METHOD_SSLv2, SOAP_SSL_METHOD_SSLv3 or SOAP_SSL_METHOD_SSLv23. PHP 5.5.0+ /
        ),
        'wsse' => array(
            'wsse_standard' => 'UsernameToken', // currenly, we are only support UT (UsernameToken) WSSE standard
            'UT_username' => 'workshop',
            'UT_password' => 'workshop',
            'UT_digest' => FALSE,
            'UT_timestamp' => 3600
        )
    ),
    
);

$config['wad_config'] = $wad_config;