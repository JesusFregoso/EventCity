<?php

include("BaseRepo.php");

class RegistrosRepo extends BaseRepo{

    function getModel(){
        return new Registro();
    }    

	function usuarios(){
		$mysql = new DBMannager();
		$mysql->connect();

		$mysql->execute("SELECT * FROM usuarios");
		$result = $mysql->getArray();

        return $this->arrayModel($result);
	}

	function login($correo,$contraseña){
            $mysql = new DBMannager();
        $mysql->connect();
        $query="SELECT * FROM usuarios WHERE correo_electronico=?  and contrasena=? ";
        $mysql->execute($query,array($correo,$contraseña));
        if($mysql->count() == 1){
             $usuario = $mysql->getRow();
             setSession("id", $usuario['id']);
             return true; 
        }else{
            return false;
        }
    }
    function cerrar(){
        session_destroy();
        redirect('');
    }

    function actualizar(){
        $repo = new RegistrosRepo();
        $usuario = $repo->find(getSession('id'));       
        $usuario->setData($_POST);

        if($usuario->save()){
            setSession('mensaje',"El usuario se actualizado correctamente.");
            redirect('perfiles/ver');
        }else{      
            $errors = $usuario->errors; 
            setSession('errores', $errors);
            redirect('');
            //view('alumnos/agregar',compact('errors'));
        }

    }
}