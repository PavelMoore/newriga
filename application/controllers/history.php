<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class History extends CI_Controller {

	
	function index()   
        {   
	 
			$this->load->model('DB_model'); 
			$this->load->model('Menu_model');
			$this->Menu_model->getMenu();
			$data['article_section'] =  true;
			$data['now_page'] = 'history';
			$query = $this->DB_model->getData('history');
			$data['article'] = array("История Новорижского Шоссе" => $query[0]->article);
			
			$data['menu'] = $this->Menu_model->getMenu();
            $this->load->view('Main_view',$data);  
        }   
	
    }   

?>
