<?php

require_once("BaseRepo.php");

class PerfilesRepo extends BaseRepo{

    function getModel(){
        return new Perfil();
    }    
        function eventos(){
        $mysql = new DBMannager();
        $mysql->connect();
        $mysql->execute("SELECT a.*,b.nombre_completo FROM eventos as a INNER JOIN usuarios b ON a.id_usuario=b.id ORDER BY id DESC");
        $result = $mysql->getArray();
        return $result;
    }
    function perfiles($evento){
        $mysql = new DBMannager();
        $mysql->connect();

        $mysql->execute("SELECT *  FROM publicaciones where eventos_id ='$evento'");
        $result = $mysql->getArray();

        return $this->arrayModel($result);
    }
    function seguidos(){
        $mysql = new DBMannager();
        $mysql->connect();

        $mysql->execute("SELECT eventos.id, eventos.fecha_inicio,eventos.fecha_fin,eventos.nombre, eventos.id_usuario as usuario, usuarios.nombre_completo as nombre_usuario, seguidores.id_siguiendo as siguiendo,seguidores.id_usuario as usuario_seguidor FROM eventos LEFT JOIN usuarios ON usuarios.id = eventos.id_usuario LEFT JOIN seguidores ON seguidores.id_evento = eventos.id WHERE Seguidores.id_siguiendo = eventos.id_usuario" );
        $result = $mysql->getArray();
        return $result;
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