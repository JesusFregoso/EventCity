<?php

require_once("BaseModel.php");

class CategoriaEvento extends BaseModel{

	public $table = "tipo_evento";

	protected $fields = array(
		'nombre' 			=> 'required',		
	);
	

}