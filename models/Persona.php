<?php

class Persona{

	function __construct() {

	}

	function personas(){

		$mysql = new DBMannager();
		$mysql->connect();

		//$conexion = conectar();
		$mysql->execute("SELECT * FROM alumnos");

		$result = $mysql->getArray();


		for($i = 0; $i < count($result); $i++){
			//echo $result[$i]['nombre'];
			$result[$i]['nombre_completo'] = $result[$i]['nombre']." ".
				$result[$i]['apellido_paterno']." ".$result[$i]["apellido_materno"];			 		

			$fecha_nacimiento = $result[$i]['fecha_nacimiento'];
			$fecha_nacimiento = date('d-m-Y',strtotime($fecha_nacimiento));
			$fecha_nacimiento = explode("-",$fecha_nacimiento, 3);
			$fecha_nacimiento = mktime(0,0,0,$fecha_nacimiento[1],
				$fecha_nacimiento[0], $fecha_nacimiento[2]);

			$edad = (int) ((time() - $fecha_nacimiento) / 31556926 );

			$result[$i]['edad']=$edad;



		}

		return $result;

	}

}