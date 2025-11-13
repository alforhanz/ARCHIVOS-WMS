<?php

namespace App\Models;

use CodeIgniter\Model;
use Exception;

class WMSverificaCodigoDeBarra_Model extends Model
{
	 //------------------------------------------------------------
    //  VERIFICA LOS CODIGOS DE BARRA
    //------------------------------------------------------------
    public function sp_getCodigoBarraArticulo($pCodigoBarra, $pArticulo)
    {
        try {
            $db = db_connect();
            $sql = "{CALL [CLSA].[sp_getCodigoBarraArticulo] (?,?)}";
            $params = array($pCodigoBarra, $pArticulo);
            $query = $db->query($sql, $params)->getResult();
            return $query;
        } catch (Exception $e) {
            throw new Exception('Error al ejecutar el procedimiento almacenado: ' . $e->getMessage());
        }
    }
}