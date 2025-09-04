<?php namespace App\Models;

use CodeIgniter\Model;

class WMScreacionDeBoletas_Model extends Model
{    
    public function GetPresentaBoleta($pSistema=null,$pUsuario=null,$TipoConsulta=null,$FechaProceso=null,$Bodega=null,$SoloDiferencia=null,$SoloConteoCero=null,$Clasificacion=null,$Articulo=null)
    {
      try {
          $db = db_connect();
          $sql = "{CALL [CLSA].[sp_getArticulos_Inventario_boleta] (?,?,?,?,?,?,?,?,?)}";
          $params = array($pSistema,$pUsuario,$TipoConsulta,$FechaProceso,$Bodega,$SoloDiferencia,$SoloConteoCero,$Clasificacion,$Articulo);
          $query = $db->query($sql, $params)->getResult();
          return $query;
      } catch (Exception $e) {
          die('Error GlobalModel(validarusuario) '.$e->getMessage());
      }finally{
        $query = null;
      }
    }

    public function GetActualizaCostos($pSistema=null,$pUsuario=null,$pOrigen=null,$pClasificacion=null,$pArticulo=null,$pBodega=null,$FechaProceso=null)
      {
        try {
            $db = db_connect();
            $sql = "{CALL [CLSA].[sp_update_costueps_inventory] (?,?,?,?,?,?,?)}";
            $params = array($pSistema,$pUsuario,$pOrigen,$pClasificacion,$pArticulo,$pBodega,$FechaProceso);
            $query = $db->query($sql, $params)->getResult();
            return $query;
        } catch (Exception $e) {
            die('Error GlobalModel(validarusuario) '.$e->getMessage());
        }finally{
          $query = null;
        }
      }

    public function GetCrearBoleta($pSistema=null,$pUsuario=null,$pOpcion=null,$FechaProceso=null,$Bodega=null,$SoloDiferencia=null,$Clasificacion=null,$Articulo=null)
      {
        try {
            $db = db_connect();
            $sql = "{CALL [CLSA].[sp_Generar_InventarioFisico_Boleta] (?,?,?,?,?,?,?,?)}";
            $params = array($pSistema,$pUsuario,$pOpcion,$FechaProceso,$Bodega,$SoloDiferencia,$Clasificacion,$Articulo);
            // $query = $db->query($sql, $params)->getResult();
            $query = $db->query($sql, $params)->getResultArray();
            // var_dump($query);
            return $query;
        } catch (Exception $e) {
            die('Error GlobalModel(validarusuario) '.$e->getMessage());
        }finally{
          $query = null;
        }
      }
}