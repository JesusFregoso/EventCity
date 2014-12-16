<?php
require_once("BaseRepo.php");

class SeguidoresRepo extends BaseRepo{
function getModel(){
        return new Seguidor();
    } 
	function seguidores(){
		$mysql = new DBMannager();
		$mysql->connect();

		$mysql->execute("SELECT * FROM seguidores");
		$result = $mysql->getArray();

        return $this->arrayModel($result);
	}


}

