<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Questionnaires_model extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
        $this->db->set_dbprefix('tbl_');
    }
	
	public function get_user_questionnaires ($user_id, $limit = 0, $start = 0) {
        $data = array();

        $this->db->where('user_id',$part_id);
        $this->db->where('status',1);        
		$this->db->order_by('id','desc');

        $this->db->limit($limit, $start);
        
		$Q = $this->db->get('questionnaires');
        
        if ($Q->num_rows() > 0){
			$data = $Q->result_object();
		}

		$Q->free_result();
		return $data;	
	}
	
	public function get_all_questionnaires ($limit = 1000, $start = 0, $order=array(), $search='') {
		$data = array();
        
        if ($search != '') {       
            $this->db->like('name', $search); 
        } 
        
        $this->db->where('status',1);
        
        if (is_array($order)) {
            foreach ($order as $key => $value) {                
                $this->db->order_by($key,$value);
            }
        }

        $this->db->limit($limit, $start);        

		$Q = $this->db->get('questionnaires');

        if ($Q->num_rows() > 0){
			$data = $Q->result_object();
		}
        
        $Q->free_result();
        
		return $data;	
	}

    public function get_count_questionnaires ($search='') {
        if (!empty($search)) {
            $this->db->like('name', $search);            
        }
        $this->db->where('status', 1);
        $this->db->from('questionnaires');
        return $this->db->count_all_results();
    }

    public function get_count_user_images ($user_id=0) {
        $this->db->where('user_id',$user_id);
        $this->db->where('status', 1);
        $this->db->from('questionnaires');
        return $this->db->count_all_results();
    }
	
    public function get_questionnaires($questionnaires_id='',$user_id='') {
        $data = array();
        $this->db->where('id',$questionnaires_id);
        //$this->db->where('part_id',$part_id);        
        $Q = $this->db->get('tbl_questionnaires');
        if ($Q->num_rows() > 0){
            foreach ($Q->result_object() as $row)
            $data = $row;
        }
        $Q->free_result();
        return $data;   
    }

    public function get_values_questionnaires () {
        $this->db->where('status', 1);
        $Q = $this->db->get('questionnaires');
        if ($Q->num_rows() > 0){
            foreach ($Q->result_object() as $row)
            $data[$row->id] = $row->questionnaire_text;
        }
        return $data;
    }
    
    public function count_user_answer_by_questionnaires($questionnaire_id='') {
        
        $_data_text = $this->get_questions_by_questionnaires($questionnaire_id);

        $count = '';
        $data = array();
        foreach ($_data_text as $question) {            
        
            $data[] = array(
                strip_tags($question->question_text) .': '.$this->count_user_answer_by_question_id($question->id),
                $this->count_user_answer_by_question_id($question->id)
                );
            
        }
        
        return $data;   
    }

    public function insert_questionnaires($questionnaires) {
        $this->db->insert('questionnaires', $questionnaires);
        return $this->db->insert_id();
    }

    public function get_all_questions ($limit = 1000, $start = 0, $order=array(), $search='') {
        $data = array();
        
        if ($search != '') {       
            $this->db->like('name', $search); 
        } 
        
        $this->db->where('status',1);
        
        if (is_array($order)) {
            foreach ($order as $key => $value) {                
                $this->db->order_by($key,$value);
            }
        }

        $this->db->limit($limit, $start);        

        $Q = $this->db->get('questions');

        if ($Q->num_rows() > 0){
            $data = $Q->result_object();
        }
        
        $Q->free_result();
        
        return $data;   
    }

    public function get_question($question_id='') {
        $data = array();
        $this->db->where('id',$question_id);      
        $Q = $this->db->get('questions');
        if ($Q->num_rows() > 0){
            foreach ($Q->result_object() as $row)
            $data = $row;
        }
        $Q->free_result();
        return $data;   
    }

    public function get_questions_by_questionnaires($questionnaire_id='') {
        $data = array();
        $this->db->where('questionnaire_id',$questionnaire_id);      
        $Q = $this->db->get('questions');
        $data = $Q->result_object();

        $Q->free_result();
        return $data;   
    }

    public function count_user_answer_by_question_id($question_id='') {
        
        return $this->db
        ->where('question_id',$question_id)          
        ->count_all_results('user_answers');

        //return $this->db->last_query();

    }                

    public function get_users_question_completed() {
        
        $this->db->where('part_id !=','');

        $Q = $this->db->get('user_questionnaires_completed');

        $data = $Q->result_object();

        return  $data;

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
