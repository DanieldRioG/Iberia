<?php ob_start() ?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

<div class="form">
    <form action="" method="post">
        <h5 class="ml-4 mt-3">Mostrar Vuelos</h5>
        <label for="salida" class="form-label ml-4">Codigo de Vuelo <input type="text" name="salida"></label>
        <label for="destino" class="form-label">Fecha del vuelo <input type="text" name="destino"></label>
        <label class="ml-3" for="rol">Fila:</label><select name="fila" id="fila">
            <?php for ($i = 1; $i <= 20; $i++) : ?>
                <option value="fila<?= $i ?>">Fila: <?= $i ?></option>
            <?php endfor ?>
        </select>
        <label class="ml-4" for="rol">Columna: </label><select name="fila" id="fila">
            <option value="A">Columna A</option>
            <option value="B">Columna B</option>
            <option value="C">Columna C</option>
            <option value="D">Columna D</option>
            <option value="E">Columna E</option>
            <option value="F">Columna F</option>
        </select><br>
        <input class="btn btn-info mt-3 ml-4" type="submit" value="Buscar" name="ok" id="botonSubm">
    </form>
</div>


<?php $contenido = ob_get_clean() ?>

<?php include 'base.php' ?>