<?php
//CONSULTA A LA BASE DE DATOS

include ROOT . "/models/Escuela.php";
include ROOT . "/repositories/EscuelasRepo.php";


class EscuelasController{

	

	function lista(){	
	  $repo = new EscuelasRepo();
		$escuelas = $repo->escuelas();
		view('escuelas/lista',compact('escuelas'));		
		
	}

	function agregar(){

		view('escuelas/agregar');
	}

	function guardar(){		

		$escuela = new Escuela();
		$escuela->setData($_POST);

		if($escuela->save()){
			$mensaje="La escuela se agrego correctamente.";
			view('escuelas/agregar',compact('mensaje'));
		}else{		
			$errors = $escuela->errors;	
			view('escuelas/agregar',compact('errors'));
		}
		}
function modificar($id){
		$repo = new EscuelasRepo();
		$escuela = $repo->find($id);

		view('escuelas/agregar',compact('escuela')); 
	}

	function actualizar($id){
		$repo = new EscuelasRepo();
		$escuela = $repo->find($id);		
		$escuela->setData($_POST);

		if($escuela->save()){
			setSession('mensaje',"La escuela se actualizado correctamente.");
			redirect('escuelas/modificar/'.$id);
		}else{		
			$errors = $escuela->errors;	
			setSession('errores', $errors);
			redirect('escuelas/modificar/'.$id);
			//view('escuelas/agregar',compact('errors'));
		}

	}

	function eliminar($id){

		$repo = new EscuelasRepo();
		$escuela = $repo->find($id);

		$escuela->delete();			
		setSession('mensaje',"La escuela se ha eliminado correctamente.");
		redirect('escuelas/lista');
	}
		//var_dump($_POST);
	
}


