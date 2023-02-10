<?php

// Vector multidimensional con rutas a controlador y método que debe
// atender cada enlace
/* formato:
    Primera dimensaión: nombre del enlace pasado mediante variable GET 'ctl'
     'nombreEnlace' => array() segunda dimesion con información del controlador
                       que atiende esa petición, clave 'controller', y del
                       método concreto que está especializado en su tratamiento,
                       clave 'action'
  Se debe agregar una ruta por cada valor diferente que tome la variable 'ctl'.
  La clave 'inicio' referencia la página home de la aplicación y especifica
    el controlador que debe decidir cuál es la vista que se debe mostrar
*/
$mapeoRutas =
  [
    'inicio' =>
    ['controller' => 'app\iberia\controlador\DefaultController', 'action' => 'inicio'],

    'ocupacion' =>
    ['controller' => 'app\iberia\controlador\OcupacionController', 'action' => 'mostrarOcupacion'],

    'compra' =>
    ['controller' => 'app\iberia\controlador\CompraController', 'action' => 'compraAsiento'],

    'sesion' =>
    ['controller' => 'app\iberia\controlador\SesionController', 'action' => 'RegistroUser'],

    'login' =>
    ['controller' => 'app\iberia\controlador\LoginController', 'action' => 'LoginUser'],
  ];