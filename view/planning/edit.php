<h1>Créer un planning</h1>
<div class="row">
    <form action = "<?= HOST;?>update-planning" method="POST" class="col s12">
      <div class="row">
        <div class="input-field col s6">
          <input id="name" type="text" name="data[name]" class="validate">
          <label for="name">Nom</label>
        </div>
        <div class="input-field col s6">
          <input id="slug" type="text"  name="data[public_link]" class="validate">
          <label for="slug">Slug (lien publique)</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s8">
          <input id="description" type="text"  name="data[description]"  class="validate">
          <label for="description">Description</label>
        </div>
        <div class="input-field col s4">
          <label>
            <input type="checkbox" name="data[multipleUser]"/>
            <span>Plusieurs personnes par créneaux horaires</span>
          </label>
        </div>
      </div>

      <button class="btn waves-effect waves-light btn-fullwidth" type="submit" hname="action">CREER
          <i class="material-icons right">send</i>
      </button>

    </form>
  </div>
