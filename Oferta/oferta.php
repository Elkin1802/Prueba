<!-- Se realiza la consulta para traer por medio de los select datos existentes de la base de datos -->

<?php

include('../Models/conexion.php');

$insert = mysqli_query($conexion, "SELECT id_cronograma FROM cronograma");

if (isset($_POST['cronograma'])) {
    $cronograma = $_POST['cronograma'];
    echo $cronograma;
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Prueba tecnica</title>

    <!-- Links Css -->

    <link rel="stylesheet" href="../Styles/modulos.css">

    <!-- Bootstrap -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <!-- Icons Bootstrap -->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

</head>

<body>

    <div class="d-grid gap-2 d-md-flex justify-content-md-end">

        <a href="../Reporte/reporte.php" class="btn btn-dark"><i class="bi bi-arrow-left-circle-fill"></i></a>
    </div>


    </div>

    <p></p>
    <form action="oferta.php" method="POST">
        <div class="container">
            <h6 style="background-color: rgb(255, 255, 0);"><br></h6>

            <div class="row g-3">
                <div class="col-md-5">
                    <label for="inputEmail4" class="form-label">Nombre Del Creador Ofertante</label>
                    <input type="text" class="form-control" name="creador_oferta">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Cronograma</label>

                    <select class="form-control" name="cronograma_id_cronograma" required>

                        <?php 
                        while($cronograma = mysqli_fetch_array($insert))
                        {
                    ?>
                        <option value="<?php echo $cronograma['id_cronograma']?>">
                            <?php echo $cronograma['id_cronograma']?>


                        </option>
                        <?php
                        }
                    ?>

                    </select>
                </div>

                <div class="d-grid gap-4 col-3 mx-auto">
                    <button type="submit" name="iniciar" class="btn btn-success">Guardar</button>
                </div>
            </div>
        </div>
    </form>

<!-- Condicion creada para insertar datos  -->

    <?php

include('../Models/conexion.php');

if (isset($_REQUEST['iniciar']) && !empty($_REQUEST['creador_oferta']) && !empty($_REQUEST['cronograma_id_cronograma']) ) {

    $c2 = $_REQUEST['creador_oferta'];
    $c3 = $_REQUEST['cronograma_id_cronograma'];


    $insertar = "INSERT INTO oferta(creador_oferta,cronograma_id_cronograma) VALUES ('$c2','$c3')";
    $query = mysqli_query($conexion, $insertar);

    if ($query) {
        echo 'Registrado';
    } elseif ($query) {

        echo 'Error';

    }

}

?>

    <?php

include('../Models/conexion.php');

if (isset($_REQUEST['iniciar']) && !empty($_REQUEST['fecha_inicio']) && !empty($_REQUEST['hora_inicio']) && !empty($_REQUEST['Fecha_del_cierre']) && !empty($_REQUEST['hora_cierre'])&& !empty($_REQUEST['estado'])&& !empty($_REQUEST['informacion_basica_id_informacion_basica'])) {

    $fecha_inicio = $_REQUEST['fecha_inicio'];
    $hora_inicio = $_REQUEST['hora_inicio'];
    $Fecha_del_cierre = $_REQUEST['Fecha_del_cierre'];
    $hora_cierre = $_REQUEST['hora_cierre'];
    $estado = $_REQUEST['estado'];
    $informacion_basica_id_informacion_basica = $_REQUEST['informacion_basica_id_informacion_basica'];



    $insertar = "INSERT INTO cronograma(fecha_inicio,hora_inicio,Fecha_del_cierre,hora_cierre,estado,informacion_basica_id_informacion_basica)
    VALUES ('$fecha_inicio','$hora_inicio','$Fecha_del_cierre','$hora_cierre','$estado','$informacion_basica_id_informacion_basica')";
    $query = mysqli_query($conexion, $insertar);

    if ($query) {
        echo 'Registrado';
    } elseif ($query) {

        echo 'Error';

    }

}

?>



    <!-- Js Optional -->

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"
        integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js"
        integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous">
    </script>

</body>

</html>