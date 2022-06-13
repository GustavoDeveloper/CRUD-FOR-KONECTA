<?php

namespace CoffeKonecta\Controller;
use CoffeKonecta\Config\Controller;

class AddController extends Controller{

    private $view;
    private $model;
    private $getModel;

    public function __construct(){
		$this->model = new Controller;
		$this->view = new Controller;
		$this->getModel = $this->model->getModel('AddModel');
	}

	public function addProduct()
	{
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			
			$params = [
				'product_name' => trim($_POST['product_name']),
				'reference' => trim($_POST['reference']),
				'price' => trim($_POST['price']),
				'wegith' => trim($_POST['wegith']),
				'category' => trim($_POST['category']),
				'stock' => trim($_POST['stock'])
			];
            
		    $validate = $this->getModel->Validate(trim($_POST['reference']));

            if ( $validate >= 1 ) {
                $this->index("La referencia ".trim($_POST['reference'])." ya existe", false);
            }else {
                if ( $data = $this->getModel->CreateProduct($params) == true ) {
                    $this->index("La referencia ".trim($_POST['reference'])." ha sido agregada", true);
                    unset($params);
                }else {
                    die('Error al añadir producto');
                }
            }
		}else {
            unset($params);
            $this->index();
		}
	}

	public function index($message = null, $alert = null){
		$data = $this->getModel->getData();
        $datos = [ 'category' => $data, 'message' => $message, 'alert' => $alert];
		$this->view->getView('AddView', $datos);

    }

	

}