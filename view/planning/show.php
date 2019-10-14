<?php use_helper('date');?>
<section style="position: relative">

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
                      <span id="li-info-<?= $timeSlot->getId();?>">
                          <?= $timeSlot->getDateAvailable()->format('d/m/Y');?>
                          - de <?= $timeSlot->getTimeStart()->format('H:i');?>
                           à <?= $timeSlot->getTimeEnd()->format('H:i');?>
                      </span>
                       &nbsp;
                       <span id="details-<?= $timeSlot->getId();?>">
                           <?php if($timeSlot->getPersons()):?>
                                <span id="detailsName-<?= $timeSlot->getId();?>">
                                    <?php foreach($timeSlot->getPersons() as $person):?>
                                          <?php echo $person->getFullname().' - '.$person->getEmail();?>
                                    <?php endforeach;?>
                                </span>
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

<!-- Modal show -->
<div id="modal2" class="modal" style="top: 0; position: absolute; display: none; margin-top: 30%; background-color: white">
  <div class="modal-content">
          <h4 style="text-align: center">Suppression de rendez-vous<br/></h4>
          <div class="row">
                <p>
                  Vous allez supprimer le rendez-vous de : <br/><span id="deleteName"></span>
                  <br/>
                  <span id="deleteDate"></span>
                </p>
                <p>
                  Voulez-vous continuer ?
                </p>
          </div>
  </div>

  <input type="hidden" id="deleteIdTimeSlot"/>
  <input type="hidden" id="deletePersonId"/>

  <div class="modal-footer">
    <button class="btn waves-effect red darken-3 closeModalButton2">ANNULER</button>
    <button class="btn waves-effect waves-light closeModalButton2" id="deleteBooking">SUPPRIMER</button>
  </div>
</div>



<script src="<?= JS?>show.js"></script>
