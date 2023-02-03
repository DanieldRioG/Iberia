<?php ob_start() ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>


<body>
    <form action="" method="post">
        <fieldset>
            <legend>Buscador de vuelos</legend>
            <label for="codigo">Codigo <input type="text" name="codigo" id="codigo"></label>
            <label for="fecha">Ida: <input type="date" name="fecha" id="fecha"></label>
        </fieldset>
        <input type="submit" value="Buscar" name="botonAceptar">
    </form>
</body>

<?php var_dump($ocupacion); ?>

<?php if (isset($_POST['botonAceptar'])) : ?>

    <table id="tabla2">
        <tr>
            <th>Fila</th>
            <th>A</th>
            <th>B</th>
            <th>C</th>
            <th>D</th>
            <th>E</th>
            <th>F</th>
            <th>Filas</th>
        </tr>
        <?php for ($i = 1; $i <= 20; $i++) : ?>
            <tr>
                <th>Fila <?= $i ?></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th>Fila <?= $i ?></th>
            </tr>
        <?php endfor ?>
    </table>
<?php endif ?>

<?php $contenido = ob_get_clean() ?>

<?php include 'base.php' ?>

</html>