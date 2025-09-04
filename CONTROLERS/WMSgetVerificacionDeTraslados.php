<?php
namespace App\Controllers;

use App\Models\WMSgetVerificacionDeTraslados_Model;
use CodeIgniter\HTTP\Response;
use CodeIgniter\HTTP\ResponseInterface;
use Exception;

class WMSgetVerificacionDeTraslados extends BaseController
{
    
    /**
     * Get a single client by ID
     */
    public function show($pTipoConsulta)
    {

            $model = new WMSgetVerificacionDeTraslados_Model();
            $msg ="";
           	if(!empty($_GET['pModulo'])) {$pModulo = $_GET["pModulo"];}else {$pModulo = null;}
           	if(!empty($_GET['pOpcion'])) {$pOpcion = $_GET["pOpcion"];}else {$pOpcion = null;}
           	if(!empty($_GET['typeRpt'])) {$typeRpt = $_GET["typeRpt"];}else {$typeRpt = null;}
            if(!empty($_GET['fechaIni'])) {$fechaIni = $_GET["fechaIni"];}else {$fechaIni = null;}
            if(!empty($_GET['fechaFin'])) {$fechaFin = $_GET["fechaFin"];}else {$fechaFin = null;}
			if(!empty($_GET['BodegaOrigen'])) {$BodegaOrigen = $_GET["BodegaOrigen"];}else {$BodegaOrigen = null;}
			if(!empty($_GET['Aplicacion'])) {$Aplicacion = $_GET["Aplicacion"];}else {$Aplicacion = null;}
            
			
            if($pTipoConsulta){
				
				switch ($pTipoConsulta) {

					case 'E':
							// $traslados = $model->listaTraslados($pOpcion,'R', $fechaIni, $fechaFin, $BodegaOrigen, $Aplicacion);
							$traslados = $model->listaTraslados($pModulo,$pOpcion,$typeRpt, $fechaIni, $fechaFin, $BodegaOrigen, $Aplicacion);
							  return $this->getResponse(
							  [
								  'msg'       => 'SUCCESS',
								  'message'   => 'Traslados recuperados con exito',
								  'traslados'   => $traslados
							  ]
						  );
					break;
				
					case 'L':
                            $lineastraslados = $model->detalleTraslados($pModulo,$pOpcion,$typeRpt, $fechaIni, $fechaFin, $BodegaOrigen, $Aplicacion);
                              return $this->getResponse(
                              [
                                  'msg'             => 'SUCCESS',
                                  'message'         => 'Detalle del traslado {$Aplicacion} recuperado con exito',
                                  'lineastraslados'    => $lineastraslados
                              ]
                          );
                    break;
					
					default:
					# code...
					break;
				}                
			}
    }
}