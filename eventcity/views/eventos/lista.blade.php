<?php include( ROOT . "/views/header.blade.php"); ?>
    <div class="container">
        <div class="row">
            <div class="column col-md-10">
                    <div class="head-image">
                        <img src="<?=getPublic();?>/uploads/<?=getSession('id');?>/portada/portada.jpg" alt=""> 
                    </div>
            </div>
            <div class="column col-md-2 separador">
            <div class="perfil">
            <img src="<?=getPublic();?>/uploads/<?=getSession('id');?>/perfil/perfil.jpg" alt=""> 
            </div>
            <div class="nombre-perfil">
                <?=getSession('nombre_completo');?>
            </div> 
        </div>
        </div>
        <div class="row">
        <br>
        <div class="column col-md-10">

            <?php foreach($eventos as $evento){ ?>
              <div class="well">      
                        <div class="eventos">
                            <div class="row">
                                <div class="column col-md-4">
                                </div>
                                <div class="column col-md-4">
                                    <img src="<?=getPublic();?>/uploads/<?=$evento['usuario'];?>/perfil/perfil.jpg" alt="" class="imagen-perfil-muro">
                                </div>
                            </div>
                            <div class="row">   
                                <div class="column col-md-5">
                                </div>
                            </div>
                            <div class="row fecha">
                                <div class="column column-md-12">
                                    <div class="column col-md-4">
                                        <span class="nombre-evento">Nombre del Evento: <?=$evento['nombre_evento'];?></span>
                                    </div>
                                    <div class="column col-md-4">
                                        <span class="fecha-inicio">Fecha de Inicio el <?=$evento['fecha_inicio'];?></span>
                                    </div>
                                    <div class="column col-md-4">
                                        <span class="fecha_fin">Fecha de Fin el <?=$evento['fecha_fin'];?></span>
                                    </div>    
                                </div>
                            </div>
                            <div class="row">
                                <div class="seguir"
                                ?>
                                <?php if($seguir[$evento['usuario']] == getSession('id') and $seguir[$evento['idEvento']] == $seguir[$evento['idEvento']]){ ?>
                                    <a class ="btn glyphicon glyphicon-thumbs-up" href="<?=getPublic();?>/eventos/megusta/<?php echo $evento['idEvento'];?>/<?php  echo getSession('id');?>/"> Megusta</a>
                                <?php }else {?>
                                    <a class="btn glyphicon glyphicon-thumbs-down" href="<?=getPublic();?>/eventos/nomegusta/<?php echo $evento['idEvento'];?>/<?php echo getSession('id');?>/"> YanomeGusta</a>
                                 <?php } ?>
                                <?php if(getSession('id') == $seguir[$evento['usuario']]){ ?>
                                    <?php } else if($evento['siguiendo'] == 1){ ?>
                                    <a class="btn glyphicon glyphicon-eye-close" href="<?=getPublic();?>/eventos/dejarseguir/<?php echo getSession('id');?>/<?php echo $evento['idEvento'];?>"> DejardeSeguir</a>
                                <?php }else { ?>
                                    <a class="btn glyphicon glyphicon-eye-open" href="<?=getPublic();?>/eventos/seguir/<?php echo $evento['usuario'];?>/<?php  echo getSession('id');?>/<?php echo $evento['idEvento'];?>"> Seguir</a>
                                 <?php } ?>
                                 <?php if(isset($megusta[$evento['idEvento']])) echo $megusta[$evento['idEvento']]; ?>
                                    
                                </div>
                            </div>
                        </div>      
                   
                   </div>
                   <?php } ?>  
            </div>
        </div>   
    </div>        
<?php include( ROOT . "/views/footer.blade.php"); ?>