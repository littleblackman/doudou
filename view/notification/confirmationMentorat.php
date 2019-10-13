<h2>Confirmation de rendez-vous Mentorat OC</h2>

<h3><?= $planning->getName();?></h3>
<br/>
Hello <?= $person->getFullname();?>,<br/>

voici une confirmation du rendez-vous avec <?= $user->getFullname();?><br/>
<br/>
Voici les informations que vous avez choisi :
<ul>
  <li><?= $timeSlot->getDateAvailable()->format('d/m/Y')?></li>
  <li>Début: <?= $timeSlot->getTimeStart()->format('H:i');?></li>
  <li>Fin: <?= $timeSlot->getTimeEnd()->format('H:i');?></li>
</ul>
<br/>
Merci à vous,
<br/><br/>
Email envoyé depuis l'application <a href="mydoudou.icu" alt="doudou l'application qui gère vos rendez-vous">Doudou</a>
