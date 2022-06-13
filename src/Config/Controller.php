<?php

namespace CoffeKonecta\Config;

use CoffeKonecta\Model\LoginModel;
use CoffeKonecta\Model\HomeModel;
use CoffeKonecta\Model\ProductModel;
use CoffeKonecta\Model\SaleModel;
use CoffeKonecta\Model\AddModel;
use CoffeKonecta\Model\EditModel;
use CoffeKonecta\Model\DeleteModel;

class Controller{

    public function __construct(){}

    public function getModel($model)
	{
        if (file_exists('src/Model/'.$model.'.php')) {
            if ( $model == 'LoginModel') {
                return $model = new LoginModel;
            }elseif ( $model == 'HomeModel') {
                return $model = new HomeModel;
            }elseif ( $model == 'ProductModel') {
                return $model = new ProductModel;
            }elseif ( $model == 'SaleModel') {
                return $model = new SaleModel;
            }elseif ( $model == 'AddModel') {
                return $model = new AddModel;
            }elseif ( $model == 'EditModel') {
                return $model = new EditModel;
            }elseif ( $model == 'DeleteModel') {
                return $model = new DeleteModel;
            }
        }
        else {
            die('No se econtro el modelo');
        }
		return new $model;
	}

    public function getView($view, $data = [])
	{
        if (file_exists('src/Views/'.$view.'.php')) {
            require_once 'src/Views/'.$view.'.php';
        }
        else {
            die('No se econtro la vista');            
        }
	}
}