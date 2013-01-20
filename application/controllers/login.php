<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	
	function index()   
        {   
	 
			$this->load->model('DB_model'); 
			$this->load->model('Menu_model');
			$this->Menu_model->getMenu();
			$data['menu'] = $this->Menu_model->getMenu();
			$data['page_name'] = "login";
            $this->load->view('Main_view',$data);  
        }   
	
    }   

?>
