<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class wsclient_esb_soap_model extends CI_Model {

    function __construct() {
        parent::__construct();
        
        $this->load->soap_client('workshop_esb_wsdl');
    }
    
    function person_list($search, $page, $offset){
    /**
     <p:person_list xmlns:p="http://ws.unlam.ac.id">
        <!--Exactly 1 occurrence-->
        <xs:search xmlns:xs="http://ws.unlam.ac.id">?</xs:search>
        <!--Exactly 1 occurrence-->
        <xs:page xmlns:xs="http://ws.unlam.ac.id">?</xs:page>
        <!--Exactly 1 occurrence-->
        <xs:offset xmlns:xs="http://ws.unlam.ac.id">?</xs:offset>
     </p:person_list>
    **/
        if (!isset($search) or ($search=='')){
            $search = '%%';
        }
        if (!isset($page) or ($page=='')){
            $page=0;
        }
        if (!isset($offset) or ($offset=='')){
            $offset=5;
        }
        
        $ws_params = new stdClass();
        $ws_params->search = new SoapVar($search, XSD_STRING);
        $ws_params->page = new SoapVar($page, XSD_INTEGER);
        $ws_params->offset = new SoapVar($offset, XSD_INTEGER);
        
        try {
            $_operation = 'person_list';
            $_return = $this->workshop_esb_wsdl->soap->$_operation($ws_params);
        } catch (SoapFault $fault) {
            show_error("WAD_ERROR::SOAP:: $fault->faultstring [$fault->faultcode]");
        }

        return $_return;
    }
    
    function person_view_by_id($id){
        /**
        <p:person_view_by_id xmlns:p="http://ws.unlam.ac.id">
            <!--Exactly 1 occurrence-->
            <xs:id xmlns:xs="http://ws.unlam.ac.id">?</xs:id>
         </p:person_view_by_id>
         */
        
        if (!isset($id) or ($id=='')){
            $id=0;
        }
        
        $ws_params = new stdClass();
        $ws_params->id = new SoapVar($id, XSD_STRING);
        
        try {
            $_operation = 'person_view_by_id';
            $_return = $this->workshop_esb_wsdl->soap->$_operation($ws_params);
        } catch (SoapFault $fault) {
            show_error("WAD_ERROR::SOAP:: $fault->faultstring [$fault->faultcode]");
        }

        return $_return;
    }
    
    function person_add($data){
        /**
   <p:person_add xmlns:p="http://ws.unlam.ac.id">
      <!--Exactly 1 occurrence-->
      <xs:firstName xmlns:xs="http://ws.unlam.ac.id">?</xs:firstName>
      <!--Exactly 1 occurrence-->
      <xs:lastName xmlns:xs="http://ws.unlam.ac.id">?</xs:lastName>
      <!--Exactly 1 occurrence-->
      <xs:gender xmlns:xs="http://ws.unlam.ac.id">?</xs:gender>
      <!--Exactly 1 occurrence-->
      <xs:address xmlns:xs="http://ws.unlam.ac.id">?</xs:address>
      <!--Exactly 1 occurrence-->
      <xs:dob xmlns:xs="http://ws.unlam.ac.id">?</xs:dob>
   </p:person_add>
         */
        
        
        $ws_params = new stdClass();
        $ws_params->firstName = new SoapVar($data['firstName'], XSD_STRING);
        $ws_params->lastName = new SoapVar($data['lastName'], XSD_STRING);
        $ws_params->gender = new SoapVar($data['gender'], XSD_STRING);
        $ws_params->address = new SoapVar($data['address'], XSD_STRING);
        $ws_params->dob = new SoapVar($data['dob'], XSD_STRING);
        
        try {
            $_operation = 'person_add';
            $_return = $this->workshop_esb_wsdl->soap->$_operation($ws_params);
        } catch (SoapFault $fault) {
            show_error("WAD_ERROR::SOAP:: $fault->faultstring [$fault->faultcode]");
        }

        return $_return;
    }
    
    function person_update($where, $data){
        /**
   <p:person_update xmlns:p="http://ws.unlam.ac.id">
      <!--Exactly 1 occurrence-->
      <xs:firstName xmlns:xs="http://ws.unlam.ac.id">?</xs:firstName>
      <!--Exactly 1 occurrence-->
      <xs:lastName xmlns:xs="http://ws.unlam.ac.id">?</xs:lastName>
      <!--Exactly 1 occurrence-->
      <xs:gender xmlns:xs="http://ws.unlam.ac.id">?</xs:gender>
      <!--Exactly 1 occurrence-->
      <xs:address xmlns:xs="http://ws.unlam.ac.id">?</xs:address>
      <!--Exactly 1 occurrence-->
      <xs:dob xmlns:xs="http://ws.unlam.ac.id">?</xs:dob>
      <!--Exactly 1 occurrence-->
      <xs:id xmlns:xs="http://ws.unlam.ac.id">?</xs:id>
   </p:person_update>
         */
        $ws_params = new stdClass();
        $ws_params->firstName = new SoapVar($data['firstName'], XSD_STRING);
        $ws_params->lastName = new SoapVar($data['lastName'], XSD_STRING);
        $ws_params->gender = new SoapVar($data['gender'], XSD_STRING);
        $ws_params->address = new SoapVar($data['address'], XSD_STRING);
        $ws_params->dob = new SoapVar($data['dob'], XSD_STRING);
        
        $ws_params->id = new SoapVar($where['id'], XSD_INTEGER);
        
        try {
            $_operation = 'person_update';
            $_return = $this->workshop_esb_wsdl->soap->$_operation($ws_params);
        } catch (SoapFault $fault) {
            show_error("WAD_ERROR::SOAP:: $fault->faultstring [$fault->faultcode]");
        }

        return $_return;
    }
    
    function person_delete($id){
        /**
   <p:person_delete xmlns:p="http://ws.unlam.ac.id">
      <!--Exactly 1 occurrence-->
      <xs:id xmlns:xs="http://ws.unlam.ac.id">?</xs:id>
   </p:person_delete>
         */
        
        if (!isset($id) or ($id=='')){
            $id=0;
        }
        
        $ws_params = new stdClass();
        $ws_params->id = new SoapVar($id, XSD_STRING);
        
        try {
            $_operation = 'person_delete';
            $_return = $this->workshop_esb_wsdl->soap->$_operation($ws_params);
        } catch (SoapFault $fault) {
            show_error("WAD_ERROR::SOAP:: $fault->faultstring [$fault->faultcode]");
        }

        return $_return;
    }
}
