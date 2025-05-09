<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

function lang_echo($line) {
    $ci =& get_instance();
    return $ci->lang->line($line);
}
