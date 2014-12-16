<?php include( ROOT . "/views/header.blade.php"); ?>
<div class="container">
	<div class="well">
  </div>
  <div class="row">
              <?php Form::openForFileUpload("post",getPublic()."/perfiles/actualizar",$usuario);?>
              <?php Form::field('text','nombre_completo'); ?>
              <?php Form::field('select-opcional','sexo',NULL,$sexos); ?>  
              <?php Form::field('select-opcional','id_categoria_usuario',null,$categorias); ?>
              <?php Form::field('text','correo_electronico'); ?> 
              <?php Form::field('text','usuario'); ?>            
              <?php Form::field('text','contrasena'); ?>            
                     <div class = "centrar">
                         <button type="submit" class="btn btn-warning">Modificar</button>
                     </div>
            <?php Form::close(); ?>
	                       
				
		</div>
	</div>
</div>
<?php include( ROOT . "/views/footer.blade.php"); ?>
