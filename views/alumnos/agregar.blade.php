<?php include(ROOT . "/views/header.blade.php"); ?>
    <div class="container">
      <?php if(getSession('mensaje')){ ?>
        <div class="alert alert-success mensaje-timeout"><?=getAndRemoveSession('mensaje');?></div>
      <?php } ?>
      <?php 
        if(getSession('errores')){
          $errors = getAndRemoveSession('errores');
      ?>
        <div class="alert alert-danger">
          <?php foreach($errors as $error){ ?>
            <p><?=$error;?></p> 
          <?php } ?>
        </div>
      <?php } ?>
        <div class="well">
            <?php
              if(isset($alumno)){
                Form::open("post",getPublic()."/alumnos/actualizar",$alumno);   
              }else{
                Form::open("post",getPublic()."/alumnos/guardar");   
              }              
            ?>
              <?php Form::field('select-opcional','carreras_id',NULL,$carreras); ?>              
              <?php Form::field('text','nombre'); ?>              
              <?php Form::field('text','apellido_paterno'); ?>              
              <?php Form::field('text','apellido_materno'); ?>              
              <?php Form::field('text','fecha_nacimiento'); ?>           
              <button type="submit" class="btn btn-default">Guardar</button>
            <?php Form::close(); ?>
        </div>
    </div>
<?php include( ROOT . "/views/footer.blade.php"); ?>

