<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Gallery_model extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
        $this->db->set_dbprefix('tbl_');
    }
	
	public function get_user_gallery ($part_id, $limit = 0, $start = 0) {
        $data = array();

        $this->db->where('part_id',$part_id);
        $this->db->where('status',1);        
		$this->db->order_by('id','desc');

        $this->db->limit($limit, $start);
        
		$Q = $this->db->get('user_images');
        
        if ($Q->num_rows() > 0){
			$data = $Q->result_object();
		}

		$Q->free_result();
		return $data;	
	}
	
	public function get_all_images ($limit = 0, $start = 0, $order=array(), $search='') {
		$data = array();
        
        if ($search != '') {       
            $this->db->like('name', $search); 
        } 
        
        $this->db->where('status',1);
        $this->db->where('file_name !=','');
        
        if (is_array($order)) {
            foreach ($order as $key => $value) {                
                $this->db->order_by($key,$value);
            }
        }

        $this->db->limit($limit, $start);        

		$Q = $this->db->get('user_images');
		if ($Q->num_rows() > 0){
			$data = $Q->result_object();
		}
        
        $Q->free_result();
        
		return $data;	
	}

    public function get_count_images ($search='') {
        if (!empty($search)) {
            $this->db->like('name', $search);            
        }
        $this->db->where('status', 1);
        $this->db->from('user_images');
        return $this->db->count_all_results();
    }

    public function get_count_user_images ($part_id=0) {
        $this->db->where('part_id',$part_id);
        $this->db->where('status', 1);
        $this->db->from('user_images');
        return $this->db->count_all_results();
    }
	
    public function get_image($image_id='',$part_id='') {
        $data = array();
        $this->db->where('id',$image_id);
        //$this->db->where('part_id',$part_id);        
        $Q = $this->db->get('user_images');
        if ($Q->num_rows() > 0){
            foreach ($Q->result_object() as $row)
            $data = $row;
        }
        $Q->free_result();
        return $data;   
    }

    public function insert_image($image) {
        $this->db->insert('user_images', $image);
        return $this->db->insert_id();
    }

    public function unscore($part_id, $image_id) {
        $this->db->where('part_id', $part_id);
        $this->db->where('image_id', $image_id);
        return $this->db->delete('user_scores');
    }

    public function insert_score($part_id, $image_id) {
        $score['part_id']   = $part_id;
        $score['image_id']  = $image_id;
        $score['added']     = time();
        $score['modified']  = time();        
        if ($this->db->insert('user_scores', $score)) {
            return $this->update_total_score($image_id);
        }
    }

    public function update_total_score($image_id) {
        $score['count']     = $this->check_score($image_id);
        $score['modified']  = time();
        $this->db->where('id', $image_id);
        return $this->db->update('user_images', $score);            
    }

    public function check_score($image_id) {
        $this->db->where('image_id', $image_id);
        $this->db->from('user_scores');
        return $this->db->count_all_results();
    }

    public function check_ifscored($part_id, $image_id) {
        $this->db->where('part_id', $part_id);
        $this->db->where('image_id', $image_id);
        $this->db->from('user_scores');
        $result = 0;
        if ($this->db->count_all_results() > 0) {
            $result = 1;
        }
        return $result;
    }

    public function total_score($image_id) {
        $this->db->where('image_id', $image_id);
        $this->db->select('count(1) as total');
        return $this->db->get('user_scores')->row()->total;
    }

    public function total_score_admin($image_id) {
        $this->db->where('image_id', $image_id);
        $this->db->select('count(1) as total');
        return $this->db->get('user_scores')->row()->total;
    }

    public function total_image_submitted($part_id) {
        $this->db->where('part_id', $part_id);
        $this->db->select('count(1) as total');
        return $this->db->get('user_images')->row()->total;
    }   

}

?>
