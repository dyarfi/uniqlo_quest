<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class gallery extends CI_Controller {

	public function __construct() {
		parent::__construct();
		
		$this->load->model('user_model');
        $this->load->model('gallery_model');

		// Load user related model in admin module
		//$this->load->model('admin/UserImages');
		//$this->load->model('admin/UserScores');
				
		//$this->load->model('admin/Users');
		//$this->load->model('admin/UserProfiles');
		
		$facebook = new Facebook();        
		$this->fb_id = $facebook->getUser();
	}
	
	public function index() {				
			
		$this->load->library('pagination');
		
		$config['base_url'] = base_url('gallery');	
		$config['total_rows'] = $this->gallery_model->get_count_images();
		$config["per_page"] = 33;

        //$config["uri_segment"] = 1;
		//$config['page_query_string'] = TRUE;


		$get_data = $this->input->get('data');
		$user_id = $this->user_model->decode($get_data);


		$this->pagination->initialize($config); 
		
		$links = $this->pagination->create_links();
		
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

		$data['user_id']	= $this->user_model->check_fb_user($this->fb_id)->part_id;

        $data['links'] 		= $links; 

		$data['gallery'] 	= $this->gallery_model->get_all_images($config["per_page"],$page);

		// Set main template
		$data['main'] = 'gallery';
				
		// Set site title page with module menu
		$data['page_title'] = 'Gallery';
		
		// Load admin template
		$this->load->view('template/public/site_template', $this->load->vars($data));
		
	}
	
	public function apply() {
		
		// Set main template
		$data['main'] = 'vacancy';
				
		// Set site title page with module menu
		$data['page_title'] = 'User';
		
		// Load admin template
		$this->load->view('template/public/blank_template', $this->load->vars($data));
		
	}
}

/* End of file user.php */
/* Location: ./application/controllers/user.php */