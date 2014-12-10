<?php

require_once("BaseModel.php");

class Categoria extends BaseModel{

	public $table = "categorias_usuarios";

	protected $fields = array(
		'nombre' 			=> 'required',		
	);
	

}