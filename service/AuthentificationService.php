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

    public function autoconnect($login, $password) {
        if(!$user = $this->userManager->findByLoginAndEmail($login)) return null;
        if($user->getPassword() != $password) return null;
        $this->session->initUserSession($user);
        return true;
    }

    public function auth($login, $password)
    {
        if(!$user = $this->userManager->findByLoginAndEmail($login)) return null;

        if(!password_verify($password, $user->getPassword())) return null;

        $this->session->initUserSession($user);

        return true;
    }

    public function register($params) {

        $params['password'] = password_hash($params['password'], PASSWORD_BCRYPT);

        $person = new Person($params);
        $user = new User($params);
        $user->setPerson($person);
        $user = $user->save();

        return $user;
    }


}
