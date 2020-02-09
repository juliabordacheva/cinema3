<?php


class User
{
    private $logged = false;
    public $email;



    public function __construct($session_data = null)
    {
        if (is_array($session_data) && isset($session_data['email'])) {
            $this->logged = true;
            $this->email = $session_data['email'];


        } elseif (isset($_COOKIE['email'])) {
            $this->logged = true;
            $this->email = $_COOKIE['email'];


        }
    }

    public function isLogged()
    {
        return $this->logged;
    }
}