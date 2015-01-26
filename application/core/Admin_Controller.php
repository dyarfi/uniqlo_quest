<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

class Admin_Controller extends CI_Controller {
	
	protected $module_list = '';
	protected $module_function_list = '';
	
	protected $controller = '';
	protected $action = '';
	
	public $user = '';
	public $is_authorized = '';
		
	public function __construct() {
		parent::__construct();				
		// With that done, load settings
		//$this->load->library(array('session'));
		// Load Administrator Helper
		//$this->load->library('Acl');
		$this->load->helper('Acl');
		
		//session_destroy();
		//print_r($this->session->userdata);
		//exit;
		
		// Load Admin config
		$this->configs				= $this->load->config('admin/admin',true);																	
		// Set user data lists from login session		
		$this->user					= Acl::user();
															
		// Load user module and function lists
		$this->module_list			= json_decode($this->session->userdata('module_list'),TRUE);
		$this->module_function_list	= json_decode($this->session->userdata('module_function_list'),TRUE);		
		
		$this->module				= @$this->uri->segments[1];
		$this->controller			= @$this->uri->segments[2];
		$this->action				= @$this->uri->segments[3];
		$this->param				= @$this->uri->segments[4];											
								
		$this->module_request		= $this->controller . '/' .$this->action;	
		$this->module_menu			= self::check_module_menu($this->module_request);
		
		
		// Check if user data is true empty and redirect to authenticate
		if (!$this->user 
				&& strpos($this->uri->uri_string(), ADMIN) === 0 
					&& $this->uri->segment(2) !== 'authenticate') {
			
			// Redirect to authentication if direct access to all classes
			redirect(ADMIN.'authenticate/logout');
		}
		
		// Check user access list
		self::check_module_permission($this->controller, $this->action, $this->param);
	
	}

	public function check_module_permission ($controller='',$action='', $param='') {
		
		$accessible				= FALSE;
		
		$module_list 			= $this->module_list;

		$module_function_list 	= $this->module_function_list;				
		
		// Check again for necessaries variables
		if ($module_list && $module_function_list && strstr($this->uri->uri_string, ADMIN) !='') {
			
			$url_to_match = '';
			
			if ($controller != '' && $action != '') $url_to_match = $controller .'/'. $action;	

			$function_modules 	= array_merge_recursive($module_list,$module_function_list);
									
			// Define all accessible function action into TRUE
			foreach ($function_modules as $modules) {
												
				if (!empty($modules[$url_to_match])) {
					
					$accessible = TRUE;					

				}
			}	
			
			// Define controller or post that don't have to be checked
			if ($accessible === FALSE 
					// For Bypassing admin-panel reload_captcha method in all classes
					&& $action != 'reload_captcha'					
					// For Bypassing admin-panel forgot_password method in all classes
					&& $action != 'forgot_password'
					// For Bypassing admin-panel ajax method in all classes
					&& $action != 'ajax'
					// For Bypassing admin-panel ordering method in all classes
					&& $action != 'order'
					// For Bypassing admin-panel download method in all classes
					&& $action != 'download'
					// For Bypassing authentication controller in @admin-panel/authentication
					&& $controller != 'authenticate'
					// For Bypassing redirect in each @controller provides
					&& $controller != 'baseadmin') {
				
				if ($this->input->is_ajax_request()) {
					// Send permission message to client
					echo 'You do not have permission to '.$action;
					exit;
				}
				
				/* 
				 * Send permission message to client via session
				 * Set session 'acl_error' if action not accessible for users
				 */
				$this->session->set_flashdata('message', 'You do not have permission to '.$action.'');
				//redirect(ADMIN . $controller);
				redirect(ADMIN . 'dashboard/index');

			} 

		} 

	}
	
	/**
	* Checking and load the current controller module menu name
	*
	* @access	public
	* @param	array
	* @return	string
	*/
	public function check_module_menu ($module_menu = '') {
		
		if (empty($module_menu)) {
			return;
		}
						
		$menu_name = '';
		// Check if module list is available
		if (!empty($this->module_function_list)) {
			foreach ($this->module_function_list as $modules => $module) {
				$name = $modules;
				if (!empty($module[$module_menu])) {
					$menu_name = $module[$module_menu];
				}			
			}
		}
		
		return $menu_name;
		
	}		
	
	/**
	* Load the current page that can be authorized via controller access
	*
	* @access	public
	* @param	array
	* @return	array
	*/	
	public function is_authorized ($pages=array()) {
				
		if (!is_array($pages)) {
			return array();
		}	
		
		$this->is_authorized = $pages;
		
		return $pages;
	}
}