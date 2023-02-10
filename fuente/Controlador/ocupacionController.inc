<?php

namespace app\iberia\controlador;

use app\iberia\repositorio\OcupacionRepositorio;

// Ejemplo de controlador para página home de la aplicación
class OcupacionController
{
    public function mostrarOcupacion()
    {
        if (isset($_POST['botonAceptar'])) {
            require_once __DIR__ . '/../Repositorio/OcupacionRepositorio.inc';
            $ocupacion = (new OcupacionRepositorio())->mostrarOcupacion($_POST['codigo'], $_POST['fecha']);
        }
        require_once __DIR__ . '/../../app/plantillas/ocupacion.php';
    }
}
