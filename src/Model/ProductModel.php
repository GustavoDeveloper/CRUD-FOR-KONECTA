<?php

namespace CoffeKonecta\Model;

use CoffeKonecta\Config\DBMethods;
use \Exeption;

class ProductModel
{
    protected $connection;
    public $products;

    public function __construct(){
        $this->connection = new DBMethods;
        $this->statement = $this->connection->__construct();
    }

    public function getData($sql)
    {
        try {            
            $query = $this->statement->prepare($sql);
            $query->execute(array());
            $data = $query->fetchAll();          
            return $data;
        } catch (\Exeption $e) {
            throw new \Exception('Error. ');
        }
    }

}