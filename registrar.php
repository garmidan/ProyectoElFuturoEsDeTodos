<?php

include("con_db.php");
$mensaje = 0;
$cantidad = 0;
if (isset($_POST['register'])) {
	if ($_POST['tipocedula'] == "seleccione") {
		$mensaje = 4;
	} else {
		if (
			strlen($_POST['tipocedula']) >= 1 && strlen($_POST['nocedula']) >= 1 &&
			strlen($_POST['nombres']) >= 1 && strlen($_POST['apellidos']) >= 1 && strlen($_POST['fechaNacimiento']) >= 1
			&& strlen($_POST['fechallegada']) >= 1 && strlen($_POST['profesion']) >= 1 
			&& strlen($_POST['motivo']) >= 1 && strlen($_POST['ayuda']) >= 1) {
			if ($_POST['vive'] == "seleccione") {
				$mensaje = 5;
			} else {
				$tipocedula = trim($_POST['tipocedula']);
				$nocedula = trim($_POST['nocedula']);
				$nombres = trim($_POST['nombres']);
				$apellidos = trim($_POST['apellidos']);
				$fechaNacimiento = trim($_POST['fechaNacimiento']);
				$fechallegada = trim($_POST['fechallegada']);
				$profesion = trim($_POST['profesion']);
				$motivo = trim($_POST['motivo']);
				$correo = trim($_POST['correo']);
				$direccion = trim($_POST['direccion']);
				$celular = trim($_POST['celular']);
				$vive =  trim($_POST['vive']);
				$cantidaseleccionada = trim($_POST['cantidad']);
				$ayuda = trim($_POST['ayuda']);
				$cuantas = 0;
				if ($_POST['vive'] == "si") {
					$cantidad = $cantidaseleccionada;
					if ($_POST['cantidad'] >= 1) {
						$consultasi = "INSERT INTO usuario(nombres, apellidos, idcedula, numerocedula, correo,
					fechanacimiento, motivodesplazo, dirección, celular, profesion, fechallegada,
					 viveconalguien, cuantaspersona) VALUES ('$nombres','$apellidos','$tipocedula',
					 '$nocedula','$correo','$fechaNacimiento','$motivo','$direccion','$celular','$profesion','$fechallegada',
					 '$vive','$cantidaseleccionada')";
						$resultadosi = mysqli_query($conex, $consultasi);
						if ($resultadosi) {
							$consultaultimoregistro = "SELECT MAX(idusuario) AS idusuario FROM usuario";
							$idusuarioltimo = mysqli_query($conex, $consultaultimoregistro);
							if ($row = mysqli_fetch_row($idusuarioltimo)) {
								$id = trim($row[0]);
								$registerbeneficio = "INSERT INTO ayudabrindada (descripcion, idusuario)
								 VALUES ('$ayuda', '$id')";
								$ayudaregistrar = mysqli_query($conex, $registerbeneficio);
								if ($ayudaregistrar) {
								?>
									<script>
										localStorage.setItem('cantidad', '<?php echo trim($_POST['cantidad']); ?>');
										location.href = "formulariomasivo.php";
									</script>
								<?php
								}
							}
						}
					} else {
						$mensaje = 6;
					}
				} else {
					$consulta = "INSERT INTO usuario(nombres, apellidos, idcedula, numerocedula, correo,
				 fechanacimiento, motivodesplazo, dirección, celular, profesion, fechallegada,
				  viveconalguien, cuantaspersona) VALUES ('$nombres','$apellidos','$tipocedula',
				  '$nocedula','$correo','$fechaNacimiento','$motivo','$direccion','$celular','$profesion','$fechallegada',
				  '$vive','$cuantas')";
					$resultado = mysqli_query($conex, $consulta);
					if ($resultado) {
						$consultaultimoregistrono = "SELECT MAX(idusuario) AS idusuario FROM usuario";
						$idusuarioltimono = mysqli_query($conex, $consultaultimoregistrono);
						if ($row = mysqli_fetch_row($idusuarioltimono)) {
							$idno = trim($row[0]);
							$registerbeneficiono = "INSERT INTO ayudabrindada (descripcion, idusuario)
								 VALUES ('$ayuda', '$idno')";
							$ayudaregistrar = mysqli_query($conex, $registerbeneficiono);
							if ($ayudaregistrar) {

								$mensaje = 3;
							}
						}
					} else {
						$mensaje = 2;
					}
				}
			}
		} else {
			$mensaje = 1;
		}
	}
}
?>