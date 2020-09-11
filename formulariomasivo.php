<!DOCTYPE html>
<html>

<head>
    <title>Registrar usuario</title>
    <meta charset="utf-8">
    <!-- CSS only -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="estilofomulario.css" />
    <link href="assets/css/lib/sweetalert/sweetalert.css" rel="stylesheet" type="text/css" />
    <!-- JS, Popper.js, and jQuery -->
    <script src="assets/js/jquery/jquery.min.js" type="text/javascript"></script>
    <script src="assets/js/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="assets/js/js/popper.min.js" type="text/javascript"></script>
    <script src="assets/js/lib/sweetalert/sweetalert.min.js" type="text/javascript"></script>
    <script src="assets/js/lib/sweetalert/sweetalert.init.js" type="text/javascript"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
</head>

<body>
    <?php 
    include("registromasivo.php");
    include("getCedula.php");
	$datos = $resultado;
    ?>
    <?php
    if (isset($_GET['var_PHP_data'])) {
        $cantidad = $_GET['var_PHP_data'];
        if ($cantidad >= 1) {
    
    ?>
            <div me id="formularioFamiliares">
                <br />
                <form method="post" >
                    <h2 style="color: blue; text-align: center;">Formulario Registro con las personas que vive</h2>
                    <input value="<?php echo $cantidad; ?>" name="cant" style="display: none;"/>
                    <?php
                    for ($i = 0; $i < $cantidad; $i++) {
                        $iterando = $i + 1;
                    ?>
                        <h1 style="color: red;">Persona <?php echo $iterando ?></h1>
                        
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="inputState">Tipo Cedula</label>
                                <select id="inputState" class="form-control" name="tipocedula<?php echo $i ?>">
                                    <option value="seleccione">Seleccione</option>
                                    <?php
                                    foreach ($datos as $elemento) { ?>
                                        <option value="<?php echo $elemento['idcedula'] ?>"><?php echo $elemento['nombre'] ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputCity">Numero Cedula</label>
                                <input type="text" name="nocedula<?php echo $i ?>" class="form-control" id="inputCity">
                            </div>

                            <div class="form-group col-md-4">
                                <label for="inputZip">Nombres</label>
                                <input type="text" name="nombres<?php echo $i ?>" value="" class="form-control" id="inputZip">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="inputCity">Apellidos</label>
                                <input type="text" name="apellidos<?php echo $i ?>" class="form-control" id="inputCity">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputCity">Fecha Nacimiento</label>
                                <input type="date" name="fechaNacimiento<?php echo $i ?>" class="form-control" id="inputCity">
                            </div>

                            <div class="form-group col-md-4">
                                <label for="inputZip">Fecha Llegada Colombia</label>
                                <input type="date" name="fechallegada<?php echo $i ?>" class="form-control" id="inputZip">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputCity">Correo *</label>
                                <input type="text" name="correo<?php echo $i ?>" class="form-control" id="inputCity">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputZip">Celular *</label>
                                <input type="text" name="celular<?php echo $i ?>" class="form-control" id="inputZip">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="inputCity">Profesion</label>
                                <input type="text" name="profesion<?php echo $i ?>" class="form-control" id="inputCity">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputCity">Motivo por la cual esta en colombia</label>
                                <input type="text" name="motivo<?php echo $i ?>" class="form-control" id="inputCity">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="otherField">Parentesco</label>
                                <input class="form-control" name="parentesco<?php echo $i ?>" />
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                    <div class="form-group">
                        <input name="registermasivo" value="Guardar" style="width: 50%; margin-left: 350px;" type="submit" class="form-control btn btn-primary">
                    </div>
                </form>
            </div>
        <?php
        }
    } else {
        ?>
        <script>
            var var_data = localStorage.getItem("cantidad");
            $.ajax({
                url: 'http://localhost:82/ProyectoElFuturoEsDeTodos/formulariomasivo.php',
                type: 'GET',
                data: {
                    var_PHP_data: var_data
                },
                success: function(data) {
                    // do something;
                    $('#result').html(data)
                }
            });
        </script>
        <div id="result">
        <?php } ?>

        <script type="text/javascript">
            var can = localStorage.getItem("cantidad");
            if (can <=0) {
                location.href = "index.php";
            }
        </script>
</body>

</html>