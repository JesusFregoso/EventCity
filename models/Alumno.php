<?php

require_once("BaseModel.php");

class Alumno extends BaseModel{

	public $table = "alumnos";

	protected $fields = array(
		'nombre' 			=> 'required',
		'apellido_paterno'  => 'required',
		'apellido_materno'  => '',
		'carreras_id'		=> 'required',
		'fecha_nacimiento'  => '',
	);	

	protected $custom_fields = array(
		'nombre_completo',
	);

	public function prepareData($data){
		$data['nombre_completo'] = $data['nombre']." ".$data['apellido_paterno']." ".$data['apellido_materno'];
		return $data;
	}
	
}