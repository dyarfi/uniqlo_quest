<?php


if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Twitter extends CI_Controller {

    public function twitter() {
        parent::__construct();
        if (!$this->session->userdata('who')) {
            redirect(base_url() . 'admin/');
            die();
        }
        $this->load->library('grocery_CRUD');
        $this->load->model('twitter_model');
    }

    public function index() {
        try {
            $crud = new grocery_CRUD();
            $crud->set_table('tbl_tweets');
            $crud->set_subject('Images');                                
            $crud->columns('tweet_name', 'tweet_img', 'favorit_count','status');
            $crud->field_type('status','dropdown',array('1' => 'Enable', '0' => 'Disable'));                    
            $crud->callback_column('tweet_img',array($this,'callback_pic'));

            $this->load($crud, 'twitter');
        } catch (Exception $e) {
            show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
        }
    }

    public function callback_pic($value = '', $primary_key = null){
        if (!empty($value)) {
            return '<a href="'.$value.'" class="image-thumbnail">'. '<img src="'.$value.'" height="50px"> </a>';
        } else {
            return '-';
        }
    }

    public function _callback_total_image($value, $row) {
        $total = $this->user_model->total_image_submitted($row->participant_id);
        return $total;
    }
    private function load($crud, $nav) {
        $output = $crud->render();
        $output->nav = $nav;
        if ($crud->getState() == 'list')
            $this->load->view('admin/metronix.php', $output);
        else
            $this->load->view('admin/popup.php', $output);
    }
}
?>
