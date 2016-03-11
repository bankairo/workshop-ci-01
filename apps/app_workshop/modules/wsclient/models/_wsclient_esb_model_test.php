<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class wsclient_soap_model extends CI_Model {

    function __construct() {
        parent::__construct();

        $context = array('http' =>
            array(
                'header' => 'Format_data: xml'
            )
        );
        $options = array('stream_context' => stream_context_create($context));

        $this->load->soap_client('workshop_ws_wsdl', $options);
    }
    
    function person_list($search, $page, $offset){
        $ws_params = new stdClass();
        $ws_params->search = new SoapVar($search, XSD_STRING);
        $ws_params->page = new SoapVar($page, XSD_INTEGER);
        $ws_params->offset = new SoapVar($offset, XSD_INTEGER);
        
        try {
            $_operation = 'get_pt_by_kode';
            $_return = $this->workshop_esb_wsdl->soap->get_pt_by_kode($ws_params);
        } catch (SoapFault $fault) {
            show_error("WAF_ERROR::SOAP:: $fault->faultstring [$fault->faultcode]");
        }

        return $_return;
    }
    

    function get_pt_by_kode($kode_pt) {
        echo $kode_pt;
        $ws_params = new stdClass();
        $ws_params->kode_pt = new SoapVar($kode_pt, XSD_STRING);

        //$_return = $this->workshop_esb_wsdl->soap->soap_request('get_pt_by_kode', $_wrapper);   
        try {
            $_operation = 'get_pt_by_kode';
            $_return = $this->workshop_esb_wsdl->soap->get_pt_by_kode($ws_params);
        } catch (SoapFault $fault) {
            echo "HEADER-Q:" . $this->workshop_esb_wsdl->soap->__getLastRequestHeaders();
            echo "HEADER-R:" . $this->workshop_esb_wsdl->soap->__getLastResponseHeaders();

            echo "----";

            echo "DATA-Q:" . $this->workshop_esb_wsdl->soap->__getLastRequest();
            echo "DATA-R:" . $this->workshop_esb_wsdl->soap->__getLastResponse();

            show_error("WAF_ERROR::SOAP:: $fault->faultstring [$fault->faultcode]");
        }

        return $_return;
    }

    function get_pt_by_kode2($kode_pt) {
        $context = array('http' =>
            array(
                'header' => 'Format_data: xml'
            )
        );
        $options = array('stream_context' => stream_context_create($context));

        $this->load->soap_client('workshop_ws_wsdl', $options);

        echo $kode_pt;
        $ws_params = new stdClass();
        $ws_params->kode_pt = new SoapVar($kode_pt, XSD_STRING);

        //$_return = $this->workshop_ws_wsdl->soap->soap_request('get_pt_by_kode', $_wrapper);   
        try {
            $_operation = 'get_pt_by_kode';
            $_return = $this->workshop_ws_wsdl->soap->get_pt_by_kode($ws_params);
        } catch (SoapFault $fault) {
            echo "HEADER-Q:" . $this->workshop_ws_wsdl->soap->__getLastRequestHeaders();
            echo "HEADER-R:" . $this->workshop_ws_wsdl->soap->__getLastResponseHeaders();

            echo "----";

            echo "DATA-Q:" . $this->workshop_ws_wsdl->soap->__getLastRequest();
            echo "DATA-R:" . $this->workshop_ws_wsdl->soap->__getLastResponse();

            show_error("WAF_ERROR::SOAP:: $fault->faultstring [$fault->faultcode]");
        }

        return $_return;
    }

    function get_pt_by_kode3($kode_pt) {
        echo $kode_pt;
        return $this->send_report_to_identity_portal($kode_pt);
    }

    private function send_report_to_identity_portal($report_datas) {
        
        $_url = 'https://Tasira-muharihar.local:8243/services/workshop/get_pt_by_kode?kode_pt=001010';
        $_ip_username = 'workshop';
        $_ip_password = 'workshop';
        $_agent = 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_6_8) AppleWebKit/534.30 (KHTML, like Gecko) Chrome/12.0.742.112 Safari/534.30';
        $_cookies_file = APPPATH . "/config/wsdl/" . md5($_SERVER['REMOTE_ADDR']) . '.txt';

        //assign identity portal microservices params
        $_curl_data = $report_datas;

        //call identity portal microservices via curl (REST services)
        $_curl = curl_init($_url);
        $_curl_data_str = json_encode($_curl_data);

        //$_file_instance = fopen($_cookies_file, 'a+');

        curl_setopt($_curl, CURLOPT_USERPWD, $_ip_username . ":" . $_ip_password);
        
        //curl_setopt($_curl, CURLOPT_USERAGENT, $_agent);
        //we are using cookies to store necessary variables and server tunning
        //curl_setopt($_curl, CURLOPT_COOKIEFILE, $_cookies_file);
        //curl_setopt($_curl, CURLOPT_COOKIEJAR, $_cookies_file);

        curl_setopt($_curl, CURLOPT_CUSTOMREQUEST, "GET");
        curl_setopt($_curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($_curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($_curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($_curl, CURLOPT_HTTPHEADER, array('Format_data: json'));

        $result = curl_exec($_curl);
        //echo $result;

        if (curl_errno($_curl)) {
            echo 'Curl error: ' . curl_error($_curl);
            $info = curl_getinfo($_curl);
            echo 'Took ' . $info['total_time'] . ' seconds to send a request to ' . $info['url'];
        }
        curl_close($_curl);

        //fclose($_file_instance);

        $_return = json_decode($result);

        return $_return;
    }

}
