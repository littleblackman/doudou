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

    public function auth($login, $password)
    {
        $manager = new UserManager();
        $user = $manager->findByLogin($login);

        if(!password_verify($password, $user->getPassword())) $this->redirect('login');

        $session = new Session();
        $session->initUserSession($user);
    }


}
