<?php namespace App\Models;

use CodeIgniter\Model;

class WMSgetVerificacionDeTraslados_Model extends Model
{
      //------------------------------------------------------------
     //  BUSQUEDA LISTA DE TRASLADOS
    //------------------------------------------------------------
   public function listaTraslados($pModulo=null,$pOpcion=null,$typeRpt=null, $fechaIni=null, $fechaFin=null, $BodegaOrigen=null, $Aplicacion=null)
    {
      try {
          $db = db_connect();
          $params = array($pModulo,$pOpcion,$typeRpt, $fechaIni, $fechaFin, $BodegaOrigen, $Aplicacion);
          $sql = "CLSA.WMS_sp_getTrasladoMercancia ?,?,?,?,?,?,?";          
          $query = $db->query($sql,$params)->getResult();
          return $query;
          $query->free_result();
          $db->close();
      } catch (Exception $e) {
          die($e->getMessage());
          return "";
      }
    }

	    //------------------------------------------------------------
     //  DETALLE DE TRASLADOS
    // ------------------------------------------------------------
	 public function detalleTraslados($pModulo=null,$pOpcion=null,$typeRpt=null, $fechaIni=null, $fechaFin=null, $BodegaOrigen=null, $Aplicacion=null)
    {
      try {
          $db = db_connect();
          $params = array($pModulo,$pOpcion,$typeRpt, $fechaIni, $fechaFin, $BodegaOrigen, $Aplicacion);
          $sql = "CLSA.WMS_sp_getTrasladoMercancia ?,?,?,?,?,?,?"; 
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