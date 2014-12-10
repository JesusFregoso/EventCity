<?php

class Form{

	static $model;

	public static function open($method,$action,$model=NULL){
		if(isset($model)){
			self::$model = $model;
			if (isset($model->id)) {
			$action .= "/".$model->id;
			}	
		} 
		echo "<form role='form' method='$method' action='$action'>";
	}
	public static function open_file($method,$action,$model=NULL){
		if(isset($model)){
			self::$model = $model;
			if (isset($model->id)) {
			$action .= "/".$model->id;
			}	
		}
		echo "<form role='form' method='$method' action='$action' enctype='multipart/form-data'>";
	}
	public static function close(){		
		echo "<form>";
		if(isset($model)){
			unset(self::$model);
		}
	}

	public static function field($tipo,$campo,$valor=NULL,$opciones=NULL){

		//$campo="apellido_paterno";
		$texto = explode("_",$campo);
		//$texto[0]="apellido";
		//$texto[1]="paterno";
		foreach($texto as &$e){
			//$e = "apellido";
			//$e = "Apellido";
			//$e = "paterno";
			//$e = "Paterno";
			$e = ucfirst($e);
		}
		$texto = implode(" ",$texto);
		
		$value = "";
		if(isset(self::$model->$campo)){
			$value = self::$model->$campo;
		}
		switch($tipo){
			case 'text': view('fields/text',compact('campo','texto','value'));
						break;
			case 'select': view('fields/select',compact('campo','texto','value','opciones'));
						break;
			case 'select-opcional': view('fields/select_opcional',compact('campo','texto','value','opciones'));
						break;
			case 'file': view('fields/file',compact('campo','texto','value'));
						break;						
			default: 
				return "Error";
		}
		
	}

}