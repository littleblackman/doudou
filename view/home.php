<section>

  <h1>Vos planning</h1>
  <ul>
    <?php foreach($plannings as $planning):?>
        <a href="<?= HOST;?>show/<?= $planning->getId();?>">
          <li><?= $planning->getName();?></li>
        </a>
    <?php endforeach;?>
  </ul>
</section>
