<?php

/**
 * Class View
 * organize the view
 */
class View
{

    private $template;
    private $App = 0;

    /**
     * set the template.
     * @param null $template
     * @return $this
     */
    public function setTemplate($template)
    {
        if(preg_match("/app/i", $template)) {
            $this->App = 1;
            $el = explode('/', $template);
            $template = $el[1];
        }

        $this->template = $template;
        return $this;
    }

    public function setBaseTemplate($baseTemplate)
    {
        $this->baseTemplate = $baseTemplate;
    }

    public function getBaseTemplate()
    {
        return $this->baseTemplate;
    }

    /**
     * render the template
     * @param array $params
     */
    public function render($params = [])
    {
        extract($params);
        $template = $this->template;
        ob_start();

        if(MODE_ENV == 'dev') include(APP.'pages/_DEV_BAR.php');

        if($this->App == 1)
        {
            include(APP.'pages/'.$template.'.php');

        } else {
            include(VIEW.$template.'.php');
        }
        $contentPage = ob_get_clean();
        include_once (VIEW.'template/'.$this->getBaseTemplate().'.php');
    }

    public function renderHtml($params = [])
    {
        extract($params);
        $template = $this->template;
        include_once(VIEW.$template.'.php');
    }

    /**
     * redirect to the route
     * @param $route
     */
    public function redirect($route)
    {
        header("Location: ".HOST.$route);
        exit;
    }


}
