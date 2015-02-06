<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class upload extends CI_Controller {

	public function __construct() {
		parent::__construct();
		
		// Load facebook and headers
		$this->load->library('facebook');
        $this->load->model('user_model');		
        $this->load->model('gallery_model');		
		
	}
	
	public function index() {
		
		// Set main template
		$data['main'] = 'upload';
				
		// Set site title page with module menu
		$data['page_title'] = 'Upload Selfie';
		
		// Load admin template
		$this->load->view('template/public/site_template', $this->load->vars($data));
		
	}
	
	public function selfie() {

		$get_data 	 = $this->session->userdata('user_id');
		
        if (!$get_data) {
            redirect(base_url('home/registration'));
        } else {

			$facebook = new Facebook();        
			$fb_id = $facebook->getUser();

			$config = array(
				array('field' => 'image_name', 
	                  'label' => 'File', 
	                  'rules' => 'trim|required|xss_clean|max_length[25]'));
			
			// Set rules to form validation
			$this->form_validation->set_rules($config);
			
			// Run validation for checking
			if ($this->form_validation->run() === FALSE) {

				$part_id	 = $this->user_model->decode($get_data);
				$participant = $this->user_model->get_participant($part_id);

				$image['file_name'] = $this->input->post('image_temp');
				$image['part_id']	= $part_id;
				$image['name']		= $participant->name;				
				$image['status']	= 1;
				$image['added']		= time();

				$image_id 			= $this->gallery_model->insert_image($image);

				if ($image_id) redirect(base_url() . 'participant?data=' . base64_encode($image_id));

			} else {

			}
		}
								
	}

	public function image() {
		
				
		// Check if the request via AJAX
		if (!$this->input->is_ajax_request()) {
			exit('No direct script access allowed');		
		}	
		
		//print_r($_FILES);
		
		// Define initialize result
		$result['result'] = '';
		
			// Set validation config
			$config = array(
				array('field' => 'image_name', 
                      'label' => 'File', 
                      'rules' => 'trim|required|xss_clean|max_length[25]'));

			// Set rules to form validation
			$this->form_validation->set_rules($config);
			
			// Run validation for checking
			if ($this->form_validation->run() === FALSE) {
								
					if($_FILES) {					
		
						usleep(2000000);
						
						$file_hash	= md5(time() + rand(100, 999));
						$file_data	= pathinfo($_FILES['fileupload']['name']);
											
						$file_element_name = 'fileupload';
						
						$config['upload_path'] = './uploads/gallery/';
						$config['allowed_types'] = 'gif|jpg|png|doc|txt';
						$config['max_size'] = 1024 * 8;
						$config['encrypt_name'] = FALSE;

						$this->load->library('upload', $config);
						
						if (!$this->upload->do_upload($file_element_name))
						{
						  $status = 'error!';
						  $msg = $this->upload->display_errors('', '');
						}
						else
						{
							
							$data = $this->upload->data();
							$image_path = $data['full_path'];
							
							if(file_exists($image_path))
							{
								$status = "success";
								$msg = "File successfully uploaded";
							}
							else
							{
							 $status = "error";
							 $msg = "Something went wrong when saving the file, please try again.";
							}
						}
												
						$file_name	= self::_upload_to($_FILES['fileupload'], $file_hash.'.'.$file_data['extension'], './uploads/gallery/', 0777);
											
						$config['source_image']	= $file_name;
						$config['create_thumb'] = TRUE;
						$config['maintain_ratio'] = TRUE;
						$config['width']	= 264;
						$config['height']	= 220;

						$this->load->library('image_lib', $config); 

						$this->image_lib->resize();
						
						

						$file_data	= pathinfo($file_name);
						$file_mime	= $_FILES['fileupload']['type'];
															
						
						$thumb = $file_data['filename'].'_thumb.'.$file_data['extension'];
						$result['files'][] = array(
												'name'	=>$file_data['basename'],
												'size'	=>$_FILES['fileupload']['size'],
												'type'	=>$_FILES['fileupload']['type'],
												'url'	=> 'uploads/gallery/'. $file_data['basename'],
												//'file_id'		=> $file_id,
												'thumbnailUrl'	=>'uploads/gallery/'. $thumb,
												//'deleteUrl'		=>URL::site(ADMIN).'/news/filedelete/'.$file_id,
												'deleteType'	=>'DELETE'
												);						
					}																
				
			} else {
				
				// Unset captcha post
				unset($_POST['captcha']); 				
					
				// Send message if account not found					
				$result['result']['code'] = 0;
				$result['result']['text'] = 'Image not Found';
			}

		// Return data esult
		$data['json'] = $result;
		
		// Load data into view		
		$this->load->view('json', $this->load->vars($data));	
		
	}
	
	// Check if upload dir exists or create one and upload file if true and return file name
	public static function _upload_to ($file, $name, $upload_path='', $file_perm = '') {
		if (!empty($upload_path)) {
			
			if ( ! is_dir($upload_path) OR ! is_writable(realpath($upload_path))) {	
				mkdir($upload_path);
			}

			// Make the filename into a complete path			
			$filename = realpath($upload_path).DIRECTORY_SEPARATOR.$file['name'];
			
			if (move_uploaded_file($file['tmp_name'], $filename))
			{
				if ($file_perm !== FALSE)
				{
					// Set permissions on filename
					chmod($filename, $file_perm);
				}

				// Return new file path
				return $filename;
			}
			
		} else {
			return false;
		}
		
	}
}

/* End of file upload.php */
/* Location: ./application/controllers/upload.php */