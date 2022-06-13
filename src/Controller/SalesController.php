<?php

namespace CoffeKonecta\Controller;
use CoffeKonecta\Config\Controller;

class SalesController extends Controller{

    private $view;
    private $model;
    private $getModel;

    public function __construct(){
		$this->model = new Controller;
		$this->view = new Controller;
		$this->getModel = $this->model->getModel('SaleModel');
	}

	public function addSale()
	{
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			
			$params = [
				'item' => trim($_POST['item']),
				'stock' => trim($_POST['stock']),
			];

            if ( $this->getModel->CreateSale($params) == true ) {
                redirect('products');
                unset($params);
            }elseif ( $this->getModel->CreateSale($params) == false ){
                $this->index("Producto sin suficiente stock", false);
                unset($params);
            }else{
                die('Error inesperado');
            }
            
		}else {
            unset($params);
            $this->index();
		}
	}

	public function index($message = null, $alert = null){
		$data = $this->getModel->getData();
        $datos = [ 'item' => $data, 'message' => $message, 'alert' => $alert];
		$this->view->getView('SalesView', $datos);

    }
    
}