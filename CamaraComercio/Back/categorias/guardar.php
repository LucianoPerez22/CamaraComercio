<?php
    require '../Conexion.php';

    $nombre = $_POST['nombre'];
    //Elimina espacios en blanco al principio y al final
	$nombre=trim($nombre);
	//Quita barras invertidas
	$nombre=stripcslashes($nombre);
	//Elimina caracteres especiales html
    $nombre=htmlspecialchars($nombre);
   
    $archivo = $_FILES['logo']['name'];

    $conn=conn();

    mysqli_query($conn,"INSERT INTO rubro VALUES(DEFAULT, '$nombre', '$archivo')");


    $ruta="../../assets/";//ruta carpeta donde queremos copiar las imágenes
    $uploadfile_temporal=$_FILES['logo']['tmp_name'];
    $uploadfile_nombre=$ruta. $_FILES['logo']['name'];

    if (is_uploaded_file($uploadfile_temporal))
    {
        move_uploaded_file($uploadfile_temporal,$uploadfile_nombre);
        header("Location: ../index.php");
    }
    else
    {
    
    echo "Ocurrio un error al subir la imagen";
    }  
?>