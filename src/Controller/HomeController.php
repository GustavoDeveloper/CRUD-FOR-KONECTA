<?php

namespace CoffeKonecta\Controller;
use CoffeKonecta\Config\Controller;


class HomeController extends Controller{

	private $view;

    public function __construct(){}

	public function index(){
        $this->view = new Controller;
        $this->view->getView('HomeView');
    }

}