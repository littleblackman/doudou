<?php

/**
 * Class ErrorPage
 * controller to show the error page
 */
class ErrorPageController extends Controller
{

    public function show404() {
        $this->render('App/404');
    }

    public function show403() {
        $this->render('App/403');
    }

    public function notFind() {
        $this->render('App/NotFind');
    }

}
