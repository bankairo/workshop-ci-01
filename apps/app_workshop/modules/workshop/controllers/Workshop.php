<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Workshop extends MY_Controller {
        
        public function index(){
            $this->set_template('backend');
            
            $this->set_template_html_title('Workshop: Web Application Development');
            
            $this->load_view('welcome_workshop');
        }
}
