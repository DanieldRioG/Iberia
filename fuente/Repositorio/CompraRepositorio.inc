<?php

namespace app\iberia\repositorio;

class CompraRepositorio
{

    public function compraAsiento(string $codigo, string $fecha, string $fila, string $valorfila): array
    {

        $sqlCompraBillete = "UPDATE vuelos set $fila = $fila + :fila where  codigo = :codigo AND fecha = :fecha ";

        require_once __DIR__ . '/../../core/conexionBd.inc';
        $ocupacion = [];

        try {
            $con = (new \ConexionBd())->getConexion();
            $stn = $con->prepare($sql);
            $stn->bindValue(':codigo', $codigo);
            $stn->bindValue(':fecha', $fecha);
            $stn->bindValue(':fila', $valorfila);
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
