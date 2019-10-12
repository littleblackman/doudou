<?php

include_once('app/config.php');

MyConfiguration::start();

(isset($_GET['r']) && $_GET['r']) ? $url = $_GET['r'] : $url = 'home';

$routeur = new Routeur($url);
$routeur->renderController();
