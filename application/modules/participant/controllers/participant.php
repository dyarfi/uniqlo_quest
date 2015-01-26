<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Setting extends Admin_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	
	public function __construct() {
		parent::__construct();
		
		// Load settings model
		$this->load->model('Settings');

	}
	
	public function index()
	{
		// Set default statuses
		$data['statuses'] = $this->configs['status'];
		
		// Set data rows
		$data['rows']	= $this->Settings->getAllSetting();
				
		// Set main template
		$data['main']		= 'setting_index';
		
		// Set module with URL request 
		$data['module_title'] = $this->module;
		
		// Set admin title page with module menu
		$data['page_title'] = $this->module_menu;
						
		// Set default statuses
		$data['statuses'] = $this->configs['status'];
									
		// Set default system
		$data['is_system'] = $this->configs['is_system'];
		
		// Load admin template
		$this->load->view('template/admin/admin_template', $this->load->vars($data));
	}
}

/* End of file welcome.php */
/* Location: ./application/setting/controllers/setting.php */