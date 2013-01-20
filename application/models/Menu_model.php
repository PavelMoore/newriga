<?php   
class Menu_model extends CI_Model {   
 
    function Menu_model()   
    {   
        // Вызов конструктора  
        parent::__construct();   
    }   
 
    function getMenu()   
        {   
            $this->load->helper('url');
			return array(
					anchor('history', "История"),
					anchor('villages',"Посёлки"), 
					anchor('news',"Новости"), 
					anchor('ads',"Объявления"), 
					anchor('rest',"Отдых и Развлечения"), 
					anchor('galery',"Фотогалерея"), 
					anchor('sales',"Акции и Скидки"), 
					anchor('contacts',"Контакты" ));
							
							
							
          /*  return array('history',"История", 
							     */
        } 
		
	function menu_table($name, $properties) {
				switch ($properties[1]) {
				case 'one': 
					$functions_array= array("Изменить" => array('i', "admin/change/$name"));
					break;
				case 'many': 
					$functions_array= array("Добавить" => array('+', "admin/add/$name"), 
											"Удалить/Изменить" => array ('-', "admin/delete/$name"));
					break;
				case 'users': 
					$functions_array= array("Заблокировать" => array('о',"admin/ban"), 
											"Удалить" => array('-',"admin/delete/$name"));
			break;
		}
		return $functions_array;
	}
	
	function getAdminMenu()   
        {   
				$begin = array (
					'history' => array("История", 'one'),
					'villages' => array("Посёлки", 'users'),
					'news' => array("Новости", 'many'),
					'ads' => array("Объявления", 'many'),
					'rest' => array("Отдых", 'one'),
					'sales' => array("Акции",  'one'),
					'contacts' => array("Контакты", 'one'), 
					'galery' => array("Галерея", 'many')
					
					);
				foreach ($begin as $name => $properties) {
					
					$ret[$properties[0]] = $this->menu_table($name, $properties);
					
				
				}
				return $ret;
				
        }
 
}   
?>