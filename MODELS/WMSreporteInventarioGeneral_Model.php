<?php namespace App\Models;

use CodeIgniter\Model;

class WMSreporteInventarioGeneral_Model extends Model
{    
    public function GetResumenInventarioGeneral($pSistema=null,$pUsuario=null,$pTipoRpt=null,$pSoloContados=null,$pFecha=null,$pBodega=null,$pAgrupadoClase=null,$pAgrupadoMarca=null,$pclase=null,$pmarca=null,$ptipo=null,$pEnvase=null,$pVentas=null,$pT6=null)
    {
      try {
          $db = db_connect();
          $sql = "{CALL [CLSA].[WMS_sp_getRptInventarioGeneral] (?,?,?,?,?,?,?,?,?,?,?,?,?,?)}";
          $params = array($pSistema,$pUsuario,$pTipoRpt,$pSoloContados,$pFecha,$pBodega,$pAgrupadoClase,$pAgrupadoMarca,$pclase,$pmarca,$ptipo,$pEnvase,$pVentas,$pT6);
          $query = $db->query($sql, $params)->getResult();
          return $query;
      } catch (Exception $e) {
          die('Error GlobalModel(validarusuario) '.$e->getMessage());
      }finally{
        $query = null;
      }
    }
}