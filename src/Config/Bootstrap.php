<?php 

namespace CoffeKonecta\Config;

use CoffeKonecta\Controller\LoginController;
use CoffeKonecta\Controller\HomeController;
use CoffeKonecta\Controller\ProductsController;
use CoffeKonecta\Controller\SalesController;
use CoffeKonecta\Controller\AddController;
use CoffeKonecta\Controller\EditController;
use CoffeKonecta\Controller\DeleteController;


class Bootstrap 
{

	protected $controller = "Products";
	protected $method = "index";
	protected $params = [];

    public function __construct()
	{
		$url = $this->getUrl();
		$controllerFile = "src/Controller/".ucwords($url[0])."Controller.php";
		if (file_exists($controllerFile)) {
			$this->controller = ucwords($url[0])."Controller";
			unset($url[0]);
		}

		if ( $this->controller == 'LoginController') {
			$this->controller = new LoginController;
		}elseif ( $this->controller == 'HomeController') {
			$this->controller = new HomeController;
		}elseif ( $this->controller == 'ProductsController') {
			$this->controller = new ProductsController;
		}elseif ( $this->controller == 'SalesController') {
			$this->controller = new SalesController;
		}elseif ( $this->controller == 'AddController') {
			$this->controller = new AddController;
		}elseif ( $this->controller == 'EditController') {
			$this->controller = new EditController;
		}elseif ( $this->controller == 'DeleteController') {
			$this->controller = new DeleteController;
		}
		

		if (isset($url[1])) {
			if (method_exists($this->controller , $url[1])) {
				$this->method = $url[1];
				unset($url[1]);
			}
		}
		
		$this->params = $url ? array_values($url) : [];
		call_user_func_array(
			[
				$this->controller,
				$this->method
			],
			$this->params
		);
		unset($url[2]);

	}

	public function getUrl()
	{
		if (isset($_GET['url'])) {
			$url = rtrim($_GET['url'], '/');
			$url = filter_var($url, FILTER_SANITIZE_URL);
			$url = explode('/', $url);
			return $url;
		}else {
			return $url = [ 0 => "Products"];
		}
	}
}