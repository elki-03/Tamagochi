<?php
class Pet_model extends CI_Model {


    //Constructor
    public function __construct() {
        parent::__construct();
        // Sicherstellen, dass die Datenbank geladen wird
        $this->load->database();
    }


    public function get_pet($pet_id) {
        $this->db->where('id', $pet_id);
        $pet = $this->db->get('pet')->row_array();

        if (!$pet) return null;

       
       //ersetzt durch helper
        // // Aktuelle Zeit holen
        // $now = new DateTime();
        
        // $last_update = new DateTime($pet['last_update']);

        // // Zeitdifferenz berechnen (in Minuten)
        // $interval = $last_update->diff($now);
        // $minutes_passed = ($interval->days * 24 * 60) + ($interval->h * 60) + $interval->i;

        // // Werte aktualisieren
        // if ($minutes_passed > 0) {
        //     $pet['hunger'] = min(100, $pet['hunger'] + floor($minutes_passed / 3)*10); // Hunger steigt alle 3 Min um 10
        //     $pet['happy'] = max(0, $pet['happy'] - floor($minutes_passed / 3)*10); // Glück sinkt alle 3 Min um 10
        //     $pet['energy'] = max(0, $pet['energy'] - floor($minutes_passed / 3)*10); //

        //helper
        // $this->load->helper('update_petstatus_time_helper');
        // $pet = update_petstatus_time($pet);

        $this->load->helper('update_petstatus_time');

        // Die Helper-Funktion gibt jetzt ein Array zurück
        $result = update_petstatus_time($pet);
        $pet = $result['pet'];
        $now = $result['now']; // Jetzt existiert $now hier wieder
        
            
        // Neue Werte speichern
            $this->db->where('id', $pet_id);
            $this->db->update('pet', [
                'hunger' => $pet['hunger'],
                'happy' => $pet['happy'],
                'energy' => $pet['energy'],
                'last_update' => $now->format('Y-m-d H:i:s')
            ]);
        //   }

        return $pet;
    }
}