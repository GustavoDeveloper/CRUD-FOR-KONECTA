<?php

namespace CoffeKonecta\Model;

use CoffeKonecta\Config\DBMethods;

class HomeModel{
    private $user;
    private $pass;
    
    public function __construct($user, $pass)
    {
        $this->user = $user;
        $this->pass = $pass;
    }

    public function getData()
    {
        try {
            $getdata = new DBMethods;
            $sql = "SELECT user, pass from user WHERE user = $this->user AND pass = $this->pass";
            $getdata->query($sql);
            return $getdata->fetchALl();
        } catch (\Throwable $e) {
            throw  $e->getMessage();
        }
    }
}