<?php

require_once("BaseRepo.php");


class CarrerasRepo extends BaseRepo{

    function getModel(){
        return new Carrera();
    }    

	function carreras(){
		$mysql = new DBMannager();
		$mysql->connect();

		$mysql->execute("SELECT * FROM carreras");
		$result = $mysql->getArray();

        return $this->arrayModel($result);
	}

	function lista(){
		return $this->getList('id','carrera');
	}

}