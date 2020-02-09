<?php
require '../config/rb.php';
$db = require '../config/config_db.php';
R::setup($db['dsn'], $db['user'], $db['pass']);

if(isset($_POST['hall_number'])) {
    $priceConfig = R::dispense('priceconfig');
    $priceConfig->hall_number = $_POST['hall_number'];
    $priceConfig->standartprice = $_POST['standartPrice'];
    $priceConfig->vipprice = $_POST['vipPrice'];
    $id = R::store($priceConfig);
}
header('Location: index.php');