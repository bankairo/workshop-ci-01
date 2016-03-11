<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome2 extends MY_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('welcome_message2');
	}

	public function bootstrap(){
		$this->load->view('welcome_adminlte');
	}
        
        public function layout(){
            $_data_views['_layout_html_title'] = 'FrontEnd AdminLTE 2 | Dashboard - Dynamics';
            
            $_data_views['_layout_content'] = $this->load->view('welcome_content',array(),true);
            
            $this->load->view('templates/frontend/layout_template',$_data_views);
        }
        
        public function template(){
            $this->set_template('backend');
            
            $this->set_template_html_title('Backend AdminLTE 2 | Dashboard - Dynamics');
            
            $this->load_view('welcome_content');
        }
}
