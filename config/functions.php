<?php
//Функция для красивого отображения массивов
function debug($arr, $die = false){
    echo '<pre>' . print_r($arr, true) . '</pre>';
    if($die) die;
}




