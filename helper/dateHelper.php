<?php

$GLOBALS['dayname_fr'] = array('', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche');
$GLOBALS['monthname_fr'] = array('', 'Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre');


function getDayName($i)
{
    $datas = $GLOBALS['dayname_fr'];
    return $datas[$i];
}

function getMonthName($i) {
  $datas = $GLOBALS['monthname_fr'];
  return $datas[$i];
}

/**
 * Show date with new format
 * @param string
 * @return string
 */
function showDate($date, $format = 'd/m/Y') {
  $myDate = new DateTime($date);
  return $myDate->format($format);
}

function isDate($date)
{
   return (DateTime::createFromFormat('Y-m-d', $date) !== false);
}

/**
 * return month
 * @param string
 * @return string
 */
function getMonth($date) {
  return showDate($date, 'F');
}

/**
 * return year of date
 * @param string
 * @return string
 */
function getYear($date, $format = 'Y') {
  return showDate($date, $format);
}

/**
 * return week of date
 * @param string
 * @return string
 */
function getWeek($date, $format = 'W') {
  return showDate($date, $format);
}

/**
 * return time H:m
 * @param string
 * @return string
 */
function showTime($time, $format = 'H:i')
{
  return showDate($time, $format);
}

/**
 * return difference time
 * @param string
 * @return string
 */
function timeSpend($start, $end, $format = '%H:%I')
{
  $datetime1 = new DateTime($start);
  $datetime2 = new DateTime($end);
  $interval = $datetime1->diff($datetime2);
  return $interval->format($format);
}

/**
 * return difference date
 * @param string
 * @return string
 */
 function diffDate($start , $end )
 {
     $date1 = showDate($start, 'Ymd');
     $date2 = showDate($end, 'Ymd');
     return $date2-$date1;

 }

function convertTimeSpend($seconds) {
  return $seconds;
  $minutes = $seconds/60;
  $hours   = $minutes/60;
  $days    = $hours/24;
  return $days.' '.$hours.' '.$minutes;
}

function getDateStartWeek($date_ref = null) {
    if(!$date_ref) $date_ref = date('Y-m-d');
    // Calcul de l'écart entre le jour de $day et le lundi (=1)
    $rel = 1 - date('N', strtotime ($date_ref));
    //calcul du lundi avec cet écart
    $monday = date('Y-m-d', strtotime("$rel days", strtotime($date_ref)));
    return $monday;
}

function getDateEndWeek($date_ref = null) {
  $monday = getDateStartWeek($date_ref);
  $sunday = nextDay($date_ref, 6);
  return $sunday;
}

function getStartMonth($date, $format = "Y-m-d") {
    $startMonth = showDate($date, 'Y').'-'.showDate($date, 'm').'-01';
    return showDate($startMonth, $format);
}

function nextDay($date_ref, $n = 1)
{
  return date('Y-m-d', strtotime($date_ref.", +".$n." day"));
}

function prevDay($date_ref, $n = 1)
{
  return date('Y-m-d', strtotime($date_ref.", -".$n." day"));
}
