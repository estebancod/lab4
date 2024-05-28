<?php
// Conexión a la base de datos MySQL
$servername = "localhost"; // Cambia esto por tu servidor de base de datos
$username = "root"; // Cambia esto por tu nombre de usuario de la base de datos
$password = ""; // Cambia esto por tu contraseña de la base de datos
$dbname = "medicamentos"; // Cambia esto por el nombre de tu base de datos

// Crea la conexión
$conexion = new mysqli($servername, $username, $password, $dbname);

// Verifica la conexión
if ($conexion->connect_error) {
    die("La conexión ha fallado: " . $conexion->connect_error);
}