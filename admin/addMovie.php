<?php
require '../config/rb.php';
$db = require '../config/config_db.php';
R::setup($db['dsn'], $db['user'], $db['pass']);

if(isset($_POST['movieTitle'])) {
$addMovie= R::dispense('addmovie');
$addMovie->movie_title = $_POST['movieTitle'];
$id = R::store($addMovie);
}
header('Location: index.php');
