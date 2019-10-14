<?php use_helper('date');?>
<div style="background-color: #ee6e73; color: white; padding: 10px 30px; display: flex; justify-content: space-between">
  <!--<img class="imgEmail" src="<?php echo IMG;?>logo/icecoffee-26x54.png" alt="doudou logo"/>-->
  <h2>Confirmation de rendez-vous Doudou</h2>
</div>
<div style="padding: 30px">
  <h3 style="padding-bottom: 0px; margin-bottom: 0px"><?= $planning->getName();?></h3>
  <hr style="border: 2px solid #ee6e73"/>
  <br/>
  <div style="display: flex; justify-content: space-between">
      <div style="font-size: 1.4em">
            <br/>
            Hello <b><?= $person->getFullname();?></b>,<br/>

            voici une confirmation du rendez-vous avec <?= $user->getFullname();?><br/>
            <br/>
            Voici les informations que vous avez choisi :
            <ul>
              <li><?= getDayName($timeSlot->getDateAvailable()->format('N'))?> <?= $timeSlot->getDateAvailable()->format('d/m/Y')?></li>
              <li>Début: <?= $timeSlot->getTimeStart()->format('H:i');?></li>
              <li>Fin: <?= $timeSlot->getTimeEnd()->format('H:i');?></li>
            </ul>
            <br/>
            Merci à vous,
            <br>
            <br/>
            <a href="<?= $timeSlot->getCreateEventUrl()?>" target="_blank" style="color: darkblue; font-size: 0.8em; font-style: normal">
              Ajouter à votre Agenda Google
            </a>
      </div>
      <!---
      <img class="imgEmail" src="<?php echo IMG;?>logo/doudou-240x393.png" alt="doudou pour vos rendez-vous"/>-->
  </div>

  <br/>
  Email envoyé depuis l'application <a href="mydoudou.icu" alt="doudou l'application qui gère vos rendez-vous">Doudou</a>
</div>
