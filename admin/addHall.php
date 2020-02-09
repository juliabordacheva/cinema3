<?php
require '../config/rb.php';
$db = require '../config/config_db.php';
require '../config/functions.php';
R::setup($db['dsn'], $db['user'], $db['pass']);

if(isset($_POST['hallName'])) {
    $halls = R::dispense('halls');
    $halls->hallName = $_POST['hallName'];
    $halls->status = 'closed';
    $id = R::store($halls);
}
header('Location: index.php');