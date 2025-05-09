<?php
//wir noch nicht gebrauht, erst wenn meherere Pets von einem user verwendet werden (neues Projekt?)
// Wann lohnt sich Core?

//     Wenn Pet z. B. eine Basisklasse für verschiedene Haustier-Arten wäre (Cat, Dog etc.).

//     Wenn du mehrere Modelle hast, die eine gemeinsame Basis brauchen.

// Du kannst die Pet-Klasse nun problemlos ohne die Übergabe einer ID im Konstruktor verwenden. Falls du später mehrere Haustiere verwalten möchtest, kannst du die ID bei der Instanziierung übergeben.

// Die Logik zur Interaktion mit der Datenbank (z.B. feed(), play(), sleep()) bleibt unverändert.

// Du hast Flexibilität, sowohl mit einer festen ID zu arbeiten als auch später bei Bedarf mehrere Haustiere zu unterstützen.


class Pet {
    private $id;
    private $hunger;
    private $happy;
    private $energy;
    private $ci; // Zugriff auf CodeIgniter-Instanz

    // Konstruktor: Lädt Haustier-Werte aus der DB
    // Konstruktor mit optionalem Parameter für die pet_id
    public function __construct($pet_id = 1) {  // Standardwert 1
        $this->ci =& get_instance(); // CodeIgniter Instanz holen

        // Laden der Datenbankbibliothek, falls sie nicht bereits geladen ist
        if (!$this->ci->load->is_loaded('database')) {
            $this->ci->load->database();
        }

        $this->id = $pet_id;

        // Haustier aus DB laden
        $this->ci->db->where('id', $pet_id);
        $pet = $this->ci->db->get('pet')->row_array();

        if ($pet) {
            $this->hunger = $pet['hunger'];
            $this->happy = $pet['happy'];
            $this->energy = $pet['energy'];
        } else {
            // Falls kein Haustier existiert, Standardwerte setzen
            $this->hunger = 50;
            $this->happy = 50;
            $this->energy = 50;
        }
    }

    // Status zurückgeben
    public function getStatus() {
        return [
            'hunger' => $this->hunger,
            'happy' => $this->happy,
            'energy' => $this->energy
        ];
    }

    // Methoden für Aktionen
    public function feed() {
        $this->hunger = max(0, $this->hunger - 10);
        $this->updateDB(['hunger' => $this->hunger, 'last_fed' => date('Y-m-d H:i:s')]);
    }

    public function play() {
        $this->happy = min(100, $this->happy + 10);
        $this->updateDB(['happy' => $this->happy, 'last_played' => date('Y-m-d H:i:s')]);
    }

    public function sleep() {
        $this->energy = min(100, $this->energy + 10);
        $this->updateDB(['energy' => $this->energy, 'last_slept' => date('Y-m-d H:i:s')]);
    }

    // Methode, um Daten in der DB zu speichern
    private function updateDB($data) {
        $this->ci->db->where('id', $this->id);
        $this->ci->db->update('pet', $data);
    }

    //Pet zurücksetzen (beim buttonklick auf view2)
    public function reset_pet() {

        $this->ci->db->where('id', $this->id=1);
    
        $data = [
            'hunger' => 50,
            'happy' => 50,
            'energy' => 50
        ];
        //$this->db->where('id', $id);
        $this->ci->db->update('pet', $data);
        //$this->db->update('pet', $data);
    }
}
