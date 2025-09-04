<?php namespace App\Models;

use CodeIgniter\Model;

class WMSgetResumenInventario_Model extends Model
{
    //------------------------------------------------------------
    //  INSERTA EL CONTEO DE INVENTARIO
    //------------------------------------------------------------
//Guardado parcial del pedido
   public function sp_getInventario_web($pSistema=null,$pUsuario=null,$pOpcion=null,$pBodega=null,$pFecha=null,$jsonDetalles=null,$pSoloContados=null,$pArticulo=null)
    {
      try {
          $db = db_connect();         
          $params = array($pSistema,$pUsuario,$pOpcion,$pBodega,$pFecha,$jsonDetalles,$pSoloContados,$pArticulo);       
          $sql = "{CALL [CLSA].[WMS_sp_getInventario_web] (?,?,?,?,?,?,?,?)}";
          $query = $db->query($sql,$params)->getResult();
          return $query;
          $query->free_result();
          $db->close();
      } catch (Exception $e) {
          die($e->getMessage());
          return "";
      }
    }
}