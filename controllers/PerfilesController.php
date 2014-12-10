<?php
//CONSULTA A LA BASE DE DATOS

include ROOT . "/models/Registro.php";
include ROOT . "/repositories/RegistrosRepo.php";
include ROOT . "/repositories/CategoriasRepo.php";


class PerfilesController{

	
	function perfil(){

		view('perfiles/ver');
	}

	function modificar(){
		$sexos = ["Masculino" => "Masculino", "Femenino" => "Femenino"];
		$repo = new CategoriasRepo();
		$categorias = $repo->lista();
        $repo = new RegistrosRepo();
        $usuario = $repo->find(getSession('id'));
        view('perfiles/ver',compact('usuario','sexos','categorias')); 
    }
    function actualizar(){
        $repo = new RegistrosRepo();
        $usuario = $repo->find(getSession('id'));       
        $usuario->setData($_POST);

        if($usuario->save()){
            setSession('mensaje',"El usuario se actualizado correctamente.");
            redirect('perfiles/ver');
        }else{      
            $errors = $usuario->errors; 
            setSession('errores', $errors);
            redirect('');
            //view('alumnos/agregar',compact('errors'));
        }

    }
}
