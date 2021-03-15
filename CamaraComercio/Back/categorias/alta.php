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
                <h3 class="card-header text-white border border-dark shadow p-3 mb-5 rounded bg-dark">Alta Categorias</h3>
                <br>
                <form action="guardar.php" method="POST" enctype="multipart/form-data">
                    <div class="form-group mt-3">
                        <input type="text" placeholder="Nombre..." name="nombre" style="width:30rem"> 
                    </div>

                    <div class="form-group mt-3">
                        <input type="file" placeholder="logo" name="logo"> 
                    </div>

                    <div class="card-footer text-right text-right">
                        <button type="submit" class="btn btn-primary mt-5">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
</body>
</html>