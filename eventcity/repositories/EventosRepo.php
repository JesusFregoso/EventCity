<?php

require_once("BaseRepo.php");
/**
 * Repositorio de los eventos
 */
class EventosRepo extends BaseRepo{

    function getModel(){
        return new Evento();
    }    
    /**
     * Funcion de eventos
     * @return [type] [description]
     */
    function eventos(){
        $mysql = new DBMannager();
        $mysql->connect();

        //$mysql->execute("SELECT eventos.id as idEvento , eventos.nombre as nombre_evento, eventos.id_usuario as 'usuario',eventos.fecha_inicio, eventos.fecha_fin , usuarios.nombre_completo as nombre_usuario, seguidores.id_usuario as usuario_seguidor,likes.id_evento as eventogusta,likes.id_usuario as usuariogusta,likes.id as idgusta FROM eventos LEFT JOIN usuarios ON usuarios.id = eventos.id_usuario LEFT JOIN seguidores ON seguidores.id_evento = eventos.id LEFT JOIN likes ON likes.id_evento = eventos.id" );
        $mysql->execute("SELECT 1 as siguiendo, eventos.id as idEvento , eventos.nombre as nombre_evento, eventos.id_usuario as 'usuario',eventos.fecha_inicio, eventos.fecha_fin , usuarios.nombre_completo as nombre_usuario FROM eventos LEFT JOIN usuarios ON usuarios.id = eventos.id_usuario");
        $result = $mysql->getArray();
        return $result;

    }


    function getMeGusta(){
        $mysql = new DBMannager();
        $mysql->connect();

        //$mysql->execute("SELECT eventos.id as idEvento , eventos.nombre as nombre_evento, eventos.id_usuario as 'usuario',eventos.fecha_inicio, eventos.fecha_fin , usuarios.nombre_completo as nombre_usuario, seguidores.id_usuario as usuario_seguidor,likes.id_evento as eventogusta,likes.id_usuario as usuariogusta,likes.id as idgusta FROM eventos LEFT JOIN usuarios ON usuarios.id = eventos.id_usuario LEFT JOIN seguidores ON seguidores.id_evento = eventos.id LEFT JOIN likes ON likes.id_evento = eventos.id" );
        $mysql->execute("SELECT id_evento,count(*) as megusta FROM likes GROUP BY id_evento");
        $result = $mysql->getArray();
        
        return $result;

    }
    function getSeguidores(){
        $mysql = new DBMannager();
        $mysql->connect();

        //$mysql->execute("SELECT eventos.id as idEvento , eventos.nombre as nombre_evento, eventos.id_usuario as 'usuario',eventos.fecha_inicio, eventos.fecha_fin , usuarios.nombre_completo as nombre_usuario, seguidores.id_usuario as usuario_seguidor,likes.id_evento as eventogusta,likes.id_usuario as usuariogusta,likes.id as idgusta FROM eventos LEFT JOIN usuarios ON usuarios.id = eventos.id_usuario LEFT JOIN seguidores ON seguidores.id_evento = eventos.id LEFT JOIN likes ON likes.id_evento = eventos.id" );
        $mysql->execute("SELECT id_evento,id_usuario FROM seguidores GROUP BY id_evento");
        $result = $mysql->getArray();
        
        return $result;

    }        

    function muro($evento,$id){
        $mysql = new DBMannager();
        $mysql->connect();

        $mysql->execute("SELECT *  FROM eventos where id ='$evento' and id_usuario = '$id");
        $result = $mysql->getArray();

        return $this->arrayModel($result);
    }
    function buscar($evento){

        $mysql = new DBMannager();
        $mysql->connect();
        $query="SELECT * FROM eventos WHERe nombre=?";
        $mysql->execute($query, array($evento));
        $result = $mysql->getArray();
        return $result;
    }
	function eventoscreacion(){
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
    function seguir($user,$eve){
        $mysql = new DBMannager();
        $mysql->connect();

        $mysql->execute("INSERT INTO seguidores (id_siguiendo,id_usuario,id_evento) VALUES (?,?)",array($user,$eve));
        $result = $mysql->getArray();
        return $result;

    }

    function dejarseguir($user,$eve){
        $mysql = new DBMannager();
        $mysql->connect();

        $mysql->execute("DELETE FROM seguidores WHERE id_usuario = ? and id_evento = ? ",array($user,$eve));
        $result = $mysql->getArray();
        return $result;

    }
    function megusta($eve,$user){
        $mysql = new DBMannager();
        $mysql->connect();

        $mysql->execute("INSERT INTO likes (id_evento,id_usuario) VALUES (?,?) ",array($eve,$user));
        $result = $mysql->getArray();
        return $result;

    }

    function nomegusta($eve,$user){
        $mysql = new DBMannager();
        $mysql->connect();

        $mysql->execute("DELETE FROM likes WHERE id_evento = ? and id_usuario = ? ",array($eve,$user));
        $result = $mysql->getArray();
        return $result;

    }

}
