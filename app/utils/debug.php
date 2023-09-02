<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

function dd($val) {
    echo "</pre>";
    var_dump($val);
    echo "</pre>";

    die;
}

function dump($val) {
    echo "</pre>";
    var_dump($val);
    echo "</pre>";
}