<?php
//CONSULTA A LA BASE DE DATOS

include ROOT . "/models/Registro.php";
include ROOT . "/repositories/RegistrosRepo.php";
include ROOT . "/repositories/CategoriasRepo.php";



class RegistroController{
	function agregar(){
		$sexos = ["Masculino" => "Masculino", "Femenino" => "Femenino"];
		$registro = new Registro();
		$registro->setData($_POST);
		$repo = new CategoriasRepo();
		$categorias = $repo->lista();
		var_dump($registro);
		view('registro/agregar',compact('categorias','registro','sexos'));
	}
	function guardar(){		

		$registro = new Registro();
		$registro->setData($_POST);

		if($registro->save()){
			setSession('mensaje',"El Usuarios se creo satisfactoriamente.");
			redirect('');
		}else{		
			$errors = $registro->errors;

			setSession('errores', $errors);
			redirect('registro/agregar');
			//view('alumnos/agregar',compact('errors'));
		}
	}
	function login(){
		$correo = $_POST ["correo_electronico"];
		$contra = $_POST ["contrasena"];
		$repo = new RegistrosRepo();//enviar valores
		$registro = $repo->login($correo,$contra);
		if ($registro == true){
			redirect('perfiles/modificar');
		}else
			redirect('');
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
			setSession('mensaje',"El registro se actualizado correctamente.");
			redirect('perfiles/ver');
		}else{		
			$errors = $registro->errors;	
			setSession('errores', $errors);
			redirect('');
			//view('alumnos/agregar',compact('errors'));
		}

	}	

}