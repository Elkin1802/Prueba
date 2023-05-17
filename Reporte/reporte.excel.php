<!-- Conexion a la base de datos -->
<!-- Se le da extension al archivo -->
<!-- Se le da nombre en especifico al archivo -->
<?php

require_once ("../Models/conexion.php");
header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename=reporte.xls");
?>


<table class="table table-striped table-dark " id="table_id">

<!-- Contenido de la tabla -->

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
    <tbody>

    <!-- Consulta con inner joins para la muestra de datos de varias tablas -->

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
INNER JOIN informacion_basica Inf ON Inf.id_informacion_basica = Cro.informacion_basica_id_informacion_basica ";
$dato = mysqli_query($conexion, $SQL);


if($dato -> num_rows >0){
while($fila=mysqli_fetch_array($dato)){

    //Campos a rellenar con datos de la BD
?>
        <tr>
            <td><?php echo $fila['idoferta']; ?></td>
            <td><?php echo $fila['creador_oferta']; ?></td>
            <td><?php echo $fila['objeto']; ?></td>
            <td><?php echo $fila['descripcion']; ?></td>
            <td><?php echo $fila['moneda']; ?></td>
            <td><?php echo $fila['presupuesto']; ?></td>
            <td><?php echo $fila['fecha_inicio']; ?></td>
            <td><?php echo $fila['hora_inicio']; ?></td>
            <td><?php echo $fila['fecha_del_cierre']; ?></td>
            <td><?php echo $fila['estado']; ?></td>


            <?php
}

}
