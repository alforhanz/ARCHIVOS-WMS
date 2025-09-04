<?php namespace App\Models;

use CodeIgniter\Model;

class WMSgetGuardadoConteoInventario_Model extends Model
{
    //------------------------------------------------------------
    //  INSERTA EL CONTEO DE INVENTARIO
    //------------------------------------------------------------
//Guardado parcial del pedido
   public function sp_InsertUpdate_DatosInventario_Web($pUsuario=null,$pOpcion=null,$pBodega=null,$pEstado=null,$pFecha=null,$jsonDetalles=null,$pUbicacion=null)
    {
      try {
          $db = db_connect();         
          $params = array($pUsuario,$pOpcion,$pBodega,$pEstado,$pFecha,$jsonDetalles,$pUbicacion);       
          $sql = "{CALL [CLSA].[WMS_sp_InsertUpdate_DatosInventario_Web] (?,?,?,?,?,?,?)}";
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