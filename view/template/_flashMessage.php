<?php $flashMessage = $session->getFlashMessage();?>
<?php if($flashMessage->hasMessage()):?>
      <?php $allmessages = $flashMessage->getMessagesJson();?>
      <?php $flashMessage->reset();?>


      <script>
          let messages = <?php echo $allmessages;?>;
          let toastHTML = "";
          let currentKey = "";
          Object.entries(messages).forEach(([key, value]) => {
                if( key != currentKey) {
                    toastHTML += "<h5>"+key+"</h5>";
                }
                toastHTML += value+"<br/>";
                currentKey = key;
          });

          console.log(toastHTML);

          M.toast(
                  {
                    html: toastHTML,
                    classes: "flashMessageBar",
                    displayLength: 4000
                  }
                );

      </script>


<?php endif;?>
