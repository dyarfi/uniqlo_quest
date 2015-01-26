<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class scores extends CI_Controller {

	public function __construct() {
		parent::__construct();
		
		// Load facebook and headers
		$this->load->library('facebook');
        $this->load->model('user_model');		
        $this->load->model('gallery_model');		
		
	}
	
	public function index() {

		// Return if not ajax requested
		if (!$this->input->is_ajax_request()) {
            echo 'Not Allowed!';
            exit;
        }

		// Return data esult
		$data['json'] = $result;
		
		// Load data into view		
		$this->load->view('json', $this->load->vars($data));	
		
	}

}

/* End of file user.php */
/* Location: ./application/controllers/user.php */