<?php
// Incluye el archivo de conexión
include("conexion_solicitudes.php");

// Verifica si se han enviado datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtén los datos del formulario
    $nombre = $_POST["nombre"];
    $descripcion = $_POST["descripcion"];
    $fechaCaducidad = $_POST["fechaCaducidad"];
    $cantidad = $_POST["cantidad"];
    $lote = $_POST["lote"]; // Asegúrate de que el formulario también envía este campo

    // Prepara la consulta SQL para insertar el nuevo registro
    $sql = "INSERT INTO solicitudes (nombre, descripcion, fecha_caducidad, cantidad) 
            VALUES ('$nombre', '$descripcion', '$fechaCaducidad', '$cantidad')";
    
    $query = $conexion->query($sql);

    if ($query) {
        header("Location: ../gestion_solicitudes.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conexion->error;
    }
}

// Cierra la conexión
$conexion->close();
?>
