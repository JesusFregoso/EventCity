<?php include(ROOT . "/views/header_without_menu.blade.php"); ?>
    <div class="index">
        <div class="container">
            <!-- Call to Action Section -->
            <div class="well alert-well">
                <div class="row">
                    <div class="column col-md-6 col-md-offset-3">
                        <?php if(getSession('mensaje')){ ?>
                            <div class="alert alert-success mensaje-timeout"><?=getAndRemoveSession('mensaje');?></div>
                        <?php } ?>
                        <?php 
                            if(getSession('errores')){
                                $errors = getAndRemoveSession('errores');
                        ?>
                            <div class="alert alert-danger">
                                <?php foreach($errors as $error){ ?>
                                    <p><?=$error;?></p> 
                                <?php } ?>
                            </div>
                        <?php } ?>  
                    </div>
                    <div class="alert alert-info alert-inicio">
     
                        Bienvenido a Event City
                    </div>
                </div>
            </div>
        <!-- Page Content -->
        <div class="container">
            
            <!-- Basic panel -->
            <div class="inicio panelbienvenido">
                <div class="jumbotron definicion">
                    <p>Carrot cake jelly beans cake sweet roll powder tart. 
                        Donut cheesecake applicake candy canes fruitcake toffee cookie sugar plum sesame snaps.
                         Danish liquorice sweet roll icing lemon drops macaroon jujubes marzipan. 
                        Tart sesame snaps fruitcake pastry jelly.
                        Bear claw croissant chocolate bar lollipop sesame snaps. 
                        Tootsie roll tart oat cake halvah. 
                        Jujubes ice cream jelly beans chupa chups candy lollipop. 
                        Jujubes sugar plum tart.
                    </p>
                </div>
                <div class="paneles">
                    <div class="panel panelInicio">
                        <div class="panel-body">
                            <div class="login">
                            <?php Form::open("post",getPublic()."/usuarios/loginpost ");?>
                                <?php Form::field('text','correo_electronico'); ?> 
                                <?php Form::field('text','contrasena'); ?>       
                                <div class="col-registro">
                                    <button type="submit" class="btn btn-warning btn-default alineacionDerecha btn-inicio">Iniciar Sesion</button>
                                </div>
                                <div></div>
                                <div class="col-login">
                                    <input type="checkbox"> Recordarme 
                                </div>
                                <!-- /.col-check -->
                                <div class="col-login alineacionDerecha">
                                    ¿Olvidaste tu contraseña?
                                </div>
                            <?php Form::close(); ?>
                            </div>
                        </div>
                    </div>
                    <div class="panel panelInicio">
                        <div class="panel-body">
                        <div class="login">
                        <?php Form::open("post",getPublic()."/registro/agregar");?>
                                <div class="col-registro">
                                    ¿Nuevo en EventCity?
                                    <div class="alineacionDerecha">Registrate</div>
                                </div>
                                <?php Form::field('text','nombre_completo'); ?>
                                <?php Form::field('text','correo_electronico'); ?> 
                                <?php Form::field('text','contrasena'); ?>       
                                <div class="col-registro">
                                    <button type="submit" class="btn btn-warning btn-default alineacionDerecha btn-inicio">Registrase en EventCity</button>
                                </div>
                            </div>
                    <?php Form::close(); ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="page-sub" style="text-align:center">
                <h4>Mira quienes estan usando EventCity</h4>
            </div>
            
        </div>
    </div>

    <!-- /.container -->

    <!-- jQuery Version 1.11.0 -->
    <script src="js/jquery-1.11.0.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    </body>

    </html>
    <?php include("footer.blade.php"); ?>
</div>