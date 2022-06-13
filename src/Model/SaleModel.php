<?php

namespace CoffeKonecta\Model;

use CoffeKonecta\Config\DBMethods;
use \Exeption;

class SaleModel
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
            $sql = 'SELECT T0.id, T0.product_name FROM products AS T0';
            $query = $this->statement->prepare($sql);
            $query->execute(array());
            $data = $query->fetchAll();          
            return $data;
        } catch (\Exeption $e) {
            throw new \Exception('Error');
        }
    }

    public function CreateSale($params)
    {
        
        $stock = $this->getStock($params['item']);
        
        if ( $stock['stock'] >= 1 ) {
            if ( $params['item'] > $stock['stock'] ) {

            $sql_sale_order = "INSERT INTO sale_order (client, amount, payment_method, user) VALUES ( 1, 30000, 1, 1 )";
            $query = $this->statement->prepare($sql_sale_order);
            $query->execute(array());

            $lastorder = $this->lastOrder(1);
            $sql_sale_order_product = "INSERT INTO sale_order_product (order_id , product_id, quantity) VALUES ( $lastorder[id], $params[item], $params[stock] )";
            $query = $this->statement->prepare($sql_sale_order_product);
            $query->execute(array());
            $this->uptadeStock($params['item'], $params['stock']);
        
            return true;
            }else {
                return false;
            }
            
        }else {
            return false;
        }

    }

    public function getStock($id)
    {

        $sql = "SELECT T0.stock FROM products AS T0 WHERE T0.id = $id";
        $query = $this->statement->prepare($sql);
        $query->execute(array());
        $stock = $query->fetch();
        return $stock;

    }

    public function lastOrder($client)
    {

        $sql = "SELECT T0.id FROM sale_order AS T0 WHERE T0.client = $client ORDER BY T0.id DESC  LIMIT 1";
        $query = $this->statement->prepare($sql);
        $query->execute(array());
        $lastOrder = $query->fetch();
        return $lastOrder;

    }

    public function uptadeStock($id, $quantity)
    {

        $sql = "UPDATE products AS T0 SET T0.stock = T0.stock - $quantity WHERE id = $id";
        $query = $this->statement->prepare($sql);
        $query->execute(array());
        return true;

    }


}