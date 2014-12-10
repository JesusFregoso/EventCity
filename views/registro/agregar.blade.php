<?php include(ROOT . "/views/header_without_menu.blade.php"); ?>

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
      <div class="panel-body alineacionIzquierda">
      <div class="tituloUnete"><h4>Unete a Event City ahora</h4></div> 
       <?php
            if(isset($registro)){
                Form::open("post",getPublic()."/registro/guardar",$registro);   
              }else{
                Form::open("post",getPublic()."/registro/actualizar"); 
              }              
            ?>
              <div class="components col-record">

              <?php Form::field('text','nombre_completo'); ?>
              <?php Form::field('text','correo_electronico'); ?> 
              <?php Form::field('select-opcional','sexo',NULL,$sexos); ?>  
              <?php Form::field('select-opcional','id_categoria_usuario',null,$categorias); ?> 
              <?php Form::field('text','usuario'); ?> 
              <?php Form::field('text','contrasena'); ?> 
              </div>           
                     <div class = "centrar">
                        <p class="terminosLicencia">aceptas las Condiciones de Servicio y la Política de Privacidad, incluyendo el Uso de Cookies. Otros podrán encontrarte por correo electrónico o por número de teléfono cuando sea proporcionado.
                        </p>
                         <button type="submit" class="btn btn-warning alineacionDerecha">Registrase</button>
                     </div>
            <?php Form::close(); ?>
    </div>
    </div>
    </div>
    </div>
    </div>
<?php include( ROOT . "/views/footer.blade.php"); ?>
