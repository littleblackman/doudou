<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>doudou, l'application pour fixer vos rendez-vous</title>
    <!--<link rel="icon" type="image/png" href="<?php //IMG;?>logo/icecoffee-26x54.png" />-->
    <meta name="description" content="Doudou est une application dédiée à la gestion de rendez-vous, elle vous permet de proposer des créneaux horaires à vos contacts afin qu'ils puissent bloquer un rendez-vous." />
    <meta name="generator" content="ETSIK FRAMEWORK" />
    <meta name="publisher" content="Sandy Razafitrimo - ETSIK" />
    <meta name="author" content="Sandy Razafitrimo, littleblackman, etsik" />
    <meta name="copyright" content="© ETSIK" />
    <meta http-equiv="pragma" content="no-cache" />
    <meta name="robots" content="index,follow" />

    <!-- favicon  -->
    <link rel="apple-touch-icon" sizes="180x180" href="<?= IMG;?>favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= IMG;?>favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= IMG;?>favicon/favicon-16x16.png">

    <!-- Manifest.json --->
    <link rel= "manifest" href= "<?= HOST;?>manifest.json">

    <link rel="mask-icon" href="<?= IMG;?>favicon/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#ef9a9a">
    <meta name="theme-color" content="#ef9a9a">

    <!-- opengraph --->
    <meta property="og:title" content="Doudou, le planning en ligne" />
    <meta property="og:type" content="application" />
    <meta property="og:url" content="<?= $session->getRequest()->getAbsoluteUrl();?>" />
    <meta property="og:image" content="<?= IMG;?>logo/icecoffee.png" />

    <!-- jquery -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>

    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--- Font family --->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700|Satisfy&display=swap" rel="stylesheet">

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>


    <!--- Font awesome --->
    <link href="<?= CSS;?>fontawesome5112/css/all.css" rel="stylesheet"> <!--load all styles -->


    <!-- CSS perso --->
    <link rel="stylesheet" href="<?= CSS;?>style.css"/>
    <link rel="stylesheet" href="<?= CSS;?>media-queries.css"/>


    <script>
      var HOST = "<?= HOST;?>";
    </script>
</head>
