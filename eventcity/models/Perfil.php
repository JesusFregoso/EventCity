<?php

require_once("BaseModel.php");

class Perfil extends BaseModel{

	public $table = "eventos";

	protected $fields = array(
		'nombre' 			=> 'required',
		'informacion'  => 'required',
		'fecha_publicacion'		=> '',
		'id_usuario'            => '',
		'id_tipo_evento'  => '',
		'ubicacion'		=> '',
		'fecha_inicio'            => '',
		'fecha_fin'  => '',

	);
	public function prepareData($data){
		if(!isset($data['id_usuario'])){
			$data['id_usuario'] = getSession('id');
		}
	
		return $data;
	}
	
}