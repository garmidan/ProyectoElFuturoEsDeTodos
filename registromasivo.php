<?php
include("con_db.php");
$cant = 0;
if (isset($_POST['registermasivo'])) {
    $cantidades = trim($_POST['cant']);
    if ($cantidades >=1) {
        $consultaultimoregistro = "SELECT MAX(idusuario) AS idusuario FROM usuario";
            $idusuarioltimo = mysqli_query($conex, $consultaultimoregistro);
            if ($row = mysqli_fetch_row($idusuarioltimo)) {
                    $id = trim($row[0]);
                    for ($i = 0; $i < $cantidades; $i++) {
                        $famitipocedula = trim($_POST["tipocedula$i"]);
                        $faminocedula = trim($_POST["nocedula$i"]);
                        $faminombres = trim($_POST["nombres$i"]);
                        $famiapellidos = trim($_POST["apellidos$i"]);
                        $famifechaNacimiento = trim($_POST["fechaNacimiento$i"]);
                        $famifechallegada = trim($_POST["fechallegada$i"]);
                        $famiprofesion = trim($_POST["profesion$i"]);
                        $famimotivo = trim($_POST["motivo$i"]);
                        $famicorreo = trim($_POST["correo$i"]);
                        $famicelular = trim($_POST["celular$i"]);
                        $famiparentesco = trim($_POST["parentesco$i"]);
                        $registermasivo = "INSERT INTO familiares
                         (nombres, apellidos, 
                         idcedula, nocedula, celular, correo, profesion, 
                         motivodesplazo, fechallegada, fechanacimiento,
                          parentesco, idusuario) 
                          VALUES ('$faminombres', '$famiapellidos', '$famitipocedula', '$faminocedula',
                           '$famicelular', '$famicorreo', '$famiprofesion', '$famimotivo', '$famifechallegada',
                            '$famifechaNacimiento', '$famiparentesco', '$id')";
                            $resultadoma = mysqli_query($conex, $registermasivo);
                            if ($resultadoma) {
                            }
                    }
                    ?>
                    <script>
						localStorage.removeItem('cantidad');
						location.href = "index.php";
                        
					</script>
                    <?php
            }else{
                $mensaje = 8;
            }
    }
}
?>
