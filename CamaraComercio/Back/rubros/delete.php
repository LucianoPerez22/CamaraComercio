<?php
    require('../Conexion.php');
    
    //DESENCRIPTAR
    $desencriptar = base64_decode($_GET['id']);
    $posicion_coincidencia = strpos($desencriptar, '*+-');

    if ($posicion_coincidencia === false) {
        echo "ERROR - COMERCIO NO ENCONTRADO";
        } else {                              
            
            $id= substr($desencriptar,0,$posicion_coincidencia) ;	
        }
    
        $conn=conn();

        mysqli_query($conn, "DELETE from subrubro WHERE id=$id");

        header("Location: administrar.php");

?>