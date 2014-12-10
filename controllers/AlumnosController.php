<?php
//CONSULTA A LA BASE DE DATOS

include ROOT . "/models/Alumno.php";
include ROOT . "/models/Carrera.php";
include ROOT . "/repositories/AlumnosRepo.php";
include ROOT . "/repositories/CarrerasRepo.php";

class AlumnosController{

	function __construct() {
		
	}

	function lista(){		
		$repo = new AlumnosRepo();
		$alumnos = $repo->alumnos();
		view('alumnos/lista',compact('alumnos'));
	}

	function agregar(){
		$repo = new CarrerasRepo();
		$carreras = $repo->lista();
		view('alumnos/agregar', compact('carreras'));
	}

	function guardar(){		

		$alumno = new Alumno();
		$alumno->setData($_POST);

		if($alumno->save()){
			setSession('mensaje',"El alumno se agrego correctamente.");
			redirect('alumnos/agregar');
		}else{		
			$errors = $alumno->errors;	
			setSession('errores', $errors);
			redirect('alumnos/agregar');
			//view('alumnos/agregar',compact('errors'));
		}
	}	

	function modificar($id){
		$repo = new AlumnosRepo();
		$alumno = $repo->find($id);
		$repoCarrera = new CarrerasRepo();
		$carreras = $repoCarrera->lista();
		view('alumnos/agregar',compact('alumno','carreras')); 
	}

	function actualizar($id){
		$repo = new AlumnosRepo();
		$alumno = $repo->find($id);		
		$alumno->setData($_POST);

		if($alumno->save()){
			setSession('mensaje',"El alumno se actualizado correctamente.");
			redirect('alumnos/modificar/'.$id);
		}else{		
			$errors = $alumno->errors;	
			setSession('errores', $errors);
			redirect('alumnos/modificar/'.$id);
			//view('alumnos/agregar',compact('errors'));
		}

	}

	function eliminar($id){

		$repo = new AlumnosRepo();
		$alumno = $repo->find($id);

		$alumno->delete();			
		setSession('mensaje',"El alumno se ha eliminado correctamente.");
		redirect('alumnos/lista');
	}
}
