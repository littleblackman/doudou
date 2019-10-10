<?php

$GLOBALS['dayname_fr'] = array('', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche');


function getDayName($i)
{
    $datas = $GLOBALS['dayname_fr'];
    return $datas[$i];
}
