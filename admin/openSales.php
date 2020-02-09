<?php
require '../config/rb.php';
$db = require '../config/config_db.php';
R::setup($db['dsn'], $db['user'], $db['pass']);

$allStatus = R::getCol('SELECT `status` FROM halls ');
foreach ($allStatus as $status) {
    $status->status = 'opened';
    R::store($status);
}
