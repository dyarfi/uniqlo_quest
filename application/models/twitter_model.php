<?php

class Twitter_model extends CI_Model {

    /**
     * Responsable for auto load the database
     * @return void
     */
    public function __construct() {
        $this->load->database();
    }

    function insert_tweet($twitter) {
        $this->db->insert('tbl_tweets', $twitter);
        return $this->db->insert_id();
    }

    function get_last_tweets_id() {
        return $this->db->query('select tweet_id from tbl_tweets order by tweet_date desc limit 1')->row()->tweet_id;
    }

    function get_last_tweet() {
        return $this->db->query('select * from tbl_tweets order by tweet_date desc limit 1')->row();
    }

    function delete_tweet($id) {
        $this->db->delete('tbl_tweets', array('id' => $id));
        return $this->db->affected_rows();
    }

    function get_tweets($limit = '') {
        $query = "select id,tweet_id, tweet_text,tweet_img, tweet_user, FROM_UNIXTIME(tweet_date, '%d-%m-%Y %h:%i:%s') as tw_date, TIME_TO_SEC(TIMEDIFF(NOW(),FROM_UNIXTIME(tweet_date))) as duration"
                . " from tbl_tweets order by tweet_date desc";
        if ($limit != '') {
            $query .= ' limit ' . $limit;
        }
        return $this->db->query($query)->result_array();
    }

}
