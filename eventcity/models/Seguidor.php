<?php

require_once("BaseModel.php");

class Seguidor extends BaseModel{

	public $table = "seguidores";

	protected $fields = array(
		'id_siguiendo' 			=> 'required',
		'id_usuario'						=> 'required',
		'id_evento'             =>'required',
	);	
	public function prepareData($data){
		return $data;
	}
}