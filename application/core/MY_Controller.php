<?php
class MY_Controller extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->library('session');
        $this->load->helper('language');

        $site_lang = $this->session->userdata('site_lang');
         if($site_lang) {
        $this->lang->load('language_switch', $site_lang);
        } else {
            $this->lang->load('language_switch', 'english');
        }
    }
}