<?php

namespace App\Models;

use CodeIgniter\Model;
use Exception;

class WMSVerificadorDeContenedores_Model extends Model
{
	 //------------------------------------------------------------
    //  Carga las lineas de contenedores aplicados
    //------------------------------------------------------------
  public function sp_getLineasTrasladosMuelle($pSistema=null, $pUsuario=null, $pOpcion=null, $pBodegaEnvia=null,$pBodegaDestino=null, $pContenedor=null, $pEstado=null, $pFechaDesde=null,$pArticulo=null)
        {
            try {
                $db = db_connect();
                $sql = "{CALL [CLSA].[WMS_sp_getLineasTrasladosMuelle] (?,?,?,?,?,?,?,?,?)}";
                $params = array($pSistema, $pUsuario, $pOpcion, $pBodegaEnvia,$pBodegaDestino, $pContenedor, $pEstado, $pFechaDesde,$pArticulo);
                $query = $db->query($sql, $params)->getResult();
                return $query;
            } catch (Exception $e) {
                throw new Exception('Error al ejecutar el procedimiento almacenado: ' . $e->getMessage());
            }
        }

        //------------------------------------------------------------
        //  Guarda la verificacion de las lineas de contenedores aplicados
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

   //------------------------------------------------------------------------------------------------------------------------
  //  Imprime el reporte del paquete creado por la verificacion de las lineas de contenedores aplicados
 //--------------------------------------------------------------------------------------------------------------------------
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

   //------------------------------------------------------------------------------------------------------------------------
  //  Devuelve el articulo de un contenedor antes de crear el paquete.
 //--------------------------------------------------------------------------------------------------------------------------
    public function devolucionDeArticuloContenedor($pSistema=null, $pUsuario=null, $pOpcion=null, $BodegaSolic=null,$BodegaEnvia=null, $pAutorizado=null, $jsonDetalles=null)
            {
              try {
                  $db = db_connect();          
                 $params = array($pSistema, $pUsuario, $pOpcion, $BodegaSolic,$BodegaEnvia, $pAutorizado, $jsonDetalles);          
                  $sql = "{CALL [CLSA].[WMS_sp_update_lineas_TrasladoyContenedor] (?,?,?,?,?,?,?)}";
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