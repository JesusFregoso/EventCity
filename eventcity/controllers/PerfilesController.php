<?php
//CONSULTA A LA BASE DE DATOS

include ROOT . "/models/Registro.php";
include ROOT . "/repositories/RegistrosRepo.php";

include ROOT . "/repositories/CategoriasRepo.php";

include ROOT . "/models/Perfil.php";
include ROOT . "/repositories/perfilesRepo.php";

include ROOT . "/models/Usuario.php";
include ROOT . "/repositories/UsuariosRepo.php";

include ROOT . "/models/Evento.php";
include ROOT . "/repositories/EventosRepo.php";

include ROOT . "/models/Seguidor.php";
include ROOT . "/repositories/SeguidoresRepo.php";


class PerfilesController{

	
	function perfil(){

		view('perfiles/ver');
	}
    /**
     * Funcion Modificar el perfil
     * @return [array] [regresar el perfil ya creado para pasar a actualizarlo]
     */
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
            setSession('mensaje',"El usuario se actualizo correctamente.");
            redirect('perfiles/ver');
        }else{      
            $errors = $usuario->errors; 
            setSession('errores', $errors);
            redirect('');
            //view('seguidors/agregar',compact('errors'));
        }

    }
     public function menu(){

        $repo = new PerfilesRepo();
        $eventos = $repo->eventos();
        redirect('perfiles/muro',compact('eventos'));
    }
    public function muro(){

        $repo = new PerfilesRepo();
        $seguidos = $repo->seguidos();
        view('perfiles/muro',compact('seguidos'));
    }

    function guardar($id_siguiendo){     

        $carrera = new Seguidor();
        $carrera->setData($_POST);

        if($carrera->save()){
            $mensaje="su puta madre dice que si.";
            view('eventos/lista');
        }else{      
            $errors = $carrera->errors; 
            view('eventos/lista',compact('errors'));
        }
        

        //var_dump($_POST);
    }

}
