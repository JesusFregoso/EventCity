<?php

require_once("BaseModel.php");

class Publicacion extends BaseModel{

	public $table = "publicaciones";

	protected $fields = array(
		'usuarios_id' 	=> 'required',
		'fecha'			=> '',
		'mensaje'		=> 'required',
	);	

	public function prepareData($data){
		if(!isset($data['usuarios_id'])){
			$data['usuarios_id'] = getSession('id');
		}
	
		return $data;
	}
	
}