<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

define('THUMBNAIL_IMAGE_MAX_WIDTH', 200);
define('THUMBNAIL_IMAGE_MAX_HEIGHT', 200);

class Participant extends CI_Controller {

    public function Participant() {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->model('gallery_model');
    }

    public function index() {
        $get_data = $this->input->get('data');

        if (!$get_data) {
            redirect(base_url('home/registration'));
        } else {
            $user_id = $this->user_model->decode($get_data);
            if ($this->gallery_model->check_gallery($user_id)) {
                // Set main template
                $data['main'] = 'gallery';

                $this->load->library('pagination');
        
                
                $config['base_url'] = base_url('participant');
                $config['total_rows'] = count($this->gallery_model->get_all_images());
                $config['per_page'] = 3;
                $data['gallery'] = $this->gallery_model->get_all_images();

                $this->pagination->initialize($config); 
                
                $links = $this->pagination->create_links();

                $data['links'] = $links; 

                // Set all images display 
                $data['user_id'] = $user_id;
                $data['gallery'] = $this->gallery_model->check_gallery($user_id);
            } else {
                // Set main template
                $data['main'] = 'upload';

                $this->load->library('pagination');
                
                $config['base_url'] = base_url('participant');
                $config['total_rows'] = count($this->gallery_model->get_all_images());
                $config['per_page'] = 3;
                $data['gallery'] = $this->gallery_model->get_all_images();

                $this->pagination->initialize($config); 
                
                $links = $this->pagination->create_links();

                $data['links'] = $links; 

                // Set user images
                $gallery = $this->gallery_model->get_all_images();
                $data['gallery'] = $gallery;
            }
        }
					
		// Set site title page with module menu
		$data['page_title'] = 'Galeri';
		
		// Load admin template
		$this->load->view('template/public/site_template', $this->load->vars($data));
    }

    public function upload($id) {
        $data['images'] = $this->user_model->get_meta_data_frame($id);
        $this->load->view('include/header');
        $this->load->view('user_upload_' . $id, $data);
        $this->load->view('include/footer');
    }

    public function thanks($image_id) {
        $data['gallery'] = $this->user_model->get_image($image_id);
        $this->load->view('include/header');
        $this->load->view('thanks', $data);
        $this->load->view('include/footer');
    }

    public function single($sc_id) {
        $sc_id = $this->user_model->decode($sc_id);
        $data['gallery'] = $this->user_model->get_image($sc_id);
        $this->load->view('include/header');
        $this->load->view('single', $data);
        $this->load->view('include/footer');
    }

    public function submit_players() {
        $list_id = array();
        foreach ($_POST as $key => $value) {
            $list_id[] = $value;
        }
        $players = $this->player_model->get_players_by_list_id($list_id);
//        $players = array();
//        foreach ($temp_players as $player) {
//            $players[$player->position][] = $player;
//        }
        $data['players'] = $players;
        $this->load->view('include/header');
        $this->load->view('user_create_team', $data);
        $this->load->view('include/footer');
    }

    public function submit_image() {
        
        $team_name = $this->input->get_post('team_name', true);
        $team = array();

        $data = $this->input->get('data');
        $user_id = $this->user_model->decode($data);

        $team['team_name'] = $team_name;
        $team['part_id'] = $user_id;

        $team_id = $this->player_model->insert_team($team);

        $players = array();
        $i = 0;
        foreach ($_POST as $key => $value) {
            if ($key !== 'team_name') {
                $players[$i]['team_id'] = $team_id;
                $players[$i]['player_id'] = $this->input->get_post($key, true);
                $i++;
            }
        }
        $this->player_model->insert_players_team($players);

        //algoritma tiket 
        $total_tiket_today = $this->player_model->get_total_tiket_today();
        if ($total_tiket_today < 101) {
            $chances = mt_rand(0, 99);
            if ($chances < 100) {
                $generated_code = $this->player_model->generate_code();
                $tiket['tiket_code'] = $generated_code;
                $tiket['part_id'] = $user_id;
                $tiket_id = $this->player_model->insert_tiket($tiket);
                if ($tiket_id) {
                    $this->sent_email_to_user($tiket, $team_name);
                    $this->load->view('include/header');
                    $this->load->view('tiket_thanks');
                    $this->load->view('include/footer');
                } else {
                    $this->show_normal_thanks();
                }
            } else {
                $this->show_normal_thanks();
            }
        } else {
            $this->show_normal_thanks();
        }
    }
    
