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
	
	public function check_gallery ($part_id) {
        $data = array();
		$this->db->order_by('added');
		$Q = $this->db->get_where('user_images',array('part_id'=>$part_id,'status'=>1));
			if ($Q->num_rows() > 0){
				//foreach ($Q->result_object() as $row){
					//$data[] = $row;
				//}
				$data = $Q->result_object();
			}
		$Q->free_result();
		return $data;	
	}
	
	public function get_all_images ($limit = 0, $start = 0) {
		$data = array();
        $this->db->limit($limit, $start);
		$this->db->order_by('added');

		$Q = $this->db->get_where('user_images',array('status'=>1));
			if ($Q->num_rows() > 0){
				foreach ($Q->result_object() as $row){
					$data[] = $row;
				}
				$data = $Q->result_object();
			}
		$Q->free_result();
		return $data;	
	}

    public function get_count_images () {
        $this->db->where('status', 1);
        $this->db->from('user_images');
        return $this->db->count_all_results();
    }
	
    public function insert_image($image) {
        $this->db->insert('user_images', $image);
        return $this->db->insert_id();
    }

    public function unscore($part_id, $image_id) {
        $this->db->where('participant_id', $part_id);
        $this->db->where('image_id', $image_id);
        $this->db->delete('user_scores');
    }

    public function insert_score($part_id, $image_id) {
        $score['participant_id'] = $part_id;
        $score['image_id'] = $image_id;
        $this->db->insert('user_scores', $score);
    }

    public function check_score($part_id, $image_id) {
        $this->db->where('part_id', $part_id);
        $this->db->where('image_id', $image_id);
        $this->db->from('user_scores');
        return $this->db->count_all_results();
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
