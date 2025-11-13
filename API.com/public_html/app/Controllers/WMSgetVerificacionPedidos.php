<?php
namespace App\Controllers;

use App\Models\WMSgetVerificacionPedidos_Model;
use CodeIgniter\HTTP\Response;
use CodeIgniter\HTTP\ResponseInterface;
use Exception;

class WMSgetVerificacionPedidos extends BaseController
{
    
    /**
     * Get a single client by ID
     */
    public function show($pTipoConsulta)
    {

            $model = new WMSgetVerificacionPedidos_Model();
            $msg ="";
            if(!empty($_GET['pBodega'])) {$pBodega = $_GET["pBodega"];}else {$pBodega = null;}
            if(!empty($_GET['pFechaDesde'])) {$pFechaDesde = $_GET["pFechaDesde"];}else {$pFechaDesde = null;}
            if(!empty($_GET['pFechaHasta'])) {$pFechaHasta = $_GET["pFechaHasta"];}else {$pFechaHasta = null;}
			if(!empty($_GET['pPedido'])) {$pPedido = $_GET["pPedido"];}else {$pPedido = null;}
			if(!empty($_GET['pUsuario'])) {$pUsuario = $_GET["pUsuario"];}else {$pUsuario = null;}
			if(!empty($_GET['pOpcion'])) {$pOpcion = $_GET["pOpcion"];}else {$pOpcion = null;}
            
			
            if($pTipoConsulta){
				
				switch ($pTipoConsulta) {

					case 'P':
							$pedidos = $model->listaPedidos('WEB', $pUsuario, $pOpcion, $pFechaDesde, $pFechaHasta, $pPedido, $pBodega,null,'N');
							  return $this->getResponse(
							  [
								  'msg'       => 'SUCCESS',
								  'message'   => 'Pedidos recuperados con exito',
								  'pedidos'   => $pedidos
							  ]
						  );
					break;
				
					case 'D':
                            $lineaspedido = $model->detallePedido($pPedido, $pFechaDesde, $pFechaHasta, $pBodega);
                              return $this->getResponse(
                              [
                                  'msg'             => 'SUCCESS',
                                  'message'         => 'Detalle de Pedido recuperado con exito',
                                  'lineaspedido'    => $lineaspedido
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