<section>

  <article>
    <h2><?= $planning->getName()?></h2>
    <p><?= $planning->getDescription();?></p>
    url publique : <?= HOST;?>reservation-planning/<?= $planning->getPublicLink();?>
    <button class"btn">
      <a href="<?= HOST;?>reservation-planning/<?= $planning->getPublicLink();?>" target="_blank">
        Suivre le lien
      </a>
    </button>
  </article>


  <ul>
    <?php foreach($planning->getTimeSlots() as $timeSlot):?>
      <li>Date: <?= $timeSlot->getDateAvailable()->format('d/m/Y');?> - de <?= $timeSlot->getTimeStart()->format('H:i');?> à <?= $timeSlot->getTimeEnd()->format('H:i');?></li>
    <?php endforeach;?>
  </ul>

  <br/><br/>

  <button class"btn">
    <a href="<?= HOST;?>edit-planning/<?= $planning->getId()?>" target="_blank">
      Modifier
    </a>
  </button>

  <button class"btn">
    <a href="<?= HOST;?>delete-planning/<?= $planning->getId()?>" target="_blank">
      Supprimer
    </a>
  </button>

</section>



</section>
