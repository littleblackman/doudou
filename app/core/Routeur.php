<?php

/**
 * Class Routeur
 *
 * create routes and find controller
 */
class Routeur
{
    private $request;

    public function __construct($url)
    {
        $routes = parse_ini_file(APP.'routes.ini', true);

        // extract route
        $route  = $this->getRoute($url);

        if(key_exists($route, $routes))
        {
            // extract elements
            $controller = $routes[$route]['controller'].'Controller';
            $method     = $routes[$route]['method'];

            if(isset($routes[$route]['vars'])) {
              $vars = explode('/' , $routes[$route]['vars']);
            } else {
              $vars = [];
            }

            $params = $this->getParams($url, $vars);

        } else {
            $controller = "ErrorPage";
            $method     = "show404";

        }

        $request = new Request();
        $request->setRoute($route);
        $request->setParams($params);
        $request->setController($controller);
        $request->setMethod($method);

        $this->request = $request;
    }


    public function getRoute($url)
    {
        $elements = explode('/', $url);
        return $elements[0];
    }

    public function getParams($url, $vars)
    {
        $params = [];

        // extract GET params
        $elements = explode('/', $url);
        unset($elements[0]);

        foreach($vars as $key => $var) {
          if(isset($elements[$key+1])) {
            $params[$var] = $elements[$key+1];
          }
        }

        // extract POST params
        if($_POST)
        {
            foreach($_POST as $key => $val)
            {
                $params[$key] = $val;
            }
        }

        return $params;

    }

    public function renderController()
    {
        $request = $this->request;
        $controller = $request->getController();
        $method     = $request->getMethod();

        $currentController = new $controller();
        $currentController->$method($request);

    }
}
