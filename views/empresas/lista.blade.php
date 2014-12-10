<?php include(ROOT . "/views/header.blade.php"); ?>
    <div class="container">
        <!-- Call to Action Section -->
        <div class="well">
            <div class="row">
                <div class="col-md-8">                    
                    <p>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Apellido Peterno</th>
                                    <th>Apellido Materno</th>
                                    <th>Calle</th>
                                    <th>Nombre</th>
                                    <th>Edad</th>
                                </tr>    
                            </thead>
                            <tbody>
                                <?php foreach($personas as $persona){ ?>
                                <tr>
                                    <td><?php echo $persona['nombre']; ?></td>
                                    <td><?php echo $persona['apellido_paterno']; ?></td>
                                    <td><?php echo $persona['apellido_materno']; ?></td>
                                    <td><?php echo $persona['calle']; ?></td>
                                    <td><?php echo $persona['nombre_completo']; ?></td>
                                    
                                    <td><?php echo $persona['edad']; ?></td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>                    
                        
                    </p>
                </div>
                <div class="col-md-4">
                    <a class="btn btn-lg btn-default btn-block" href="#">Call to Action</a>
                </div>
            </div>
        </div>

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Your Website 2014</p>
                </div>
            </div>
        </footer>

    </div>
<?php include( ROOT . "/views/footer.blade.php"); ?>





