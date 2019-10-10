<span class="navCalendar" id="nav.<?= $calendar->getLessNday(7);?>" style="cursor: pointer">
  <i class="material-icons">navigate_before</i>
</span>
<span class="navCalendar" id="nav.<?= $calendar->getPlusNday(7);?>" style="cursor: pointer">
  <i class="material-icons">navigate_next</i>
</span>

<div style="position: relative">
  <h4 style="text-align: center;"><?= $calendar->getObjectDate()->format('F');?></h4>

  <?php foreach($calendar->getWeekValues() as $day):?>
  <div class="<?= $day['class'];?>">
    <h6><?= $day['day'].'<br/>'.$day['d_name'];?></h6>
    <?php foreach($calendar->getTimeSlots() as $timeSlot):?>
        <?php $keyDate = str_replace('-', '', $day['date']); $el = explode(':', $timeSlot); $keyHour = $el[0];?>
        <?php (key_exists($keyDate.$keyHour, $selecteds)) ? $class = "selected" : $class = "";?>
        <?php if($class == "" && $mode == "calendarShow.js") $class = "noSelectable";?>
        <?php if($class == "selected" && $selecteds[$keyDate.$keyHour]->getIsBooked() == 1) $class="booked";?>
        <div class="timeSlot <?= $class;?>" id="<?= $day['date'].'.'.$timeSlot.'.'.$planning->getId();?>">
          <input
                  <?php if($class == "selected"):?>
                      value = "<?= $selecteds[$keyDate.$keyHour]->getId();?>"
                      data-dateavailable = "<?= $day['day_name'].' '.$selecteds[$keyDate.$keyHour]->getDateAvailable()->format('d M');?>"
                      data-timestart = "<?= $selecteds[$keyDate.$keyHour]->getTimeStart()->format('H:i');?>"
                      data-timeend = "<?= $selecteds[$keyDate.$keyHour]->getTimeEnd()->format('H:i');?>"
                  <?php endif;?>
                  type="hidden"
                  name="<?= $day['date'].'.'.$timeSlot.'.'.$planning->getId();?>.timeSlotId"
                  id="<?= $day['date'].'.'.$timeSlot.'.'.$planning->getId();?>.timeSlotId"/>
          <?= $timeSlot;?>
        </div>
    <?php endforeach;?>
  </div>
  <?php endforeach;?>

  <br style="clear: both"/>
  <br/><br/><br/><br/><br/><br/>

  <!-- Modal edit -->
  <div id="modal1" class="modal" style="top: 0; position: absolute">
    <div class="modal-content">
      <h4>Ouvrir une plage horaire</h4>
      <input type="date" name="timeSlot[date_available]" id="time_slot_date_available"/>
      <input type="time" name="timeSlot[time_start]" id="time_slot_time_start"/>
      <input type="time" name="timeSlot[time_end]" id="time_slot_time_end"/>

    </div>
    <div class="modal-footer">
      <button class="btn waves-effect red darken-3 closeModalButton" id="">ANNULER</button>
      <button class="btn waves-effect waves-light closeModalButton" id="submitTimeSlot">VALIDER</button>
    </div>
  </div>

  <!-- Modal show -->
  <div id="modal2" class="modal" style="top: 0; position: absolute">
    <div class="modal-content">
      <h4 style="text-align: center">Réserver une plage horaire<br/><span id="modal2-informations"></span></h4>
      <div class="row">
        <div class="input-field col s6">
          <input id="bookingFirstname" type="text" name="data[firstname]" class="validate">
          <label for="bookingFirstname">Prénom</label>
        </div>
        <div class="input-field col s6">
          <input id="bookingLastname" type="text" name="data[lastname]" class="validate">
          <label for="bookingLastname">Nom</label>
        </div>
        <div class="input-field col s12">
          <input id="bookingEmail" type="email"  name="data[email]" class="validate">
          <label for="bookingEmail">email</label>
        </div>
      </div>

      <input type="hidden" id="bookingTimeSlot"/>

    </div>
    <div class="modal-footer">
      <button class="btn waves-effect red darken-3 closeModalButton2">ANNULER</button>
      <button class="btn waves-effect waves-light closeModalButton2" id="submitBooking">RESERVER</button>
    </div>
  </div>



</div>








<input type="hidden" id="idPlanningJs" value="<?= $planning->getId();?>"/>
<script src="<?= JS.$mode;?>"></script>
