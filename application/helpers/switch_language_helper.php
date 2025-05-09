<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

function switch_language($language) {
    if(empty($language)) {
        $language = "english";
    }

    $CI = &get_instance(); // Zugriff auf die CodeIgniter-Instanz
    $CI->load->library('session');

    $available_languages = ['english', 'german'];

    if(in_array($language, $available_languages)) {
        $CI->session->set_userdata('site_lang', $language);
    }

    redirect($_SERVER['HTTP_REFERER']); // evtl http://localhost/Tamagochi/index.php
}