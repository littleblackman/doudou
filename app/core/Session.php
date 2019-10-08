<?php


class Session
{

    private $user;

    public function __construct()
    {

        // a effacer
        $_SESSION['user_id'] = 2;

        if(isset($_SESSION['user_id'])) {
            $manager = new UserManager();
            $user = $manager->find($_SESSION['user_id']);
            $this->user = $user;
        }
    }

    public function getUser()
    {
      return $this->user;
    }

    public function getUserId()
    {
      return $this->user->getId();
    }
}
