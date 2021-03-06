<?php
//CONSULTA A LA BASE DE DATOS

include ROOT . "/models/Registro.php";
include ROOT . "/models/Publicacion.php";
include ROOT . "/repositories/PublicacionesRepo.php";
include ROOT . "/repositories/RegistrosRepo.php";
include ROOT . "/repositories/CategoriasRepo.php";



class RegistroController{
	/**
	 * [funcion agregar agregar los datos en un arreglo para pasar a guardarlos en la base de datos]
	 * @return [array] [agrega el resgristo]
	 */
	function agregar(){
		$sexos = ["Masculino" => "Masculino", "Femenino" => "Femenino"];
		$registro = new Registro();
		$registro->setData($_POST);
		$repo = new CategoriasRepo();
		$categorias = $repo->lista();
		view('registro/agregar',compact('categorias','registro','sexos'));
	}
	/**
	 * [funcion guardar guarda el registro en la base de datos]
	 */
	function guardar(){		

		$registro = new Registro();
		$registro->setData($_POST);

		if($registro->save()){
			setSession('mensaje',"El Usuario se creo satisfactoriamente.");
			redirect('');
		}else{		
			$errors = $registro->errors;

			setSession('errores', $errors);
			redirect('registro/agregar');
			//view('alumnos/agregar',compact('errors'));
		}
	}

}