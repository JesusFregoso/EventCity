<?php include(ROOT . "/views/header.blade.php");?>
    <div class="container">
        <?php if(getSession('mensaje')){ ?>
            <div class="alert alert-success mensaje-timeout"><?=getAndRemoveSession('mensaje');?></div>
        <?php } ?>
        <div class="well">
            Lista de Alumnos            
            <div class="row">
                <div class="col-md-8">
                    <p>
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Apellido Peterno</th>
                            <th>Apellido Materno</th>
                            <th>Acciones</th>                            
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach($alumnos as $alumno){ ?>
                            <tr>
                                <td><?php echo $alumno->nombre_completo; ?></td>
                                <td><?php echo $alumno->apellido_paterno; ?></td>
                                <td><?php echo $alumno->apellido_materno; ?></td>
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
