<?php


class Session
{

    private $user;
    private $flashMessage;

    public function __construct()
    {

        $this->flashMessage = new FlashMessage();

        if(!isset($_SESSION['role']) || !isset($_SESSION['auth']))
        {
           $_SESSION['role'] = "VISITOR";
        }  else {
          $manager = new UserManager();
          $user = $manager->find($_SESSION['user_id']);
          $this->user = $user;
        }

    }

    public function initUserSession($user) {
        $_SESSION['user']    = $user;
        $_SESSION['user_id'] = $user->getId();
        $_SESSION['role']    = $user->getRole();
        $_SESSION['auth']    = 1;
        $this->user = $user;
    }

    public function getRole()
    {
        return $_SESSION['role'];
    }

    public function getAuth()
    {
        if(!isset($_SESSION['auth'])) return null;
        return $_SESSION['auth'];
    }

    public function setRequest($request)
    {
        $this->request = $request;
        return $this;
    }

    public function getRequest()
    {
        return $this->request;
    }

    public function getUser()
    {
      return $this->user;
    }

    public function getUserId()
    {
      return $_SESSION['user']->getId();
    }

    public function getFlashMessage() {
      return $this->flashMessage;
    }
}
