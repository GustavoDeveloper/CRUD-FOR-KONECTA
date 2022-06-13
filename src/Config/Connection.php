<?php

namespace CoffeKonecta\Config;

use \PDO;

class Connection{

    protected $dsn;
    protected $user_db; 
    protected $password_db;

    public function __construct(){
        $this->dsn = 'mysql:dbname=coffekonecta;host=localhost';
        $this->user_db = 'root';
        $this->password_db = '';
    }
    
    public function connect(){
        
        try{
            $pdo = new PDO( $this->dsn, $this->user_db, $this->password_db );
            return $pdo;
        }catch( PDOException $e ){
            return 'Error al conectarnos: ' . $e->getMessage();
        }

    }

}