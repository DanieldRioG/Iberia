<?php

namespace app\iberia\repositorio;

class LoginRepositorio
{
    public function LoginUser(string $eCorreo, string $pwd): mixed
    {
        $sqlSelectAllUsers = 'SELECT * FROM usuario where eCorreo = :eCorreo';
        require_once __DIR__ . '/../../core/conexionBd.inc';
        $usuarios = [];

        try {
            $con = (new \ConexionBd())->getConexion();
            $stn = $con->prepare($sqlSelectAllUsers);
            $stn->bindValue(':eCorreo', $eCorreo);
            $stn->execute();
            $usuarios = $stn->fetchAll(\PDO::FETCH_ASSOC);
            if (empty($usuarios)) {
                return false;
            } else {
                return $usuarios;
            }
        } catch (\PDOException $ex) {
            throw $ex;
        } finally {
            unset($stn);
            unset($con);
        }
    }
}
