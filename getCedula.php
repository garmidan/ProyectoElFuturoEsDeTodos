<?php
    include('con_db.php');
        $consulta = "SELECT * FROM tipocedula";
	    $resultado = mysqli_query($conex,$consulta);
?>