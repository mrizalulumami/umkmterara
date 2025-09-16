<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function is_login(){
    $ci = get_instance();
    if(!$ci->session->userdata('is_login') == TRUE){
        redirect('auth');
        
    }
}
function dia_login(){
    $ci = get_instance();
    if($ci->session->userdata('is_login') == TRUE){
        if($ci->session->userdata('level') == 'admin'){
            redirect('admin');
        }else if($ci->session->userdata('level') == 'masyarakat'){
            redirect('guest');
        }
        
    }
}
function destroy_session() {
    session_destroy();
    unset($_SESSION);
}
