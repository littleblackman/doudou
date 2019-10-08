<h4 style="text-align: center"><?= $calendar->getObjectDate()->format('F');?></h4>

<?php foreach($calendar->getWeekValues() as $day):?>

<div class="<?= $day['class'];?>">
  <h6><?= $day['day'].'<br/>'.$day['d_name'];?></h6>
  <?php foreach($calendar->getTimeSlots() as $timeSlot):?>
      <div class="timeSlot" id="<?= $day['date'].'|'.$timeSlot.'|'.$planning->getId();?>">
        <?= $timeSlot;?>
      </div>
  <?php endforeach;?>
</div>

<?php endforeach;?>

<br style="clear: both"/>
<br/><br/><br/>

<pre>



<script>
  $('.timeSlot').click(function() {
      let data = $(this).attr('id');
      console.log(data);
  })

</script>
