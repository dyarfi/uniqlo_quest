<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct() {
		parent::__construct();
		
		// Load facebook and headers
		$this->load->library('facebook');
        $this->load->model('user_model');
        $this->config->set_item('show_header', true);
        header('Access-Control-Allow-Origin: *');
		
		// Load Setting data
		//$this->load->model('setting/Settings');
	
	} 

    public function index() {    
        /*
        $facebook = new Facebook();        
		$fb_id = $facebook->getUser();

        if ($fb_id) {            
            $user_fb = $facebook->api('/me?fields=name,picture,email');

            // Check database insert if empty
            if ($this->user_model->get_temp($fb_id)) {

	           	// Check already registered
	            $user = $this->user_model->check_fb_user($fb_id);

            } else {

                $fb_user = array();
                $fb_user['fb_name'] = @$user_fb['name'];
                $fb_user['fb_email'] = @$user_fb['email'];
                $fb_user['fb_id'] = @$user_fb['id'];
                $fb_user['fb_pic'] = @$user_fb['picture']['data']['url'];
                $fb_user['added'] 		= time();
                $fb_user['modified'] 	= time();
                $this->user_model->insert_temp($fb_user);           
                
            }
			
			// Check already registered
	        $user = $this->user_model->check_fb_user($fb_id);
            
            if ($user) {
                // Registered
                $signedRequest = $facebook->getSignedRequest();
                $sc_id = false;                
                if (isset($signedRequest['app_data'])) {
                    $sc_encoded = $signedRequest['app_data'];
                    $sc_id = $this->user_model->decode($sc_encoded);
                }
                $this->config->set_item('user_id', $user->part_id);
                if ($sc_id) {
                    redirect(base_url() . 'participant/single/' . $sc_encoded . '?data=' . $this->user_model->encode($user->part_id));
                } else {
                    //redirect(base_url() . 'participant?data=' . $this->user_model->encode($user->part_id));
                    $this->session->set_userdata('user_id',$this->user_model->encode($user->part_id));
                    redirect(base_url() . 'participant');
                }
            } else {
                // Not registered
                $this->show_home();
            }
        } else {
            // Request to get data
            $this->load->view('request');
        }
        */
	}

	// Show home page
    public function show_home() {
        
        // Set page title 
        $data['page_title'] = 'Home';

        // Set main template
		$data['main'] = 'home';

        // Load admin template
		$this->load->view('template/public/site_template', $this->load->vars($data));
		
    }
	
	// User registration
	public function register () {

		$facebook = new Facebook();

        $fb_id = $facebook->getUser();
		
        $user_fb_data 	= $this->user_model->get_temp($fb_id);

		$user_data 		= $this->session->userdata('user_id');
		
		$fb_user = $this->user_model->check_fb_user($fb_id);

        if ($user_data) {
            $user_id = $this->user_model->decode($user_data);
            if ($user_id && $fb_user) {
                redirect(fb_url('gallery'));
                die();
            }
        }

        // Default data setup
		$fields	= array(
				'name'			=> '',
				'address'		=> '',
				'email'			=> '',
				'checkbox_data'	=> '',
				'checkbox_rules'=> '',				
				'phone'			=> '',	
				'twitter'		=> '');
		
		$errors	= $fields;

		$this->form_validation->set_rules('name', 'Nama', 'trim|required|max_length[55]|xss_clean');
		$this->form_validation->set_rules('address', 'Alamat','trim|required');
		$this->form_validation->set_rules('checkbox_data', 'Syarat dan Ketentuan','trim|required');		
		$this->form_validation->set_rules('checkbox_rules', 'Data adalah benar','trim|required');		
		$this->form_validation->set_rules('email', 'Email','trim|valid_email|required|max_length[55]|xss_clean');
		$this->form_validation->set_rules('phone', 'No. Telp','trim|required|is_natural|xss_clean|max_length[45]');
		$this->form_validation->set_rules('twitter', 'Twitter','trim|xss_clean|max_length[55]');						
		
		// Check if post is requested
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {			

			// Validation form checks
			if ($this->form_validation->run() === FALSE)
			{

				// Set error fields
				$error = array();
				foreach(array_keys($fields) as $error) {
					$errors[$error] = form_error($error);
				}

				// Set previous post merge to default
				$fields = array_merge($fields, $this->input->post());

				// Set site title page with module menu
				$data['page_title'] = 'Daftar';
				
				// Set main template
				$data['main']	 = 'register';
			
				// Set error data to view
				$data['errors'] = $errors;

				// Post Fields
				$data['fields']		= (object) $fields;

				// Set site template
				$this->load->view('template/public/site_template', $this->load->vars($data));
				
			}
			else
			{

				$part = array();
				$part['name'] = $this->input->get_post('name', true);
				$part['fb_id'] = $this->input->get_post('fb_id', true);
				$part['fb_pic_url'] = $this->input->get_post('picture_url', true);
				$part['address'] = $this->input->get_post('address', true);
				$part['email'] = $this->input->get_post('email', true);
				$part['phone_number'] = $this->input->get_post('phone', true);
				$part['twitter'] = $this->input->get_post('twitter', true);
				$this->load->model('user_model');
				$user_id = $this->user_model->reg_participant($part);

				$this->config->set_item('user_id', $user_id);

				$user_id  = $this->session->set_userdata('user_id', $this->user_model->encode($user_id));

				redirect(base_url('upload'));
				
			}
			
		} else {

			// Set fb data
			$data['user_fb'] = $user_fb_data;
				
			// Set site title page with module menu
			$data['page_title'] = 'Daftar';

			// Set default template
			$data['main']	 = 'register';

			// Set site template	
			$this->load->view('template/public/site_template', $this->load->vars($data));
		}		
		
		// Logic Register via Ajax Request
		if ($this->input->is_ajax_request()) {
			
			$result['fields'] = $fields;
			$result['errors'] = $errors;
			
			echo json_encode($result,2);
			
			exit;
		}

	}
	
	// Gallery
	public function gallery() {
        $this->load->library('pagination');

        $order = array('key' => 'image_created_date', 'value' => 'DESC');
        $sort = $this->input->get('sort', true);
        $data['sort'] = '';
        if ($sort) {
            if ($sort == 'zota') {
                $order = array('key' => 'name', 'value' => 'DESC');
            } else if ($sort == 'atoz') {
                $order = array('key' => 'name', 'value' => 'ASC');
            } else if ($sort == 'vote') {
                $order = array('key' => '(select count(1) from liner_vote V where '
                    . ' V.image_id = liner_image.image_id)', 'value' => 'DESC');
            }
            $data['sort'] = $sort;
        }

        $search = $this->input->get('search', true);
        $data['search'] = '';
        if ($search != '') {
            $sort .='&search=' . $search;
            $data['search'] = $search;
        }
        $data['data'] = $this->input->get('data', true);

        $config['base_url'] = base_url() . 'home/gallery';
        //$config['total_rows'] = $this->user_model->count_gallery($search);
        $config['per_page'] = 6;
        $config['cur_tag_open'] = '<a href="#" class="active_paging">';
        $config['cur_tag_close'] = '</a>';
        $this->pagination->initialize($config);

        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data["galleries"] = $this->user_model->get_gallery('', $page, $order, $search);
        $links = $this->pagination->create_links($sort);
        $data['links'] = $links; //str_replace("&nbsp;", '', $links);
		        
		// Set main template
		$data['main'] = 'gallery';
				
		// Set site title page with module menu
		$data['page_title'] = 'Galeri';
		
		// Load admin template
		$this->load->view('template/public/site_template', $this->load->vars($data));
    }
}

/* End of file home.php */
/* Location: ./application/controllers/home.php */