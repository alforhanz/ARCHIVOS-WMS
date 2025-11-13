<?php
namespace App\Controllers;

use App\Models\WMScambiaBodegaDestinoOrdenCompra_Model;
use CodeIgniter\HTTP\Response;
use CodeIgniter\HTTP\ResponseInterface;
use Exception;


class WMScambiaBodegaDestinoOrdenCompra extends BaseController
{ 
	 public function show_CambioBodega()
    {
    	// header('Access-Control-Allow-Origin: *'); // Permitir solicitudes de cualquier origen
	    // header('Access-Control-Allow-Methods: GET, POST, OPTIONS'); // Métodos permitidos
	    // header('Access-Control-Allow-Headers: Content-Type'); // Encabezados permitidos

	    try {   
		      	$Bodega = !empty($_GET['Bodega']) ? $_GET["Bodega"] : null;
		    	$Embarque = !empty($_GET['Embarque']) ? $_GET["Embarque"] : null;
		        $OrdenCompra = !empty($_GET['OrdenCompra']) ? $_GET["OrdenCompra"] : null;  
            	
            	$model = new WMScambiaBodegaDestinoOrdenCompra_Model();
            	$msg ="";
            	$respuesta = $model->sp_update_Bodegas_Embarque($Bodega, $Embarque, $OrdenCompra);       
	            
	            return $this->getResponse([
	                'msg' => 'SUCCESS',
	                'message' => 'Cambio de bodega destino',
	                'respuesta' => $respuesta]);
        } catch (Exception $e) {           
            return $this->getResponse(['message' => 'No se pudo completar la consulta: ' . $e->getMessage()],
                 		ResponseInterface::HTTP_INTERNAL_SERVER_ERROR);
        	}       
    }
}