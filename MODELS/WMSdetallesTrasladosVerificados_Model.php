<?php namespace App\Models;

use CodeIgniter\Model;

class WMSdetallesTrasladosVerificados_Model extends Model
{    
   public function GetDetalleTraslados( $pSistema=null,
                                        $pUsuario=null,
                                        $pOpcion=null,
                                        $pBodega=null,
                                        $pFechaDesde=null,
                                        $pFechaHasta=null,
                                        $pTraslado=null,
                                        $pArticulo=null,
                                        $pClase=null,
                                        $pMarca=null,
                                        $pTipo=null,
                                        $pEnvase=null,
                                        $pVentas=null,
                                        $pT6=null,
                                        $pTipoTransaccion=null) 
    {
      try {
          $db = db_connect();
          $sql = "{CALL [CLSA].[WMS_sp_getDetalle_Traslados_Verificados] (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)}";
          $params = array($pSistema,$pUsuario,$pOpcion,$pBodega,$pFechaDesde,$pFechaHasta,$pTraslado,$pArticulo,$pClase,$pMarca,$pTipo,$pEnvase,$pVentas,$pT6,$pTipoTransaccion);
          $query = $db->query($sql, $params)->getResult();
          
          return $query;
      } catch (Exception $e) {
          die('Error GlobalModel(validarusuario) '.$e->getMessage());
      }finally{
        $query = null;
      }
    }    
}