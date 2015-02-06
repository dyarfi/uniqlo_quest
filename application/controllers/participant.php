<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

define('THUMBNAIL_IMAGE_MAX_WIDTH', 200);
define('THUMBNAIL_IMAGE_MAX_HEIGHT', 200);

class Participant extends CI_Controller {

    public function Participant() {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->model('gallery_model');
    }

    public function index() {

        $image_id = base64_decode($this->input->get('data'));

        $get_data = $this->session->userdata('user_id');

        $sort_by  = '';

        if ($this->input->is_ajax_request()) {
            echo json_encode(array('url'=>'?sort_by='.$this->input->get('sort_by')));
            exit;
        }

        $image_new = '';

        if ($image_id) {
            $image_new = $this->gallery_model->get_image($image_id);
        }

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

        if (!$get_data) {
            redirect(base_url('home/register'));
        } else {
            $user_id = $this->user_model->decode($get_data);
            if ($user_id) {
                
                // Set main template
                $data['main'] = 'gallery';

                $config['base_url'] = base_url('participant/index/');   
                $config['total_rows'] = $this->gallery_model->get_count_user_images($user_id);
                $config['per_page'] = 9;
                $config['use_page_numbers'] = TRUE;

                $this->pagination->initialize($config);                 
                $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;                
                $links = $this->pagination->create_links();

                // Set links data
                $data['links'] = $links; 

                // Set all images display 
                $data['user_id'] = $user_id;

                // Set data gallery
                $data['gallery']    = $this->gallery_model->get_user_gallery($user_id,$config["per_page"],$page);

            } else {
                // Set main template
                $data['main'] = 'upload';
                
                $config['base_url'] = base_url('participant/index/');   
                $config['total_rows'] = $this->gallery_model->get_count_images();
                $config['per_page'] = 12;
                $config['use_page_numbers'] = TRUE;

                $this->pagination->initialize($config);                 
                $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;                
                $links = $this->pagination->create_links();

                $data['links'] = $links; 

                // Set all user images
                $data['gallery'] = $this->gallery_model->get_all_images($config["per_page"],$page);
            }
        }

        // Set New uploaded Image
        $data['image_new']  = $image_new;
					
		// Set site title page with module menu
		$data['page_title'] = 'My Gallery';
		
		// Load admin template
		$this->load->view('template/public/site_template', $this->load->vars($data));
    }

}

?>
