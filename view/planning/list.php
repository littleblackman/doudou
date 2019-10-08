<section>

  <div style="float: right">
    <a href="<?=HOST;?>creation-planning" class="btn-floating btn-large waves-effect waves-light red" title="créer un planning"><i class="material-icons">add</i></a>
  </div>

  <h1>Vos planning</h1>

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
         <td><?= $planning->nbTimeSlots();?></td>
         <td><?= $planning->getNbBooked();?></td>
       </tr>
     <?php endforeach;?>
     </tbody>
   </table>

 </section>
