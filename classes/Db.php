<?php




class Db
{
    private static $instance;

    public static function instance(){
        if(self::$instance === null){
            self::$instance = new self;
        }
        return self::$instance;
    }

public function connect() {
    $db = require_once 'config/config_db.php';

    R::setup($db['dsn'], $db['user'], $db['pass']);
    if( !R::testConnection() ){
        throw new \Exception("Нет соединения с БД", 500);
    }



    }

}