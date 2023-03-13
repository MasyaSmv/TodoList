<?php

use App\App\App;

?>
<!DOCTYPE html>
<html lang="ru">
    <head>
        <title><?php echo $title ?></title>
        <link rel="stylesheet" type="text/css" href="<?php echo App::get('app')['APP_URL'] . '/assets/css/bootstrap.min.css' ?>"/>
        <link rel="stylesheet" type="text/css" href="<?php echo App::get('app')['APP_URL'] . '/assets/css/daterangepicker.css' ?>"/>
        <link rel="stylesheet" type="text/css" href="<?php echo App::get('app')['APP_URL'] . '/assets/css/fullcalendar.min.css' ?>"/>

        <style>
            label.error {
                font-size: 14px;
                color: #ff0000;
                font-style: italic;
            }
        </style>
    </head>
<body>