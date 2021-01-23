<?php


define('ROOT',dirname(__FILE__));

require_once (ROOT.'/components/DbConnection.php');
require_once (ROOT.'/components/Autorization.php');
require_once (ROOT.'/Router.php');
$router = new Router();
$router ->run();

