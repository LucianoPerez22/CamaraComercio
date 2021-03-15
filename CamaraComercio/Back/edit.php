<?php
require("./Conexion.php");

$nombre = validar($_POST['nombre']);
$descripcion = validar($_POST['descripcion']);
$direccion = validar($_POST['direccion']);
$telefonos = validar($_POST['telefonos']);
$logo = "CAM1-" . $_FILES['logo']['name'];
$rubro = validar($_POST['rubro']);
$subrubro = validar(intval($_POST['subrubro']));
$url = validar($_POST['url']);
$premium = validar($_POST['premium']);

//DESENCRIPTAR
$desencriptar = base64_decode($_POST['id']);
$posicion_coincidencia = strpos($desencriptar, '*+-');


if ($posicion_coincidencia === false) {
    echo "ERROR - COMERCIO NO ENCONTRADO";
    } else {                              
    
        $id= substr($desencriptar,0,$posicion_coincidencia) ;	
    }

$conn = conn();

if ($logo=="CAM1-"){
    mysqli_query($conn,"UPDATE comercios SET id_rubro=$rubro, id_subrubro=$subrubro,
                                                premium='$premium', nombre='$nombre', 
                                                descripcion='$descripcion', 
                                                direccion='$direccion', telefonos='$telefonos',
                                                url_premium='$url'
                                                WHERE id=$id");
    
    header("Location: ./AdministrarComercios.php");
    
}else{
    mysqli_query($conn,"UPDATE  comercios SET id_rubro=$rubro, id_subrubro=$subrubro,
                                                premium='$premium', nombre='$nombre', 
                                                descripcion='$descripcion', logo='$logo',
                                                direccion='$direccion', telefonos='$telefonos',
                                                url_premium='$url' 
                                                WHERE id=$id");
    
    $ruta="../assets/logos/";//ruta carpeta donde queremos copiar las imágenes
    $uploadfile_temporal=$_FILES['logo']['tmp_name'];
    $uploadfile_nombre=$ruta. "CAM1-" . $_FILES['logo']['name'];

    if (is_uploaded_file($uploadfile_temporal))
    {
        move_uploaded_file($uploadfile_temporal,$uploadfile_nombre);
        header("Location: ./AdministrarComercios.php");
    }
    else
        {

            echo "NO SE PUDO CARGAR EL COMERCIO";
        }  

}

function validar($dato){
    //Elimina espacios en blanco al principio y al final
    $dato=trim($dato);
    //Quita barras invertidas
    $dato=stripcslashes($dato);
    //Elimina caracteres especiales html
    $dato=htmlspecialchars($dato);

    return $dato;
}

?>