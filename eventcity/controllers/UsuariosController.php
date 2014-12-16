<?php
//CONSULTA A LA BASE DE DATOS

include ROOT . "/models/Usuario.php";
include ROOT . "/models/Publicacion.php";
include ROOT . "/repositories/UsuariosRepo.php";
include ROOT . "/repositories/PublicacionesRepo.php";

class UsuariosController{

	public function login(){		
		view('login');
	}
	/**
	 * [funcion loginpost ingresas como usuario a la pagina]
	 */
	public function loginpost(){	
		$datos = $_POST;
		$correo = $datos['correo_electronico'];
		$password = $datos['contrasena'];
		$repo = new UsuariosRepo();
		if($repo->login($correo,$password)){
			redirect('eventos/lista');
		}else{
			setSession('errores',array("Usuario o contraseña no valida"));
			redirect('');
		}
	}
	/**
	 * [funcion logout destruye la session de un usuario al salir de la pagina]
	 */
	public function logout(){
		session_destroy();
		redirect('');
	}
	/**
	 * [funcion publicar publicar como el usuario conectado aun no implementada]
	 */
	public function publicar(){
		$publicacion = new Publicacion();
		$publicacion->setData($_POST);

		if($publicacion->save()){
			setSession('mensaje',"Tu publicacion se ha agregado correctamente.");
			redirect('perfiles/muro');
		}else{
			$errors = array("Ocurrio un error, intenta de nuevo.");
			redirect('perfiles/muro');
		}
	}
	
}


