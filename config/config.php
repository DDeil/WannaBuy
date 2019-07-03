<?php
define('HOST', 'localhost');
define('USER', 'root');
define('PASSWORD', '');
define('DB_NAME', 'super_mag');



define('SERVER_NAME', 'http://'.$_SERVER['SERVER_NAME']);

Error_Reporting(E_ALL & ~E_NOTICE);

ini_set('display_errors', 1);

session_start();