

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

</head>

<body>

<div class="d-grid gap-2 d-md-flex justify-content-md-end">

<a href="../Proceso/create.php" class="btn btn-dark"><i class="bi bi-arrow-left-circle-fill"></i></a>
</div>



    <div class="table">
        <div class="table_header">
            <p>Ver informacion Administrativa</p>
            <div>

                <form class="d-flex">

                    <input placeholder="Buscar" type="search" name="busqueda">

                    <button class="add_new" type="submit" name="enviar"><i class="bi bi-search"></i></button>

            </div>
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

        <div class=" table_section">

            <table>

                <thead>

                    <tr>
                        <th>Codigo Segmento</th>
                        <th>Nombre Segmento</th>
                        <th>Codigo Familia</th>
                        <th>Nombre Familia</th>
                        <th>Codigo Clase</th>
                        <th>Nombre Clase</th>
                        <th>Codigo Producto</th>
                        <th>Nombre Producto</th>

                    </tr>

                </thead>

                <?php
$conexion=mysqli_connect("localhost","root","","prueba/tecnica");               
$SQL="SELECT codigo_segmento,nombre_segmento,codigo_familia,nombre_familia,codigo_clase,nombre_clase,codigo_producto,nombre_producto
FROM clasificador $where";
$dato = mysqli_query($conexion, $SQL);

if($dato -> num_rows >0){
    while($fila=mysqli_fetch_array($dato)){



                        echo '
                <tr>
                    <td>' . $fila['codigo_segmento'] . '</td>
                    <td>' . $fila['nombre_segmento'] . '</td>
                    <td>' . $fila['codigo_familia'] . '</td>
                    <td>' . $fila['nombre_familia'] . '</td>
                    <td>' . $fila['codigo_clase'] . '</td>
                    <td>' . $fila['nombre_clase'] . '</td>
                    <td>' . $fila['codigo_producto'] . '</td>
                    <td>' . $fila['nombre_producto'] . '</td>

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