<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Tamagochi</title>
    <!-- JS: Pseudo-Cronjob für ein automatisches Update -->
    <!-- <script>
        function updatePetStatus() {
            fetch("<?php echo base_url('index.php/tamagochi/update_pets'); ?>")
                .then(response => response.json()) // Antwort als JSON verarbeiten
                .then(data => {
                    if (data.status) {
                        //Dynamisches HTML-Update: Statt einer kompletten Seitenaktualisierung werden die Werte direkt mit document.getElementById().innerText geändert.
                        document.getElementById("hunger").innerText = data.status.hunger ?? 'Nicht verfügbar';
                        document.getElementById("happy").innerText = data.status.happy ?? 'Nicht verfügbar';
                        document.getElementById("energy").innerText = data.status.energy ?? 'Nicht verfügbar';
                    }
                })
                .catch(error => console.error('Fehler beim Aktualisieren:', error));
        }

        // Starte das Update alle 5 Minuten (300000 Millisekunden)
        //setInterval(updatePetStatus, 300000);

        //Starte Update alle 20 Sekunden
        setInterval(updatePetStatus, 20000);

        // Initiale Aktualisierung beim Laden der Seite
        window.onload = updatePetStatus;
    </script> -->
<script>
    // Seite alle xy Sekunden neu laden
    setTimeout(() => {
        //location.reload();  // Seite neu laden
        window.location.href = "<?php echo base_url('index.php/tamagochi/index'); ?>";

    }, 5000);  // Zeitintervall: 20000 ms = 20 Sekunden
</script>
</head>
<body>
    <h1><?php echo lang_echo('title'); ?></h1>
<br>
<?php
//Feed/Play/Sleep-Message 
// if(isset($message)): 
if (!empty($message)): ?>
      <p><?php echo $message; ?></p>
<?php endif; ?>

<?php echo $ascii_art; ?> <!-- Dynamische ASCII-Art -->


<?php if (isset($status)): ?>
      <p><?php echo //$this->lang->line('status_hunger'); //wenn helper nicht lädt: autoload
      lang_echo('status_hunger'); ?>: <span id="hunger"><?php echo isset($status['hunger']) ? $status['hunger'] : 'Nicht verfügbar'; ?></span></p>
      <!-- id muss bei mehreren tamagochis/pets durch class ersetzt werden -->
      <p><?php echo lang_echo('status_happy'); ?>: <?php echo isset($status['happy']) ? $status['happy'] : 'Nicht verfügbar'; ?></p>
      <p><?php echo lang_echo('status_energy'); ?>: <span id="energy"><?php echo isset($status['energy']) ? $status['energy'] : 'Nicht verfügbar'; ?></span></p>
<?php endif; ?>


<form action="<?php echo base_url('index.php/tamagochi/feed_tama'); ?>" method="GET">
      <!-- get statt post, weil post macht in firefox nerfige nachrichten -->
        <button type="feed"><?php echo $this->lang->line('feed'); ?></button>
  </form>

  <form action="<?php echo base_url('index.php/tamagochi/play_with_tama'); ?>" method="GET">
        <!-- <input type="text" id="tamagochi" name="tamagochi" required> -->
        <button type="play"><?php echo $this->lang->line('play'); ?></button>
  </form>

  <form action="<?php echo base_url('index.php/tamagochi/let_tama_sleep'); ?>" method="GET">
        <button type="let_sleep"><?php echo $this->lang->line('let_sleep'); ?></button>
  </form>

  <form action="<?php echo base_url('index.php/tamagochi/index'); ?>" method="GET">
        <button type="update"><?php echo $this->lang->line('update'); ?></button>
  </form>
  <a href="<?= site_url('tamagochi/change_language/german'); ?>">Deutsch</a> | 
  <a href="<?= site_url('tamagochi/change_language/english'); ?>">English</a>

    
</body>
</html>