<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contacts extends CI_Controller {

	
	function index()   
        {   
	 
			$this->load->model('DB_model'); 
			$this->load->model('Menu_model');
			$this->Menu_model->getMenu();
			$data['now_page'] = '7';
			$data['article_section'] =  true;
			$data['menu'] = $this->Menu_model->getMenu();
			$query = $this->DB_model->getData('contacts');
			$data['article'] = array("Контакты" => $query[0]->article);
            $this->load->view('Main_view',$data);   
        }   
	
}
?>