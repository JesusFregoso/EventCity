<?php

require_once("BaseRepo.php");

class AlumnosRepo extends BaseRepo{

    function getModel(){
        return new Alumno();
    }    

	function alumnos(){
		$mysql = new DBMannager();
		$mysql->connect();

		$mysql->execute("SELECT * FROM alumnos");
		$result = $mysql->getArray();

        return $this->arrayModel($result);
	}

	

}