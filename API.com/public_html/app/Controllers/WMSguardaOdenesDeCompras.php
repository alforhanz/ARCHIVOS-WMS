<?php
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
namespace App\Controllers;

use App\Models\WMSodenesDeCompras_Model;
use CodeIgniter\HTTP\Response;
use CodeIgniter\HTTP\ResponseInterface;
use Exception;

class WMSguardaOdenesDeCompras extends BaseController
{
    protected $format = 'json';

/**
 * Get a single client by ID
*/
public function show($pTipoConsulta)
{

    $model = new WMSodenesDeCompras_Model();
    $msg ="";
   
   	$pUsuario = !empty($_GET['pUsuario']) ? $_GET['pUsuario'] : null;
	$pEstado = !empty($_GET['pEstado']) ? $_GET['pEstado'] : null;
	$pConsecutivo = !empty($_GET['pConsecutivo']) ? $_GET['pConsecutivo'] : null;
	$pBodega = !empty($_GET['pBodega']) ? $_GET['pBodega'] : null;
	$jsonDetalles = !empty($_GET['jsonDetalles']) ? $_GET['jsonDetalles'] : null;
	$pObservacion = !empty($_GET['pObservacion']) ? $_GET['pObservacion'] : null;
 
   if (is_array($jsonDetalles) || is_object($jsonDetalles)) {
        $jsonDetalles = json_encode($jsonDetalles);
    }


    if($pTipoConsulta){
		
		switch ($pTipoConsulta) {
			
			case 'G':
   					try { 							
                       

							$ordencompra = $model->spGuardaOrdenCompraLectura('WMS', $pUsuario, 'G', 'WMS_BE', $pConsecutivo,$jsonDetalles,null, null,$pObservacion);

							return $this->getResponse([
									'msg'       => 'SUCCESS',
									'message'   => 'Orden de compra guardada con exito',
		                            'ordencompra'   => $ordencompra
		                         	]);

                    	} catch (Exception $e) {
                        // Manejo del error
                        return $this->getResponse([
                            'msg' => 'ERROR',
                            'message' => 'Error al guardar los detalles de la orden de compra' . $e->getMessage()
                        ]);
                    }
			break;		

			case 'P':
   					try {                          

							$ordencompra = $model->spGuardaOrdenCompraLectura('WMS', $pUsuario, 'P', 'WMS_BE', $pConsecutivo,  $jsonDetalles,null, null,$pObservacion);
   						// $ordencompra = $model->spGuardaOrdenCompraLectura('WMS', $pUsuario, 'P', 'WMS_BE', $pConsecutivo,  $jsonDetalles,null, null,"Ansadubie");
							return $this->getResponse(
									[
									'msg'       => 'SUCCESS',
									'message'   => 'contenedor procesado con exito',
		                            'ordencompra'   => $ordencompra
		                         	]
                         		 );

                    	} catch (Exception $e) {
                        // Manejo del error
                        return $this->getResponse([
                            'msg' => 'ERROR',
                            'message' => 'Error al guardar los detalles del contenedor' . $e->getMessage()
                        ]);
                    }
			break;							
			
			default:					
			break;
		}        
	}
}
}

