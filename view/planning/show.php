<?php use_helper('date');?>
<section>

  <div id="createPlanningButton">
    <a href="<?=HOST;?>creation-planning" class="btn-floating btn-large waves-effect waves-light red lighten-1" title="créer un planning"><i class="material-icons">add</i></a>
  </div>


  <div class="row">
     <div class="col s12 m12">
       <h2><?= $planning->getName()?></h2>
       <div class="card blue-grey darken-1">
         <div class="card-content white-text">
           <p>
             <h4>Description</h4>
             <?= $planning->getDescription();?>
             <hr/>
             <h4>Horaires associés</h4>
             <ul>
               <?php $title = "";?>
               <?php foreach($planning->getTimeSlots() as $timeSlot):?>
                    <?php if($title != $timeSlot->getDateAvailable()->format('N')):?>
                        <?php $title = $timeSlot->getDateAvailable()->format('N')?>
                        <h5 style="color: lightgrey; font-weight: bold"><?= getDayName($title) ;?></h5>
                    <?php endif;?>
                    <?php ($timeSlot->getIsBooked() == 1) ? $class = "booked" : $class = "";?>
                    <li class="<?= $class;?>" id="li-<?= $timeSlot->getId();?>">
                      <?= $timeSlot->getDateAvailable()->format('d/m/Y');?>
                      - de <?= $timeSlot->getTimeStart()->format('H:i');?>
                       à <?= $timeSlot->getTimeEnd()->format('H:i');?>
                       &nbsp;
                       <span id="details-<?= $timeSlot->getId();?>">
                           <?php if($timeSlot->getPersons()):?>
                                <?php foreach($timeSlot->getPersons() as $person):?>
                                      <?php echo $person->getFullname().' - '.$person->getEmail();?>
                                <?php endforeach;?>
                                <i class="material-icons clearBooking" id="<?= $timeSlot->getId().'-'.$person->getId();?>">clear</i>
                           <?php endif;?>
                      </span>
                     </li>
               <?php endforeach;?>
             </ul>
             <hr/>
             <h4>Lien publique</h4>
             <?= HOST;?>reservation-planning/<?= $planning->getPublicLink();?>
             <br/>
             <a  class="waves-effect waves-light btn"
                href="<?= HOST;?>reservation-planning/<?= $planning->getPublicLink();?>"
                target="_blank">
                <i class="material-icons left">cloud</i>
               Suivre le lien
             </a>
           </p>
         </div>
         <div class="card-action">
           <a href="<?= HOST;?>modification-planning/<?= $planning->getId()?>">
             Modifier
           </a>
           <a href="<?= HOST;?>delete-planning/<?= $planning->getId()?>">
             Supprimer
           </a>
         </div>
       </div>
     </div>
   </div>
</section>

<script>
  $('.clearBooking').click(function() {
    let datas = $(this).attr('id');
    let id_time_slot = datas.split('-')[0];
    let person_id    = datas.split('-')[1];
    let urlRemove = HOST+'removeBooking';

    $.ajax({
        url : urlRemove,
        type : 'POST',
        data : 'id_time_slot=' + id_time_slot + '&person_id=' + person_id,
        dataType : 'json',
        success : function(result, statut){
          let target = 'details-'+result.timeSlotId;
          let liId   = 'li-'+result.timeSlotId;
          let myLi   = document.getElementById(liId);
          let mySpan = document.getElementById(target);
          myLi.classList.remove("booked");
          mySpan.innerHTML = "";


       }
    });

  })
</script>
