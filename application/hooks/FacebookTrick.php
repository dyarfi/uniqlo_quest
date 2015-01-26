<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class FacebookTrick {

    function user_id() {
        $ci = & get_instance();
        if (isset($_GET['data'])) {
            $user_id = $_GET['data'];
            if (trim($user_id != '')) {
                $ci->load->model('user_model');
                $ci->config->set_item('user_id',$ci->user_model->decode($user_id));
                $ci->config->set_item('data',$ci->user_model->encode($ci->config->item('user_id')));
            }
        }else{
            $ci->config->set_item('user_id','0');
            $ci->config->set_item('data','');
        }
    }

}

?>