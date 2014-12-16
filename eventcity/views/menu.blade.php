    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top menu-bar" role="navigation">
        <div class="container ">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?=getPublic();?>/"><img src"<?=getPublic();?>/css/style/eventcitylogo.png" alt="">Event City</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="<?=getPublic();?>/eventos/lista">Eventos</a>                        
                    </li>
                    <li style="margin-top: 5px; padding-right: 2px;">
                        <?php Form::open("post",getPublic()."/eventos/buscar");?>
                        <input name="nombre" type="text" class="form-control" id="nombre" placeholder="Buscar Eventos">
                        <?php Form::close(); ?>
                    </li>
                    <li style="margin-top: 5px;"> <button type="submit" class="btn glyphicon glyphicon-search"></button>   
                    </li>
                    <?php if(getSession('id')){ ?>
                        <li class="menu-perfil">
                            <a href="<?=getPublic();?>/perfiles/modificar"><img src="<?=getPublic();?>/uploads/<?=getSession('id');?>/perfil/perfil.jpg" alt=""> <?=getSession('nombre_completo');?></a>
                        </li>
                     <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Mis Eventos<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                        <li><a href="<?=getPublic();?>/eventos/guardar">Nuevo Evento</a></li>
                        <?php foreach($seguidos as $perfil){ ?>
                        <?php if ($perfil['usuario']==getSession('id')){?>
                        <li>
                            <a href="<?=getPublic();?>/eventos/muro/<?=$perfil['id'];?>/<?=getSession('id'); ?>"><span class="nombre-evento"><?=$perfil['nombre'];?></span></a>
                        </li>

                <?php } }?>      
                        </ul>
                    </li>
                    <?php } ?>
                    <?php if(getSession('id')){ ?>
                        <li>
                            <a href="<?=getPublic();?>/usuarios/logout">logout</a>                        
                        </li>
                    <?php }else{ ?>
                        <li>
                            <a href="<?=getPublic();?>">Login</a>                        
                        </li>
                    <?php } ?>
                    <?php if(getSession('id')){ ?>
                    <li>
                        <a href="<?=getPublic();?>/perfiles/muro">Muro</a>
                    </li>
                    <?php } ?>                                                                                             
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
