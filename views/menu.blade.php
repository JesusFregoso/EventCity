    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <div class="input-group search">
                    <input class="form-control busqueda" type="text" placeholder="Search" >
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="button"><i class="fa fa-search"></i></button>
                    </span>
                </div>
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Eventos<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="<?=getPublic();?>/eventos/agregar">Nuevo Eventos</a></li>
                            <li><a href="<?=getPublic();?>/eventos/lista">Mis Eventos</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Profile<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="<?=getPublic();?>/perfiles/modificar">Perfil</a></li>
                            <li><a href="<?=getPublic();?>/home">Cerrar Sesion</a></li>
                        </ul>
                    </li>                                                                           
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
