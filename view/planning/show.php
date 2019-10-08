<section>

  <div id="createPlanningButton">
    <a href="<?=HOST;?>creation-planning" class="btn-floating btn-large waves-effect waves-light red lighten-1" title="créer un planning"><i class="material-icons">add</i></a>
  </div>


  <div class="row">
     <div class="col s12 m6">
       <h2><?= $planning->getName()?></h2>
       <div class="card blue-grey darken-1">
         <div class="card-content white-text">
           <p>
             <h4>Description</h4>
             <?= $planning->getDescription();?>
             <hr/>
             <h4>Horaires associés</h4>
             <ul>
               <?php foreach($planning->getTimeSlots() as $timeSlot):?>
                 <li>Date: <?= $timeSlot->getDateAvailable()->format('d/m/Y');?> - de <?= $timeSlot->getTimeStart()->format('H:i');?> à <?= $timeSlot->getTimeEnd()->format('H:i');?></li>
               <?php endforeach;?>
             </ul>
             <hr/>
             <h4>Lien publique</h4>
             <?= HOST;?>reservation-planning/<?= $planning->getPublicLink();?>
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
