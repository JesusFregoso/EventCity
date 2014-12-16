<?php

require_once("BaseModel.php");
/**
 * Modelo Del seguidor
 */
class Seguidor extends BaseModel{

	public $table = "seguidores";

	protected $fields = array(
		'id_siguiendo' 			=> 'required',
		'id_usuario'						=> 'required',
		'id_evento'             =>'required',
	);
}