<?php

/**
 * Public controller
 */
class PublicController extends Controller
{
  public function index()
  {
    $this->setBaseTemplate('public');
    $this->render('public/index');
  }


  public function login()
  {
    if($this->session->getAuth() == 1) $this->redirect('dashboard');
    $this->setBaseTemplate('public');
    $this->render('public/login');
  }

  public function signin() {
      $authService = new AuthentificationService($this->session);
      if(!$authService->auth($this->request->get('login'), $this->request->get('password'))) {
          $this->session->getFlashMessage()->setMessage('Erreur', "Problème de login ou password. Saisie incorrecte.");
          $this->redirect('login');
      }
      $this->redirect('dashboard');
  }

  public function createAccount() {
      $this->setBaseTemplate('public');
      $this->render('public/createAccount');
  }

  public function register() {
      $authService = new AuthentificationService($this->session);
      if($authService->register($this->request->getParams())) {
          // send email notification
          $this->session->getFlashMessage()->setMessage('Confirmation', "Votre compte a été créé. Activez-le en cliquant sur lien reçu par email");
          $this->redirect('login');
      }
  }

  public function validateLogin() {
      $manager = new UserManager();
      $result = $manager->loginIsExist($this->request->get('login'));
      $this->renderString($result);
  }

  public function logout()
  {
    $this->session->destroy();
    $this->redirect('login');
  }
}
