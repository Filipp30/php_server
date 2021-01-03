<?php


define('ROOT',dirname(__FILE__));
require_once (ROOT.'/Router.php');
require_once (ROOT.'/components/DbConnection.php');
$router = new Router();
$router ->run();

