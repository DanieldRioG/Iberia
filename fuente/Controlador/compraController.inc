<?php

namespace app\iberia\controlador;

use app\iberia\repositorio\CompraRepositorio;

// Ejemplo de controlador para página home de la aplicación
class CompraController
{
    public function compraAsiento()
    {
        if (isset($_POST['botonAceptar'])) {
            require_once __DIR__ . '/../Repositorio/CompraRepositorio.inc';
            $compradoBillete = (new CompraRepositorio())->compraAsiento($_POST['codigo'], $_POST['fecha'], $_POST['fila'], $_POST['valor']);
        }
        require_once __DIR__ . '/../../app/plantillas/compra.php';
    }
}
