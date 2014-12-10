<?php

include("BaseRepo.php");

class EventosRepo extends BaseRepo{

    function getModel(){
        return new Evento();
    }    

	function eventos(){
		$mysql = new DBMannager();
		$mysql->connect();

		$mysql->execute("SELECT * FROM eventos");
		$result = $mysql->getArray();


        return $this->arrayModel($result);
	}
    
    function actualizar(){
        $repo = new EventosRepo();
        $evento = $repo->find(getSession('id'));       
        $evento->setData($_POST);

        if($evento->save()){
            setSession('mensaje',"El Evento se Creo Satisfactoriamente.");
            redirect('eventos/lista');
        }else{      
            $errors = $evento->errors; 
            setSession('errores', $errors);
            redirect('');
            //view('alumnos/agregar',compact('errors'));
        }

    }
}