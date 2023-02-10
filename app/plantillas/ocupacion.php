<?php ob_start() ?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<div class="form">
    <form action="" method="post">
        <h5 class="ml-4 mt-3">Buscador Vuelos</h5>
        <label class="ml-4" for="codigo">Codigo <input type="text" name="codigo" id="codigo"></label>
        <label for="fecha">Ida: <input type="date" name="fecha" id="fecha"></label>
        <input type="submit" value="Buscar" name="botonAceptar">
    </form>
</div>
<?php if (isset($_POST['botonAceptar'])) : ?>
    <div class="d-flex flex-column align-items-center justify-content-center mt-5">
        <table class="table caption-top w-50">
            <thead class="thead-dark">
                <tr>
                    <th>Fila</th>
                    <th>A</th>
                    <th>B</th>
                    <th>C</th>
                    <th>D</th>
                    <th>E</th>
                    <th>F</th>
                </tr>
            </thead>
            <?php foreach ($ocupacion as $key => $value) : ?>
                <?php if (is_array($value)) : ?>
                    <?php foreach ($value as $key2 => $value2) : ?>
                        <?php if (str_contains($key2, 'fila')) : ?>
                            <tr>
                                <th><?= ucfirst($key2) ?></th>
                                <th><?= $value2 & 32 ? '&#10060;' : '&#10003;' ?></th>
                                <th><?= $value2 & 16 ? '&#10060;' : '&#10003;' ?></th>
                                <th><?= $value2 & 8 ? '&#10060;' : '&#10003;' ?></th>
                                <th><?= $value2 & 4 ? '&#10060;' : '&#10003;' ?></th>
                                <th><?= $value2 & 2 ? '&#10060;' : '&#10003;' ?></th>
                                <th><?= $value2 & 1 ? '&#10060;' : '&#10003;' ?></th>
                            </tr>
                        <?php endif ?>
                    <?php endforeach ?>
                <?php endif ?>
            <?php endforeach ?>
        </table>
    </div>
<?php endif ?>

<?php $contenido = ob_get_clean() ?>

<?php include 'base.php' ?>

</html>