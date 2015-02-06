<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class User_model extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
        $this->db->set_dbprefix('tbl_');
    }

    public function auth($username, $password) {
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        return $this->db->get('user')->row();
    }

    public function reg_participant($part) {
        $this->db->insert('participant', $part);
        return $this->db->insert_id();
    }

    public function encode($user_id) {
        $this->load->library('encrypt');
        $user_id .= "__";
        $user_id .= random_string('alnum', 5);
        $encode_user_id = $this->encrypt->encode($user_id);
        return $this->safe_b64encode($encode_user_id);
    }

    public function decode($user_id) {
        $this->load->library('encrypt');
        $user_id = $this->safe_b64decode($user_id);
        $user_id = $this->encrypt->decode($user_id);
        if ($user_id) {
            $temp = explode("__", $user_id);
            if (count($temp) == 2) {
                return $temp[0];
            }
        }
        return false;
    }

    public function safe_b64encode($string) {
        $data = base64_encode($string);
        $data = str_replace(array('+', '/', '='), array('-', '_', ''), $data);
        return $data;
    }

    public function safe_b64decode($string) {
        $data = str_replace(array('-', '_'), array('+', '/'), $string);
        $mod4 = strlen($data) % 4;
        if ($mod4) {
            $data .= substr('====', $mod4);
        }
        return base64_decode($data);
    }

    public function check_user_id($user_id) {
        return $this->db->query("select count(1) as total from liner_participant where participant_id = ?", array($user_id))->row()->total;
    }

    public function get_meta_data_frame($frame_id) {
        $this->db->where('liner_frame.frame_id', $frame_id);
        $this->db->join('liner_frame_detail', 'liner_frame_detail.frame_id = liner_frame.frame_id');
        return $this->db->get('frame')->result();
    }

    public function insert_image($image) {
        $this->db->insert('image', $image);
        return $this->db->insert_id();
    }
   
    function get_participant($user_id) {
        $this->db->select('*');
        $this->db->where('part_id', $user_id);
        return $this->db->get('participant')->row();
    }
	
    public function get_admin ($id = null) {
        if(!empty($id)){
            $data = array();
            $options = array('user_id' => $id);
            $Q = $this->db->get_where('tbl_user',$options,1);
            if ($Q->num_rows() > 0){
                foreach ($Q->result_object() as $row)
                $data = $row;
            }
            $Q->free_result();
            return $data;
        }
    }

	public function get_user ($id = null) {
		if(!empty($id)){
			$data = array();
			$options = array('part_id' => $id);
			$Q = $this->db->get_where('participant',$options,1);
			if ($Q->num_rows() > 0){
				foreach ($Q->result_object() as $row)
				$data = $row;
			}
			$Q->free_result();
			return $data;
		}
	}

    public function get_values_users () {
        $this->db->where('status', 1);
        $Q = $this->db->get('tbl_user');
        if ($Q->num_rows() > 0){
            foreach ($Q->result_object() as $row)
            $data[$row->user_id] = $row->username;
        }
        return $data;
    }

    public function check_fb_user($fb_id) {
        $this->db->where('fb_id', $fb_id);
        return $this->db->get('participant')->row();
    }

    public function check_fb_user_data($fb_id) {
        $this->db->where('fb_id', $fb_id);
        $Q = $this->db->get('participant');
        if ($Q->num_rows() > 0){
            foreach ($Q->result_object() as $row)
            $data = $row;
        }
        $Q->free_result();
        return $data;
}

    public function insert_temp($fb) {
        $insert_query = $this->db->insert_string('fb_temp', $fb);
        $insert_query = str_replace('INSERT INTO', 'INSERT IGNORE INTO', $insert_query);
        $this->db->query($insert_query);
    }

    public function get_temp($fb_id) {
        $this->db->where('fb_id', $fb_id);
        return $this->db->get('fb_temp')->row();
    }

    public function unvote($id, $image_id) {
        $this->db->where('participant_id', $id);
        $this->db->where('image_id', $image_id);
        $this->db->delete('vote');
    }

    public function insert_vote($id, $image_id) {
        $vote['participant_id'] = $id;
        $vote['image_id'] = $image_id;
        $this->db->insert('vote', $vote);
    }

    public function check_vote($id, $image_id) {
        $this->db->where('participant_id', $id);
        $this->db->where('image_id', $image_id);
        return $this->db->get('vote')->row();
    }

    public function total_vote($image_id) {
        $this->db->where('image_id', $image_id);
        $this->db->select('count(1) as total');
        return $this->db->get('vote')->row()->total;
    }

    public function total_vote_admin($image_id) {
        $this->db->where('image_id', $image_id);
        $this->db->select('count(1) as total');
        return $this->db->get('liner_vote')->row()->total;
    }

    public function total_image_submitted($id) {
        $this->db->where('participant_id', $id);
        $this->db->select('count(1) as total');
        return $this->db->get('liner_image')->row()->total;
    }

    public function get_email($image_id) {
        $this->db->where('image_id', $image_id);
        $this->db->join('liner_participant', 'liner_participant.participant_id = liner_image.participant_id');
        $this->db->select('email');
        return $this->db->get('liner_image')->row()->email;
    }

    public function get_phone($image_id) {
        $this->db->where('image_id', $image_id);
        $this->db->join('liner_participant', 'liner_participant.participant_id = liner_image.participant_id');
        $this->db->select('phone_number');
        return $this->db->get('liner_image')->row()->phone_number;
    }

    public function get_twitter($image_id) {
        $this->db->where('image_id', $image_id);
        $this->db->join('liner_participant', 'liner_participant.participant_id = liner_image.participant_id');
        $this->db->select('twitter');
        return $this->db->get('liner_image')->row()->twitter;
    }

    public function generate_url($image_id) {
        $bit_ly = $this->db->query('select image_bit_ly from liner_image where image_id = ?', array($image_id))->row();
        if ($bit_ly->image_bit_ly) {
            return $bit_ly->image_bit_ly;
        }
        $url = "https://www.facebook.com/pages/" . $this->config->item('pageName') . '/'
                . $this->config->item('pageId') . '?id=' . $this->config->item('pageId') . '&'
                . 'sk=app_' . $this->config->item('appId') . '&'
                . 'app_data=';

        $new_sc_id = $this->encode($image_id);
        $url .= $new_sc_id;
        $this->load->library('bitly');
        if ($result = $this->bitly->shorten($url)) {
            $url = $result;
            $bitly['image_bit_ly'] = $result;
            $this->db->where('image_id', $image_id);
            $this->db->update('image', $bitly);
        }
        return $url;
    }

}

?>
