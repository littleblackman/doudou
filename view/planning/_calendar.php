<div style="position: relative">
  <h4 style="text-align: center;"><?= $calendar->getObjectDate()->format('F');?></h4>

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
  <br/><br/><br/><br/><br/><br/>

  <!-- Modal Structure -->
  <div id="modal1" class="modal" style="top: 0; position: absolute">
    <div class="modal-content">
      <h4>Réserver une plage horaire</h4>
      <input type="date" name="timeSlot[date_available]" id="time_slot_date_available"/>
      <input type="time" name="timeSlot[time_start]" id="time_slot_time_start"/>
      <input type="time" name="timeSlot[time_end]" id="time_slot_time_end"/>

    </div>
    <div class="modal-footer">
      <button class="btn waves-effect red darken-3 closeModalButton" id="">ANNULER</button>
      <button class="btn waves-effect waves-light closeModalButton" id="submitTimeSlot">VALIDER</button>
    </div>
  </div>
</div>
<script>

  var HOST = "<?= HOST;?>";
  var planning_id = "<?= $planning->getId();?>";

  console.log(HOST);
  $('.timeSlot').click(function() {
      let data = $(this).attr('id');
      let date_available = data.split('|')[0];
      let time_start = data.split('|')[1];
      let duration = '45';
      let time_end = time_start.split(':')[0]+':'+duration;

      $('#time_slot_time_start').val(time_start);
      $('#time_slot_time_end').val(time_end);
      $('#time_slot_date_available').val(date_available);
      $('#modal1').show();

  })

  $('.closeModalButton').click(function() {
    $('#modal1').hide();
  })

  $('#submitTimeSlot').click(function() {

    let urlAdd = HOST+'addTimeSlot';

    let time_start = $('#time_slot_time_start').val();
    let time_end = $('#time_slot_time_end').val();
    let date_available = $('#time_slot_date_available').val();

    $.ajax({
        url : urlAdd,
        type : 'POST',
        data : 'date_available=' + date_available + '&time_start=' + time_start + '&time_end=' + time_end + '&planning_id='+planning_id,
        dataType : 'html',
        success : function(code_html, statut){
            console.log(code_html);
       }
    });


  })

</script>
