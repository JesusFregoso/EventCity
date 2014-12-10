<?php

require_once("BaseRepo.php");
require_once(ROOT."/models/Categoria.php");


class CategoriasRepo extends BaseRepo{

    function getModel(){
        return new Categoria();
    }    

	function categorias(){
		$mysql = new DBMannager();
		$mysql->connect();

		$mysql->execute("SELECT * FROM categorias_usuarios");
		$result = $mysql->getArray();

        return $this->arrayModel($result);
	}

	function lista(){
		return $this->getList('id','nombre');
	}

}