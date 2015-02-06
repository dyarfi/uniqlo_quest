<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class register extends CI_Controller {

	public function __construct() {
		parent::__construct();
		
		// Load user related model in admin module
		//$this->load->model('admin/Users');
		//$this->load->model('admin/UserProfiles');
					
	}
	
	public function index() {
		
		
		// Default data setup
		$fields	= array(
				'username'		=> '',
				'email'			=> '',
				'password'		=> '',
				'password1'		=> '',
				'gender'		=> '',				
				'group_id'		=> '',
				'first_name'	=> '',
				'last_name'		=> '',				
				'birthday'		=> '',
				'phone'			=> '',	
				'mobile_phone'	=> '',				
				'fax'			=> '',
				'website'		=> '',
				'about'			=> '',
				'division'		=> '',
				'status'		=> '');
		
		$errors	= $fields;
		
		$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[5]|max_length[24]|xss_clean');
		$this->form_validation->set_rules('email', 'Email','trim|valid_email|required|min_length[5]|max_length[24]|callback_match_email|xss_clean');
		$this->form_validation->set_rules('password', 'Password','trim|required');
		$this->form_validation->set_rules('password1', 'Retype Password','trim|required|matches[password]');
		$this->form_validation->set_rules('gender', 'Gender','required');		
		$this->form_validation->set_rules('group_id', 'Group','required');
		$this->form_validation->set_rules('first_name', 'First Name','trim');
		$this->form_validation->set_rules('last_name', 'Last Name','required');
		$this->form_validation->set_rules('birthday', 'Birthday','required');
		$this->form_validation->set_rules('phone', 'Phone','trim|is_natural|xss_clean|max_length[25]');
		$this->form_validation->set_rules('mobile_phone', 'Mobile Phone','trim');		
		$this->form_validation->set_rules('fax', 'Fax','trim|is_natural|xss_clean|max_length[25]');
		$this->form_validation->set_rules('website', 'Website','trim|prep_url|xss_clean|max_length[35]');
		$this->form_validation->set_rules('about', 'About','trim|xss_clean|max_length[1000]');
		$this->form_validation->set_rules('division', 'Division','trim|xss_clean|max_length[55]');				
		$this->form_validation->set_rules('status', 'Status','required');
		
		
		// Check if post is requested
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			
			// Validation form checks
			if ($this->form_validation->run() == FALSE)
			{
				// Set error fields
				$error = array();
				foreach(array_keys($fields) as $error) {
					$errors[$error] = form_error($error);
				}

				// Set previous post merge to default
				$fields = array_merge($fields, $this->input->post());
			}
			else
			{

				// Set data to add to database
				$user = $this->Users->setUser($this->input->post());
				
				// Set message
				$this->session->set_flashdata('message','User created!');
				
				// Redirect after add
				redirect('admin/user');
				
			}
			
		}	
		
		// Logic Register via Ajax Request
		if ($this->input->is_ajax_request()) {
			
			echo json_encode($user);
			
			exit;
		}
		
		// Set main template
		$data['main'] = 'register';
				
		// Set site title page with module menu
		$data['page_title'] = 'Daftar';
		
		// Load admin template
		$this->load->view('template/public/site_template', $this->load->vars($data));
		
	}
}

/* End of file register.php */
/* Location: ./application/controllers/register.php */