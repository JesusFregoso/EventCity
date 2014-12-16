<?php

class Request{
	
	var $url;
	var $controller;
	var $defaultController="home";
	var $action;
	var $defaultAction="index";
	var $parametros=array();

	public function __construct($url){
		$this->url = $url;

		//personas/editar/1

		$segmentos = explode("/",$this->url);

		$this->resolveController($segmentos);		
		$this->resolveAction($segmentos);		
		$this->resolveParameters($segmentos);		
		//$segmentos[0] = personas
		//$segmentos[1] = editar
		//$segmentos[2] = 1
	}

	public function resolveController(&$segmentos){

		$this->controller = array_shift($segmentos);

		if(empty($this->controller)){
			$this->controller = $this->defaultController;
		}
		//$segmentos[0] = editar
		//$segmentos[1] = 1
	}

	public function resolveAction(&$segmentos){
		$this->action = array_shift($segmentos);

		if(empty($this->action)){
			$this->action = $this->defaultAction;
		}
	}

	public function resolveParameters(&$segmentos){
		$this->parametros = $segmentos;
	}

	public function execute(){		

		$className = ucfirst($this->controller)."Controller";

		$file = ROOT."/controllers/".$className.".php";			
		
		if(file_exists($file)){

			session_start();

			require $file;
		
			$controller = new $className();

			call_user_func_array(array($controller, $this->action), $this->parametros);

		}else{
			header("HTTP/1.0 404 Not Found");
			exit("Pagina no Encontrada");
		}

	}
}








