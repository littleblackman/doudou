<div id="loginPage" style="">
      <h1>Welcome doudou liker</h1>
      <div class="row" style="text-align: center">
          <form action = "<?= HOST;?>signin" method="POST" class="col s12">
            <div class="row">
              <div class="input-field col s12">
                <input id="login" type="text" name="login" class="validate">
                <label for="login">Login</label>
              </div>
              <div class="input-field col s12">
                <input id="password" type="password" name="password" class="validate">
                <label for="password">Password</label>
              </div>
            </div>
            <button class="btn waves-effect waves-light btn-fullwidth" type="submit" hname="action">
                Se connecter
                <i class="material-icons right">send</i>
            </button>
          </form>
      </div>
</div>
