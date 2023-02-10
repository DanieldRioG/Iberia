<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<?php
/* Ejemplo de plantilla que se mostrará dentro de la plantilla principal
  ob_start() activa el almacenamiento en buffer de la página. Mientras se
             almacena en el buffer no se produce salida alguna hacia el
             navegador del cliente
  luego viene el código html y/o php que especifica lo que debe aparecer en
     el cliente web
  ob_get_clean() obtiene el contenido del buffer (que se pasa a la variable
             $contenido) y elimina el contenido del buffer
  Por último se incluye la página que muestra la imagen común de la aplicación
    (en este caso base.php) la cual contiene una referencia a la variable
    $contenido que provocará que se muestre la salida del buffer dentro dicha
    página "base.php"
*/
?>
<?php ob_start() ?>

<div class="form">
  <form action="" method="post">
    <h5 class="ml-4 mt-3">Mostrar Vuelos</h5>
    <label for="salida" class="form-label ml-4">Salir de: <input type="text" name="salida"></label>
    <label for="destino" class="form-label">Destino: <input type="text" name="destino"></label>
    <label for="ida" class="form-label">Ida: &nbsp &nbsp &nbsp<input type="date" name="ida"></label>
    <label for="vuelta" class="form-label">Vuelta: <input type="date" name="vuelta"></label>
    <input type="submit" value="Buscar" name="ok" id="botonSubm">
  </form>

</div>
<div class="d-flex flex-column align-items-center justify-content-center ">
  <?php if (isset($_POST['ok'])) : ?>
    <?php if (empty($_POST['salida'] && $_POST['destino'] && $_POST['ida'] && $_POST['vuelta'])) : ?>
      <?= 'No has rellenado los campos' ?>
    <?php else : ?>
      <caption class="mt-5 ">VUELO IDA</caption>
      <table class="table table-dark caption-top w-50">
        <tr>
          <th>ID Vuelo</th>
          <th>Salida</th>
          <th>Destino</th>
          <th>Hora Ida</th>
          <th>Hora Vuelta</th>
          <th>Fecha</th>
        </tr>
        <tr>
          <?php
          if (isset($vuelos['ida'])) :
            $arrayVuelo = $vuelos['ida'][0];
            foreach ($arrayVuelo as $key => $value) : ?>
              <?php if (str_contains($value, ':')) : ?>
                <?php $horasMin = explode(':', $value) ?>
                <td><?= $horasMin[0] . 'H ' . $horasMin[1] . 'M ' ?></td>
              <?php else : ?>
                <td><?= $value ?></td>
              <?php endif ?>
            <?php endforeach ?>
          <?php endif ?>

        </tr>
      </table><br>

      <caption class="mt-5">VUELO VUELTA</caption>
      <table class="table table-dark table-caption-top w-50">
        <tr>
          <th>ID Vuelo</th>
          <th>Salida</th>
          <th>Destino</th>
          <th>Hora Ida</th>
          <th>Hora Vuelta</th>
          <th>Fecha</th>
        </tr>
        <tr>
          <?php $arrayVueloVuelta = $vuelos['vuelta'][0];
          if (isset($vuelos['ida'])) :
            foreach ($arrayVueloVuelta as $key2 => $value2) : ?>
              <?php if (str_contains($value2, ':')) : ?>
                <?php $horasMin = explode(':', $value2) ?>
                <td><?= $horasMin[0] . 'H ' . $horasMin[1] . 'M ' ?></td>
              <?php else : ?>
                <td><?= $value2 ?></td>
              <?php endif ?>
            <?php endforeach ?>
          <?php endif ?>
        </tr>
      </table>
    <?php endif ?>
  <?php endif ?>
</div>


<?php $contenido = ob_get_clean() ?>

<?php include 'base.php' ?>