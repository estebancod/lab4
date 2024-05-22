<?php
if(!empty($_GET["id"])){
    $id=$_GET["id"];
    $sql=$conexion->query("delete from usuariof where codigo=$id");
    if($sql==1){
        echo'<div>Persona eliminado correctamente</div>';
    }else{
        echo '<div>Error al eliminar</div>';
        echo $id;
    }
}

?>