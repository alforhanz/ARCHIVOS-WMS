<?php

namespace App\Models;

use CodeIgniter\Model;
use Exception;

class WMSVerificadorDeContenedores_Model extends Model
{
	 //------------------------------------------------------------
    //  Carga las lineas de contenedores aplicados
    //------------------------------------------------------------
  public function sp_getLineasTrasladosMuelle($pSistema=null, $pUsuario=null, $pOpcion=null, $pBodegaEnvia=null,$pBodegaDestino=null, $pContenedor=null, $pEstado=null, $pFechaDesde=null)
        {
            try {
                $db = db_connect();
                $sql = "{CALL [CLSA].[WMS_sp_getLineasTrasladosMuelle] (?,?,?,?,?,?,?,?)}";
                $params = array($pSistema, $pUsuario, $pOpcion, $pBodegaEnvia,$pBodegaDestino, $pContenedor, $pEstado, $pFechaDesde);
                $query = $db->query($sql, $params)->getResult();
                return $query;
            } catch (Exception $e) {
                throw new Exception('Error al ejecutar el procedimiento almacenado: ' . $e->getMessage());
            }
        }

        //------------------------------------------------------------
        //  Carga las lineas de contenedores aplicados
        //------------------------------------------------------------

  public function spGuardaCreaPaquetes($pSistema=null, $pUsuario=null, $pOpcion=null, $pBodegaOrigen=null,$pBodegaDestino=null, $pFecha=null, $pPlaca=null, $jsonPaquete=null )
        {
          try {
              $db = db_connect();          
             $params = array($pSistema, $pUsuario, $pOpcion, $pBodegaOrigen,$pBodegaDestino, $pFecha, $pPlaca, $jsonPaquete);          
              $sql = "{CALL [CLSA].[WMS_sp_insert_documento_invTRAS] (?,?,?,?,?,?,?,?)}";
              $query = $db->query($sql,$params)->getResult();
              return $query;
              $query->free_result();
              $db->close();
          } catch (Exception $e) {
              die($e->getMessage());
              return "";
          }
        }


    public function imprimePaqueteDocInventario($pSistema=null, $pUsuario=null, $pTipoConsulta=null,$pTipoPaquete=null, $pPaquete=null)
            {
              try {
                  $db = db_connect();          
                 $params = array($pSistema, $pUsuario, $pTipoConsulta,$pTipoPaquete, $pPaquete);          
                  $sql = "{CALL [CLSA].[sp_getPaqueteDocInventario] (?,?,?,?,?)}";
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