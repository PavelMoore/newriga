<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sales extends CI_Controller {

	
	function index()   
        {   
	 
			$this->load->model('DB_model'); 
			$this->load->model('Menu_model');
			$this->Menu_model->getMenu();
			$data['now_page'] = '6';
			$data['article_section'] =  true;
			$data['menu'] = $this->Menu_model->getMenu();
			$query = $this->DB_model->getData('sales');
			$data['article'] = array("Акции и Скидки" => $query[0]->article);
            $this->load->view('Main_view',$data);   
        }   
	
}
?>