<?php include('_head.php');?>
<body>
  <?php include('_flashMessage.php');?>
  <header>
      <nav>
          <div id="nav-left">
            <a href="<?= HOST;?>home">Home</a>
            <a href="<?= HOST;?>dashboard">Planning</a>
            <a href="<?= HOST;?>survey">Sondage</a>

          </div>
          <div style="text-align: center">
                <a href="<?= HOST;?>dashboard" alt="ice coffee dashboard">
                  <img src="<?= IMG;?>logo/icecoffee-26x54.png" alt="doudou logo"/>
                </a>
          </div>
          <div id="nav-right">
            <b><?= $session->getUser()->getFirstname();?></b>
            <a href="<?= HOST;?>logout">Déconnexion</a>
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
