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
		$this->load->model('setting/Settings');
	
	} 

    public function index() {    
        
       // Set page title 
        $data['page_title'] = 'Home';

        // Set main template
		$data['main'] = 'home';

        // Load admin template
		$this->load->view('template/public/site_template', $this->load->vars($data));
		
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

		$data = $this->input->get('data');

        if ($data) {
            $user_id = $this->user_model->decode($data);
            if ($user_id) {
                redirect(fb_url('gallery'));
                die();
            }
        }

		$facebook = new Facebook();

        $fb_id = $facebook->getUser();
		
        $user_fb = $this->user_model->get_temp($fb_id);

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

		$this->form_validation->set_rules('name', 'Nama', 'trim|required|min_length[5]|max_length[24]|xss_clean');
		$this->form_validation->set_rules('address', 'Alamat','trim|required');
		$this->form_validation->set_rules('checkbox_data', 'Syarat dan Ketentuan','trim|required');		
		$this->form_validation->set_rules('checkbox_rules', 'Data adalah benar','trim|required');		
		$this->form_validation->set_rules('email', 'Email','trim|valid_email|required|min_length[5]|max_length[24]|xss_clean');
		$this->form_validation->set_rules('phone', 'No. Telp','trim|required|is_natural|xss_clean|max_length[25]');
		$this->form_validation->set_rules('twitter', 'Twitter','trim|xss_clean|max_length[55]');						
		
		// Check if post is requested
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {			

			// Validation form checks
			if ($this->form_validation->run() === FALSE)
			{

				// Set site title page with module menu
				$data['page_title'] = 'Daftar';
			
				$data['main']	 = 'register';

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

				// redirect(base_url('participant'));
				$this->config->set_item('user_id', $user_id);

				redirect(base_url() . 'participant?data=' . $this->user_model->encode($user_id));
				
			}
			
		} else {
			// Set site title page with module menu
			$data['page_title'] = 'Daftar';
			// Set default template
			$data['main']	 = 'register';

			$data['user_fb'] = $user_fb;
				
			$this->load->view('template/public/site_template', $this->load->vars($data));
		}		
		
		// Logic Register via Ajax Request
		if ($this->input->is_ajax_request()) {
			
			$result['fields'] = $fields;
			$result['errors'] = $errors;
			
			echo json_encode($result,2);
			
			exit;
		}

		//// Set main template
		//$data['main'] = 'register';
				
		// Set site title page with module menu
		//$data['page_title'] = 'Daftar';
		
		// Load admin template
		//$this->load->view('template/public/site_template', $this->load->vars($data));
	}
	
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
        $data["galleries"] = $this->user_model->
                get_gallery('', $page, $order, $search);
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

/* End of file user.php */
/* Location: ./application/controllers/user.php */