<?php   
class DB_model extends CI_Model {   
 
    function DB_model()   
    {   
        // Вызов конструктора  
        parent::__construct();   
    }   
 
    function getData($table)   
        {   
              
            $query = $this->db->get($table); 
              
            return $query->result();
			
        }  

	function changePassword($new) {
		$query = $this->db->query("UPDATE qnwrg15_admin SET pass = md5('".$new."')");
		
	}
	
	function checkPassword($pass) {
		$query = $this->db->query("SELECT * FROM qnwrg15_admin WHERE pass = md5('".$pass."')"); 
		return ($query->num_rows() > 0);
		
	}
	
	function changeOneArticle($table, $new) {
		$this->db->set('article', $new);
		$this->db->update($table);
	}
	
	function addInTable($table, $new, $head) {
		$this->db->set('article', $new);
		$this->db->set('header', $head);
		$this->db->set('date', date("Y-m-d"));
		$this->db->insert($table);
	}
	
	function deleteOne($table, $id) {
		$this->db->delete($table, array('id' => $id)); 
	}
}   
?> 