<div id="loginPage" style="">
      <h1>Deviens un doudou liker</h1>
      <div class="row" style="text-align: center">
          <form action = "<?= HOST;?>register" method="POST" class="col s12">
            <div class="row">
              <div class="input-field col s12">
                <input id="login" type="text" name="login" class="validate">
                <label for="login">Login</label>
              </div>
              <div class="input-field col s12">
                <input id="email" type="text" name="email" class="validate">
                <label for="email">Email</label>
              </div>
              <div class="input-field col s12">
                <input id="password" type="password" name="password" class="validate">
                <label for="password">Password</label>
              </div>
              <div class="input-field col s12">
                <input id="password_again" type="password" name="password_again" class="validate">
                <label for="password_again">Password again</label>
              </div>
            </div>
            <button class="btn waves-effect waves-light btn-fullwidth" type="submit" hname="action">
                S'enregistrer
                <i class="material-icons right">send</i>
            </button>
          </form>
      </div>
</div>