    private function sent_email_to_user($tiket, $team_name) {
        $user = $this->user_model->get_participant($tiket['part_id']);

        $email_config = Array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://gelatik.satudns.com',
            'smtp_port' => '465',
            'smtp_user' => 'no-reply-pcas@panasonicidapps.com',
            'smtp_pass' => 'hetTz^9zKvpq',
            'mailtype' => 'html',
            'starttls' => true,
            'newline' => "\r\n"
        );

        $this->load->library('email', $email_config);

        $this->email->from('no-reply-pcas@panasonicidapps.com', 'Panasonic-no-reply');
        $this->email->to($user->email);
        /* cc email
        $this->email->cc('eikzlfkr@gmail.com');
        $this->email->bcc('opikpun@gmail.com');
        */
        //$this->email->cc('tyas.fl@d3.dentsu.co.id');

        $this->email->cc('tyas.fl@d3.dentsu.co.id');
        $this->email->bcc('defrian.yarfi@gmail.com');

        $this->email->subject('Tiket Gratis Persija vs Gamba Osaka dari Panasonic');
        $this->email->message('Selamat '.$user->name.', anda mendapatkan tiket gratis untuk menonton Gamba Osaka vs Persija<br/>'
                . 'pada tanggal 24 Januari 2015 di GBK - Jakarta.<br/><br/>'
                . 'Silahkan tukar kode berikut untuk mendapatkan tiket gratis.<br/><br/>'
                . '<b>Nama Team: ' . $team_name . '</b><br/>'
                . '<b>Kode: ' . $tiket['tiket_code'] . '</b><br/><br/><br/>'
                . 'Selamat Menonton,<br/>'
                . 'Panasonic Indonesia<br/><br/>'
                . '<b>Tiket dari Panasonic ini tidak dikenakan biaya apapun.</b><br/>');

        $this->email->send();
    }

    private function show_normal_thanks() {
        $this->load->view('include/header');
        $this->load->view('normal_thanks');
        $this->load->view('include/footer');
    }

    public function vote($image_id) {
        $user_id = $this->config->item('user_id');
        $data = array();
        $message = 'You already vote';
        if ($user_id) {
            $image_id = $this->user_model->decode($image_id);
            if (!$this->user_model->check_vote($user_id, $image_id)) {
                $this->user_model->insert_vote($user_id, $image_id);
                $message = 'Thank you for your vote';
            }
            $this->session->set_flashdata('message', $message);
            redirect($_SERVER['HTTP_REFERER']);
        } else {
            redirect(base_url() . 'registration');
        }
    }

    public function unvote($image_id) {
        $user_id = $this->config->item('user_id');
        $data = array();
        $data['rcode'] = '01';
        if ($user_id) {
            $image_id = $this->user_model->decode($image_id);
            if ($this->user_model->check_vote($user_id, $image_id)) {
                $this->user_model->unvote($user_id, $image_id);
                $data['rcode'] = '00';
                $data['total_vote'] = $this->user_model->total_vote($image_id);
            }
        }
        echo json_encode($data);
    }

    public function team_statistic() {

    }

    public function check_name() {

        $this->load->model('player_model');

        $not_available =  $this->player_model->check_team_name($_POST['team_name']);

        $result['result'] = '';
        $result['text']   = '';

        if (!empty($not_available )) {
            $result['result']   = '1';
            $result['text']     = 'Maaf, nama ini sudah digunakan';
        } else {
            $result['result']   = '0';
            $result['text']     = '';           
        }
        echo json_encode($result);   
    }

}

?>
