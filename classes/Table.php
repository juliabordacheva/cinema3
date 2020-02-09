<?php


class Table extends Db
{
    public $attributes = [];

 public function __construct()
 {
     Db::instance();
 }

    public function load($data) {
        foreach($this->attributes as $name => $value){
            if(isset($data[$name])){
                $this->attributes[$name] = $data[$name];
            }
        }
 }
}