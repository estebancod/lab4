<?php
// Incluye el archivo de conexión
include("conexion.php");

// Verifica si se han enviado datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtén los datos del formulario
    $codigo = $_POST["codigo"];
    $nombre = $_POST["nombre"];
    $contraseña = $_POST["contraseña"];
    $cargo = $_POST["cargo"];


    // Prepara la consulta SQL para verificar si la identificación ya existe
    $sql_check = "SELECT * FROM usuariof WHERE codigo = '$codigo'";
    $result_check = $conexion->query($sql_check);

    if ($result_check->num_rows > 0) {
        // La identificación ya existe, muestra un mensaje de error o toma alguna acción
        echo "Error: El codigo ingresado ya existe.";
    } else {
        // La identificación no existe, procede a insertar el nuevo registro
        $sql = "INSERT INTO usuariof (codigo, nombre, contraseña, cargo) 
        VALUES ('$codigo', '$nombre', '$contraseña', '$cargo')";
        $query = $conexion->query($sql);
        if ($query) {
            header("Location: ../lab4/ventana2.php");
        } else {
            echo "Error: " . $sql . "<br>" . $conexion->error;
        }
    }
}

// Cierra la conexión
$conexion->close();
