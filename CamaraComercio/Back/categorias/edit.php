<?php
require("../Conexion.php");

$nombre = $_POST['nombre'];
//Elimina espacios en blanco al principio y al final
$nombre=trim($nombre);
//Quita barras invertidas
$nombre=stripcslashes($nombre);
//Elimina caracteres especiales html
$nombre=htmlspecialchars($nombre);

$logo =  $_FILES['logo']['name'];

//DESENCRIPTAR
$desencriptar = base64_decode($_POST['id']);
$posicion_coincidencia = strpos($desencriptar, '*+-');


if ($posicion_coincidencia === false) {
    echo "ERROR - COMERCIO NO ENCONTRADO";
    } else {                              
    
        $id= substr($desencriptar,0,$posicion_coincidencia) ;	
    }
$conn = conn();

if ($logo==""){
    mysqli_query($conn,"UPDATE rubro SET  nombre='$nombre' WHERE id=$id");
    
    header("Location: ./administrar.php");
    
}else{
    mysqli_query($conn,"UPDATE rubro SET nombre='$nombre', logo='$logo' WHERE id=$id");
    
    $ruta="../../assets/";//ruta carpeta donde queremos copiar las imágenes
    $uploadfile_temporal=$_FILES['logo']['tmp_name'];
    $uploadfile_nombre=$ruta. $_FILES['logo']['name'];

    if (is_uploaded_file($uploadfile_temporal))
    {
        move_uploaded_file($uploadfile_temporal,$uploadfile_nombre);
        header("Location: ./AdministrarComercios.php");
    }
    else
        {

            echo "NO SE PUDO CARGAR LA CATEGORIA";
        }  

}
?>