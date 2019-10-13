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
      $authService->auth($this->request->get('login'), $this->request->get('password'));
      $this->redirect('dashboard');
  }

  public function logout()
  {
    session_destroy();
    $this->redirect('login');
  }
}
