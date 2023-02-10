<?php

namespace app\iberia\controlador;

use app\iberia\repositorio\LoginRepositorio;

// Ejemplo de controlador para página home de la aplicación
class LoginController
{
    public function LoginUser()
    {
        if (isset($_POST['login'])) {
            require_once __DIR__ . '/../Repositorio/LoginRepositorio.inc';
            $usuarioParaLoguear = (new LoginRepositorio())->LoginUser($_POST['eCorreo'], $_POST['pwd']);
        }
        require_once __DIR__ . '/../../app/plantillas/login.php';
    }
}
