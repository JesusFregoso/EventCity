<?php include(ROOT . "/views/header.blade.php"); ?>

<div class="container">

  <div class="well">
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
      </div> 
      <div class="panel panel-default panelRegistro">
      <div class="container-registro-evento">
      <div class="tituloUnete"><h4>Crea Tu Evento Facil y Rapido</h4></div> 
       <?php
            if(isset($evento)){
                Form::open("post",getPublic()."/eventos/guardar",$evento);   
              }else{
                Form::open("post",getPublic()."/eventos/actualizar"); 
              }              
            ?>
              <div class="components">
              <?php Form::field('file','foto'); ?>
              <?php Form::field('text','nombre'); ?>
              <?php Form::field('text','informacion'); ?>
              <?php Form::field('text','fecha_publicacion') ?>
              <input aria-invalid="false" class="form-control width-text tcal" id="nombre" required="" data-validation-required-message="Please enter your name." type="text" name="fecha_publicacion" value=""/>
              <?php Form::field('select-opcional','id_tipo_evento',null,$eventos); ?>        
                     <div class = "centrar">
                         <button type="submit" class="btn btn-warning">Crear Evento</button>
                     </div>
            <?php Form::close(); ?>
    </div>
    </div>
    </div>
    </div>
    </div>
<?php include( ROOT . "/views/footer.blade.php"); ?>
