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

      echo '<pre>'; print_r($_REQUEST); echo '</pre>'; exit;
  }

  public function logout()
  {
    session_destroy();
    $this->redirect('login');
  }
}
