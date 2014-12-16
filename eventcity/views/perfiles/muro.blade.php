<?php include( ROOT . "/views/header.blade.php"); ?>
    <div class="container">
        <div class="row">
            <div class="column col-md-10">
                    <div class="head-image">
                        <img src="<?=getPublic();?>/uploads/<?=getSession('id');?>/portada/portada.jpg" alt=""> 
                    </div>
            </div>
            <div class="column col-md-2">
                <div class="head-image">
                    <img src="<?=getPublic();?>/uploads/<?=getSession('id');?>/perfil/perfil.jpg" alt=""> 
                </div>
            </div>
        </div>
        <div class="row">
            <div class="column col-md-3">
                   <div class="perfil">
                       <img src="<?=getPublic();?>/uploads/<?=getSession('id');?>/perfil/perfil.jpg" alt=""> 
                   </div>
                   <div class="nombre-perfil">
                       <?=getSession('nombre_completo');?>
                   </div> 
            </div>
            <br>

            <div class="column col-md-7">
                
                <?php foreach($seguidos as $seguido){ ?>
                <?php if ($seguido['usuario_seguidor']==getSession('id')){?>
                    <div class="well">
                        <div class="eventos">
                            <div class="row">
                                <div class="column col-md-4">
                                </div>
                                <div class="column col-md-4">
                                    <img src="<?=getPublic();?>/uploads/<?=$seguido['usuario'];?>/perfil/perfil.jpg" alt="" class="imagen-perfil-muro">
                                </div>
                            </div>
                            <div class="row">
                                <div class="column col-md-5">
                                    
                                </div>
                                <div class="column col-md-4">
                                     <a href="<?=getPublic();?>/eventos/muro/<?=$seguido['id'];?>/<?=getSession('id'); ?>"><span class="nombre-evento"><?=$seguido['nombre'];?></span></a>
                                </div>
                            </div>
                            <div class="row fecha">
                                <div class="column col-md-12">
                               
                                    <div class="column col-md-4"><span class="nombre-usuario">Nombre de Evento: <?=$seguido['nombre'];?></span></div>

                                    <div class="column col-md-4"><span class="fecha-inicio">Fecha de Inicio el <?=$seguido['fecha_inicio'];?></span></div> 
                                    <div class="column col-md-4"><span class="fecha-fin">Fecha de Fin el <?=$seguido['fecha_fin'];?></span></div>
                                </div>
                            </div>
                             <div class="row">
                                <div class="seguir"
                                ?>
                                <?php if(getSession('id') == $seguido['usuario_seguidor']){ ?>
                                     <a href="<?=getPublic();?>/eventos/seguir/<?php echo $seguido['id_usuario'];?>/<?php echo getSession('id');?>/<?php echo $seguido['idseguido'];?>">DEJA DE SEGUIR</a>
                                <?php } else if(getSession('id') != $seguido['id']){ ?>
                                    <a href="#">nada</a>
                                <?php }else { ?>
                                    <a href="<?=getPublic();?>/eventos/seguir/<?php echo $seguido['id_suario'];?>/<?php  echo getSession('id');?>/<?php echo $seguido['idEvento'];?>">seguir</a>
                                 <?php } ?>
                                
                                </div>
                            </div>
                        </div>      
                    </div>
                <?php }}?>         
                
            </div>
    </div>
<?php include( ROOT . "/views/footer.blade.php"); ?>