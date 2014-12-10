<?php include(ROOT . "/views/header.blade.php"); ?>
    <div class="container">
        <div class="well">
            <form role="form" method="post">                
              <?php field('text','nombre'); ?>              
              <?php field('text','apellido_paterno'); ?>              
              <?php field('text','apellido_materno'); ?>              
              <?php field('text','fecha_nacimiento'); ?>                            

              <button type="submit" class="btn btn-default">Enviar</button>
            </form>
        </div>
    </div>
<?php include( ROOT . "/views/footer.blade.php"); ?>





