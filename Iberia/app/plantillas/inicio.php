<link rel="stylesheet" href="web/css/index.css">
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

<form action="" method="post">
  <fieldset>
    <legend>Buscador de vuelos</legend>
    <label for="salida">Salir de: <input type="text" name="salida" id="salida"></label>
    <label for="destino">Destino: <input type="text" name="destino" id="destino"></label>
    <label for="ida">Ida: <input type="date" name="ida" id="ida"></label>
    <label for="vuelta">Vuelta:<input type="date" name="vuelta" id="vuelta"></label>
    <input type="submit" value="Buscar" name="ok">
  </fieldset>
</form>

<?php if (isset($_POST['ok'])) : ?>



  <table id="tabla">
    <caption>Vuelo de Ida</caption>
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
          <td><?= $value ?></td>
        <?php endforeach ?>
      <?php endif ?>
    </tr>
  </table>

  <table id="tabla">
    <caption>Vuelo de Vuelta</caption>
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
          <td><?= $value2 ?></td>
        <?php endforeach ?>
      <?php endif ?>
    </tr>
  </table>

<?php endif ?>

<?php $contenido = ob_get_clean() ?>

<?php include 'base.php' ?>