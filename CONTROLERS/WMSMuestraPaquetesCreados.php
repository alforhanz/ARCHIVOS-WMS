<?php

namespace App\Controllers;

use App\Models\WMSMuestraPaquetesCreados_Model;
use CodeIgniter\HTTP\ResponseInterface;
use Exception;

class WMSMuestraPaquetesCreados extends BaseController
{	
    public function muestraPaquetesCreados()
        {
            try {
                    $model = new WMSMuestraPaquetesCreados_Model();
                    //Definir los parametros
                           
                    $pSistema = !empty($_GET['pSistema']) ? $_GET["pSistema"] : null;             
                    $pUsuario = !empty($_GET['pUsuario']) ? $_GET["pUsuario"] : null; 
                    $pOpcion = !empty($_GET['pOpcion']) ? $_GET["pOpcion"] : null;  
                    $fechaIni = !empty($_GET['fechaIni']) ? $_GET["fechaIni"] : null;  
                    $fechaFin = !empty($_GET['fechaFin']) ? $_GET["fechaFin"] : null;  
                    $BodegaOrigen = !empty($_GET['BodegaOrigen']) ? $_GET["BodegaOrigen"] : null;  
                    $Aplicacion = !empty($_GET['Aplicacion']) ? $_GET["Aplicacion"] : null;  
                    

                    // Llama al procedimiento almacenado con los parámetros adecuados
                    $ordenCompra = $model->getRptTrasladoMercancia($pSistema, $pUsuario, $pOpcion, $fechaIni,$fechaFin, $BodegaOrigen, $Aplicacion);

                    return $this->getResponse([
                        'msg' => 'SUCCESS',
                        'message' => 'Consulta recuperada con éxito',
                        'respuesta' => $ordenCompra
                    ]);
                } catch (Exception $e) {
                    return $this->getResponse(['message' => 'No se pudo completar la consulta: ' . $e->getMessage()], ResponseInterface::HTTP_INTERNAL_SERVER_ERROR);
                }
        }
}