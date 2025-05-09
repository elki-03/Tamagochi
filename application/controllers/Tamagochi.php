<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'core/Pet.php'; // Pet-Klasse aus dem Core-Ordner einbinden

class Tamagochi extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url'); // Lade den URL Helper
        $this->load->library('session'); // Falls die Session-Bibliothek nicht automatisch geladen wird
        $this->load->helper('language');
        $this->load->helper('switch_language');
        //$this->load->helper('happy');
        //$this->load->helper('pet_passed');

         // Hier wird das Modell geladen - pseudo cronjob
        $this->load->model('Pet_model');

        // Sprache aus der Session holen und laden
        $site_lang = $this->session->userdata('site_lang');
        if ($site_lang) {
            $this->lang->load('language_switch', $site_lang);
        } else {
            $this->lang->load('language_switch', 'english');
        }
    }

    public function index() {
        //set status for view
        // $pet = new Pet();
        // $status = $pet->getStatus();
    
        // $data = [
        // 'status' => $status
        // ];

        $this->load->model('Pet_model');
    
        // Laden des Pets mit ID 1 und automatischer Aktualisierung
        $pet_data = $this->Pet_model->get_pet(1);

        //askii relevante änderung
        $status = [
            'hunger' => $pet_data['hunger'],
            'happy' => $pet_data['happy'],
            'energy' => $pet_data['energy']
        ];
        // Aktion aus der URL oder aus der Session holen (je nach Implementierung)
        $current_action = $this->session->userdata('current_action') ?? '';
        $ascii_art = $this->get_ascii_art($status, $current_action); // ASCII Art generieren
        //askii relevante änderung ende

        //happymsg
        $message = ''; // Initialisierung, um die "Undefined Variable"-Warnung zu vermeiden
        $message = append_happy_message($message, $status);
        $message = append_sad_message($message, $status);

    
        $data = [
            'status' => [
                'hunger' => $pet_data['hunger'],
                'happy' => $pet_data['happy'],
                'energy' => $pet_data['energy']
            ],
            'ascii_art' => $ascii_art,  // neu für askii
            'message' => $message//fur happy+msg-sadmsg
        ];
    
        //check ob pet lebendig ansonsten neue view
        $this->check_pet_status($status);
        //lead view
        $this->load->view('tama_playground', $data);
        
    }

    public function check_pet_status($status) {
        if ($status['hunger'] == 100 && $status['happy'] == 0 && $status['energy'] == 0) {
            redirect('tamagochi/pet_dead'); // Weiterleitung zu pet_dead
        }
    }

    public function pet_dead() {
        //$this->load->view('tama_passedaway'); // View für das tote Pet anzeigen
        $this->load->helper('pet_passed_helper');
        $pet = new Pet(); // Keine ID notwendig, Standard-ID 1 wird verwendet

        $pet_data = $pet->getStatus();

        $status = [
            'hunger' => $pet_data['hunger'],
            'happy' => $pet_data['happy'],
            'energy' => $pet_data['energy']
        ];

        $message = ''; // Stelle sicher, dass die Variable existiert
        $message = append_sad_message($message, $status);

        $data['message'] = $message;

        $this->load->view('tama_passedaway', $data); //ohne tamagochi/ !!!

    }

    public function reset_pet() {
        $pet = new Pet(); // Keine ID notwendig, Standard-ID 1 wird verwendet
        $pet->reset_pet();
        //$this->Pet_model->reset_pet(); // Methode im Model zum Zurücksetzen
        redirect('tamagochi/index'); // Weiterleitung zur Index-View (tama_playground)
    }
    

    public function feed_tama() {
        $pet = new Pet(); // Keine ID notwendig, Standard-ID 1 wird verwendet
        $pet->feed();

        $status = $pet->getStatus();
        //$message = "Tama wurde gefüttert!";
        
        $message = $this->lang->line('msg_fed'); // $lang class :)

        //askiirelevante änderung
        $current_action = "feeding";
        $ascii_art = $this->get_ascii_art($status, $current_action); 
        //askiirelevante änderung ende
        

        // Nachricht und Status an die View übergeben
        $data = [
            'message' => $message,
            'status' => $status,
            //neu
            'ascii_art' => $ascii_art
        ];

        // Die View laden und die Daten übergeben
        $this->load->view('tama_playground', $data);
        //redirect?  ohne methode im browser

        //echo json_encode(["message" => "Dein Haustier wurde gefüttert!", "status" => $pet->getStatus()]);
    }

    public function play_with_tama() {
        $pet = new Pet(); // Keine ID notwendig, Standard-ID 1 wird verwendet
        $pet->play();

        $status = $pet->getStatus();
        $message = $this->lang->line('msg_played');

        //askiirelevante änderung
        $current_action = "playing";
        $ascii_art = $this->get_ascii_art($status, $current_action); 
        //askiirelevante änderung ende

        // Nachricht und Status an die View übergeben
        $data = [
            'message' => $message,
            'status' => $status,
            //neu
            'ascii_art' => $ascii_art
        ];

        // Die View laden und die Daten übergeben
        $this->load->view('tama_playground', $data);

        //echo json_encode(["message" => "Du hast mit deinem Haustier gespielt!", "status" => $pet->getStatus()]);
    }

    public function let_tama_sleep() {
        $pet = new Pet(); // Keine ID notwendig, Standard-ID 1 wird verwendet
        $pet->sleep();


        $status = $pet->getStatus();
        $message = $this->lang->line('msg_slept');

        //askiirelevante änderung
        $current_action = "sleeping";
        $ascii_art = $this->get_ascii_art($status, $current_action); 
        //askiirelevante änderung ende

        // Nachricht und Status an die View übergeben
        $data = [
            'message' => $message,
            'status' => $status,
            //neu
            'ascii_art' => $ascii_art
        ];

        // Die View laden und die Daten übergeben
        $this->load->view('tama_playground', $data);

        //echo json_encode(["message" => "Dein Haustier hat geschlafen!", "status" => $pet->getStatus()]);
    }

    public function change_language($language) {
        switch_language($language); // Helper-Funktion wird aufgerufen
        // redirect($_SERVER['HTTP_REFERER']); //besser im Helper (mehr ausgelagert)?
    }

    private function get_ascii_art($status, $current_action) {
        $this->load->helper('askii_art');
        return askii_art($status, $current_action);





//     $ascii_art = "<pre>
//     ⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⢀⣀⣤⣤⡶⠶⠶⠶⠶⠶⣦⣤⣀⡀⠀⣀⣀⣀⠀⠀⠀⠀⠀⠀⠀⠀⠀⢀⣀⣤⣤⣤⣤⣀⠀⠀⠀
// ⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⢀⣀⣀⣤⡾⠛⠋⠁⠀⠀⠀⠀⠀⠀⠀⠀⠈⠉⠛⢟⠛⠛⠛⠛⠻⠿⠦⠶⠶⠶⠾⠟⠛⠋⠉⠁⠀⠉⠙⢻⣦⠀
// ⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⣀⣤⡶⠟⠛⠉⠟⠁⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⢻⣇
// ⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⢀⣠⣴⠾⠋⠁⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⢀⢀⡀⠀⠀⠠⡀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⢸⡿
// ⠀⠀⠀⠀⣀⣀⣤⣤⣶⠶⠟⠛⠉⠀⠀⠀⠀⠀⣠⠂⠀⠀⢠⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⣿⣿⡄⠀⠀⠹⡄⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⢀⣿⠇
// ⠀⢀⣴⡾⠛⠉⠁⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⢀⡏⠀⠀⢰⣿⣧⠀⠀⠀⡤⠤⠀⠈⢉⡇⠀⠀⠀⠏⢉⡴⣖⡶⢶⣿⡿⢶⣦⣤⣄⣀⡀⠀⠀⠀⠀⠀⠀⣀⣤⡿⠃⠀
// ⠀⣸⡟⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⢀⣼⡇⢀⣀⣠⣛⠁⠀⠀⠀⠷⠴⠚⠒⠚⠁⠀⠀⠀⠀⠘⠹⠝⠚⣻⡿⠁⠀⠀⠈⠉⠙⠛⠛⠛⠟⠻⠟⠛⠛⠉⠀⠀⠀
// ⠀⠸⣷⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⣠⣴⣿⢛⣷⣯⢏⡷⡯⠇⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⣠⡴⠛⠉⣿⡛⠁⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀
// ⠀⠀⠙⢷⣄⣀⠀⠀⠀⠀⣀⣠⣴⣾⢟⣉⣀⣀⣙⢿⣶⣤⣤⣄⣀⣀⣠⣤⡤⠤⠤⠴⠶⠒⠛⠋⠋⠀⠀⢰⣿⠁⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀
// ⠀⠀⠀⠀⠉⠛⠛⠛⠿⠛⠛⠋⢁⣴⠿⠋⠉⠉⠛⢿⡟⠋⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⣿⡇⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀
// ⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⢀⣿⠃⠀⢀⡄⠀⠀⠹⣦⣤⣀⡾⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⢸⣧⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀
// ⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⢸⣿⠀⠀⢸⡀⠀⠀⢠⡿⠛⢻⠇⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⢸⣿⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀
// ⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠈⢿⡄⠀⠀⠙⠲⠖⠋⠀⠀⣼⡀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠠⠚⠉⣽⡧⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀
// ⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠈⠻⣶⣤⣀⣀⣀⣠⣴⣾⣿⠀⠀⣄⣀⡀⠀⠀⠀⠀⠀⣀⣀⣤⣤⡀⠀⣰⡿⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀
// ⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠉⠙⠛⠛⠉⠁⠀⠛⠛⠛⠛⠉⠛⠛⠛⠛⠛⠛⠛⠋⠉⠙⢿⠾⠟⠁⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀
//     </pre>"; // Standard-Neutral-Glücklich
    
//         // Priorisierte Aktions-Grafiken
//         if ($current_action == "feeding") {
//             return "<pre>(っˆڡˆς)</pre>"; // Essen
//         } elseif ($current_action == "playing") {
//             return "<pre>ヽ(⌒▽⌒)ﾉ</pre>"; // Spielend
//         } elseif ($current_action == "sleeping") {
//             return "<pre>(－_－) zzZ</pre>"; // Schlafend
//         }
    
//         // Zustandsbasierte Grafiken
//         if ($status['hunger'] == 100 && $status['happy'] == 0 && $status['energy'] == 0) {
//             $ascii_art = "😭"; // Sehr unglücklich
//         } elseif ($status['hunger'] > 50 && $status['happy'] < 50 && $status['energy'] < 50) {
//             $ascii_art = "☹️"; // Unglücklich
//         } elseif ($status['hunger'] == 0 && $status['happy'] == 100 && $status['energy'] == 100) {
//             $ascii_art = ":D :D :D"; // Sehr happy
//         }
    
       //return $askii_art;
    }

    public function update_pets() { //pseudo cronjob
        $status = $this->Pet_model->get_status(); // Hole aktuelle Werte
        header('Content-Type: application/json');
        echo json_encode(['status' => $status]);
    }

    
    
    // public function ichiban_happy() {
    //     $this->load->helper('happy');
    //     $message = append_happy_message($this->lang->line('msg_fed'), $status);
    //     return $message;
    // }
    // private function pet_as_happy_as_can_be($status){

    //     if ($status['hunger'] == 0 && $status['happy'] == 100 && $status['energy'] == 100) {

    //     $message = 'ichiban happy';
    //     //$this->lang->line('msg_happyascanbe');
    //     return $message;
    //     }
    // }

    // public function pets_passing(){
    //     //if ($status['hunger'] == 100 && $status['happy'] == 0 && $status['energy'] == 0)
    //     $this->load->helper('pet_passed');
    //     $message = append_sad_message($this->lang->line('msg_pet_passed'), $status);
    //     return $message;
    // }    
}