<?php namespace App\Models;

use CodeIgniter\Model;

class WMSgetFechasInventario_Model extends Model
{
    //------------------------------------------------------------
    //  INSERTA EL CONTEO DE INVENTARIO
    //------------------------------------------------------------
//Guardado parcial del pedido
   public function sp_getFechas_Inventario($pBodega=null,$pFecha=null)
    {
      try {
          $db = db_connect();         
          $params = array($pBodega,$pFecha);       
          $sql = "{CALL [CLSA].[WMS_sp_getFechas_Inventario] (?,?)}";
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