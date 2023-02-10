<?php

namespace app\iberia\repositorio;

class SesionRepositorio
{
    public function RegistroUser(string $eCorreo, string $pwd, string $rol): bool
    {
        $sqlSelectAllUsers = 'SELECT * FROM usuario where eCorreo = :eCorreo';
        $sqlInsertUsuario = 'INSERT INTO usuario (eCorreo, pwd, rol) values (:eCorreo, :pwd, :rol)';
        require_once __DIR__ . '/../../core/conexionBd.inc';
        $usuarios = [];

        try {
            $con = (new \ConexionBd())->getConexion();
            $stn = $con->prepare($sqlSelectAllUsers);
            $stn->bindValue(':eCorreo', $eCorreo);
            $stn->execute();
            $usuarios = $stn->fetchAll(\PDO::FETCH_ASSOC);
        } catch (\PDOException $ex) {
            throw $ex;
        } finally {
            unset($stn);
            unset($con);
        }
        if (empty($usuarios)) {
            try {
                $con = (new \ConexionBd())->getConexion();
                $stn = $con->prepare($sqlInsertUsuario);
                $stn->bindValue(':eCorreo', $eCorreo);
                $stn->bindValue(':pwd', $pwd);
                $stn->bindValue(':rol', $rol);
                $stn->execute();
            } catch (\PDOException $ex) {
                throw $ex;
            } finally {
                unset($stn);
                unset($con);
            }
            return true;
        } else {
            return false;
        }
    }
}
