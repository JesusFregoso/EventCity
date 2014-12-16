<?php

require_once("BaseRepo.php");
require_once(ROOT."/models/CategoriaEvento.php");


class CategoriasEventosRepo extends BaseRepo{

    function getModel(){
        return new CategoriaEvento();
    }    

	function categorias(){
		$mysql = new DBMannager();
		$mysql->connect();

		$mysql->execute("SELECT * FROM tipo_evento");
		$result = $mysql->getArray();

        return $this->arrayModel($result);
	}

	function lista(){
		return $this->getList('id','nombre');
	}

}