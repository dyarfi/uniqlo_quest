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
        $this->sync_tweets();
        $this->db->insert('tbl_tweets', $twitter);
        return $this->db->insert_id();
    }

    function get_last_tweets_id() {
        return $this->db->query('select tweet_id from tbl_tweets order by tweet_date desc limit 1')->row()->tweet_id;
    }

    function get_last_tweet() {
        return $this->db->query('select * from tbl_tweets order by tweet_date desc limit 1')->row();
    }

    function sync_tweets () {
        $data = array();
        $options = array('status' => 0);
        $this->db->where($options);
        $Q = $this->db->get('tbl_tweets');
        if ($Q->num_rows() > 0) {
            foreach ($Q->result_object() as $row)
            $data['tweet_id'] = $row->tweet_id;
        }
        if (!empty($data) && is_array($data)) {
            $del = array();
            $this->db->where_not_in('tweet_id', $data); 
            $S = $this->db->get('tbl_tweets',$options);
            if ($S->num_rows() > 0) {
                foreach ($S->result_object() as $row) {
                    $this->db->delete('tbl_tweets',array('tweet_id'=>$row->id));
                }
            }
            return 1;
        } else {
            return 1;
        }
    }

    function delete_tweet($id) {
        $this->db->delete('tbl_tweets', array('id' => $id));
        return $this->db->affected_rows();
    }

    function get_count_tweet() {
        $this->db->where('status', 1);
        $this->db->from('tbl_tweets');
        return $this->db->count_all_results();    
    }

    function get_tweets($limit = '20000', $offset ='') {
        $query = "select id,tweet_id, tweet_text,tweet_img, tweet_user, retweet_count, favorite_count, FROM_UNIXTIME(tweet_date, '%d-%m-%Y %h:%i:%s') as tw_date, TIME_TO_SEC(TIMEDIFF(NOW(),FROM_UNIXTIME(tweet_date))) as duration"
                . " from tbl_tweets where status = 1 order by tweet_date desc";
        
        if ($limit != '' || $offset != '') {
            $offset = $offset ? $offset . ',' : ''; 
            $query  .= ' limit '. $offset . $limit; 
        } 

        return $this->db->query($query)->result_array();
    }

}
