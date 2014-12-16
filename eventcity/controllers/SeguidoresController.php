<?php
//CONSULTA A LA BASE DE DATOS

include ROOT . "/models/Seguidor.php";
include ROOT . "/repositories/SeguidoresRepo.php";

class SeguidoresController{

	public function loginpost(){	
		$datos = $_POST;
		$correo = $datos['correo_electronico'];
		$password = $datos['contrasena'];
		$repo = new UsuariosRepo();
		if($repo->login($correo,$password)){
			redirect('perfiles/muro');
		}else{
			setSession('errores',array("Usuario o contraseña no valida"));
			redirect('');
		}
	}
/*select eventos.nombre from 
eventos left join seguidores 
on seguidores.id_evento = eventos.id
 where seguidores.id_seguidor = 7 and
  seguidores.id_usuario = 6*/
	public function logout(){
		session_destroy();
		redirect('');
	}

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


