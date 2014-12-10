<?php

require_once("BaseModel.php");

class Carrera extends BaseModel{

	public $table = "carreras";

	protected $fields = array(
		'carrera' 			=> 'required',		
	);
	

}