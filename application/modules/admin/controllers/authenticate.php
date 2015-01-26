<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

// Class for Users
class Authenticate extends Admin_Controller {

	public function __construct() {
		parent::__construct();
		
		//$this->load->library('session');
		
		// Load user, profile, groups and group permissions models
		$this->load->model('Users');
		$this->load->model('UserProfiles');
		$this->load->model('UserGroups');
		$this->load->model('UserGroupPermissions');
		
		// Load ModuleLists, ModelLists and ModulePermissions models
		$this->load->model('ModuleLists');
		$this->load->model('ModelLists');
		$this->load->model('ModulePermissions');
		
		// Load Configurations, UserHistories and Captcha
		$this->load->model('Configurations');		
		$this->load->model('UserHistories');	
		$this->load->model('Captcha');
								
	}

	public function login () {		

		// Redirect to dashboard if user already logged
		//if (ACL::user() != '') {
			//redirect(ADMIN.'dashboard/index');
		//}
		
		if($_SERVER['REQUEST_METHOD'] === 'POST'){
			
			$userObj = $_POST;
			
			$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[5]|max_length[24]|xss_clean');
			$this->form_validation->set_rules('password', 'Password','trim|required|min_length[5]|max_length[24]|xss_clean');

			if ($this->form_validation->run() == FALSE)
			{
				
			}
			else {
				
			}

			//Make sure login object was true
			if($userObj['username'] == '' OR $userObj['password'] == '') {
				//return false;
			}
			//Check if already logged in
			if($this->session->userdata('username') == $userObj['username']) {
				//User is already logged in.				
				//return false;
			}
			
			// Initialize install
			$this->Users->install();
			$this->UserGroups->install();
			$this->UserProfiles->install();
			$this->ModuleLists->install();
			$this->ModelLists->install();
			$this->Configurations->install();
			$this->ModulePermissions->install();
			$this->UserGroupPermissions->install();
			$this->UserHistories->install();
			$this->Captcha->install();				
				
			//Check User login info
			$user			= $this->Users->login($userObj);					
			
			if(!empty($user)) {
				
				// Check User Level from User ID given
				$user_group		= $this->UserGroups->getUserGroup($user->group_id);																												
				if (intval($user_group->full_backend_access) === 1) {
					$this->ModuleLists->module_check();
				}
				
				$module_list	= $this->ModuleLists->getModules($user->group_id);
				
				$function_list	= $this->UserGroupPermissions->getModuleFunction($user->group_id);
					
				$user_session->id = $user->id;
				$user_session->username = $user->username;
				$user_session->email = $user->email;
				$user_session->password = substr_replace($user->password, "********", 0, strlen($user->password));
				$user_session->group_id = $user->group_id;
				$user_session->status = $user->status;				
				$user_session->last_login = $user->last_login;				
				$user_session->logged_in = true;
				$user_session->name = $this->UserProfiles->getName($user->id);
					
				$ci_session = array(
					'module_list'			=> json_encode($module_list),
					'module_function_list'	=> json_encode($function_list),
					'user_session'			=> $user_session,
				);
				
				// Set Module List for All Access
				//$this->session->set_userdata('module_list', json_encode($module_list));

				// Set Module List Function for All Access
				//$this->session->set_userdata('module_function_list', json_encode($function_list));
																	
				
				//Set session data
				$this->session->set_userdata($ci_session);
				
				//print_r($this->session->userdata);
				//exit;
				//Set logged_in to true
				//$this->session->set_userdata(array('logged_in' => true));
				
				//Set logged_in to true
				//$this->session->set_userdata(array('user_id' => true));
				
				//Login was successful
				//return true;
				
				redirect(ADMIN.'dashboard/index');
				
			} else {
				//$userObj = 'Error Submission';
				$userObj = 'No user with that account';				
				//$this->session->set_flashdata('message', $userObj);
				$this->session->set_flashdata('flashdata', $userObj);				
				$this->session->set_flashdata("error", "Sorry, your username or password is incorrect!");
				//$this->form_validation->set_message('email', 'The %s field can not be the word "test"');
				//print_r($this->session->set_flashdata('Error', $userObj)); //exit();
				//return false;
				redirect(ADMIN.'authenticate/login');
			}
		}
		
		//$data['user']	= '';//ACL::user();
		$data['main']	= 'admin/login';
				
		$this->load->vars($data);
		//$data['main']	= $this->load->view('users/default_user', $data, true);		
		$this->load->view('template/admin/login_template',$data);
	}
	public function logout() {
		
		//Set user's last login 
		//$this->Users->setLastLogin(Acl::user()->id);		
		
        //Destroy user session		
		$this->session->unset_userdata('module_list');
		$this->session->unset_userdata('module_function_list');
		$this->session->unset_userdata('user_data');		
		$this->session->unset_userdata('user_session');
		
		$this->session->sess_destroy();
		
		//Redirect admin to refresh
		redirect(ADMIN);
    }
	
}