<?php
    header('Access-Control-Allow-Origin: *; charset:utf-8');
    require 'Conexion.php';

    if (!isset($_GET['id'])){
       header("Location: AdministrarComercios.php");
    }

    //DESENCRIPTAR
    $desencriptar = base64_decode($_GET['id']);
    $posicion_coincidencia = strpos($desencriptar, '*+-');


    if ($posicion_coincidencia === false) {
        echo "ERROR - COMERCIO NO ENCONTRADO";
        } else {                              
        
            $id= substr($desencriptar,0,$posicion_coincidencia) ;	
        }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alta Comercios - BSAPP</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>

<style>
    body{
        background-color: #dee9ff;
        }
</style>
<body>

    <div class="container" >
        <div class="row mt-5 d-flex justify-content-center">
            <div class="card w-40 border border-dark shadow p-3 mb-5 bg-white rounded">
                <h3 class="card-header text-white border border-dark shadow p-3 mb-2 rounded bg-dark">Edicion de Comercios</h3>
                <div class="col-2">
                    <a href="./AdministrarComercios.php" style="width:200" class="btn btn-outline-info mb-3">&#128281</a>
                </div>
                <br>
                <?php 
                    $conn=conn();
                    $query=mysqli_query($conn, "SELECT * from comercios WHERE id=$id");
                    $datos=mysqli_fetch_assoc($query);

                    $id_rubro = $datos['id_rubro'];   
                    $id_subrubro = $datos['id_subrubro'];   

                    $query_rubro = mysqli_query($conn, "SELECT * FROM rubro WHERE id=$id_rubro");
                    $datos_categoria=mysqli_fetch_assoc($query_rubro);

                    $query_subrubro = mysqli_query($conn, "SELECT * FROM subrubro WHERE id_rubro=$id_subrubro");
                    $datos_subrubro=mysqli_fetch_assoc($query_subrubro);
                ?>
                <form action="edit.php" method="POST" enctype="multipart/form-data">
                    <div class="form-group mt-5">
                        <label for="rubro">Rubro</label>
                        <select name="rubro" id="rubro" onchange="subrubro1()">
                            <option value="<?php 
                                echo $datos_categoria['id'];
                                ?>"><?php 
                                echo $datos_categoria['nombre'];
                                ?>
                            </option>

                            <?php 
                                $query_rubro1 = mysqli_query($conn, "SELECT * FROM rubro ORDER BY nombre");
                                
                                while($fila=mysqli_fetch_assoc($query_rubro1)){
                                    if($fila['id']==$id_rubro){

                                    }else{
                                        echo '<option value="' . $fila['id'] . '">' . $fila['nombre'] . '</option>';
                                    }  
                                }
                            ?>
                        </select>
                    </div>

                    <div class="form-group mt-3">
                        <label for="subrubro">Sub-Rubro</label>
                        <select name="subrubro" id="subrubro">
                        <?php
                            $query_subrubro100 = mysqli_query($conn, "SELECT * FROM subrubro WHERE id=$id_subrubro");
                            $datos_subrubro100=mysqli_fetch_assoc($query_subrubro100);
                        ?>
                            <option value="<?php 
                                echo $datos_subrubro100['id'];
                                ?>"><?php 
                                echo $datos_subrubro100['nombre'];
                                ?>
                            </option>

                            <?php 
                                $query_subrubro = mysqli_query($conn, "SELECT * FROM subrubro WHERE id_rubro=$id_rubro ORDER BY nombre");
                                
                                echo $id_subrubro;
                                while($fila=mysqli_fetch_assoc($query_subrubro)){
                                    if($fila['id']==$id_subrubro){

                                    }else{
                                        echo '<option value="' . $fila['id'] . '">' . $fila['nombre'] . '</option>';
                                    }  
                                }
                            ?>
                        </select>
                    </div>

                    <div class="form-group mt-3">
                        <label for="premium">Premium</label>
                        <select name="premium" id="premium">
                        <?php 
                            if($datos['premium']=="SI"){
                                echo '<option value="SI">SI</option>';
                                echo '<option value="NO">NO</option>';
                            } else{
                                echo '<option value="NO">NO</option>';
                                echo '<option value="SI">SI</option>';

                            }
                        ?>
                          
                        </select>
                    </div>

                    <div class="form-group mt-3">
                        <input type="text" placeholder="Nombre" name="nombre" style="width:30rem" value="<?php echo $datos['nombre']; ?>"> 
                        <!-- GUARDAR ID O TOKEN DEL COMERCIO AQUI -->
                        <input type="hidden" name="id" value="<?php echo $_GET['id'];  ?>">
                    </div>

                    <div class="form-group mt-3">
                        <input type="text" placeholder="Nombre" name="descripcion" style="width:30rem" value="<?php echo $datos['descripcion']; ?>""> 
                    </div>

                    <div class="form-group mt-3">
                        <input type="text" placeholder="Direccion" name="direccion" style="width:30rem" value="<?php echo $datos['direccion']; ?>"> 
                    </div>

                    <div class="form-group mt-3">
                        <input type="text" placeholder="Telefonos" name="telefonos" style="width:30rem" value="<?php echo $datos['telefonos']; ?>"> 
                    </div>

                    <div class="form-group mt-3">
                        <input type="text" placeholder="URL" name="url" style="width:30rem" value="<?php echo $datos['url_premium']; ?>"> 
                    </div>

                    <div class="form-group mt-3">
                        <input type="text" value="<?php echo $datos['logo']; ?>" disabled>
                        <input type="file" placeholder="logo" name="logo" > 
                    </div>
                    <div class="card-footer text-right text-right">
                        <button type="submit" class="btn btn-primary mt-5">Submit</button>
                    </div>
                    </form>
            </div>
        </div>
    </div>

    <script>
    function subrubro1(){
        let valor = document.getElementById("rubro").value;
        let subrubro=document.getElementById("subrubro");
        
        for (let i = subrubro.options.length; i >= 0; i--) {
            subrubro.remove(i);
         }
        //console.log("El id es: " + valor);
        
        subrubro.disabled=false;
    
        fetch('http://localhost/CamaraComercio/back/api/index.php?id='+valor)
            .then(response => response.json())
            .then(json => {
                //console.log(json)
                
                for(var i=0;i<json.length;i++){ 
                    const option = document.createElement('option');
                    const valor = json[i]['nombre'];
                    option.value = json[i]['id'];
                    option.text = valor;
                    subrubro.appendChild(option);
                }
            })
             
    }
</script>  
</body>
</html>