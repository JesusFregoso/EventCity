<?php

require_once("BaseModel.php");
/**
 * Modelo de las categorias del usuario
 */
class Categoria extends BaseModel{

	public $table = "categorias_usuarios";

	protected $fields = array(
		'nombre' 			=> 'required',		
	);
	

}