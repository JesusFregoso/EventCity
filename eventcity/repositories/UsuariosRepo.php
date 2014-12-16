<?php

require_once("BaseRepo.php");

class UsuariosRepo extends BaseRepo{

    function getModel(){
        return new Usuario();
    }    
/**
 * [login description]
 * @param  [type]
 * @param  [type]
 * @return [type]
 */
    function login($correo,$password){

    	$mysql = new DBMannager();
    	$mysql->connect();

    	$query="SELECT id,nombre_completo FROM usuarios WHERe correo_electronico=? AND contrasena=?";

    	$mysql->execute($query, array($correo , $password));

    	if($mysql->count() > 0){
    		$row = $mysql->getRow();
    		setSession('id',$row['id']);
    		setSession('nombre_completo',$row['nombre_completo']);
    		return true;
    	}else{
    		return false;
    	}

    }
}