<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

function update_petstatus_time($pet) {
    $now = new DateTime();
    $last_update = new DateTime($pet['last_update']);

    $interval = $last_update->diff($now);
    $minutes_passed = ($interval->days * 24 * 60) + ($interval->h * 60) + $interval->i;

    if ($minutes_passed > 0) {
        $pet['hunger'] = min(100, $pet['hunger'] + floor($minutes_passed / 1) * 10);//hunger steigt alle...minuten
        $pet['happy'] = max(0, $pet['happy'] - floor($minutes_passed / 1) * 10);
        $pet['energy'] = max(0, $pet['energy'] - floor($minutes_passed / 1) * 10);
    }

    //return $pet;
    return ['pet' => $pet, 'now' => $now]; // Rückgabe eines Arrays mit beiden Werten
}

// $now wird jetzt im Helper erzeugt und zurückgegeben, sodass es auch im Model verfügbar ist.
// Der Helper wird korrekt geladen (update_petstatus_time statt update_petstatus_time_helper).

// Die Logik ist wiederverwendbar (z. B. falls du Pet-Status auch an anderer Stelle aktualisieren willst).

// Pet_model wird übersichtlicher.