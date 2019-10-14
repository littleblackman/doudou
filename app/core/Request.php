<?php

/**
 * Class Request
 *
 * create the request object with params et route request
 */
class Request
{

    private $route;
    private $params;
    private $controller;
    private $method;
    private $role;
    private $url;

    /**
     * @return mixed
     */
    public function getRoute()
    {
        return $this->route;
    }

    /**
     * @param mixed $route
     */
    public function setRoute($route)
    {
        $this->route = $route;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getController()
    {
        return $this->controller;
    }

    /**
     * @param mixed $controller
     */
    public function setController($controller)
    {
        $this->controller = $controller;
        return $this;
    }


    /**
     * @return mixed
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * @param mixed $method
     */
    public function setMethod($method)
    {
        $this->method = $method;
        return $this;
    }

    public function setRole($role) {
        $this->role = $role;
        return $this;
    }

    public function getRole() {
        return $this->role;
    }

    public function getAbsoluteUrl()
    {
      return HOST.$this->getUrl();
    }

    public function getUrl()
    {
        return $this->url;
    }

    public function setUrl($url)
    {
        $this->url = $url;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getParams()
    {
        return $this->params;
    }

    /**
     * @param mixed $params
     */
    public function setParams($params)
    {
        $params = $this->secure($params);
        $this->params = $params;
    }

    public function get($param)
    {
        if(!isset($this->params[$param])) return null;
        return $this->params[$param];
    }

    public function secure($params) {
      $datas = [];
      foreach($params as $key => $value) {
          $datas[$key] = htmlspecialchars($value);
      }
      return $datas;
    }


}
