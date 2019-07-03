<?php

/**
 * FRONT CONTROLLER
 */

/**
 * General settings
 */
    define('ROOT', dirname(__FILE__));
    require_once (ROOT.'\config\config.php');

/**
 * Require file
 */

    require_once (ROOT.'\components\Autoload.php');

    $routs = new Router();
    $routs->run();