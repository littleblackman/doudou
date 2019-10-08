<?php ini_set('display_errors','on'); error_reporting(E_ALL);?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>doudou</title>

    <!-- jquery -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>

    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    
    <!--- Font family --->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700&display=swap" rel="stylesheet">

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    <link rel="stylesheet" href="<?= CSS;?>style.css"/>
</head>
<body>
  <header>
      <nav>
          <div id="nav-left">
            <a href="<?= HOST;?>">Home</a>
            <a href="<?= HOST;?>">Planning</a>
          </div>
          <div id="nav-right">
            Hello <b><?= $session->getUser()->getFirstname();?></b>
          </div>

      </nav>
  </header>

  <div id="mainContent">
      <?php echo $contentPage ;?>
  </div>

</body>
</html>
