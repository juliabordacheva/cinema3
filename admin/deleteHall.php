<?php
require '../config/rb.php';
$db = require '../config/config_db.php';
require '../config/functions.php';
R::setup($db['dsn'], $db['user'], $db['pass']);
$ids = R::getCol('SELECT `id` FROM halls ');
if (isset($_GET['hallName'])) {
    $oneHall = R::loadAll('halls', $ids);
    R::trashAll($oneHall);
}