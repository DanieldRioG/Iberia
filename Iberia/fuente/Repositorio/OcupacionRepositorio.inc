<?php

namespace app\iberia\repositorio;

class OcupacionRepositorio
{
    public function mostrarOcupacion(string $codigo, string $fecha): array
    {
        $sql = 'SELECT * FROM vuelos where codigo = :codigo and fecha = :fecha';

        require_once __DIR__ . '/../../core/conexionBd.inc';
        $ocupacion = [];

        try {
            $con = (new \ConexionBd())->getConexion();
            $stn = $con->prepare($sql);
            $stn->bindValue(':codigo', $codigo);
            $stn->bindValue(':fecha', $fecha);
            $stn->execute();
            $ocupacion = $stn->fetchAll(\PDO::FETCH_ASSOC);
            return $ocupacion;
        } catch (\PDOException $ex) {
            throw $ex;
        } finally {
            unset($stn);
            unset($con);
        }
    }
}
