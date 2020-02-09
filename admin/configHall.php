<?php
require '../config/rb.php';
$db = require '../config/config_db.php';
require '../config/functions.php';
R::setup($db['dsn'], $db['user'], $db['pass']);

if(isset($_GET['hall'])) {
    $hallConfig = R::dispense('hallconfig');
    $hallConfig->hall_number = $_POST['hallNumber'];
    $hallConfig->rows = $_POST['rows'];
    $hallConfig->places = $_POST['places'];

    $id = R::store($hallConfig);
    $readConf = R::load('hallConfig', 2);


}