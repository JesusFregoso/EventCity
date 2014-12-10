<?php

require_once("BaseModel.php");

class Evento extends BaseModel{

	public $table = "eventos";

	protected $fields = array(
		'nombre' 			=> 'required',
		'informacion'  => 'required',
		'fecha_publicacion'		=> 'required',
		'id_tipo_evento'  => '',
	);	
	
}