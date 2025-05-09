<?php
function append_sad_message($message, $status) {
    $sad_message = pet_passed($status);  
    return $sad_message ? $message . " " . $sad_message : $message;
}

function pet_passed($status) {
    $CI =& get_instance(); // CodeIgniter-Instanz holen
    //get_instance() stellt sicher, dass du auf die Hauptinstanz von CodeIgniter zugreifst./

    if ($status['hunger'] == 100 && $status['happy'] == 0 && $status['energy'] == 0) {
        //return 'ichiban sad'; // Später durch $CI->lang->line('msg_pet_passed') ersetzbar
        return $CI->lang->line('msg_pet_passed');
    }
    return null; // Falls nicht sad, gibt nichts zurück
}