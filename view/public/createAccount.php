<div id="loginPage" style="">
      <h1>Deviens un doudou liker</h1>
      <div class="row" style="text-align: center">
          <form action = "<?= HOST;?>register" method="POST" class="col s12">
            <input type="hidden" name="is_active" value=0 />
            <div class="row">
              <div class="input-field col s12">
                <input id="firstname" type="text" name="firstname" class="validate">
                <label for="firstname">Prénom</label>
              </div>
              <div class="input-field col s12">
                <input id="lastname" type="text" name="lastname" class="validate">
                <label for="lastname">Nom</label>
              </div>
              <div class="input-field col s12">
                <input id="login" type="text" name="login" class="validate">
                <label for="login">Identifiant</label>
              </div>
              <div class="input-field col s12">
                <input id="email" type="text" name="email" class="validate">
                <label for="email">
                  Email
                  <span id="emailError" class="errorMessage"></span>
                </label>
              </div>
              <div class="input-field col s12">
                <input id="password" type="password" name="password" class="validate">
                <label for="password">
                  Mot de passe
                </label>
              </div>
              <div class="input-field col s12">
                <input id="password_again" type="password" name="password_again" class="validate">
                <label for="password_again">
                  Retapez le mot de passe
                  <span id="passwordError" class="errorMessage"></span>
                </label>
              </div>
            </div>
            <button class="btn waves-effect waves-light btn-fullwidth blue lighten-1" type="submit" id="submitButton" name="action">
                S'enregistrer
                <i class="material-icons right">send</i>
            </button>
          </form>
      </div>
</div>
<script src="<?= JS;?>formValidator.js"></script>
