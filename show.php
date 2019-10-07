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

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    <link rel="stylesheet" href="style.css"/>
</head>
<body>
  <header>
      <nav>
          <a href="index.php">Home</a>
          <a href="#">Planning</a>
      </nav>
  </header>

  <div id="mainContent">

    <section>

      <?php
      try {
        $bdd = new PDO('mysql:host=localhost;dbname=doudou;charset=utf8', 'root', 'root');
      } catch(PDOException $e) {
        die($e->getMessage());
      }

      $query = "SELECT * FROM planning WHERE id = :id";
      $stmt = $bdd->prepare ($query);
      $stmt -> bindValue(':id', $_GET['id']);
      $stmt -> execute();

      $planning = $stmt->fetch(PDO::FETCH_ASSOC);
      ;?>

      <article>
        <h2><?php echo $planning['name'];?></h2>
        <p><?php echo $planning['description'];?></p>
        url publique : http://mysitesdoudou/booking.php?name=<?php echo $planning['public_link'];?>
        <button class"btn">
          <a href="http://mysitesdoudou/booking.php?name=<?php echo $planning['public_link'];?>" target="_blank">
            Suivre le lien
          </a>
        </button>
      </article>

      <h4>Liste des plages horaires dispo</h4>

      <?php
      try {
        $bdd = new PDO('mysql:host=localhost;dbname=doudou;charset=utf8', 'root', 'root');
      } catch(PDOException $e) {
        die($e->getMessage());
      }

      $query = "SELECT * FROM time_slot WHERE planning_id = :id";
      $stmt = $bdd->prepare ($query);
      $stmt -> bindValue(':id', $_GET['id']);
      $stmt -> execute();

      $timeSlots = $stmt->fetchAll(PDO::FETCH_ASSOC);

      echo '<ul>';
      foreach($timeSlots as $timeSlot) {
        echo '<li>Date: '.$timeSlot['date_available'].' - de '.$timeSlot['time_start'].' à '.$timeSlot['time_end'].'</li>';
      }
      echo '</ul>';
      ;?>

      <br/><br/>

      <button class"btn">
        <a href="http://mysitesdoudou/edit.php?id=<?php echo $planning['id'];?>" target="_blank">
          Modifier
        </a>
      </button>

      <button class"btn">
        <a href="http://mysitesdoudou/delete.php?id=<?php echo $planning['id'];?>" target="_blank">
          Supprimer
        </a>
      </button>

    </section>

  </div>

</body>
</html>
