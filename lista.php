<?php

require 'vendor/autoload.php';

// Conexión MongoDB
$cliente = new MongoDB\Client("mongodb+srv://karolsaenz82_db_user:BLsdBaD0VV2nSJfb@cluster0.ro5ipp8.mongodb.net/?appName=Cluster0");

$db = $cliente->prueba;
$coleccion = $db->gustos;

// Obtener todos los registros
$registros = $coleccion->find();

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Todos los registros</title>
</head>
<body class="container mt-4">

    <h2 class="text-center mb-4">
        TODOS LOS REGISTROS
    </h2>

    <a href="index.html" class="btn btn-secondary mb-3">
        Volver al formulario
    </a>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>Apellidos</th>
                <th>Nombres</th>
                <th>Color favorito</th>
                <th>Comida favorita</th>
                <th>Literatura y cine</th>
                <th>Fecha registro</th>
            </tr>
        </thead>

        <tbody>

        <?php foreach ($registros as $registro) { ?>

            <tr>
                <td><?php echo $registro["apellidos"]; ?></td>
                <td><?php echo $registro["nombres"]; ?></td>
                <td><?php echo $registro["color"]; ?></td>
                <td><?php echo $registro["comida"]; ?></td>
                <td><?php echo $registro["pelicula"]; ?></td>
                <td><?php echo $registro["registro"]; ?></td>
            </tr>

        <?php } ?>

        </tbody>
    </table>

</body>
</html>