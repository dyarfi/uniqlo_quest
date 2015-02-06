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
		
		// Set default result
		$result		= '';

		// Set participant id from session
		$part_id 	= $this->user_model->decode($this->session->userdata('user_id'));      

		// Set participant id from session
		$image_id 	= base64_decode($this->input->post('image'));
		
		// Set scores with image id and participant id		
		if (!empty($part_id)) {
			$result = @$this->gallery_model->insert_score($part_id, $image_id);
		}
		
		// Return data esult
		$data['json'] = $result;
		
		// Load data into view		
		$this->load->view('json', $this->load->vars($data));	
		
	}

}

/* End of file scores.php */
/* Location: ./application/controllers/scores.php */