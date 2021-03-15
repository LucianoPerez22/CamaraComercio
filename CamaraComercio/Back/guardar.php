<?php
    require("./Conexion.php");

    $nombre = validar($_POST['nombre']);
    $descripcion = validar($_POST['descripcion']);
    $direccion = validar($_POST['direccion']);
    $telefonos = validar($_POST['telefonos']);
    $logo = "CAM1-" . $_FILES['logo']['name'];
    $rubro = validar(intval($_POST['rubro']));
    if (!isset($_POST['subrubro'])){
        $subrubro=0;
    }else{
        $subrubro = validar(intval($_POST['subrubro']));
    }
    
    $url = validar($_POST['url']);
    $premium = validar($_POST['premium']);

    $conn = conn();

    mysqli_query($conn,"INSERT INTO comercios VALUES(DEFAULT, $rubro, $subrubro,
                                                    '$premium', '$nombre', 
                                                    '$descripcion', '$logo',
                                                    '$direccion', '$telefonos',
                                                    '$url')");


    $ruta="../assets/logos/";//ruta carpeta donde queremos copiar las imágenes
    $uploadfile_temporal=$_FILES['logo']['tmp_name'];
    $uploadfile_nombre=$ruta. "CAM1-" . $_FILES['logo']['name'];

    if (is_uploaded_file($uploadfile_temporal))
    {
        move_uploaded_file($uploadfile_temporal,$uploadfile_nombre);
        header("Location: ./index.php");
    }
    else
        {
            echo "NO SE PUDO CARGAR EL COMERCIO";
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