<?php

namespace CoffeKonecta\Controller;

use CoffeKonecta\Model\LoginModel;
use CoffeKonecta\Config\Controller;

class LoginController{

    protected $user;
    protected $pass;
    private $view;
    private $model;
    
    public function __construct(){}

    public function index(){
        $this->view = new Controller;
        $this->view->getView('LoginView');
    }

    public function login( $params )
    {
        $LoginModel = new LoginModel;
        $LoginModel->getData();

        if ( !isset($LoginModel) ) {
            session_start();
            $_SESSION['Online'] = true;
            return true;

        }else{
            return false;
        }
    }

    public function logout()
    {
        session_start();
        if(session_destroy()) {
            $_SESSION['usuario'] = null;
            $_SESSION['perfil'] = null;
            session_unset();
            header("Location: index.php");
        }
    }

}