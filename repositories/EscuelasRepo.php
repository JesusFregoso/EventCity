<?php

require_once("BaseRepo.php");

class EscuelasRepo extends BaseRepo{

    function getModel(){
        return new Escuela();
    }    

	function escuelas(){
		$mysql = new DBMannager();
		$mysql->connect();

		$mysql->execute("SELECT * FROM escuelas");
		$result = $mysql->getArray();

        return $this->arrayModel($result);
	}

}