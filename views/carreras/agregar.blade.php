<?php include(ROOT . "/views/header.blade.php"); ?>
    <div class="container">
    	<?php if(isset($mensaje)){ ?>
    		<div class="alert alert-success mensaje-timeout"><?=$mensaje;?></div>
    	<?php } ?>
    	<?php if(isset($errors)){ ?>
    		<div class="alert alert-danger">
    			<?php foreach($errors as $error){ ?>
    				<p><?=$error;?></p> 
    			<?php } ?>
    		</div>
    	<?php } ?>
        <div class="well">
             <?php
              if(isset($carrera)){
                Form::open("post",getPublic()."/carreras/actualizar",$carrera);   
              }else{
                Form::open("post",getPublic()."/carreras/guardar");   
              }              
            ?>
              <?php Form::field('text','carrera'); ?>              

              <button type="submit" class="btn btn-default">Guardar</button>
            <?php Form::close(); ?>
        </div>
    </div>
<?php include( ROOT . "/views/footer.blade.php"); ?>





