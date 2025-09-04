<?php
namespace App\Models;
use CodeIgniter\Model;
use Exception;

class WMSautorizacion_Model extends Model
{
    //------------------------------------------------------------
    //  LISTA LAS ORDENES DE COMPRA EN TRANSITO SIN PROCESAR
    //------------------------------------------------------------
    public function sp_getUsuario_Privilegio($pSistema=null,$pUsuario=null,$pOpcion=null,$pModulo=null)
    {
        try {
            $db = db_connect();
            $sql = "{CALL [CLSA].[sp_getUsuario_PrivilegioEditar] (?,?,?,?)}";
            $params = array($pSistema,$pUsuario,$pOpcion,$pModulo);
            $query = $db->query($sql, $params)->getResult();
            return $query;
        } catch (Exception $e) {
            throw new Exception('Error al ejecutar el procedimiento almacenado: ' . $e->getMessage());
        }
    }

}