<?php

require_once("BaseRepo.php");

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

     function uploadImage($files,$field,$rename=NULL){        
        $target_dir = "uploads/".getSession('id');
        if(!isset($rename)){
            $target_file = $target_dir . "/" .basename($files[$field]["name"]);
        }else{
            $target_file = $target_dir . "/" . basename($rename);
        }
        
        $uploadOk = 1;
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

        // Check if image file is a actual image or fake image
        $check = getimagesize($files[$field]["tmp_name"]);        
        if($check !== false) {
            //echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            //echo "File is not an image.";
            return 'El archivo no es una imagen';
            $uploadOk = 0;
        }
        // Check if file already exists
        //if (file_exists($target_file)) {
        //    echo "Sorry, file already exists.";
        //    return 'Lo sentimos el archivo ya existe.';
        //    $uploadOk = 0;
        //}
        // Check file size
        if ($files[$field]["size"] > 500000) {
            //echo "Sorry, your file is too large.";
            return 'El tamaño del archivo es muy grande.';
            $uploadOk = 0;
        }
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
            //echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            return 'Solamente se aceptan archivos de tipo JPG, JPEG, PNG y GIF.';
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        //if ($uploadOk == 0) {
            //return 'Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
        //} else {
        if (move_uploaded_file($files[$field]["tmp_name"], $target_file)) {
            return "true";
        } else {
            return 'Hubo un error desconocido al subir el archivo';
        }
        //}
    }
    
}