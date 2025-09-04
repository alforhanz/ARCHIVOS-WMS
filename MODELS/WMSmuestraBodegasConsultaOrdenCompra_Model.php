<?php

namespace App\Models;

use CodeIgniter\Model;
use Exception;

class WMSmuestraBodegasConsultaOrdenCompra_Model extends Model
{
    //------------------------------------------------------------
    //  Muestra las bodegas
    //------------------------------------------------------------
    public function sp_ObtenerBodegas()
    {
        try {
            $db = db_connect();
            $sql = "{CALL CLSA.WMS_sp_ObtenerBodegas}";            
            $query = $db->query($sql)->getResult();
            return $query;
        } catch (Exception $e) {
            throw new Exception('Error al ejecutar el procedimiento almacenado para obtener las bodegas: ' . $e->getMessage());
        }
    }
}