<?php
function append_happy_message($message, $status) {
    $happy_message = pet_as_happy_as_can_be($status);  
    return $happy_message ? $message . " " . $happy_message : $message;
}

function pet_as_happy_as_can_be($status) {
    $CI =& get_instance(); // CodeIgniter-Instanz holen
    //get_instance() stellt sicher, dass du auf die Hauptinstanz von CodeIgniter zugreifst.


    if ($status['hunger'] == 0 && $status['happy'] == 100 && $status['energy'] == 100) {
        //return 'ichiban happy'; // Später durch $CI->lang->line('msg_happyascanbe') ersetzbar
        return $CI->lang->line('msg_happyascanbe');
    }
    return null; // Falls nicht happy, gibt nichts zurück
}


// if (!function_exists('append_happy_message')) {
//     function append_happy_message($message, $status) {
//         $happy_message = pet_as_happy_as_can_be($status);  
//         return $happy_message ? $message . " " . $happy_message : $message;
//     }
// }

// if (!function_exists('pet_as_happy_as_can_be')) {
//     function pet_as_happy_as_can_be($status) {
//         if ($status['hunger'] == 0 && $status['happy'] == 100 && $status['energy'] == 100) {
//             return 'ichiban happy'; // Später durch $CI->lang->line('msg_happyascanbe') ersetzbar
//         }
//         return null; // Falls nicht happy, gibt nichts zurück
//     }
// }

