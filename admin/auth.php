<?php
require '../config/rb.php';
require '../config/functions.php';
$db = require '../config/config_db.php';
R::setup($db['dsn'], $db['user'], $db['pass']);
session_start();

if (isset($_POST['email']) && isset($_POST['password'])) {
    $user = R::load('user', 1);
        if ($user['email'] == $_POST['email'] && $user['password'] == $_POST['password']) {
            $_SESSION['email'] = $user['email'];
        }
}
header('Location: index.php');