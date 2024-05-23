<?php
// Incluye el archivo de conexión
include("conexion.php");

// Verifica si se envió el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $codigo = $_POST['codigo'];
    $nombre = $_POST['nombre'];
    $cargo = $_POST['cargo'];


    $sql = "UPDATE usuariof SET nombre='$nombre', cargo='$cargo'";

    //$query=mysqli_query($conexion,$sql);
    echo "Consulta SQL: " . $sql;

    if ($conexion->query($sql) === TRUE) {
        header('Location: ../ventana2.php');
    } else {
        echo "Error: " . $sql . "<br>" . $mysqli->error;
    }
}
?>