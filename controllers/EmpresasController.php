<?php
//CONSULTA A LA BASE DE DATOS

include ROOT . "/models/Persona.php";

class EmpresasController{

	function __construct() {
		
	}

	function lista(){
			
		$modelPersona = new Persona();
		$personas = $modelPersona->personas();

		view('empresas/lista',compact('personas'));
	}

	function agregar(){
		view('empresas/agregar');	
	}
}


