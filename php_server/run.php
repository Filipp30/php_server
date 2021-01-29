<?php


define('ROOT',dirname(__FILE__));
require_once (ROOT.'/vendor/autoload.php');
require_once (ROOT.'/Router.php');

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$router = new Router();
$router ->run();

