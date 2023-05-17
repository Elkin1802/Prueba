<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Prueba tecnica</title>

    <!-- Links Css -->

    <link rel="stylesheet" href="../Styles/tables.css">

    <!-- Bootstrap -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <!-- Icons Bootstrap -->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

</head>

<body>

    <div class="d-grid gap-2 d-md-flex justify-content-md-end">

        <a href="../Proceso/create.php" class="btn btn-dark"><i class="bi bi-arrow-left-circle-fill"></i></a>
    </div>

    <!-- Informacion -->

    <div class="table">
        <div class="table_header">
            <div>

                <form class="d-flex" method="POST">


            </div>
        </div>

        <div class=" table_section">

            <table>

                <thead>

                    <tr>
                        <th>#</th>
                        <th>Objeto</th>
                        <th>Descripcion</th>
                        <th>Moneda</th>
                        <th>Presupuesto</th>
                        <th>Fecha Inicio</th>
                        <th>Hora Inicio</th>
                        <th>Fecha del cierre</th>
                        <th>Hora cierre</th>
                        <th>Estado</th>
                    </tr>

                </thead>

                <?php
$conexion=mysqli_connect("localhost","root","","prueba/tecnica");               
$SQL="SELECT 
Cro.id_cronograma,
Inf.objeto,
Inf.descripcion, 
Inf.moneda,
Inf.presupuesto, 
Cro.fecha_inicio, 
Cro.hora_inicio,
Cro.fecha_del_cierre,
Cro.hora_cierre,
Cro.estado


FROM informacion_basica Inf
INNER JOIN cronograma Cro ON Inf.id_informacion_basica  = Cro.informacion_basica_id_informacion_basica";
$dato = mysqli_query($conexion, $SQL);

if($dato -> num_rows >0){
    while($fila=mysqli_fetch_array($dato)){



                        echo '
                <tr>
                    <td>' . $fila['id_cronograma'] . '</td>
                    <td>' . $fila['objeto'] . '</td>
                    <td>' . $fila['descripcion'] . '</td>
                    <td>' . $fila['moneda'] . '</td>
                    <td>' . $fila['presupuesto'] . '</td>
                    <td>' . $fila['fecha_inicio'] . '</td>
                    <td>' . $fila['hora_inicio'] . '</td>
                    <td>' . $fila['fecha_del_cierre'] . '</td>
                    <td>' . $fila['hora_cierre'] . '</td>
                    <td>' . $fila['estado'] . '</td>

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

        </div>

    </div>


    <!-- Js Optional -->

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"
        integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js"
        integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous">
    </script>

    <!-- Script -->


</body>

</html>