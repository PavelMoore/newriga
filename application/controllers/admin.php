<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

	
	function index() {   
		session_start();
		if ($_SESSION['admin'] != true) {?>
		<script>
			document.location = "../admin/logon"
		</script>
		<?}
		$this->load->model('DB_model'); 
		$this->load->model('Menu_model');
		$this->load->helper('url');			
		$data['cssurl'] = site_url('css/admin.css');
		$data['menu'] =  $this->Menu_model->getAdminMenu();
        $this->load->view('admin',$data);  
    }   
	
	function logon() {
		session_start();
		$this->load->model('DB_model');
		$this->load->helper('url');
		
		if (func_num_args() == 1) {
			if (empty($_POST['login']) || empty($_POST['password'])) $data['error'] = "Заполните все поля";
			else if ($_POST['login'] != 'admin') $data['error'] = "Неверный логин/пароль";
			else if (!$this->DB_model->checkPassword($_POST['password'])) $data['error'] = "Неверный логин/пароль";
			else {
				$_SESSION['admin'] = true;
				?>	<script>
					document.location = "<?echo site_url('admin');?>"
				</script>
		<?		
				
			}
		
		}
		$data['cssurl'] = site_url('css/admin.css');
		$data['logonurl'] = site_url('admin/logon/now');
		$data['now_page'] = 'logon';
		$this->load->view('adminform',$data); 
	}
	
	function logout() {
		session_start();
		session_unset();
		$this->load->helper('url');
		?>	
		<script>
			document.location = "<?echo site_url('');?>"
		</script>
		<?		
	}
	function password_change() {
		session_start();
		$this->load->helper('url');
		if ($_SESSION['admin'] != true) {?>
		<script>
			document.location = "../admin/logon"
		</script>
		<?}
		if (func_num_args() == 1) {
			if (empty($_POST['newpass']) || empty($_POST['resieve'])) $data['error'] = "Заполните все поля";
			else if ($_POST['newpass'] != $_POST['resieve']) $data['error'] = "Пароли не совпадают";
			else {
				$this->load->model('DB_model');
				$this->DB_model->changePassword($_POST['newpass']);
				?>	<script>
					document.location = "<?echo site_url('admin');?>"
				</script>
		<?		
				
			}
		
		}
		
		
		$data['cssurl'] = site_url('css/admin.css');
		$data['actionurl'] = site_url('admin/password_change/now');
		
		$data['now_page'] = 'passchange';
		$this->load->view('adminform',$data); 
	}
	function change($article) {
		$this->load->model('DB_model');
		$this->load->helper('url');	
		if (!empty($_POST['new'])) {
			$this->DB_model->changeOneArticle($article, $_POST['new']);
			?>
			<script>
				document.location = "<?echo site_url("admin")?>"
			</script>
			<?
		}
		$data['now_page'] = 'change';
				
		$data['cssurl'] = site_url('css/admin.css');
		$data['actionurl'] = site_url("admin/change/$article");
		$query = $this->DB_model->getData($article);
		$data['article'] = $query[0]->article;
		$this->load->view('adminform',$data);  
	}
	
	function add($table) {
		$this->load->helper('url');
		$this->load->model('DB_model');
		if (isset ($_POST['new'])) {
			$this->DB_model->addInTable($table, $_POST['new'], $_POST['head']);
			?>
			<script>
				document.location = "<?echo site_url("admin")?>"
			</script>
			<?
		}
		
		$data['cssurl'] = site_url('css/admin.css');
		if ($table == 'ads') {
				
			?>
			<script>
				document.location = "<?echo site_url("admin/add_ads")?>"
			</script>
			<?}
		else {
			$data['head'] = true;
			$data['actionurl'] = site_url("admin/add/$table");
			$data['now_page'] = 'change';
			$this->load->view('adminform',$data);
		}
		
	}
	
	function add_ads() {
		$this->load->helper('url');
		$this->load->model('DB_model');
		$data['cssurl'] = site_url('css/admin.css');
		if (!empty($_POST['cat'])) {
			$data['now_page'] = 'change';
			$data['actionurl'] = site_url("admin/add_ads/".$_POST['cat']);
			$data['head'] = true;
			$this->load->view('adminform',$data);
			
		}
		else if (!empty($_POST['new'])) {
			$this->db->set('id_cat', func_get_arg(0));
			$this->DB_model->addInTable('ads', $_POST['new'], $_POST['head']);
			?>
			<script>
				document.location = "<?echo site_url("admin")?>"
			</script>
			<?
			
			}
		else {
			$data['list'] = $this->DB_model->getData('cat');
			$data['now_page'] = 'catlist';
			$data['actionurl'] = site_url('admin/add_ads');
			$this->load->view('adminform',$data);
		}
	}
	
	function delete($table) {
		$this->load->helper('url');
		$this->load->model('DB_model');
		$data['cssurl'] = site_url('css/admin.css');
		$buf = func_get_args();
		
		if (isset($buf[1])) {
			$this->DB_model->deleteOne($table, $buf[1]);
		}
		$data['now_page'] = 'list';
		$data['list'] = $this->DB_model->getData($table);
		$data['changeurl'] = site_url('admin/changeone/');
		$data['deleteurl'] = site_url('admin/delete/');
		$data['table'] = $table;
		$this->load->view('adminform',$data);
	}
	
}   

?>
