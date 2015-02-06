<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class scoretheselfie extends CI_Controller {

	public function __construct() {
		parent::__construct();
		
		$this->load->library('pagination');		
		$this->load->model('twitter_model');		

	}
	
	public function index() {				
			
        // Set pagination
        $this->load->library('pagination');        

        $config['full_tag_open'] = '<div><ul class="pagination pagination-small pagination-centered">';
        $config['full_tag_close'] = '</ul></div>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
        $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
        $config['next_tag_open'] = "<li>";
        $config['next_tagl_close'] = "</li>";
        $config['prev_tag_open'] = "<li>";
        $config['prev_tagl_close'] = "</li>";
        $config['first_tag_open'] = "<li>";
        $config['first_tagl_close'] = "</li>";
        $config['last_tag_open'] = "<li>";
        $config['last_tagl_close'] = "</li>";     

        $config['base_url'] = base_url('scoretheselfie/index/?');   
        $config['total_rows'] = $this->twitter_model->get_count_tweet();
        $config['per_page'] = 9;
        $config['page_query_string'] = TRUE;

        $this->pagination->initialize($config);                 
        $page = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;
        $links = $this->pagination->create_links();

        // Set links data
        $data['links'] = $links; 

        $tweets = $this->twitter_model->get_tweets($config["per_page"],$page);
        for ($i = 0; $i < count($tweets); $i++) {
            $tweets[$i]['duration'] = $this->count_tweet_date($tweets[$i]['duration']);
            $tweets[$i]['tweet_text'] = $this->clean($tweets[$i]['tweet_text']);
        }
        $data['tweets'] = $tweets;

		// Set main template
		$data['main'] = 'scoretheselfie';
				
		// Set site title page with module menu
		$data['page_title'] = '#scoretheselfie';
		
		// Load admin template
		$this->load->view('template/public/site_template', $this->load->vars($data));
		
	}
	
	private function count_tweet_date($tweet_date) {
//        $tweet_date *= 1000;
        $second = 1;
        $minute = $second * 60;
        $hour = $minute * 60;
        $day = $hour * 24;
        $week = $day * 7;
        ;
        if ($tweet_date < 0) {
            return "";
        }
        if ($tweet_date < $second * 2) {
            return "right now";
        }
        if ($tweet_date < $minute) {
            return floor($tweet_date / $second) . " seconds ago";
        }
        if ($tweet_date < $minute * 2) {
            return "about 1 minute ago";
        }
        if ($tweet_date < $hour) {
            return floor($tweet_date / $minute) . " minutes ago";
        }
        if ($tweet_date < $hour * 2) {
            return "about 1 hour ago";
        }
        if ($tweet_date < $day) {
            return floor($tweet_date / $hour) . " hours ago";
        }
        if ($tweet_date > $day && $tweet_date < $day * 2) {
            return floor($tweet_date / $day) . " days ago";
        }

        if ($tweet_date < $day * 365) {
            return floor($tweet_date / $day) . " days ago";
        } else {
            return "over a year ago";
        }
    }

    private function clean($ret) {
        $ret = preg_replace("#(^|[\n ])([\w]+?://[\w]+[^ \"\n\r\t< ]*)#", "\\1<a href=\"\\2\" target=\"_blank\">\\2</a>", $ret);
        $ret = preg_replace("#(^|[\n ])((www|ftp)\.[^ \"\t\n\r< ]*)#", "\\1<a href=\"http://\\2\" target=\"_blank\">\\2</a>", $ret);
        $ret = preg_replace("/@(\w+)/", "<a href=\"http://www.twitter.com/\\1\" target=\"_blank\">@\\1</a>", $ret);
        $ret = preg_replace("/#(\w+)/", "<a href=\"http://twitter.com/search?q=\\1\" target=\"_blank\">#\\1</a>", $ret);
        return $ret;
    }
}

/* End of file user.php */
/* Location: ./application/controllers/user.php */