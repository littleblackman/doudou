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
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700|Satisfy&display=swap" rel="stylesheet">

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    <link rel="stylesheet" href="<?= CSS;?>style.css"/>

    <script>
      var HOST = "<?= HOST;?>";
    </script>
</head>
<body>
  <header>
      <nav>
          <div id="nav-left">

          </div>
          <div>
                <a href="<?= HOST;?>home" alt="doudou home">
                  <img src="<?= IMG;?>logo-100x100.png" alt="doudou logo" width="50%"/>
                </a>
          </div>
          <div id="nav-right">
            <a href="<?= HOST;?>login">Connexion</a>
          </div>

      </nav>
  </header>

  <div id="mainContent">
      <?php echo $contentPage ;?>
  </div>

</body>
</html>
