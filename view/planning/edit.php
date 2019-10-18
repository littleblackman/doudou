<?php ($planning->getId() != null) ? $text = "Modifier" : $text = "Créer" ;?>
<h1>
    <?php if($planning->getId()):?>
        <a href="<?=HOST;?>show/<?= $planning->getId();?>" class="btn-floating btn-large waves-effect waves-light blue lighten-1">
          <i class="material-icons">visibility</i>
        </a>
    <?php endif;?>
    <?= $text;?>
    un planning
</h1>
<div class="row">
    <form action = "<?= HOST;?>update-planning" method="POST" class="col s12">
      <?php if($planning->getId() != null):?>
        <input type="hidden" name="data[id_planning]" value="<?= $planning->getId();?>"/>
      <?php endif;?>
      <div class="row">
        <div class="input-field col s6">
          <input id="name" type="text" name="data[name]" class="validate" value="<?= $planning->getName();?>">
          <label for="name">Nom</label>
        </div>
        <div class="input-field col s6">
          <input id="slug" type="text"  name="data[public_link]" class="validate" value="<?= $planning->getPublicLink();?>" >
          <label for="slug">Slug (lien publique)</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s8">
          <input id="description" type="text"  name="data[description]"  class="validate" value="<?= $planning->getDescription();?>">
          <label for="description">Description</label>
        </div>
        <!--
        <div class="input-field col s4">
          <label>
            <input type="checkbox" name="data[multipleUser]" value="<?= $planning->getIsMultipleUsers();?>"/>
            <span>RDV Multiple</span>
          </label>
        </div>-->
      </div>


      <button class="btn waves-effect waves-light btn-fullwidth blue lighten-1" type="submit" hname="action">
          <?= $text;?>
          <i class="material-icons right">send</i>
      </button>
      <br/>
    </form>
  </div>
  <?php if(isset($calendar)):?>
    <h2>Ajouter des plages horaires</h2>
    <div id="calendarTimeSlot">
      <?php include('_calendar.php');?>
    </div>
  <?php endif;?>
