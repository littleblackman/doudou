<h1><?= $planning->getName();?></h1>

<?= $planning->getDescription();?>

<h2>Sélectionnez une plage horaire</h2>

<br/><br/>

<div id="calendarTimeSlot">
  <?php include(VIEW.'planning/_calendar.php');?>
</div>
