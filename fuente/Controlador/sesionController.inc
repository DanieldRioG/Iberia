<?php

namespace app\iberia\controlador;

use app\iberia\repositorio\SesionRepositorio;

// Ejemplo de controlador para página home de la aplicación
class SesionController
{
    public function RegistroUser()
    {
        if (isset($_POST['registrar'])) {
            require_once __DIR__ . '/../Repositorio/SesionRepositorio.inc';
            $usuarioParaRegistrar = (new SesionRepositorio())->RegistroUser($_POST['eCorreo'], password_hash($_POST['pwd'], PASSWORD_DEFAULT), $_POST['rol']);
        }
        require_once __DIR__ . '/../../app/plantillas/sesion.php';
    }
}
