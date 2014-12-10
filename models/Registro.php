<?php

require_once("BaseModel.php");

class Registro extends BaseModel{

	public $table = "usuarios";

	protected $fields = array(
		'nombre_completo' 			=> 'required',
		'sexo'						=> 'required',
		'id_categoria_usuario'		=> 'required',
		'contrasena'		=> 'required',
		'correo_electronico'        => 'required',
	);	
	public function prepareData($data){
		return $data;
	}
}