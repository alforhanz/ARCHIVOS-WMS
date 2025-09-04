<?php

namespace App\Models;

use CodeIgniter\Model;
use Exception;

class WMSverificaCodigo_Model extends Model
{
	 //------------------------------------------------------------
    //  VERIFICA LOS CODIGOS DE BARRA
    //------------------------------------------------------------
    public function sp_getCodigoBarraArticulo($params)
    {
        try {
            $db = db_connect();
            $sql = "{CALL [CLSA].[WMS_sp_getCodigoBarraArticulo] (?)}";
            $params = array($params);
            $query = $db->query($sql, $params)->getResult();
            return $query;
        } catch (Exception $e) {
            throw new Exception('Error al ejecutar el procedimiento almacenado: ' . $e->getMessage());
        }
    }
}