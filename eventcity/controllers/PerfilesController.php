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
    
    /**
     * [Funcion Actualizar viene despues de modificar los datos para actualizarlos en la base de datos]
     * @return [array] [regresa a la vista del perfil con los datos actualizados]
     */
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
    /**
     * [funcion menu envia los eventos creados por un usuario para mostraslos en su menu]
     */
     public function menu(){

        $repo = new PerfilesRepo();
        $eventos = $repo->eventos();
        redirect('perfiles/muro',compact('eventos'));
    }
    /**
     * [Funcion muro muestra solo los eventos seguidos por una persona]
     */
    public function muro(){

        $repo = new PerfilesRepo();
        $seguidos = $repo->seguidos();
        view('perfiles/muro',compact('seguidos'));
    }
    /**
     * [funcion guardar guarda el seguidor]
     * @param  [int] $id_siguiendo [id del usuario a seguir]
     */
    function guardar($id_siguiendo){     

        $carrera = new Seguidor();
        $carrera->setData($_POST);

        if($carrera->save()){
            $mensaje="seguido.";
            view('eventos/lista');
        }else{      
            $errors = $carrera->errors; 
            view('eventos/lista',compact('errors'));
        }
        

        //var_dump($_POST);
    }

}
