<?php

namespace CoffeKonecta\Controller;
use CoffeKonecta\Config\Controller;

class ProductsController extends Controller{

    private $view;
    private $model;
    private $getModel;

    public function __construct(){
		$this->model = new Controller;
		$this->view = new Controller;
		$this->getModel = $this->model->getModel('ProductModel');
		
	}

	public function index($message = null, $alert = null){

		$sql_list = 'SELECT T0.id, T0.product_name, T0.reference, T0.price, T0.wegith, T1.category_name, T0.stock, T0.creation_date FROM products AS T0 LEFT JOIN product_category AS T1 ON T0.category = T1.id';

		$sql_sell = 'SELECT T1.product_name, SUM(T0.quantity) as quantity
		FROM sale_order_product as T0
		LEFT JOIN products AS T1 ON T0.product_id = T1.id
		GROUP BY T1.id
		ORDER BY SUM(T0.quantity) DESC LIMIT 1';

		$sql_stock = 'SELECT reference, product_name FROM products WHERE stock = (SELECT MAX(stock) FROM products)';

		$data_list = $this->getModel->getData($sql_list);
		$data_sell = $this->getModel->getData($sql_sell);
		$data_stock = $this->getModel->getData($sql_stock);

		$datos = [
			'productos' => $data_list,
			'sell' => $data_sell,
			'stock' => $data_stock,
			'message' => $message,
			'alert' => $alert
		];

		$this->view->getView('ProductsView', $datos);

    }
	

}