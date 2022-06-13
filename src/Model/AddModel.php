<?php

namespace CoffeKonecta\Model;

use CoffeKonecta\Config\DBMethods;
use \Exeption;

class AddModel
{
    protected $connection;
    protected $statement;

    public function __construct(){
        $this->connection = new DBMethods;
        $this->statement = $this->connection->__construct();
    }

    public function getData()
    {
        try {
            $sql = 'SELECT T0.id, T0.category_name FROM product_category AS T0';
            $query = $this->statement->prepare($sql);
            $query->execute(array());
            $data = $query->fetchAll();          
            return $data;
        } catch (\Exeption $e) {
            throw new \Exception('Error');
        }
    }

    public function Validate($params)
    {
        try {
            $sql = "SELECT T0.reference FROM products AS T0 WHERE T0.reference = '$params'";
            $query = $this->statement->prepare($sql);
            $query->execute(array());
            $data = $query->rowCount();
            return $data;
        } catch (\Exeption $e) {
            throw new \Exception('Error');
        }
    }

    public function CreateProduct($params)
    {
        try {
            $sql = "INSERT INTO products
				(product_name,
				reference,
				price,
				wegith,
				category,
				stock)
				VALUES ( '$params[product_name]', '$params[reference]', $params[price], $params[wegith], $params[category], $params[stock])";
            $query = $this->statement->prepare($sql);
            $query->execute(array());
            return true;
        } catch (\Exeption $e) {
            throw new \Exception('Error');
        }
    }


}