<?php
    header("Access-Control-Allow-Origin: *; Content-type: application/json; charset=utf-8");
    require('../Conexion.php');

    $conn = conn();
    $id = $_GET['id'];
    $datos = [];
    $query= mysqli_query($conn,"SELECT * FROM subrubro WHERE id_rubro=$id");
    while ($fila=mysqli_fetch_assoc($query)){
        array_push($datos,$fila);

    }

    echo json_encode($datos);
?>