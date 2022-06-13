<?php

namespace CoffeKonecta\Model;

use CoffeKonecta\Config\DBMethods;
use \Exeption;

class EditModel
{
    protected $connection;
    protected $statement;

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
            throw new \Exception('Error');
        }
    }

    public function EditProduct($params)
    {
        try {
            $sql = "UPDATE products AS T0 SET
            T0.product_name = '$params[product_name]',
            T0.reference = '$params[reference]',
            T0.price = $params[price],
            T0.wegith = $params[wegith],
            T0.category = $params[category],
            T0.stock = $params[stock],
            T0.update_date = NOW()
            WHERE id = $params[id]";
            $query = $this->statement->prepare($sql);
            $query->execute(array());
            return true;
        } catch (\Exeption $e) {
            throw new \Exception('Error');
        }
    }


}