<?php

namespace CoffeKonecta\Controller;
use CoffeKonecta\Config\Controller;

class EditController extends Controller{

    private $view;
    private $model;
    private $getModel;

    public function __construct(){
		$this->model = new Controller;
		$this->view = new Controller;
		$this->getModel = $this->model->getModel('EditModel');
	}

	public function getProduct($id)
	{
        $sql_data = "SELECT * FROM products AS T0 WHERE T0.id = $id";
        $sql_category = 'SELECT T0.id, T0.category_name FROM product_category AS T0';
        $data = $this->getModel->getData($sql_data);
        $category = $this->getModel->getData($sql_category);
        return $datos = [ 'category' => $category, 'data' => $data];
	}
    
    public function EditProduct($id)
	{

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

			$params = [
				'id' => trim($_POST['id']),
				'product_name' => trim($_POST['product_name']),
				'reference' => trim($_POST['reference']),
				'price' => trim($_POST['price']),
				'wegith' => trim($_POST['wegith']),
				'category' => trim($_POST['category']),
				'stock' => trim($_POST['stock'])
			];
			$ref = trim($_POST['reference']);
            
            if ( $data = $this->getModel->EditProduct($params) == true ) {
                redirect('products');
                unset($params);
            }else {
                $this->index("La referencia ".$ref." no ha sido actualizada", false);
            }
            
		}else {
            $datos = $this->getProduct($id);
            $this->view->getView('EditView', $datos);
        }
	}
    
	public function index($message = null, $alert = null, $id = null){
        $data = $this->getProduct($id);
        $datos = [ 'product' => $data, 'message' => $message, 'alert' => $alert];
		$this->view->getView('EditView', $datos);

    }

	

}