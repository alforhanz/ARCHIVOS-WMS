<?php namespace App\Models;

use CodeIgniter\Model;

class WMSGetContenedores_Model extends Model
{
    //------------------------------------------------------------
    //  BUSQUEDA ENCABEZADO Y DETALLE DE CONTENEDORES
    //------------------------------------------------------------

     public function spContenedores($pSistema=null, $pUsuario=null, $pOpcion=null, $pBodegaEnvia=null, $pBodegaSolicita=null, $pConsecutivo=null, $pEstado=null, $pFechaDesde=null, $pFechaHasta=null)
    {
      try {
          $db = db_connect();
          $params = array($pSistema, $pUsuario, $pOpcion,$pBodegaEnvia,$pBodegaSolicita,$pConsecutivo ,$pEstado, $pFechaDesde, $pFechaHasta);
          $sql = "CLSA.WMS_sp_getTrasladoContenedor ?,?,?,?,?,?,?,?,?";
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
    //  GUARDA Y PROCESA LA LECTURA DE LAS LINEAS DEL CONTENEDOR
    //------------------------------------------------------------
  
     public function spGuardaCont($pSistema=null, $pUsuario=null, $pOpcion=null, $pModulo=null, $pConsecutivo=null, $jsonDetalles=null, $pEstado=null, $pBodega=null,$pUsuarioAutorizacion=null)
    {
      try {
          $db = db_connect();       
          $params = array($pSistema, $pUsuario, $pOpcion, $pModulo, $pConsecutivo, $jsonDetalles, $pEstado, $pBodega, $pUsuarioAutorizacion);          
          $sql = "CLSA.WMS_sp_InsertUpdate_ControlEntrega_Contenedor_v2 ?,?,?,?,?,?,?,?,?";
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