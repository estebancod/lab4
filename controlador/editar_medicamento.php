<?php
// Incluye el archivo de conexión
include("conexion_med.php");

// Verifica si se envió el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['inputid'];
    $Nombre = $_POST['inputNombre'];
    $Forma = $_POST['inputFormaFarmaceutica'];
    $FechaC = $_POST['inputFechaCaducidad'];
    $Cantidad = $_POST['inputCantidad'];
    $Lote = $_POST['inputLote'];

    $sql = "UPDATE medicamentos SET nombre='$Nombre', descripcion='$Forma', fecha_caducidad='$FechaC', cantidad='$Cantidad', lote='$Lote' WHERE identificacion='$id'";

    //$query=mysqli_query($conexion,$sql);
    echo "Consulta SQL: " . $sql;

    if ($conexion->query($sql) === TRUE) {
        header('Location: ../gestion_medicamento.php');
    } else {
        echo "Error: " . $sql . "<br>" . $mysqli->error;
    }
}
?>