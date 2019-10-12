<?php


class AuthentificationService
{

    public function auth($login, $password)
    {
        $manager = new UserManager();
        $user = $manager->findByLogin($login);

        if(!password_verify($password, $user->getPassword())) $this->redirect('login');

        $session = new Session();
        $session->initUserSession($user);


    }


}
