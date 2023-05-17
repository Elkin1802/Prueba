<?php
    //Conexion base de datos

    //Se rellenan los campos para asignar una ruta y tipo de archico para la documentacion

    include '../Models/conexion.php';

    $file_name = $_FILES['file']['name'];
    $file_name1 = $_FILES['file']['name'];
    $file_name2 = $_FILES['file']['name'];
    $file_name3 = $_FILES['file']['name'];
    $file_tmp = $_FILES['file']['tmp_name'];
    $route = "../docs/".$file_name;

    //copia el archivo y lo ingresa a una carpeta en especifico
    move_uploaded_file($file_tmp, $route);

//Consulta para la insersion de datos para recibir el archivo

    $sql = "INSERT INTO documentacion(id, tipo, titulo, contenido) VALUES ('$file_name', '$file_name1', '$file_name2', '$file_name3')";

    $sql_query = mysqli_query($conexion, $sql);

    echo '<script>
    
    window.location = "doc.php";

    </script>';

?>