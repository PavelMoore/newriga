<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class News extends CI_Controller {

	
	function index()   
        {   
	 
			$this->load->model('DB_model'); 
			$this->load->model('Menu_model');
			$this->Menu_model->getMenu();
			$data['article_section'] =  true;
			$query = $this->DB_model->getData('news');
			for ($i = 0; $i < count($query); $i++) {
				$article[$query[$i]->header] = $query[$i]->article;
				$article_id[$query[$i]->header] = $query[$i]->id;	
				}			
			$data['article'] = $article;
			$data['article_id'] = $article_id; 
			$data['now_page'] = 2;
			$data['menu'] = $this->Menu_model->getMenu();
            $this->load->view('Main_view',$data);   
        }   
		
	function more($id) {
			$this->load->model('DB_model'); 
			$this->load->model('Menu_model');
			$this->Menu_model->getMenu();
			$data['article_section'] =  true;
			$query = $this->DB_model->getData('news');
			for ($i = 0; $i < count($query); $i++) {
				if ($query[$i]->id == $id) 
					$article = array($query[$i]->header => $query[$i]->article); 
				}			
			$data['article'] = $article;
			
			$data['now_page'] = 2;
			$data['menu'] = $this->Menu_model->getMenu();
            $this->load->view('Main_view',$data);   
	}
	
}
?>
