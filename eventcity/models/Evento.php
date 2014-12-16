<?php

require_once("BaseModel.php");
/**
 * Modelo del evento
 */
class Evento extends BaseModel{

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
/**
 * Funcion prepareData Prepara algunos datos para regresarlos de forma distinta
 * @param  [array] $data [array de los usuarios]
 */
	public function prepareData($data){
		if(!isset($data['id_usuario'])){
			$data['id_usuario'] = getSession('id');
		}
	
		return $data;
	}
	
}