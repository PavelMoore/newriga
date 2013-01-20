<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Galery extends CI_Controller {

	
	function index()   
        {   
	 
			$this->load->model('Main_model'); 
			$this->load->model('Menu_model');
			$this->Menu_model->getMenu();
			$data['now_page'] = 'galery';
			$data['menu'] = $this->Menu_model->getMenu();
            $this->load->view('Main_view',$data);   
        }   
	
}
?>