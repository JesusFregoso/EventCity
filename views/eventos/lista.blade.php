<?php include(ROOT . "/views/header.blade.php");?>
    <div class="container">
        <?php if(getSession('mensaje')){ ?>
            <div class="alert alert-success mensaje-timeout"><?=getAndRemoveSession('mensaje');?></div>
        <?php } ?>
        <div class="well">
            Lista de Eventos            
            <div class="row">
                <div class="col-md-8">
                    <p>
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>informacion</th>
                            <th>lugar</th>
                            <th>Acciones</th>                            
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach($eventos as $evento){ ?>
                            <tr>
                                <td><?php echo $evento->nombre; ?></td>
                                <td><?php echo $evento->informacion; ?></td>
                                <td><?php echo $evento->lugar; ?></td>
                                <td>
                                    <a href="<?=getPublic();?>/alumnos/modificar/<?=$alumno->id;?>">Modificar</a>
                                    <a href="<?=getPublic();?>/alumnos/eliminar/<?=$alumno->id;?>">Eliminar</a>
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
