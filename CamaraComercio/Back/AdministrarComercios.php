<?php
    require 'Conexion.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administracion de Comercios - BSAPP</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <!-- DataTables -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.12/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
   
</head>

<style>
    body{
        background-color: #dee9ff;
        }
</style>
<body>
    <div class="container" >
        <div class="row mt-5 d-flex justify-content-center">
            <div class="card w-40  border-dark shadow p-3 mb-5 bg-white rounded">
                <h3 class="card-header text-white border border-dark shadow p-3 mb-1 bg-primary rounded mb-3">Administrar Comercios</h3>
                <div class="col-2">
                    <a href="./index.php" style="width:200" class="btn btn-outline-info mb-3">&#128281</a>
                </div>
                <table id="tabla" class="display" width="100%" cellspacing="0" >
                    <thead>
                        <tr style="color:white; background:black" >
                            <th>Premium</th>
                            <th>Nombre</th>
                            <th>Direccion</th>
                            <th>Telefonos</th>
                            <th>Url</th>
                            <th>Accion</th>
                        </tr>
                    </thead>

                    <?php
                        $conn = conn();
                        $query = mysqli_query($conn, "SELECT * FROM comercios ORDER BY premium DESC");

                        while($fila = mysqli_fetch_assoc($query)){
                            echo " <tr style='font-size:0.8em'>";
                            echo "<td>";
                            echo $fila['premium'];
                            echo "</td>";
                            echo "<td>";
                            echo $fila['nombre'];
                            echo "</td>";
                            echo "<td>";
                            echo $fila['direccion'];
                            echo "</td>";
                            echo "<td>";
                            echo $fila['telefonos'];
                            echo "</td>";
                            echo "<td>";
                            echo $fila['url_premium'];
                            echo "</td>";

                            //ENCRIPTAR ID POR GET
                            $hola=$fila['id'];
                            $control= "*+-890p?¨:;ºª|<<>>^*¨{}[]+";
                            $control_delete= "*+-00088>>^*¨{}8rty432@#¢∞¬";

                            $encriptar=$hola . $control;
                            $encriptar_delete=$hola . $control_delete;
                            
                            $ver = base64_encode($encriptar);
                            $ver_delete = base64_encode($encriptar_delete);

                            echo "<td>" ."<a href='editar.php?id=" .$ver. "'" .">". '<i class="fas fa-edit"></i>
                            ' . "</a>". " | " ."<a href='delete.php?id=" .$ver_delete. "'" .">". '<i class="fas fa-trash"></i>
                            ' . "</a>". "</td>";
                            echo "</tr>";  
                        }
                    ?>  
                </table>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
        $('#tabla').DataTable( {
            "language": {
            "sProcessing":    "Procesando...",
            "sLengthMenu":    "Mostrar _MENU_ registros",
            "sZeroRecords":   "No se encontraron resultados",
            "sEmptyTable":    "Ningún dato disponible en esta tabla",
            "sInfo":          "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "sInfoEmpty":     "Mostrando registros del 0 al 0 de un total de 0 registros",
            "sInfoFiltered":  "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix":   "",
            "sSearch":        "Buscar:",
            "sUrl":           "",
            "sInfoThousands":  ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
                "sFirst":    "Primero",
                "sLast":    "Último",
                "sNext":    "Siguiente",
                "sPrevious": "Anterior"
            },
            //"oAria": {
            //    "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
            //    "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            //}
        }
    });
    } );    
    </script> 
</body>
</html>