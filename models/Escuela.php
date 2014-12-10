<?php

require_once("BaseModel.php");

class Escuela extends BaseModel{

	public $table = "escuelas";

	protected $fields = array(
		'escuela' 			=> 'required',		
	);
	

}