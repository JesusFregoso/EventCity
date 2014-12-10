<?php
//CONSULTA A LA BASE DE DATOS

include ROOT . "/models/Evento.php";
include ROOT . "/repositories/EventosRepo.php";
include ROOT . "/repositories/CategoriasRepo.php";
include ROOT . "/repositories/CategoriasEventosRepo.php";



class EventosController{

	function __construct() {
		
	}
	function lista(){		
		$repo = new EventosRepo();
		$eventos = $repo->eventos();
		view('eventos/lista',compact('eventos'));
	}
	function agregar(){
		$evento = new Evento();
		$evento->setData($_POST);
		$repo = new CategoriasEventosRepo();
		$eventos = $repo->lista();
		view('eventos/agregar',compact('eventos','evento'));
	}
	function guardar(){		

		$evento = new Evento();
		$evento->setData($_POST);

		if($evento->save()){
			setSession('mensaje',"El Evento se creo satisfactoriamente.");
			redirect('eventos/lista');
		}else{		
			$errors = $evento->errors;

			setSession('errores', $errors);
			redirect('eventos/agregar');
			//view('alumnos/agregar',compact('errors'));
		}
	}
	function login(){
		$correo = $_POST ["correo_electronico"];
		$contra = $_POST ["contrasena"];
		$repo = new RegistrosRepo();//enviar valores
		$registro = $repo->login($correo,$contra);
		 
		}
	function cerrar(){
        session_destroy();
		redirect('');
	}

	function modificar(){
		$repo = new RegistrosRepo();
		$registro = $repo->find(getSession('id'));

		view('perfiles/ver',compact('registro')); 
	}
	function actualizar(){
		$repo = new RegistrosRepo();
		$registro = $repo->find(getSession('id'));		
		$registro->setData($_POST);

		if($registro->save()){
			setSession('mensaje',"El registro se actualizo correctamente.");
			redirect('perfiles/ver');
		}else{		
			$errors = $registro->errors;	
			setSession('errores', $errors);
			redirect('');
			//view('alumnos/agregar',compact('errors'));
		}

	}	

}