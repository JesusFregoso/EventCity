<?php

function getPublic(){
	return URL;
}

function view($template, $vars = array())
{
	extract($vars);	
	require ROOT."/views/".$template.".blade.php";
}

function redirect($url, $vars = array())
{
	$url = URL."/".$url;
	header("Location: ".$url);
}

function setSession($varname, $value){
	if(session_id() === ""){
		session_start();
	}

	$_SESSION[$varname] = $value;
}

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

function getAndRemoveSession($varname)
{
	if(session_id() === ""){
		session_start();
	}
	$value = $_SESSION[$varname];
	unset($_SESSION[$varname]);
	return $value;
}

