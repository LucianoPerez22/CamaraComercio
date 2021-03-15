<?php
    require('../Conexion.php');

    $nombre = $_POST['nombre'];
    //Elimina espacios en blanco al principio y al final
	$nombre=trim($nombre);
	//Quita barras invertidas
	$nombre=stripcslashes($nombre);
	//Elimina caracteres especiales html
    $nombre=htmlspecialchars($nombre);
    
    $id_cat = $_POST['categoria'];
    //Elimina espacios en blanco al principio y al final
	$id_cat=trim($id_cat);
	//Quita barras invertidas
	$id_cat=stripcslashes($id_cat);
	//Elimina caracteres especiales html
	$id_cat=htmlspecialchars($id_cat);

    //DESENCRIPTAR
    $desencriptar = base64_decode($_POST['id']);
    $posicion_coincidencia = strpos($desencriptar, '*+-');

    if ($posicion_coincidencia === false) {
        echo "ERROR - COMERCIO NO ENCONTRADO";
        } else {                              
            
            $id= substr($desencriptar,0,$posicion_coincidencia) ;	
        }
    
        $conn=conn();

        mysqli_query($conn, "UPDATE subrubro SET nombre='$nombre', id_rubro=$id_cat WHERE id=$id");

        header("Location: administrar.php");

?>