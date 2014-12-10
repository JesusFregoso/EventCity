<?php
//CONSULTA A LA BASE DE DATOS

include ROOT . "/models/Carrera.php";
include ROOT . "/repositories/CarrerasRepo.php";


class CarrerasController{

	

	function lista(){	
	  $repo = new CarrerasRepo();
		$carreras = $repo->carreras();
		view('carreras/lista',compact('carreras'));		
		
	}

	function agregar(){

		view('carreras/agregar');
	}

	function guardar(){		

		$carrera = new Carrera();
		$carrera->setData($_POST);

		if($carrera->save()){
			$mensaje="La carrera se agrego correctamente.";
			view('carreras/agregar',compact('mensaje'));
		}else{		
			$errors = $carrera->errors;	
			view('carreras/agregar',compact('errors'));
		}
		}
function modificar($id){
		$repo = new CarrerasRepo();
		$carrera = $repo->find($id);

		view('carreras/agregar',compact('carrera')); 
	}

	function actualizar($id){
		$repo = new CarrerasRepo();
		$carrera = $repo->find($id);		
		$carrera->setData($_POST);

		if($carrera->save()){
			setSession('mensaje',"La Carrera se actualizado correctamente.");
			redirect('carreras/modificar/'.$id);
		}else{		
			$errors = $carrera->errors;	
			setSession('errores', $errors);
			redirect('carreras/modificar/'.$id);
			//view('carreras/agregar',compact('errors'));
		}

	}

	function eliminar($id){

		$repo = new CarrerasRepo();
		$carrera = $repo->find($id);

		$carrera->delete();			
		setSession('mensaje',"La Carrera se ha eliminado correctamente.");
		redirect('carreras/lista');
	}
		//var_dump($_POST);
	
}


