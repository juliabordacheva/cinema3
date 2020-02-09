<?php
require '../config/functions.php';
require '../classes/User.php';
require '../config/rb.php';
session_start();
$db = require '../config/config_db.php';
R::setup($db['dsn'], $db['user'], $db['pass']);
$user = new User($_SESSION);
if ($user->isLogged()) {
    include 'main.php';
} else {
    include 'login.php';
}
//Запись конфигурации зала в базу
if(isset($_POST['hall_number'])) {
    $hallConfig = R::dispense('hallconfig');
    $hallConfig->hall_number = $_POST['hall_number'];
    $hallConfig->rows = $_POST['rows'];
    $hallConfig->places = $_POST['places'];
    $id = R::store($hallConfig);
    $readConf = R::load('hallConfig', 2);


}





