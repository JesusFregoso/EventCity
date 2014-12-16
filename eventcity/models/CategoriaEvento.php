<?php

require_once("BaseModel.php");
/**
 * Modelo de las categorias de los eventos
 */
class CategoriaEvento extends BaseModel{

	public $table = "tipo_evento";

	protected $fields = array(
		'nombre' 			=> 'required',		
	);
	

}