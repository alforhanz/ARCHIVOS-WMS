<?php
namespace App\Controllers;

use App\Models\WMSGetContenedores_Model;
use CodeIgniter\HTTP\Response;
use CodeIgniter\HTTP\ResponseInterface;
use Exception;

class WMSGetContenedores extends BaseController
{
    protected $format = 'json';

    /**
     * Get a single client by ID
     */
    public function buscaContenedores()
    	{

            $model = new WMSGetContenedores_Model();
            $msg ="";
           
            if(!empty($_GET['pSistema'])) {$pSistema = $_GET["pSistema"];}else {$pSistema = null;}   
            if(!empty($_GET['pUsuario'])) {$pUsuario = $_GET["pUsuario"];}else {$pUsuario = null;}
            if(!empty($_GET['pOpcion'])) {$pOpcion = $_GET["pOpcion"];}else {$pOpcion = null;}
            if(!empty($_GET['pModulo'])) {$pModulo = $_GET["pModulo"];}else {$pModulo = null;}
			if(!empty($_GET['pBodegaEnvia'])) {$pBodegaEnvia = $_GET["pBodegaEnvia"];}else {$pBodegaEnvia = null;}
			if(!empty($_GET['pBodegaSolicita'])) {$pBodegaSolicita = $_GET["pBodegaSolicita"];}else {$pBodegaSolicita = null;}	
			if(!empty($_GET['pBodegaDestino'])) {$pBodegaDestino = $_GET["pBodegaDestino"];}else {$pBodegaDestino = null;}
			if(!empty($_GET['pConsecutivo'])) {$pConsecutivo = $_GET["pConsecutivo"];}else {$pConsecutivo = null;}
            if(!empty($_GET['pEstado'])) {$pEstado = $_GET["pEstado"];}else {$pEstado = null;}            
            if(!empty($_GET['pFechaDesde'])) {$pFechaDesde = $_GET["pFechaDesde"];}else {$pFechaDesde = null;}
            if(!empty($_GET['pFechaHasta'])) {$pFechaHasta = $_GET["pFechaHasta"];}else {$pFechaHasta = null;}	
            if(!empty($_GET['jsonDetalles'])) {$jsonDetalles = $_GET["jsonDetalles"];}else {$jsonDetalles = null;}
			if(!empty($_GET['pUsuarioAutorizacion'])) {$pUsuarioAutorizacion = $_GET["pUsuarioAutorizacion"];}else {$pUsuarioAutorizacion = null;}
			
            	    
            if($pOpcion){
				
				switch ($pOpcion) {					

					case 'E':							
							 $contenedor = $model->spContenedores($pSistema, $pUsuario,$pOpcion, $pBodegaEnvia, $pBodegaSolicita, $pConsecutivo, $pEstado, $pFechaDesde, $pFechaHasta);
							  return $this->getResponse(
							  [
								  'msg'       => 'SUCCESS',
								  'message'   => 'Encabezados de contenedores recuperados con exito ...',
								  'contenedor'   => $contenedor
							  ]
						  	);
					break;

					case 'A':							
							$contenedor = $model->spContenedores($pSistema, $pUsuario,'P', $pBodegaEnvia, $pBodegaSolicita, $pConsecutivo, $pEstado, $pFechaDesde, $pFechaHasta);
							  return $this->getResponse(
							  [
								  'msg'       => 'SUCCESS',
								  'message'   => 'contenedor Procesado recuperados con exito pOpcion=',
								  'contenedor'   => $contenedor
							  ]
						  	);
					break;

					case 'L':
						 	$contenedor = $model->spContenedores('WMS', $pUsuario,'L', $pBodegaEnvia, $pBodegaSolicita, $pConsecutivo, $pEstado, $pFechaDesde, $pFechaHasta);
                              return $this->getResponse(
                              [
                                  'msg'       => 'SUCCESS',
                                  'message'   => 'Lines del contenedor recuperados con exito',
                                  'contenedor'   => $contenedor
                              ]
                          	);
					break;		

					case 'LW':
						 	$contenedor = $model->spContenedores('WMS', $pUsuario,'LW', $pBodegaEnvia, $pBodegaSolicita, $pConsecutivo, $pEstado, $pFechaDesde, $pFechaHasta);
                              return $this->getResponse(
                              [
                                  'msg'       => 'SUCCESS',
                                  'message'   => 'Lines del contenedor recuperados con exito',
                                  'contenedor'   => $contenedor
                              ]
                          	);
					break;		

					case 'G':
           					try {										
           						$contenedor = $model->spGuardaCont($pSistema, $pUsuario, $pOpcion, $pModulo, $pConsecutivo, $jsonDetalles, $pEstado, $pBodegaEnvia, $pBodegaDestino, $pUsuarioAutorizacion);
									return $this->getResponse(
											[
											'msg'       => 'SUCCESS',
											'message'   => 'contenedor guardado con exito',
				                            'contenedor'   => $contenedor				                            
				                         	]
		                         		 );

	                        	} catch (Exception $e) {	                            
	                            	return $this->getResponse([
	                                'msg' => 'ERROR',
	                                'message' => 'Error al guardar los detalles del contenedor: ' . $e->getMessage()
	                            	]);
	                        	}
					break;		

					case 'P':
           					try {							
           						$contenedor = $model->spGuardaCont($pSistema, $pUsuario, $pOpcion, $pModulo, $pConsecutivo, $jsonDetalles, $pEstado, $pBodegaEnvia, $pBodegaDestino, $pUsuarioAutorizacion);
									return $this->getResponse(
											[
											'msg'       => 'SUCCESS',
											'message'   => 'contenedor procesado con exito',
				                            'contenedor'   => $contenedor
				                         	]
		                         		 );

	                        	} catch (Exception $e) {	                            
	                            	return $this->getResponse([
	                                'msg' => 'ERROR',
	                                'message' => 'Error al procesar los detalles del contenedor:... ' . $e->getMessage()
	                            	]);
	                        	}
					break;							
					
					default:					
					break;
				}
                
			}
    	}
}