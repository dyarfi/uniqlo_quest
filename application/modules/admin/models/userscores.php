<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

// Model Class Object for UserImages
class UserScores Extends CI_Model {
	
	public $table = 'tbl_user_scores';
	
	protected $_model_vars;
	
	public function __construct(){
		// Call the Model constructor
		parent::__construct();
		
		$this->_model_vars	= array('id'		 => 0,
									'user_id'	 => '',
									'image_id'	 => '',
									'added'		 => 0,
									'modified'	 => 0);
				
		$this->db = $this->load->database('default', true);		
				
	}
	public function install() {
		
		$insert_data	= FALSE;

		if (!$this->db->table_exists($this->table)) 
                $insert_data	= TRUE;
                
                $sql            = 'CREATE TABLE IF NOT EXISTS `'.$this->table.'` ('
                                    . '`id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,'
                                    . '`user_id` INT(11) UNSIGNED NOT NULL, '
                                    . '`image_id` INT(11) UNSIGNED NOT NULL, '
                                    . '`added` INT(11) UNSIGNED NOT NULL, '
                                    . '`modified` INT(11) UNSIGNED NOT NULL, '
                                    . 'INDEX (`user_id`) '
                                    . ') ENGINE=MYISAM';

		$this->db->query($sql);
		
        if(!$this->db->query('SELECT * FROM `'.$this->table.'` LIMIT 0, 1;'))
			$insert_data	= TRUE;
		
		if ($insert_data) {
			$sql	= '';

			$this->db->query($sql);
		}

		return $this->db->table_exists($this->table);
		
	}
	
	public function find ($where_cond = '', $order_by = '', $limit = '', $offset = '') {
		/** Build where query **/

		if ($where_cond != '') {
			if (is_array($where_cond) && count($where_cond) != 0) {
				$buffers	= array();

				$operators	= array('LIKE',
									'IN',
									'!=',
									'>=',
									'<=',
									'>',
									'<',
									'=');
                                
				foreach ($where_cond as $field => $value) {
					$operator	= '=';

					if (strpos($field, ' ') != 0)
						list($field, $operator)	= explode(' ', $field);

					if (in_array($operator, $operators)) {
						$field		= '`'.$field.'`';

						if ($operator == 'IN' && is_array($value))
							$buffers[]	= $field.' '.$operator.' (\''.implode('\', \'', $value).'\')';
						else
							$buffers[]	= $field.' '.$operator.' \''.$value.'\'';
					} else if (is_numeric($field)) {
						$buffers[]	= $value;
					} else {
						$buffers[]	= $field.' '.$operator.' \''.$value.'\'';
					}
				}                
				$where_cond	= implode(' AND ', $buffers);                   
			}
		}

		$sql_order = ''; 
		if ($order_by != '') {
			$sql_order = ' ORDER BY '; 
			$i 	   = 1;
			foreach ($order_by as $order => $val) {
				$split = ($i > 1) ? ', ' : ''; 
				$sql_order .= ' '. $split .' `'. $order.'` '.$val.' ';
				$i++;
			}
			$order_by  = $sql_order;
		}
		
		$sql_limit = ''; 
		if ($limit != '' && $offset != '') {
			$offset    = $offset . ','; 
			$sql_limit = 'LIMIT '. $offset . $limit; 
		}
		else if ($limit != '') {
			$sql_limit = 'LIMIT '. $limit; 
		}
		$limit = $sql_limit;
		
		if ($where_cond != '') {
			$rows = $this->db->query('SELECT * FROM `'.$this->table.'` WHERE '. $where_cond . $order_by . $limit, TRUE)->result();
		}
		else {
			$rows = $this->db->query('SELECT * FROM `'.$this->table.'`' . $order_by . $limit, TRUE)->result();
		}

		$returns	= array();
                
		foreach ($rows as $row) {
			$object			= new UserScores;

			$object_vars	= get_object_vars($row);
			
			foreach ($object_vars as $var => $val) {
				$object->$var	= $val;
			}

			unset($object->table,$object->_model_vars,$object->db);

			$returns[]		= $object;

			unset($object, $vars);
		}
				
		return $returns;
	}
	
	public function getCount($status = null){
		$data = array();
		$options = array('status' => $status);
		$this->db->where($options,1);
		$this->db->from($this->table);
		$data = $this->db->count_all_results();
		return $data;
	}
	
	public function getScore($image_id = null){
		if(!empty($image_id)){
			$data = array();
			$options = array('image_id' => $image_id);
			
			$this->db->where($options);
			$this->db->group_by('image_id');			
			//$this->db->get($this->table);
			
			$data = $this->db->count_all_results($this->table);
			/*
			$Q = $this->db->get_where($this->table,$options,1);
			if ($Q->num_rows() > 0){
				foreach ($Q->result_object() as $row)
				$data = $row;
			}
			$Q->free_result();
			*/
			//print_r($data);
			//exit;
			return ($data) ? $data : 0;
		}
	}
		
	public function getAllScore($admin=null){
		$data = array();
		$this->db->order_by('added');
		$Q = $this->db->get_where($this->table,array('status'=>1));
			if ($Q->num_rows() > 0){
				//foreach ($Q->result_object() as $row){
					//$data[] = $row;
				//}
				$data = $Q->result_object();
			}
		$Q->free_result();
		return $data;
	}
	
	public function setScore($object=null){
		
		// Set Image data
		$data = array(
			'user_id'	=> $object['user_id'],			
			'image_id'	=> $object['image_id'],
			'added'		=> time(),	
		);
		
		// Insert Image data
		$this->db->insert($this->table, $data);
		
		// Return last insert id primary
		$insert_id = $this->db->insert_id();					
			
		// Return last insert id primary
		return $insert_id;
		
	}	
	
	public function deleteScore($id) {
		
		// Check user image id
		$this->db->where('id', $id);
		
		// Delete user image form database
		return $this->db->delete($this->table);
	}	
}