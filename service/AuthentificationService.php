<?php

/**
 * Authentification Class
 * Used to auth the user
 *
 *
 * @author Sandy Razafitrimo <sandy@etsik.com>
 */
class AuthentificationService
{

    private $session;
    private $userManager;

    public function __construct($session)
    {
      $this->session = $session;
      $this->userManager = new UserManager();
    }

    public function auth($login, $password)
    {
        $user = $this->userManager->findByLogin($login);

        if(!password_verify($password, $user->getPassword())) $this->redirect('login');

        $this->session->initUserSession($user);
    }


}
