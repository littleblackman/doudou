<section>

  <div id="createPlanningButton">
    <a href="<?=HOST;?>creation-planning" class="btn-floating btn-large waves-effect waves-light red lighten-1" title="créer un planning"><i class="material-icons">add</i></a>
  </div>

  <h1>Vos planning</h1>


  <?php if($plannings):?>

          <table class="striped">
             <thead>
               <tr>
                   <th>Nom</th>
                   <th>Total plages</th>
                   <th>Nb réservées</th>
               </tr>
             </thead>

             <tbody>
               <?php foreach($plannings as $planning):?>
               <tr>
                 <td>
                   <a href="<?= HOST;?>show/<?= $planning->getId();?>">
                     <?= $planning->getName();?>
                   </a>
                 </td>
                 <td><?= $planning->getNbTimeSlots();?></td>
                 <td><?= $planning->getTotalBooked();?></td>
               </tr>
             <?php endforeach;?>
             </tbody>
           </table>

   <?php else :?>

      <em>Vous n'avez pas encore de planning !</em>

      <br/><br/><br/>
      <a href="<?= HOST;?>creation-planning" class="btn waves-effect waves-light btn-fullwidth blue lighten-1">
        CREEZ VOTRE PREMIER DOUDOU
        <i class="material-icons left">send</i>
      </a>

   <?php endif;?>

 </section>
