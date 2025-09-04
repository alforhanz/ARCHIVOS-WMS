<?php namespace App\Models;

use CodeIgniter\Model;

class WMSdeleteDatosInventario_Model extends Model
{
    //------------------------------------------------------------
    //  INSERTA EL CONTEO DE INVENTARIO
    //------------------------------------------------------------
//Guardado parcial del pedido
   public function sp_Delete_Datos($pUsuario=null,$pBodega=null,$pFecha=null,$jsonDetalles=null)
    {
      try {
          $db = db_connect();         
          $params = array($pUsuario,$pBodega,$pFecha,$jsonDetalles);       
          $sql = "{CALL [CLSA].[WMS_sp_Delete_DatosInventario_Web] (?,?,?,?)}";
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