<?php

namespace CoffeKonecta\Config;

use CoffeKonecta\Config\Connection;

class DBMethods
{
    protected $connection;

    public function __construct(){
        $this->connection = new Connection;
        return $this->connection->connect();
    }

}
