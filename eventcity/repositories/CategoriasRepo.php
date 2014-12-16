<?php

require_once("BaseRepo.php");
require_once(ROOT."/models/Categoria.php");

/**
 * Repositorio de categorias de los usuarios selleciona sus categorias
 */
class CategoriasRepo extends BaseRepo{
	/**
	* Funcion getModel Regresa El modelo de las categorias
 	* @return [type] [description]
 	*/
    function getModel(){
        return new Categoria();
    }    
	 /**
	 * Funcion categorias Selecciona las categorias de la base de datos
	 * @return [array] [regresa un array con todas las categorias]
	 */
	function categorias(){
		$mysql = new DBMannager();
		$mysql->connect();

		$mysql->execute("SELECT * FROM categorias_usuarios");
		$result = $mysql->getArray();

        return $this->arrayModel($result);
	}
	/**
	* Funcion lista muesta la lista de las categorias
	*/
	function lista(){
		return $this->getList('id','nombre');
	}

}