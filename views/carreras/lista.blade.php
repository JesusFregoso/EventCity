<?php include(ROOT . "/views/header.blade.php"); ?>
    <div class="container">
    <?php if(getSession('mensaje')){ ?>
            <div class="alert alert-success mensaje-timeout"><?=getAndRemoveSession('mensaje');?></div>
        <?php } ?>
        <div class="well">
            Lista de Carreras
             <div class="row">
                <div class="col-md-8">
                    <p>
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Carreras</th>
                                                       
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach($carreras as $carrera){ ?>
                            <tr>
                                <td><?php echo $carrera->carrera; ?></td>
                                
                                <td>
                                    <a href="<?=getPublic();?>/carreras/modificar/<?=$carrera->id;?>">Modificar</a>
                                    <a href="<?=getPublic();?>/carreras/eliminar/<?=$carrera->id;?>">Eliminar</a>
                                </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>

                    </p>
                </div>
            </div>
        </div>    
    </div>
<?php include( ROOT . "/views/footer.blade.php"); ?>





