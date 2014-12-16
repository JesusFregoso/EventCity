<?php
/**
 * Funcion getPublic Regresa la url la ruta
 */
function getPublic(){
	return URL;
}
/**
 * Funcion view 
 * @param  [type] $template [description]
 * @param  array  $vars     [description]
 * @return [type]           [description]
 */
function view($template, $vars = array())
{
	extract($vars);	
	require ROOT."/views/".$template.".blade.php";
}
/**
 * funcion redirect  recibe un url para redirectcionarte.
 * @param  [string] $url  [url hacia donde se redireccionara]
 * @param  array  $vars [description]
 */
function redirect($url, $vars = array())
{
	$url = URL."/".$url;
	header("Location: ".$url);
}
/**
 * Funcion setSession asigna la session a un usuario al ingresar
 * @param [string] $varname [el nombre al que se le asignara la session]
 * @param [int] $value   [id del usuario al que se le asignara la session]
 */
function setSession($varname, $value){
	if(session_id() === ""){
		session_start();
	}

	$_SESSION[$varname] = $value;
}
/**
 * Funcion getsession trae la session del usuario conectado si existe si no regresa falso
 * @param  [string] $varname [recibe el nombre el usuario conectado]
 */
function getSession($varname)
{
	if(session_id() === ""){
		session_start();
	}
	
	if(isset($_SESSION[$varname])){
		return $_SESSION[$varname];		
	}
	else{
		return false;
	}

}
/**
 * [getAndRemoveSession description]
 * @param  [type] $varname [description]
 * @return [type]          [description]
 */
function getAndRemoveSession($varname)
{
	if(session_id() === ""){
		session_start();
	}
	$value = $_SESSION[$varname];
	unset($_SESSION[$varname]);
	return $value;
}

