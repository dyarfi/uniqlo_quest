<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class terms extends CI_Controller {

	public function __construct() {
		parent::__construct();
		
		// Load user related model in admin module
		//$this->load->model('admin/Users');
		//$this->load->model('admin/UserProfiles');
					
	}
	
	public function index() {
		
		// Set main template
		$data['main'] = 'terms';
				
		// Set site title page with module menu
		$data['page_title'] = 'Term and Condition';
		
		// Load admin template
		$this->load->view('template/public/site_template', $this->load->vars($data));
		
	}
}

/* End of file user.php */
/* Location: ./application/controllers/user.php */