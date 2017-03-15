<?php
/**
 * Front controller
 * Общие настройки 
 * Подключение файлов сиситемы
 * Подключение БД
 * Вызов Router
 */
//* Общие настройки
ini_set('display_errors',1); //На время разработки
error_reporting(E_ALL);

//*Подключение файлов сиситемы

 define('ROOT',dirname(__FILE__));
require_once(ROOT.'/components/Router.php');

//* Подключение БД

//* Вызов Router
$router=new Router();
$router->run();