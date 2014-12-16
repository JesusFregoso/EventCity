<?php
//CONSULTA A LA BASE DE DATOS

include ROOT . "/models/Evento.php";
include ROOT . "/repositories/EventosRepo.php";
include ROOT . "/repositories/CategoriasRepo.php";
include ROOT . "/repositories/CategoriasEventosRepo.php";



class EventosController{

	function __construct() {
		
	}
	/**
	 * Funcion Agregar un nuevo evento
	 */
	function agregar(){
		$evento = new Evento();
		$evento->setData($_POST);
		$repo = new CategoriasEventosRepo();
		$eventos = $repo->lista();
		view('eventos/agregar',compact('eventos','evento'));
	}
	/**
	 * Funcion de Buscar Un Evento No implementada Aun
	 */
	function buscar(){
		$datos = $_POST;
		$eventos = $datos['nombre'];
		var_dump($eventos);
		$repo = new EventosRepo();
		if($repo->buscar($evento)) {
		view('eventos/lista',compact('eventos'));
		} else {
		view('eventos/lista');
		}
	}
	/**
	 * Funcion Guarda Evento despues de agregarlo
	 */
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
	/**
	 * Funcion muro publica todo las publicaciones echas por un evento en su muro no implementada aun
	 */
	public function muro(){

        $repo = new EventosRepo();
        $eventos = $repo->eventoscreacion();

        view('eventos/muro',compact('eventos'));
    }
    /**
     * Funcion Lista Muestra Todos Los Eventos En una Lista
     */
    public function lista(){

        $repo = new EventosRepo();
        $eventos = $repo->eventos();
        $megustaArray = $repo->getMeGusta();
        $megusta = array();
		$seguirArray = $repo->getSeguidores();
        $seguir = array();
		foreach($megustaArray as $registro){
			$megusta[$registro['id_evento']] = $registro['megusta'];
		}
		foreach($seguirArray as $seguidor){
			$seguir[$seguidor['id_evento']] = $seguidor['id_evento'];
		}
        view('eventos/lista',compact('eventos','megusta','seguir'));
    }
    /**
     * Funcion Seguir Un Evento
     * @param  [int] $sige [id del usuario a seguir]
     * @param  [int] $user [id del usuario que sigue]
     * @param  [int] $eve  [id del evento]
     * @return [array]       [regresa solo los eventos del usuario al que se sigue]
     */
    public function seguir($sige,$user,$eve){

        $repo = new EventosRepo();
        $eventos = $repo->seguir($sige,$user,$eve);

        view('eventos/muro');
    }
    /**
     * Funcion Dejar de Seguir un evento
     * @param  [type] $user [description]
     * @param  [type] $eve  [description]
     * @return [type]       [description]
     */
    public function dejarseguir($user,$eve){

        $repo = new EventosRepo();
        $eventos = $repo->dejarseguir($user,$eve);
        view('eventos/lista');
    }

    public function megusta($user,$eve){

        $repo = new EventosRepo();
        $eventos = $repo->megusta($user,$eve);

        redirect('eventos/lista');
    }
    public function nomegusta($eve,$user){

        $repo = new EventosRepo();
        $eventos = $repo->nomegusta($eve,$user);
        redirect('eventos/lista');
    }	



}