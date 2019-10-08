<?php

/**
 * Configure the application
 * load the environnement configuration
 **/
class MyConfiguration
{
    /**
     * load the application
     */
    public static function start()
    {
        // start session
        session_start();

        // start autoload
        spl_autoload_register(array(__CLASS__, 'autoload'));

        MyConfiguration::initParameters();

    }

    /**
     * create all parameters
     */
    private static function initParameters()
    {
        $root = $_SERVER['DOCUMENT_ROOT'];
        $host = $_SERVER['HTTP_HOST'];

        $parameters = parse_ini_file('config.ini');

        // set parameters
        define('HOST', 'http://'.$host.'/'.$parameters['folder_app'].'/');
        define('ROOT', $root.''.$parameters['folder_app'].'/');

        //set folders
        define('CONTROLLER', ROOT.'controller/');
        define('VIEW', ROOT.'view/');
        define('ENTITY', ROOT.'model/entity/');
        define('MANAGER', ROOT.'model/manager/');
        define('APP', ROOT.'app/');
        define('CORE', ROOT.'app/core/');
        define('SERVICE', ROOT.'service/');

        // set assets url
        define('ASSETS', HOST.'assets/');
        define('JS', ASSETS.'js/');
        define('CSS', ASSETS.'css/');
        define('IMG', ASSETS.'image/');

        // set bdd
        define('DB_LOGIN', $parameters['db_login']);
        define('DB_PWD', $parameters['db_pwd']);
        define('DB_NAME', $parameters['db_name']);
        define('DB_HOST', $parameters['db_host']);

    }

    /**
     * load class by autoload
     * @param $class
     */
    private static function autoload($class)
    {
        if(file_exists(MANAGER.$class.'.php'))
        {
            include_once (MANAGER.$class.'.php');
        }  else if (file_exists(ENTITY.$class.'.php'))
        {
            include_once (ENTITY.$class.'.php');
        }
        else if (file_exists(CORE.$class.'.php'))
        {
            include_once (CORE.$class.'.php');
        } else if (file_exists(CONTROLLER.$class.'.php'))
        {
            include_once (CONTROLLER.$class.'.php');
        } else if (file_exists(CONTROLLER.'admin/'.$class.'.php'))
        {
            include_once (CONTROLLER.'admin/'.$class.'.php');
        } else if (file_exists(SERVICE.$class.'.php'))
        {
            include_once (SERVICE.$class.'.php');
        }

    }
}
