<?php

/**
 * Class Controller
 *
 * to organize all controller and create the view
 */
class Controller
{

    private $view;
    public $session;

    public function __construct()
    {
        $this->view = new View();
        $this->session = new Session();
    }


    public function render($template, $datas = [])
    {
        $datas['session'] = $this->session;
        $myView = $this->view;
        $myView->setTemplate($template);
        $myView->render($datas);
    }

    public function renderJson($datas)
    {
        echo json_encode($datas);
    }

    public function redirect($template) {
      $this->view->redirect($template);
    }

    public function renderHtml($template, $datas = [])
    {
        $datas['session'] = $this->session;
        $myView = $this->view;
        $myView->setTemplate($template);
        $myView->renderHtml($datas);
    }
}
