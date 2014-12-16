<?php include( ROOT . "/views/header.blade.php"); ?>
    <div class="container">
        <div class="row">
            <div class="column col-md-10">
                    <div class="head-image">
                        <img src="<?=getPublic();?>/uploads/<?=getSession('id');?>/portada/portada.jpg" alt=""> 
                    </div>
            </div>
        </div>
        <div class="row">
            <div class="column col-md-3">
                   <div class="perfil">
                       <img src="<?=getPublic();?>/uploads/<?=getSession('id');?>/perfil.jpg" alt=""> 
                   </div>
                   <div class="nombre-perfil">
                       <?=getSession('nombre_completo');?>
                   </div> 
            </div>
                <?php foreach($eventos as $evento){ ?>

                    <div class="well">
                        <div class="eventos">
                            <div class="row">
                                <div class="column col-md-2">
                                    <img src="<?=getPublic();?>/uploads/<?=$evento['id_usuario'];?>/perfil.jpg" alt="" class="imagen-perfil-muro">
                                </div>
                                <div class="column col-md-10">
                                    <span class="nombre-usuario"><?=$evento['nombre_completo'];?></span>
                                    <span class="fecha-inicio">Fecha de Inicio el <?=$evento['fecha_inicio'];?></span>
                                    <span class="fecha-fin">Fecha de Inicio el <?=$evento['fecha_fin'];?></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="comentario">
                                    <p><?=$evento['mensaje'];?></p>
                                </div>
                            </div>
                        </div>      
                    </div>
                <?php } ?>          
                
            </div>

    </div>
</div>
<?php include( ROOT . "/views/footer.blade.php"); ?>