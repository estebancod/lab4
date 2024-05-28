<?php
include('conexion_med.php');

$id = $_REQUEST['inputid'];
$sql = "DELETE FROM medicamentos WHERE identificacion= '$id'";
$query = mysqli_query($conexion, $sql);

if ($query) {
    header('location: ../gestion_medicamento.php');
}
?>
