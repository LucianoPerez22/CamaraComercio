<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion Comercios</title>

     <!-- Bootstrap -->
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <!-- Animate CSS -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

<style>
	body{
  	  background-color: #dee9ff;
	}

	img{
		margin-left: 60px;
		margin-bottom: 20px;
		border: 1px solid grey;
		border-radius: 50%;
		box-shadow: -3px -3px 0 blue;
	}

	img:hover{
		box-shadow: 3px 3px  red;
	}

	a{

	}
</style>
</head>
<body>

    <div class="container mt-2">
        <div class="row">
            <div class="col">
                <div class="card text-center border border-success" style="background: #f2f2f2">
                    <h3 class="card-header text-white border border-dark shadow p-3 mb-5 rounded" style="background: #353534">GESTION COMERCIOS</h3>

                    <div class="card-body mt-2">
                        <strong style="color:blue">Cargar Comercio</strong>
                        <a href="./AltaComercios.php" title="Nuevo Comercio" > <img src="./img/nuevo_usuario.png" alt="" width="200" class="animate__animated animate__backInDown"></a>
                        
                        <a href="./AdministrarComercios.php" title="Administrar Comercios"> <img src="./img/user-list.png" alt="" width="200" class="animate__animated animate__backInDown animate__delay-1s"></a>
                        
                        <strong style="color:blue">Administrar Comercios</strong>
                        <br><br>
                    </div>

                    <hr class="mb-5 border border-primary"> 

                    <!--  BOTONES CAT Y RUBRO -->
                    <div class="text-center">
                        <div class="">
                            <div class="d-inline-flex p-2""> 
                                <h5>Administracion de las</h5> <h5 class="text-danger mr-1 ml-1">CATEGORIAS </h5> <h5>del Menu Principal</h5>
                            </div>
                            <br>
                            <a href="./categorias/alta.php"> <button class="btn btn-primary">Agregar Categoria</button> </a>
                            <a href="./categorias/administrar.php"> <button class="btn btn-info">Administrar Categoria</button> </a>
                        </div>

                        <div class="mt-5">
                            <div class="d-inline-flex p-2""> 
                                <h5>Administracion de los</h5> <h5 class="text-danger mr-1 ml-1">RUBROS </h5> <h5>del las categorias</h5>
                            </div>
                            <br>
                            <a href="./rubros/alta.php"> <button class="btn btn-primary">Agregar Rubros</button> </a>
                            <a href="./rubros/administrar.php"> <button class="btn btn-info">Administrar Rubros</button> </a>
                        </div>
                    </div>

                    <div class="card-footer text-muted mt-5 text-center ">
                        <p class="small">BSAPP @2021</p>
                    </div>
                </div>


            </div>
        </div>
    </div>

    
</body>
</html>