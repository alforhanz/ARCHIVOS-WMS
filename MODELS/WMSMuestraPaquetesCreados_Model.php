<?php

namespace App\Models;

use CodeIgniter\Model;
use Exception;

class WMSMuestraPaquetesCreados_Model extends Model
{
	 //------------------------------------------------------------
    //  Carga las lineas de contenedores aplicados
    //------------------------------------------------------------
  public function getRptTrasladoMercancia($pSistema=null, $pUsuario=null, $pOpcion=null, $fechaIni=null,$fechaFin=null, $BodegaOrigen=null, $Aplicacion=null)
        {
            try {
                $db = db_connect();
                $sql = "{CALL [CLSA].[sp_getRptTrasladoMercancia] (?,?,?,?,?,?,?)}";
                $params = array($pSistema, $pUsuario, $pOpcion, $fechaIni,$fechaFin, $BodegaOrigen, $Aplicacion);
                $query = $db->query($sql, $params)->getResult();
                return $query;
            } catch (Exception $e) {
                throw new Exception('Error al ejecutar el procedimiento almacenado: ' . $e->getMessage());
            }
        }     
}