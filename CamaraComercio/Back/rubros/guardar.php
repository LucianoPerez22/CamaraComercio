<?php
    require("../Conexion.php");
    
    $nombre = $_POST['nombre'];
    //Elimina espacios en blanco al principio y al final
	$nombre=trim($nombre);
	//Quita barras invertidas
	$nombre=stripcslashes($nombre);
	//Elimina caracteres especiales html
    $nombre=htmlspecialchars($nombre);
    
    $rubro = intval($_POST['rubro']);
    //Elimina espacios en blanco al principio y al final
	$rubro=trim($rubro);
	//Quita barras invertidas
	$rubro=stripcslashes($rubro);
	//Elimina caracteres especiales html
    $rubro=htmlspecialchars($rubro);
    

    $conn = conn();

    mysqli_query($conn,"INSERT INTO subrubro VALUES(DEFAULT, $rubro, '$nombre')");

    header("Location: ../index.php");
?>