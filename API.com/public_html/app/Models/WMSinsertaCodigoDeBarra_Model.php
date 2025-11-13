<?php
namespace App\Models;
use CodeIgniter\Model;
use Exception;

class WMSinsertaCodigoDeBarra_Model extends Model
{
    //------------------------------------------------------------
    //  LISTA LAS ORDENES DE COMPRA EN TRANSITO SIN PROCESAR
    //------------------------------------------------------------
    public function sp_insert_codigobarra($pUsuario,$pClave, $pArticulo, $pCodigoBarra,$pOpcion)
    {
        try {
            $db = db_connect();
            $sql = "{CALL [CLSA].[sp_insert_codigobarra] (?,?,?,?,?)}";
            $params = array($pUsuario, $pClave, $pArticulo,$pCodigoBarra,$pOpcion);
            $query = $db->query($sql, $params)->getResult();
            return $query;
        } catch (Exception $e) {
            throw new Exception('Error al ejecutar el procedimiento almacenado: ' . $e->getMessage());
        }
    }

}