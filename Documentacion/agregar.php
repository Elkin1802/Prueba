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

</head>

<body>



<div class="container" >

<form action="subir.doc.php" method="POST" enctype="multipart/form-data" >

<div class="row g-3">
    <div class="col-md-12">
        <label for="inputEmail4" class="form-label">Subir documentacion</label>
        <input type="file" class="form-control" name="file">
    </div>

    <div class="d-grid gap-4 col-3 mx-auto">
        <button type="submit" class="btn btn-success">Guardar</button>
    </div>
</div>


</form>

</body>

</html>