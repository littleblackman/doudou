<?php


class FlashMessage
{

    public function reset()
    {
      $_SESSION['flashMessage'] = [];
      $_SESSION['hasMessage'] = 0;
    }

    public function setMessage($type, $message)
    {
          $flashMessage =  $_SESSION['flashMessage'];
          $flashMessage[$type][] = $message;
          $_SESSION['flashMessage'] = $flashMessage;
          $_SESSION['hasMessage'] = 1;
    }

    public function hasMessage() {
        return  $_SESSION['hasMessage'];
    }

    public function getMessages($type = null) {
      if($this->hasMessage() == 0) return array();
      if($type == null) return $_SESSION['flashMessage'];
      if(!isset($_SESSION['flashMessage'][$type])) return null;
      return $_SESSION['flashMessage'][$type];
    }

    public function getMessagesJson($type = null) {
        if($this->hasMessage() == 0) return array();
        if(!$messages = $this->getMessages($type)) return null;
        return json_encode($messages);
    }

  }
