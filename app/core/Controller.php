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
    public $request;
    private $roles;
    private $baseTemplate;

    public function __construct($request)
    {
        $this->view = new View();
        $session = new Session();
        $session->setRequest($request);
        $this->session = $session;
        $this->request = $request;
        $this->roles = explode(',', ROLE_PRIORITY);
        $this->baseTemplate = BASE_TEMPLATE;

        if(!$this->checkIfIsAuthorized()) {
          $this->redirect("login");
        }
    }

    public function getRoles()
    {
        return $this->roles;
    }

    public function checkIfIsAuthorized()
    {
        $r_session = $this->session->getRole();
        $r_request = $this->request->getRole();

        $roles = array_flip($this->roles);

        if($roles[$r_session] >= $roles[$r_request]) return true;
        return false;
    }

    public function setBaseTemplate($baseTemplate)
    {
        $this->baseTemplate = $baseTemplate;
    }

    public function getBaseTemplate()
    {
        return $this->baseTemplate;
    }

    public function getRenderTemplate($template, $datas = []) {
        $myView = $this->view;
        $myView->setTemplate($template);
        return $myView->getRenderTemplate($datas);
    }

    public function render($template, $datas = [])
    {
        $datas['session'] = $this->session;
        $myView = $this->view;
        $myView->setBaseTemplate($this->getBaseTemplate());
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
