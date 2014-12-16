<?php

require_once("BaseModel.php");

class Usuario extends BaseModel{

	public $table = "usuarios";

	protected $fields = array(
		'nombre_completo' 			=> 'required',
		'sexo'						=> 'required',
		'id_categoria_usuario'		=> 'required',
		'contrasena'		=> 'required',
		'usuario'		=> '',
		'correo_electronico'        => 'required',
		'foto'        => 'required',
	);	
	public function prepareData($data){
		return $data;
	}
}