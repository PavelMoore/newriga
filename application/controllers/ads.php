<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ads extends CI_Controller {

	
	function index()   
        {   
	 
			$this->load->model('DB_model'); 
			$this->load->model('Menu_model');
			$this->Menu_model->getMenu();
			$data['now_page'] = 'ads';
			$data['menu'] = $this->Menu_model->getMenu();
            $this->load->view('Main_view',$data);   
        }   
	
}
?>