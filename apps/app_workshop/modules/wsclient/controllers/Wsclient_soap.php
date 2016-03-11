<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class wsclient_soap extends MY_Controller {
    
    var $_view_data = array();

    public function __construct() {
        parent::__construct();
        
        $this->set_template('backend');
        $this->set_template_html_title('Workshop: Web Application Development - SOAP WS Client');
        
        
        $this->load->helper(array('form'));
        $this->load->library(array('form_validation'));
        
        $this->load->model('wsclient/wsclient_soap_model', 'wsclient');
    }

    function index() {
        $_filter = $this->input->get();
        if (!isset($_filter['per_page'])){
            $_filter['per_page'] = 1;
        }
        if (!isset($_filter['filter_search'])){
            $_filter['filter_search'] = '';
        }
        //$_filter = array_merge(array('app_name'=>''), $_filter);
        $params['filter_search'] = $_filter['filter_search'];
        $params['offset'] = 10;
        $params['page'] = (((int)$_filter['per_page'])-1) * ((int)$params['offset']);
        $_config_page['url'] = $this->make_uri_string($_filter);
        $this->_view_data['_params'] = $params;
        
        //ws data
        $ws_data = $this->wsclient->person_list($params['filter_search'],$params['page'],$params['offset']);
        //var_dump($ws_data);
        
        $this->_view_data['_data_count'] = $ws_data->PersonListParam[0]->PersonListCounts->PersonListCount[0];
        $this->_view_data['_data_list'] = $ws_data->PersonListParam[0]->PersonListDatas->PersonListData;
        
        $this->init_pagination($_config_page['url'], $this->_view_data['_data_count']->data_count, TRUE, $params['offset']);
        
        $p_js = $this->load->view('wsclient/soap/person_view_js',array(),true);
        $this->add_template_html_footer($p_js);
                
        $this->load_view('wsclient/soap/person_list', $this->_view_data);
    }
    
    function ajax_edit($id){
        $data = $this->wsclient->person_view_by_id($id);
        $data = $data->PersonView[0];
        $data->dob = ($data->dob == '0000-00-00') ? '' : $data->dob; // if 0000-00-00 set tu empty for datepicker compatibility
        echo json_encode($data);
    }
    
    public function ajax_add() {
        $this->_validate();
        $data = array(
            'firstName' => $this->input->post('firstName'),
            'lastName' => $this->input->post('lastName'),
            'gender' => $this->input->post('gender'),
            'address' => $this->input->post('address'),
            'dob' => $this->input->post('dob'),
        );
        $insert = $this->wsclient->person_add($data);
        echo json_encode(array("status" => TRUE));
    }

    public function ajax_update() {
        $this->_validate();
        $data = array(
            'firstName' => $this->input->post('firstName'),
            'lastName' => $this->input->post('lastName'),
            'gender' => $this->input->post('gender'),
            'address' => $this->input->post('address'),
            'dob' => $this->input->post('dob'),
        );
        $this->wsclient->person_update(array('id' => $this->input->post('id')), $data);
        echo json_encode(array("status" => TRUE));
    }

    public function ajax_delete($id) {
        $this->wsclient->person_delete($id);
        echo json_encode(array("status" => TRUE));
    }

    private function _validate() {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;

        if ($this->input->post('firstName') == '') {
            $data['inputerror'][] = 'firstName';
            $data['error_string'][] = 'First name is required';
            $data['status'] = FALSE;
        }

        if ($this->input->post('lastName') == '') {
            $data['inputerror'][] = 'lastName';
            $data['error_string'][] = 'Last name is required';
            $data['status'] = FALSE;
        }

        if ($this->input->post('dob') == '') {
            $data['inputerror'][] = 'dob';
            $data['error_string'][] = 'Date of Birth is required';
            $data['status'] = FALSE;
        }

        if ($this->input->post('gender') == '') {
            $data['inputerror'][] = 'gender';
            $data['error_string'][] = 'Please select gender';
            $data['status'] = FALSE;
        }

        if ($this->input->post('address') == '') {
            $data['inputerror'][] = 'address';
            $data['error_string'][] = 'Addess is required';
            $data['status'] = FALSE;
        }

        if ($data['status'] === FALSE) {
            echo json_encode($data);
            exit();
        }
    }

}
