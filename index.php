<?php

error_reporting(E_ALL);
ini_set('display_errors', true);

require_once('lib/includes/constants.php');

require_once('lib/configLoader.php');
OgConfig::init();
require_once('lib/logger.php');
OgLogger::init();
require_once('lib/includes/functions.php');

/**
 * TODO: Call correct view
 */
require_once('lib/view/BaseView.php');

$view = new Organa\BaseView();

echo $view->render();