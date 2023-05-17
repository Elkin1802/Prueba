<?php session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informacion Administradores</title>

    <link rel="stylesheet" href="../Styles/tables.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

        <!-- Bootstrap -->

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">


</head>

<body>

<!-- Sub menu Sin funcionamiento -->

    <div class="table">
        <div class="table_header">
            <p>Procesos / Eventos participacion cerrada</p>
            <div>

                <form class="d-flex">

                    <input placeholder="Buscar" type="search" name="busqueda">

                    <button class="add_new" type="submit" name="enviar"><i class="bi bi-search"></i></button>
                    <a class="btn btn-success" href="../Reporte/reporte.excel.php">Generar Reporte</a>
                    <a class="btn btn-danger" href="../Documentacion/agregar.php">Documentacion</a>
                    <a class="btn btn-primary" href="../Oferta/oferta.php">Agregar Oferta</a>

            </div>


<!-- Consulta realizadda para buscar datos -->
        </div>

        <?php
        $conexion = mysqli_connect("localhost", "root", "", "prueba/tecnica");
        $where = "";

        if (isset($_GET['enviar'])) {
            $busqueda = $_GET['busqueda'];


            if (isset($_GET['busqueda'])) {
                $where = "WHERE codigo_segmento LIKE'%" . $busqueda . "%' OR nombre_segmento LIKE'%" . $busqueda . "%'
    OR codigo_familia LIKE'%" . $busqueda . "%' OR nombre_familia  LIKE'%" . $busqueda . "%' OR codigo_clase  LIKE'%" . $busqueda . "%' OR nombre_clase  LIKE'%" . $busqueda . "%' 
    OR codigo_producto  LIKE'%" . $busqueda . "%' OR nombre_producto  LIKE'%" . $busqueda . "%'";
            }
        }

        ?>
<!-- Inicio de la tabla  -->
        <div class=" table_section">

            <table>

                <thead>

                    <tr>
            <th>Identificacion Oferta</th>
            <th>Creador Oferta</th>
            <th>Objeto</th>
            <th>Descripcion</th>
            <th>Moneda</th>
            <th>Presupuesto</th>
            <th>Fecha Inicio</th>
            <th>Hora Inicio</th>
            <th>Fecha de cierre</th>
            <th>Estado</th>

                    </tr>

                </thead>

                <!-- Consulta por medio de los INNER JOIN para traaer datos de varias tablas -->

                <?php
$conexion=mysqli_connect("localhost","root","","prueba/tecnica");               
$SQL="SELECT Of.idoferta, Of.creador_oferta,
                Inf.objeto,
                Inf.descripcion, Inf.moneda,
                Inf.presupuesto, Cro.fecha_inicio, 
                Cro.hora_inicio,
                Cro.fecha_del_cierre, Cro.estado




FROM oferta Of 
INNER JOIN cronograma Cro ON Of.cronograma_id_cronograma = Cro.id_cronograma
INNER JOIN informacion_basica Inf ON Inf.id_informacion_basica = Cro.informacion_basica_id_informacion_basica 


$where";
$dato = mysqli_query($conexion, $SQL);

if($dato -> num_rows >0){
    while($fila=mysqli_fetch_array($dato)){

        //Se organizan los campos para recibir datos mediante la consulta anterior


                        echo '
                <tr>

                <td>' . $fila['idoferta'] . '</td>
                <td>' . $fila['creador_oferta'] . '</td>
                <td>' . $fila['objeto'] . '</td>
                <td>' . $fila['descripcion'] . '</td>
                <td>' . $fila['moneda'] . '</td>
                <td>' . $fila['presupuesto'] . '</td>
                <td>' . $fila['fecha_inicio'] . '</td>
                <td>' . $fila['hora_inicio'] . '</td>
                <td>' . $fila['fecha_del_cierre'] . '</td>
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



</body>

</html>