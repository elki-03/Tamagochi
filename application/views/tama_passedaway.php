<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Tamagochipassing</title>
</head>
<body>
    <h1><?php echo lang_echo('title'); ?></h1>
<br>

<p><?php echo $message; ?></p>


<pre>⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⡿⠿⠛⠛⠋⣉⣉⣉⣉⣙⠛⠛⠿⠿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿
⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⡿⠟⠉⣁⣠⠀⠀⣁⣤⣶⣾⣿⣿⣿⣿⣿⣿⣿⣿⣿⣶⣦⣄⡉⠛⠟⠛⠛⠻⠿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿
⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⠟⢁⣠⣶⣿⣿⣇⣴⣾⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣷⣤⡈⠿⣷⣦⣄⠙⢿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿
⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⠟⢁⣴⣿⣿⣿⡿⠻⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣷⣄⠘⢿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿
⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⡟⠁⣰⣿⣿⣿⣿⡟⢀⣼⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⡟⢿⣿⣿⣿⣷⣄⠙⠻⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿
⣿⣿⣿⣿⣿⣿⣿⣿⡿⠋⢠⣾⣿⣿⣿⣿⡿⢀⣾⣿⣿⠏⠉⠙⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⠟⠻⣿⣿⣿⣿⣿⡀⢿⣿⣿⣿⣿⣿⣦⣈⠛⠿⣿⣿⣿⣿⣿⣿⣿⣿⣿
⣿⣿⣿⣿⣿⣿⠿⠋⣠⣴⣿⣿⣿⣿⣿⣿⠃⣸⣿⣿⣯⠀⠀⢀⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⠋⠀⠀⢸⣿⣿⣿⣿⡇⠸⣿⣿⣿⣿⣿⣿⣿⣷⣦⣌⠙⠻⢿⣿⣿⣿⣿⣿
⣿⣿⣿⠿⠋⣁⣴⣾⣿⣿⣿⣿⣿⣿⣿⣿⡀⢸⣶⣾⣶⣷⣶⣿⣿⣿⣿⣿⣿⠟⡛⠿⣿⣿⣿⣿⣿⣶⣀⣀⣾⢿⣿⣿⣿⡇⠀⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣶⣄⡉⠻⣿⣿⣿
⣿⠟⢁⣴⣾⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣧⠈⠻⣛⣟⣯⡿⢿⣿⣿⣿⣿⣿⣴⣾⣶⣾⣿⣿⣿⣿⣿⣻⣿⣿⣿⡾⣿⣿⠃⡀⠙⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣦⠈⢻⣿
⡟⢀⣾⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⡟⢠⣄⡉⠛⠋⢁⣈⠙⢿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⡿⠋⠙⠛⣿⣣⠿⠋⣠⣷⡀⠹⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣦⠈⣿
⠀⣾⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⠟⢀⣾⣿⣿⠀⣼⣿⣿⡇⢠⣌⣉⣉⣉⡙⠉⠋⠉⠋⠉⠉⠀⣶⣿⣆⠈⠀⠀⠚⠻⢿⣿⡄⠙⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⡇⢸
⠀⢿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⡿⠋⣠⣾⣿⣿⣿⡀⠹⠟⢻⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣦⣌⣿⡿⠀⣠⣶⣶⣶⣤⠈⢻⣦⡈⠻⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⠃⣸
⣧⡈⠻⢿⣿⣿⣿⣿⣿⣿⡿⠟⠋⣠⣼⣿⣿⣿⣿⣿⣿⠃⣰⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣏⣉⣀⠈⢿⣿⣿⠿⣿⣷⠀⢻⣿⣦⡈⠻⢿⣿⣿⣿⣿⣿⣿⠿⠃⣰⣿
⣿⣿⣶⣤⣈⣉⣉⣉⣉⣁⣤⣴⣾⣿⣿⣿⣿⣿⣿⣿⠇⢠⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⡆⠘⠛⠋⣰⣿⣿⠂⢸⣿⣿⣿⣷⣤⣀⣉⣉⣉⣉⣀⣴⣾⣿⣿
⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⠀⢸⣿⠟⠛⠻⣿⣿⣿⣿⣿⣿⣿⠿⠿⢿⣿⣿⣿⣿⣿⠃⢸⣿⣿⣿⣿⠋⢠⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿
⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣆⠈⢁⣴⣿⣾⣿⣿⣿⣿⣿⡿⠁⣤⣶⣦⣬⣿⣿⡿⠋⣠⣤⣀⣁⣀⣤⣶⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿
⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣷⠈⣿⣿⣯⡉⠉⠉⠉⠉⠁⠀⢿⣿⣿⡉⢉⣤⣴⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿
⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣆⠘⠿⠟⢀⣾⣿⣿⣿⣿⡆⠸⢿⠟⢁⣼⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿
⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣷⣶⣾⣿⣿⣿⣿⣿⣿⣿⣦⣤⣶⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿</pre>


<?php if (isset($status)): ?>
      <p><?php echo //$this->lang->line('status_hunger'); //wenn helper nicht lädt: autoload
      lang_echo('status_hunger'); ?>: <span id="hunger"><?php echo isset($status['hunger']) ? $status['hunger'] : 'Nicht verfügbar'; ?></span></p>
      <!-- id muss bei mehreren tamagochis/pets durch class ersetzt werden -->
      <p><?php echo lang_echo('status_happy'); ?>: <?php echo isset($status['happy']) ? $status['happy'] : 'Nicht verfügbar'; ?></p>
      <p><?php echo lang_echo('status_energy'); ?>: <span id="energy"><?php echo isset($status['energy']) ? $status['energy'] : 'Nicht verfügbar'; ?></span></p>
<?php endif; ?>


  <form action="<?php echo base_url('index.php/tamagochi/reset_pet'); ?>" method="GET">
        <button type="submit"><?php echo lang_echo('new_pet'); ?></button>
  </form>
  <a href="<?= site_url('tamagochi/change_language/german'); ?>">Deutsch</a> | 
  <a href="<?= site_url('tamagochi/change_language/english'); ?>">English</a>

    
</body>