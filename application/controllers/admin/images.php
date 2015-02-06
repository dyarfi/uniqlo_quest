<?php


if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Images extends CI_Controller {

    public function images() {
        parent::__construct();
        if (!$this->session->userdata('who')) {
            redirect(base_url() . 'admin/');
            die();
        }
        $this->load->library('grocery_CRUD');
        $this->load->model('gallery_model');
    }

    public function index() {
        try {
            $crud = new grocery_CRUD();
            $crud->set_table('tbl_user_images');
            $crud->set_subject('Images');                                
            $crud->columns('name', 'file_name', 'count','status');			
            $crud->field_type('status','dropdown',array('1' => 'Enable', '0' => 'Disable'));                    
            $crud->set_field_upload('file_name','uploads/gallery');

            $this->load($crud, 'images');
        } catch (Exception $e) {
            show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
        }
    }

    public function _callback_total_image($value, $row) {
        $total = $this->user_model->total_image_submitted($row->participant_id);
        return $total;
    }
    private function load($crud, $nav) {
        $output = $crud->render();
        $output->nav = $nav;
        if ($crud->getState() == 'list')
            $this->load->view('admin/metronix.php', $output);
        else
            $this->load->view('admin/popup.php', $output);
    }
}
?>
