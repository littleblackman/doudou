<?php ($planning->getId() != null) ? $text = "Modifier" : $text = "Créer" ;?>
<h1><?= $text;?> un planning</h1>
<div class="row">
    <form action = "<?= HOST;?>update-planning" method="POST" class="col s12">
      <?php if($planning->getId() != null):?>
        <input type="hidden" name="data[id]" value="<?= $planning->getId();?>"/>
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
        <div class="input-field col s4">
          <label>
            <input type="checkbox" name="data[multipleUser]" value="<?= $planning->getIsMultipleUsers();?>"/>
            <span>RDV Multiple</span>
          </label>
        </div>
      </div>

      <button class="btn waves-effect waves-light btn-fullwidth" type="submit" hname="action">
          <?= $text;?>
          <i class="material-icons right">send</i>
      </button>
    </form>
  </div>
  <br/>
  <h2>Ajouter des plages horaires</h2>
  <?php include('_calendar.php');?>
