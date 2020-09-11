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
</head>

<body>

	<?php
	include("getCedula.php");
	$datos = $resultado;
	?>

	<div id="formulario">
		<h2>Formulario Registro</h2>
		<form method="post">
			<div class="form-row">
				<div class="form-group col-md-4">
					<label for="inputState">Tipo Cedula</label>
					<select id="inputState" class="form-control" name="tipocedula">
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
					<input type="text" name="nocedula" class="form-control" id="inputCity">
				</div>

				<div class="form-group col-md-4">
					<label for="inputZip">Nombres</label>
					<input type="text" name="nombres" value="" class="form-control" id="inputZip">
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-4">
					<label for="inputCity">Apellidos</label>
					<input type="text" name="apellidos" class="form-control" id="inputCity">
				</div>
				<div class="form-group col-md-4">
					<label for="inputCity">Fecha Nacimiento</label>
					<input type="date" name="fechaNacimiento" class="form-control" id="inputCity">
				</div>

				<div class="form-group col-md-4">
					<label for="inputZip">Fecha Llegada Colombia</label>
					<input type="date" name="fechallegada" class="form-control" id="inputZip">
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-4">
					<label for="inputCity">Correo *</label>
					<input type="text" name="correo" class="form-control" id="inputCity">
				</div>
				<div class="form-group col-md-4">
					<label for="inputCity">Direccion Residencia *</label>
					<input type="text" name="direccion" class="form-control" id="inputCity">
				</div>

				<div class="form-group col-md-4">
					<label for="inputZip">Celular *</label>
					<input type="text" name="celular" class="form-control" id="inputZip">
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-4">
					<label for="inputCity">Profesion</label>
					<input type="text" name="profesion" class="form-control" id="profesion">
				</div>
				<div class="form-group col-md-4">
					<label for="inputCity">Motivo por la cual esta en colombia</label>
					<input type="text" name="motivo" class="form-control" id="motivo">
				</div>

				<div class="form-group col-md-4">
					<label for="cuantos">Vive con alguien?</label>
					<select class="form-control" id="cuantos" name="vive">
						<option value="seleccione">Seleccione</option>
						<option value="no">No</option>
						<option value="si">Si</option>
					</select>
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-4">
					<label for="inputCity">Ayuda a brindar</label>
					<textarea type="text" name="ayuda" class="form-control" id="ayuda"></textarea>
				</div>
				<div class="form-group col-md-4" style="display: none;" id="cuantasson">
					<label for="otherField">Digite Cuantos son!</label>
					<input class="form-control" name="cantidad" id="otherField" />
				</div>
			</div>
			<div class="form-group">
				<input name="register" value="Guardar" style="width: 50%; margin-left: 350px;" type="submit" class="form-control btn btn-primary">
			</div>
		</form>
	</div>
	<?php
	include("registrar.php");
	$mensa = $mensaje;
	$can = $cantidad;
	?>
	<?php
	if ($mensa == 1) {
	?>
		<script type="text/javascript">
			swal({
				title: "¡INFORMACION!",
				text: "Complete lo campos los opcionales(*) es si lo desea",
				type: "warning",
			});
		</script>
	<?php
	} elseif ($mensa == 2) { ?>
		<script type="text/javascript">
			swal({
				title: "¡ERROR!",
				text: "Algo salio mal",
				type: "error",
			});
		</script>
	<?php
	} elseif ($mensa == 3) { ?>
		<script type="text/javascript">
			swal({
				title: "Informacion!",
				text: "Registro Exitoso",
				type: "success",
			});
		</script>
	<?php
	} elseif ($mensa == 4) {
	?>
		<script type="text/javascript">
			swal({
				title: "Informacion!",
				text: "Seleccione el tipo de cedula",
				type: "warning",
			});
		</script>
	<?php
	} elseif ($mensa == 5) {
	?>
		<script type="text/javascript">
			swal({
				title: "Informacion!",
				text: "Seleccione esi vive con alguien",
				type: "warning",
			});
		</script>
	<?php
	} elseif ($mensa == 6) {
	?>
		<script type="text/javascript">
			swal({
				title: "Informacion!",
				text: "Debe digitar con cuantas persona vive",
				type: "warning",
			});
		</script>
	<?php
	} elseif ($mensa == 7) {
	?>
		<script type="text/javascript">
			swal({
				title: "Informacion!",
				text: "Registro masivo exitoso",
				type: "success",
			});
		</script>
	<?php
	} elseif ($mensa == 8) {
	?>
		<script type="text/javascript">
			swal({
				title: "Informacion!",
				text: "Error al traer ultimo registro",
				type: "warning",
			});
		</script>
	<?php
	}
	?>
	<script type="text/javascript">
		$("#cuantos").change(function() {
			if ($(this).val() == "si") {
				$('#cuantasson').show('slow');
			} else {
				$('#cuantasson').hide('slow');
			}
		});
		$("#cuantos").trigger("change");
	</script>

	<script type="text/javascript">
		var can = localStorage.getItem("cantidad");
		if (can >= 1) {
			location.href = "formulariomasivo.php";
			alert("Tienes pendiente el registro de los familiares");
		}
	</script>

</body>

</html>