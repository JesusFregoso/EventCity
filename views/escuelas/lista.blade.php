<?php include(ROOT . "/views/header.blade.php"); ?>
    <div class="container">
    <?php if(getSession('mensaje')){ ?>
            <div class="alert alert-success mensaje-timeout"><?=getAndRemoveSession('mensaje');?></div>
        <?php } ?>
        <div class="well">
            Lista de Escuelas
             <div class="row">
                <div class="col-md-8">
                    <p>
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Escuelas</th>
                                                       
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach($escuelas as $escuela){ ?>
                            <tr>
                                <td><?php echo $escuela->escuela; ?></td>
                                
                                <td>
                                    <a href="<?=getPublic();?>/escuelas/modificar/<?=$escuela->id;?>">Modificar</a>
                                    <a href="<?=getPublic();?>/escuelas/eliminar/<?=$escuela->id;?>">Eliminar</a>
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





