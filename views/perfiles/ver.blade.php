<?php include( ROOT . "/views/header.blade.php"); ?>
<div class="container">
	<div class="well">
		<div class="row">
		<div class="foto">
			<img src="" alt="">
			</div>
              <?php Form::open_file("post",getPublic()."/registro/actualizar",$usuario);?>
              <?php Form::field('file','foto'); ?>
              <?php Form::field('text','nombre_completo'); ?>
              <?php Form::field('select-opcional','sexo',NULL,$sexos); ?>  
              <?php Form::field('select-opcional','id_categoria_usuario',null,$categorias); ?>
              <?php Form::field('text','correo_electronico'); ?> 
              <?php Form::field('text','contrasena'); ?>            
                     <div class = "centrar">
                         <button type="submit" class="btn btn-warning">Modificar</button>
                     </div>
            <?php Form::close(); ?>
	                       
				
		</div>
	</div>
</div>
<?php include( ROOT . "/views/footer.blade.php"); ?>
        // Subir
        $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }