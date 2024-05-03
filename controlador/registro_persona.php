<?php
include ("modelo/conexion.php");
if (!empty($_POST["btnregistrar"])) {
    if (!empty($_POST["nombre"]) and !empty($_POST["codigo"]) and !empty($_POST["contraseña"]) and !empty($_POST["cargo"])) {
        $nombre=$_POST["nombre"];
        $codigo=$_POST["codigo"]; 
        $contraseña=$_POST["contraseña"];
        $cargo=$_POST["cargo"];

        $sql=$conexion->query("INSERT INTO usuariof (nombre, codigo, contraseña, cargo) VALUES ('$nombre', '$codigo', '$contraseña', '$cargo')");
        if ($sql==1) {
            echo "<div class='alert alert-success'>Registro actualizado correctamente</div>";
        } else {
            echo "<div class='alert alert-danger'>Error al registrar</div>";
        }
    } else{
        echo "<div class='alert alert-warning'>Alguno de los campos esta vacío</div>";
    }
}

?>