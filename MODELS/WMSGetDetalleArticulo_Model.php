<?php namespace App\Models;

use CodeIgniter\Model;

class WMSGetDetalleArticulo_Model extends Model
{    
      //------------------------------------------------------------
     //  Detalle de las notas de un artículo
    //------------------------------------------------------------
    public function sp_getArticulosDesglose($pSistema=null,$pUsuario=null,$pOpcion=null,$pClase=null,$pMarca=null,$pCodigo=null)
    {
      try {
          $db = db_connect();
          $sql = "{CALL [CLSA].[sp_getArticulosDesglose] (?,?,?,?,?,?)}";
          $params = array($pSistema,$pUsuario,$pOpcion,$pClase,$pMarca,$pCodigo);
          $query = $db->query($sql, $params)->getResult();
          return $query;
      } catch (Exception $e) {
          die('Error GlobalModel(validarusuario) '.$e->getMessage());
      }finally{
        $query = null;
      }
    }   
}