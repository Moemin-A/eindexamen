<?php
    
    //Database params
    define('DB_HOST', 'localhost'); //Add your db host
    define('DB_USER', 'root'); // Add your DB root
    define('DB_PASS', 'wachtwoord'); //Add your DB pass
    define('DB_NAME', 'eindkerntaakexamen3'); //Add your DB Name

    //APPROOT
    define('APPROOT', dirname(dirname(__FILE__)));

    //URLROOT (Dynamic links)
    define('URLROOT', 'http://eindexamen.com/');

    //Sitename
    define('SITENAME', 'Rijschool');

    // Logs 
    date_default_timezone_set('Europe/Amsterdam');
    $ip  = "Remote IP Address: " . $_SERVER["REMOTE_ADDR"] . "\t";
    ini_set('display_errors', 1);
    ini_set('log_errors', 1);
    ini_set('error_log', '../app/logs.txt');
    error_reporting(E_ALL);

    