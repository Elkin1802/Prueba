<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- Bootstrap -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">


<!-- Icon -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
        
</head>

<body>


    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Informacion Basica</a>

            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link active" aria-current="page" href="#">Cronograma</a>
                    <a class="nav-link" href="#">Limite de inquietudes</a>
                    <a class="nav-link" href="#" >visita en sitio</a>
                </div>
            </div>
        </div>
    </nav>

    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Entregable de la oferta</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link active" aria-current="page" href="#">Información precios</a>
                    <a class="nav-link" href="#">Usuarios Internos</a>
                    <a class="nav-link" href="#">Aprobadores evaluciones</a>
                    <a class="nav-link" href="#">Oferentes</a>
                </div>
            </div>
        </div>
    </nav>
    
    <h6 style="background-color: rgb(255, 255, 0);"><br></h6>

    <!-- Inicio tabla -->

    <div class="table">
        <div class="table_header">
            <p>Contenido - Documentación petición de ofertas / Términos y condiciones del proceso </p>


        </div>


            <table class="table table-striped">

                <thead>

                    <tr>
                        <th>#</th>
                        <th>Tipo</th>
                        <th>Titulo</th>
                        <th>Contenido</th>

                    </tr>

                </thead>

                <?php
$conexion=mysqli_connect("localhost","root","","prueba/tecnica");               
$SQL="SELECT * from documentacion ";
$dato = mysqli_query($conexion, $SQL);

if($dato -> num_rows >0){
    while($fila=mysqli_fetch_array($dato)){



                        echo '
                <tr>
                    <td>' . $fila['id'] . '</td>
                    <td>' . $fila['tipo'] . '</td>
                    <td>' . $fila['titulo'] . '</td>
                    <td>' . $fila['contenido'] . '</td>
                </tr>
                ';
                    }
                } else {

                ?>
                <tr>
                    <td colspan="7">No existen registros</td>
                </tr>


                <?php
                }


                ?>
            </table>

</body>

</html>