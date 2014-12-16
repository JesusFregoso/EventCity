<?php

require_once("BaseRepo.php");

class PublicacionesRepo extends BaseRepo{

    function getModel(){
        return new Publicacion();
    }    

	function publicaciones(){
		$mysql = new DBMannager();
		$mysql->connect();

		$mysql->execute("SELECT a.*,b.nombre FROM publicaciones as a INNER JOIN usuarios b ON a.usuarios_id=b.id ORDER BY id DESC");
		$result = $mysql->getArray();

        return $result;
	}


}