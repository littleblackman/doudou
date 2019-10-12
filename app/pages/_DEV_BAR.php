<?php if(MODE_ENV == "dev"):?>
    <div style="color: white; position: fixed; z-index: ; top: 0; left: 0;">
      <div id="_DEV_BAR_swapButton" style="background-color: black; float: left; width: 30px; padding: 10px; text-align center; cursor: pointer">
        X
      </div>
      <div id="_DEV_BAR_info" style="display: none; width: 90%; background-color: black;">
        <pre>
          <?php print_r($_SESSION);?>
        </pre>
      </div>
    </div>

    <script>
      $('#_DEV_BAR_swapButton').click(function() {
        $('#_DEV_BAR_info').toggle();
      })
    </script>
<?php endif;?>
