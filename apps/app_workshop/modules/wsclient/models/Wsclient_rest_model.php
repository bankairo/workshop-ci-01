<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class wsclient_rest_model extends CI_Model {

    var $_url = null;
    function __construct() {
        parent::__construct();
        
        $this->_url = 'http://localhost:9764/services/workshop.HTTPEndpoint/';
    }
    
    private function _call_rest($method, $operation, $data = array()) {
        $this->_url = $this->_url.$operation;
        
        $_curl = curl_init($this->_url);
        
        if (strtoupper($method)=='GET'){
            curl_setopt($_curl, CURLOPT_CUSTOMREQUEST, "GET");
        }
        
        if (strtoupper($method)=='POST'){
            curl_setopt($_curl,CURLOPT_POST, 1);                //0 for a get request
            curl_setopt($_curl,CURLOPT_POSTFIELDS, http_build_query($data));
            
            /**
            $postvars = '';
            foreach($data as $key=>$value) {
              $postvars .= $key . "=" . $value . "&";
            }
            curl_setopt($_curl,CURLOPT_POSTFIELDS, $postvars);
            **/
        }
        
        curl_setopt($_curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($_curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($_curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($_curl, CURLOPT_HTTPHEADER, array('Accept: application/json'));

        $result = curl_exec($_curl);
        //echo $result;

        if (curl_errno($_curl)) {
            show_error("WAD_ERROR::REST:: ".curl_error($_curl));
            
            //echo 'Curl error: ' . curl_error($_curl);
            $info = curl_getinfo($_curl);
            //echo 'Took ' . $info['total_time'] . ' seconds to send a request to ' . $info['url'];
        }
        curl_close($_curl);

        $_return = json_decode($result);

        return $_return;
    }
    
    function person_list($search, $page, $offset){
        if (!isset($search) or ($search=='')){
            $search = '%25%25';
        } else {
            $search = str_replace("%", "%25", $search);
        }
        if (!isset($page) or ($page=='')){
            $page=0;
        }
        if (!isset($offset) or ($offset=='')){
            $offset=5;
        }
        
        $_operation = 'person_list?search='.$search.'&page='.$page.'&offset='.$offset;
        $_return = $this->_call_rest('GET',$_operation);
        
        $_return = $_return->PersonListParams;
        
        return $_return;
    }
    
    function person_view_by_id($id){
        
        $_operation = 'person_view_by_id?id='.$id;
        
        $_return = $this->_call_rest('GET',$_operation);
        
        $_return = $_return->PersonViews;
        
        return $_return;
    }
    
    function person_add($data){
        $_operation = 'person_add';
        
        $_return = $this->_call_rest('POST',$_operation, $data);
        
        $_return = $_return->PersonAddID;
        
        return $_return;
    }
    
    function person_update($where, $data){
        $data = array_merge($data, $where);
        
        $_operation = 'person_update';
        
        $_return = $this->_call_rest('POST',$_operation, $data);
        
        return $_return;
    }
    
    function person_delete($id){
        $data = array('id'=>$id);
        
        $_operation = 'person_delete';
        
        $_return = $this->_call_rest('POST',$_operation, $data);
        
        return $_return;
    }
}
