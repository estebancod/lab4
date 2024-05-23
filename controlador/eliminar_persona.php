<?php
include('conexion.php');

$codigo = $_REQUEST['codigo'];
$sql = "DELETE FROM usuariof WHERE codigo= '$codigo'";
$query = mysqli_query($conexion, $sql);

if ($query) {
    header('location: ../ventana2.php');
}
?>
