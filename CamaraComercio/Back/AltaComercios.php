<?php
    require 'Conexion.php';
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
                <h3 class="card-header text-white border border-dark shadow p-3 mb-2 bg-primary rounded ">Alta Comercios</h3>
                <div class="col-2">
                    <a href="./index.php" style="width:200" class="btn btn-outline-info mb-3">&#128281</a>
                </div>
                <br>
                <form action="guardar.php" method="POST" enctype="multipart/form-data">
                    <div class="form-group mt-5">
                        <label for="rubro">Rubro</label>
                        <select name="rubro" id="rubro" onchange="subrubro1()">
                            <?php
                                $conn=conn();
                                $query=mysqli_query($conn, "SELECT * FROM rubro ORDER BY nombre");
                                while($fila=mysqli_fetch_assoc($query)){
                                    echo '<option value="'. $fila['id']  .'">' . $fila['nombre'] . '</option>';
                                }
                            ?>

                           
                        </select>
                    </div>

                    <div class="form-group mt-3">
                        <label for="subrubro">Sub-Rubro</label>
                        <select name="subrubro" id="subrubro" disabled>
                          
                        </select>
                    </div>

                    <div class="form-group mt-3">
                        <label for="premium">Premium</label>
                        <select name="premium" id="premium">
                            <option value="NO">NO</option>
                            <option value="SI">SI</option>  
                        </select>
                    </div>

                    <div class="form-group mt-3">
                        <input type="text" placeholder="Nombre" name="nombre" style="width:30rem"> 
                    </div>

                    <div class="form-group mt-3">
                        <input type="text" placeholder="Descripcion" name="descripcion" style="width:30rem"> 
                    </div>

                    <div class="form-group mt-3">
                        <input type="text" placeholder="Direccion" name="direccion" style="width:30rem"> 
                    </div>

                    <div class="form-group mt-3">
                        <input type="text" placeholder="Telefonos" name="telefonos" style="width:30rem"> 
                    </div>

                    <div class="form-group mt-3">
                        <input type="file" placeholder="logo" name="logo"> 
                    </div>

                    <div class="form-group mt-3">
                        <input type="text" placeholder="PREMIUM: https://bsapp.site/" name="url" style="width:30rem"> 
                    </div>
                    <div class="card-footer text-right">
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