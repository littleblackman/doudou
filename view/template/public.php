<?php include('_head.php');?>
<body>
  <header>
      <nav>
          <div id="nav-left">
            <a href="<?= HOST;?>home">Home</a>
          </div>
          <div style="text-align: center">
                <a href="<?= HOST;?>home" alt="doudou home">
                  <img src="<?= IMG;?>logo/icecoffee-26x54.png" alt="doudou logo"/>
                </a>
          </div>
          <div id="nav-right">
            <a href="<?= HOST;?>login">Connexion</a>
          </div>

      </nav>
  </header>

  <div id="mainContent">
      <?php echo $contentPage ;?>
  </div>
  <br/><br/><br/><br/>

  <?php include('_footer.php');?>

</body>
</html>
