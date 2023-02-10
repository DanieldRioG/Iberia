<!-- Vista común a la mayoría (sino todas) las vistas de la aplicación
     Suele contener la imagen corporativa de la apliación Web
     Concretamente esta página contiene el nombre de la empresa
     "Cadena Tiendas Media" y una barra de hiperenlaces con un enalace a la
     página home, llamado "inicio"
     El nombre del archivo es indiferente: layout, comun, etc.
-->
<!DOCTYPE html>
<html>

<head>
  <title>Erberia</title>
  <meta charset="utf-8">

  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href='web/css/index.css' />
  <link rel="stylesheet" href="web/css/index.css">
</head>

<body>
  <header>
    <div class="header">
      <h1>ERBERIA</h1>
    </div>
  </header>
  <!-- Observa cómo el enlace agrega el valor de la variable GET 'ctl'
           que será analizado en la página index.php, en este caso le da el
           valor 'inicio' para que la vista cambie a la página home de la
           aplicación
       -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light ">
    <ul class="navbar-nav d-flex">
      <li class="nav-item pt-2">
        <a class="nav-link" href="index.php?ctl=inicio">Inicio <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item pt-2">
        <a class="nav-link" href="index.php?ctl=ocupacion">Ocupacion</a>
      </li>
      <li class="nav-item pt-2">
        <a class="nav-link" href="index.php?ctl=compra">Compra de Billetes</a>
      </li>
      <li class="nav-item pt-2">
        <a class="nav-link" href="index.php?ctl=sesion">Registrarse</a>
      </li>
      <li class="nav-item pt-2">
        <a class="nav-link" href="index.php?ctl=login">Iniciar Sesion</a>
      </li>
      <li class="nav-item pt-2">
        <?php if (isset($_SESSION['correo'])) :
          $nombreUser = explode('@', ucfirst($_SESSION['correo'])); ?>
          <p class="nav-link active ml-5 text-info"><?= $nombreUser[0] ?></p>

      <li class="nav-item pt-2">
        <form action="" method="post">
          <input class="btn btn-danger" type="submit" name="logOut" value="logout"></input>
        </form>
        <?php
          if (isset($_POST['logOut'])) {
            session_unset();
            session_destroy();
            header('Refresh:1;' . 'url=/index.php?ctl=inicio');
          }
        ?>
      </li>
    <?php endif ?>
    </li>

    </ul>
    </div>
  </nav>
  <!-- En general, la mayoría de los enlaces serán a la página index.php
           y una asignación a la variable 'ctl'. El valor de la variable deberá
           ser analizada en la página index.php de cara a encontrar la ruta del
           controlador (y método) que debe procesar la petición
      -->
  </nav>
  <div id="contenido">
    <!-- el id css facilita (si se define) la definición del aspecto visual
           de su contenido
           La variable $contenido hará que se muestre la plantilla concreta, el
           contenido concreto, según la solicitud realizada por el usuario
      -->
    <?= $contenido ?>
  </div>
  <footer>
    <hr id="lP">
    <p style="text-align:center" id="pie">- Pie de página -</p>

  </footer>
</body>

</html>