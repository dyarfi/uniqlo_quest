<?php

class Cron extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function tweets() {
        $this->load->library('twitteroauth');
        $this->load->model('twitter_model');

        $param = array('q' => 'scoretheselfie', 'include_entities' => 1, 'count' => 15);

        $last_id = @$this->twitter_model->get_last_tweets_id();
        if ($last_id) {
            $param['since_id'] = $last_id;
        }

        $twoauth = new TwitterOAuth();
        $conn = $twoauth->create('DwyrWPej7E8mVZV5HMaeqAHlW', 'mDbCGX3wasXgsbpbuvhusu8vtXMZLuZ12My8Lfe06pYeUPDSvY');
        $result = $conn->get('search/tweets', $param);
                
        foreach ($result->statuses as $r) {

            $tweets = array();
            $tweets['tweet_id'] = $r->id_str;
            $tweets['tweet_text'] = $r->text;
            $tweets['tweet_date'] = strtotime($r->created_at);
            $tweets['tweet_user'] = $r->user->screen_name;
            $tweets['tweet_name'] = $r->user->name;

            $tweets['retweet_count']    = $r->retweet_count;
            $tweets['favorite_count']   = $r->favorite_count;
            $tweets['status']   = 1;

            if (isset($r->entities->media)) {
                $tweets['tweet_img'] = $r->entities->media[0]->media_url;
            }
            $this->twitter_model->insert_tweet($tweets);
        }
    }

}
