<!-- Se realizan consultas para traer datos de la base de datos por medio de los select parte 1-2 -->

<?php

include('../Models/conexion.php');

$insert = mysqli_query($conexion, "SELECT  codigo_segmento,nombre_segmento,codigo_familia,nombre_familia,
codigo_clase,nombre_clase,codigo_producto,nombre_producto FROM clasificador");

if (isset($_POST['clasificador'])) {
    $clasificador = $_POST['clasificador'];
    echo $clasificador;
}
?>

<?php

include('../Models/conexion.php');

$inser = mysqli_query($conexion, "SELECT id_informacion_basica FROM informacion_basica");

if (isset($_POST['informacion_basica'])) {
    $informacion_basica = $_POST['informacion_basica'];
    echo $informacion_basica;
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
    <link rel="stylesheet" href="../Styles/tables.css">

    <!-- Bootstrap -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <!-- Icons Bootstrap -->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

</head>

<body>

<!-- Boton para volver a una pagina en especifico -->

    <div class="d-grid gap-2 d-md-flex justify-content-md-end">

        <a href="../Modulos/modulos.php" class="btn btn-dark"><i class="bi bi-arrow-left-circle-fill"></i></a>
    </div>



    <div class="btn-group" role="group" aria-label="Basic radio toggle button group">

        <!-- Botón Información Básica -->

        <input type="radio" class="btn-check"  id="btnradio1" autocomplete="off"
            onclick="show('Ejemplo1')" checked>
        <label class="btn btn-outline-secondary" for="btnradio1">Información básica</label>

        <!-- Botón Cronograma -->

        <input type="radio" class="btn-check" id="btnradio2" autocomplete="off"
            onclick="show('Ejemplo2')">
        <label class="btn btn-outline-secondary" for="btnradio2">Cronograma</label>

        
        <!-- Botón Informacion -->

    <a href="../Cronograma/index.php"><button type="submit" class="btn-check" id="btnradio3" autocomplete="off"></button></a>
        <label class="btn btn-outline-secondary" for="btnradio3">Informacion</label>

    </div>
<!-- Contenido informacion -->
    <p></p>
    <form action="./create.php" method="POST">
        <div class="container" id="Ejemplo1">
            <h6 style="background-color: rgb(255, 255, 0);"><br></h6>

            <div class="row g-3">
                <div class="col-md-5">
                    <label for="inputEmail4" class="form-label">Objeto</label>
                    <input type="text" class="form-control" name="objeto">
                </div>

                <!-- Se realiza consulta para traer datos de la base de datos parte 2-2 -->
                <div class="col-md-6">
                    <label class="form-label">Actividad</label>

                    <select class="form-control" required>

                        <?php 
                        while($clasificador = mysqli_fetch_array($insert))
                        {
                    ?>
                        <option value="<?php echo $clasificador['codigo_segmento']?>">
                            <?php echo $clasificador['nombre_segmento']?>
                            <?php echo $clasificador['codigo_familia']?> <?php echo $clasificador['nombre_familia']?>
                            <?php echo $clasificador['codigo_clase']?>
                            <?php echo $clasificador['nombre_clase']?> <?php echo $clasificador['codigo_producto']?>
                            <?php echo $clasificador['nombre_producto']?>

                        </option>
                        <?php
                        }
                    ?>

                    </select>
                </div>

                <div class="col-md-1">
                    <br>

                    <div class="d-md-flex">

                        <a href="../Informacion/index.php"><button class="btn btn-secondary m-lg-2 hero__cta" type="button"><i class="bi bi-search"></i></button></a>
                    </div>
                </div>

                <div class="col-12">
                    <label for="inputAddress" class="form-label">Descripcion/Alcance</label>
                    <input type="text" class="form-control" name="descripcion">
                </div>

                <div class="col-md-1">
                    <br>

                    <div class="d-md-flex">
                        <button class="btn btn-secondary m-lg-2" type="button"><i class="bi bi-list-check"></i></button>
                    </div>
                </div>

                <div class="col-4">
                    <label class="form-label">Moneda</label>

                    <select name="moneda" class="form-select" aria-label="Default select example">
                        <option selected>Seleccionar</option>
                        <option value="COP">COP</option>
                        <option value="USD">USD</option>
                        <option value="EUR">EUR</option>
                    </select>
                </div>

                <div class="col-md-1">
                    <br>
                    <button class="btn btn-secondary m-lg-2" type="button"><i
                            class="bi bi-currency-dollar"></i></button>

                </div>
                <div class="col-md-5">
                    <label class="form-label">Presupuesto</label>
                    <input type="number" class="form-control" name="presupuesto">
                </div>

                <div class="d-grid gap-4 col-3 mx-auto">
                    <button type="submit" name="iniciar" class="btn btn-success">Guardar</button>
                </div>
            </div>
        </div>
    </form>

    <!-- Cronograma -->

    <div class="container" id="Ejemplo2">
        <h6 style="background-color: rgb(255, 255, 0);"><br></h6>


        <form action="modal.php" method="POST">

            <div class="row g-3">

                <div class="col-md-5">
                    <label class="form-label">Fecha Inicio</label>
                    <input type="date" name="fecha_inicio" class="form-control">

                </div>

                <div class="col-md-5">

                    <label class="form-label">Hora Inicio</label>
                    <input type="time" name="hora_inicio" class="form-control">

                </div>
                <div class="col-md-5">

                    <label class="form-label">Fecha del cierre</label>
                    <input type="date" name="Fecha_del_cierre" class="form-control">

                </div>

                <div class="col-md-5">

                    <label class="form-label">Hora del cierre</label>
                    <input type="time" name="hora_cierre" class="form-control">

                </div>

                <div class="col-md-5">


                    <label class="form-label">Estado</label>

                    <select name="estado" class="form-control">

                        <option value="Activo">Activo</option>

                    </select>

                </div>

                <div class="col-md-5">

                    <label class="form-label">Objeto</label>

                    <select name="informacion_basica_id_informacion_basica" class="form-control" required>
                        <?php 
    while($informacion_basica = mysqli_fetch_array($inser))
    {
?>
                        <option value="<?php echo $informacion_basica['id_informacion_basica']?>">
                            <?php echo $informacion_basica['id_informacion_basica']?>
                        </option>
                        <?php
    }
?>
                    </select>

                </div>

                <div class="d-grid gap-4 col-3 mx-auto">

                    <button type="submit" name="iniciar" class="btn btn-success">Enviar</button>

                </div>

        </form>

    </div>

<!-- Consulta realizada para la insersion de datos -->

    <?php

include('../Models/conexion.php');

if (isset($_REQUEST['iniciar']) && !empty($_REQUEST['objeto']) && !empty($_REQUEST['descripcion']) && !empty($_REQUEST['moneda']) && !empty($_REQUEST['presupuesto'])) {

    $c2 = $_REQUEST['objeto'];
    $c3 = $_REQUEST['descripcion'];
    $c4 = $_REQUEST['moneda'];
    $c5 = $_REQUEST['presupuesto'];



    $insertar = "INSERT INTO informacion_basica(objeto,descripcion,moneda,presupuesto) VALUES ('$c2','$c3','$c4','$c5')";
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

    <!-- Script -->

    <script src="../js/app.js"></script>

</body>

</html>