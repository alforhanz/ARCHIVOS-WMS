<?php
namespace App\Controllers;

use App\Models\WMSgetGuardadoParcialPedidos_Model;
use CodeIgniter\HTTP\Response;
use CodeIgniter\HTTP\ResponseInterface;
use Exception;

class WMSgetGuardadoParcialPedidos extends BaseController
{
    public function show($pOpcion)
    {
        $model = new WMSgetGuardadoParcialPedidos_Model();
        $msg = "";

        $pUsuario = $_GET['pUsuario'] ?? null;
        $pConsecutivoPed = $_GET['pConsecutivoPed'] ?? null;
        $jsonDetalles = $_GET['jsonDetalles'] ?? null;

        if ($pOpcion) {
           
            switch ($pOpcion) {
                case 'G':
                    try {                     

                        $pedidoguardado = $model->sp_InsertUpdatePedido('W', $pUsuario, 'G', 'WMS_VP', $pConsecutivoPed, null, $jsonDetalles, null);

                        return $this->getResponse([
                            'msg' => 'SUCCESS',
                            'message' => 'Pedido guardado con exito...',
                            'pedidoguardado' => $pedidoguardado
                        ]);
                    } catch (Exception $e) {
                        return $this->getResponse([
                            'msg' => 'ERROR',
                            'message' => 'Error al Guardar los detalles del pedido: ' . $e->getMessage()
                        ]);
                    }
                    break;

                case 'P':
                    try {
                
                       $pedidoprocesado = $model->sp_InsertUpdatePedido('W', $pUsuario, 'P', 'WMS_VP', $pConsecutivoPed,null, $jsonDetalles, null);
                        return $this->getResponse([
                            'msg' => 'SUCCESS',
                            'message' => 'Pedido procesado con exito',
                            'pedidoprocesado' => $pedidoprocesado
                        ]);
                    } catch (Exception $e) {
                        return $this->getResponse([
                            'msg' => 'ERROR',
                            'message' => 'Error al Guardar los detalles del pedido: ' . $e->getMessage()
                        ]);
                    }
                    break;

                case 'E':
                    $articuloemilinado = $model->ActualizarFilasEliminadas(
                        'W', $pUsuario, $pOpcion, 'WMS_VP', 
                        $pConsecutivoPed, $pArticulo, null, null, 'N', $pBodega
                    );
                    return $this->getResponse([
                        'msg' => 'SUCCESS',
                        'message' => 'Pedido devuelto con exito',
                        'articuloemilinado' => $articuloemilinado
                    ]);
                    break;

                default:
                    break;
            }
        }
    }
}



// namespace App\Controllers;

// use App\Models\WMSgetGuardadoParcialPedidos_Model;
// use CodeIgniter\HTTP\Response;
// use CodeIgniter\HTTP\ResponseInterface;
// use Exception;

// class WMSgetGuardadoParcialPedidos extends BaseController
// {
//       /**
//      * Get a single client by ID
//      */
//     public function show($pOpcion)
//     {

//             $model = new WMSgetGuardadoParcialPedidos_Model();
//             $msg ="";
//             //if(!empty($_GET['pSistema'])) {$pSistema = $_GET["pSistema"];}else {$pSistema = null;}   
//             if(!empty($_GET['pUsuario'])) {$pUsuario = $_GET["pUsuario"];}else {$pUsuario = null;}   
//             //if(!empty($_GET['pOpcion'])) {$pOpcion = $_GET["pOpcion"];}else {$pOpcion = null;} 
//             //if(!empty($_GET['pModulo'])) {$pModulo = $_GET["pModulo"];}else {$pModulo = null;} 
//             if(!empty($_GET['pConsecutivoPed'])) {$pConsecutivoPed = $_GET["pConsecutivoPed"];}else {$pConsecutivoPed = null;}
//             //if(!empty($_GET['pEstado'])) {$pEstado = $_GET["pEstado"];}else {$pEstado = null;}           
//             if(!empty($_GET['jsonDetalles'])) {$jsonDetalles = $_GET["jsonDetalles"];}else {$jsonDetalles = null;}
//             //if(!empty($_GET['pBodega'])) {$pBodega = $_GET["pBodega"];}else {$pBodega = null;}     
 			
//             if($pOpcion){
				
//                 $pArticulo = "";
//                 $pLineaConsec = "";
//                 $pLineaConteo = "";                

// 				switch ($pOpcion) {
//           //GUARDADO PARCIAL
// 					case 'G':
//                     try {
//                             if (!empty($_GET['jsonDetalles'])) {
//                                 $jsonDetalles = $_GET["jsonDetalles"];
//                                 $detalles = json_decode($jsonDetalles, true); // true para que sea un array asociativo
//                             } else {
//                                 $detalles = [];
//                             }

//                             foreach ($detalles as $detalle) 
//                                       {
//                                           // Obtener detalles de cada objeto y convertir a cadena
//                                           $pArticulo = $detalle['ARTICULO'];

//                                           $pLineaConsec = $detalle['CANT_CONSEC'];
//                                           $pLineaConteo = $detalle['CANT_LEIDA'];
//                                           // $pLineaConsec = strval($detalle['CANT_CONSEC']);
//                                           // $pLineaConteo = strval($detalle['CANT_LEIDA']);
//                                           // Llamar al método para procesar cada detalle
//                                           $pedidoguardado = $model->sp_InsertUpdatePedido('W', $pUsuario, 'G', 'WMS_VP', $pConsecutivoPed, $pArticulo, $pLineaConsec,$pLineaConteo,null,null);
//                                       }


//         							  return $this->getResponse(
//           							  [
//           								  'msg'       => 'SUCCESS',
//           								  'message'   => 'Pedido guardado con exito',
//           								  'pedidoguardado'   => $pedidoguardado
//           							  ]
//           						  );

//                         } catch (Exception $e) {
//                             // Manejo del error
//                             return $this->getResponse([
//                                 'msg' => 'ERROR',
//                                 'message' => 'Error al Guardar los detalles del pedido' . $e->getMessage()
//                             ]);
//                         }
// 					break;

//           // PROCESAR
// 					case 'P':
// 						    try {
//                             if (!empty($_GET['jsonDetalles'])) {
//                                 $jsonDetalles = $_GET["jsonDetalles"];
//                                 $detalles = json_decode($jsonDetalles, true); // true para que sea un array asociativo
//                             } else {
//                                 $detalles = [];
//                             }

//                             // foreach ($detalles as $detalle) 
//                             //           {
//                             //               // Obtener detalles de cada objeto y convertir a cadena
//                             //               $pArticulo = $detalle['ARTICULO'];
//                             //               $pLineaConsec = strval($detalle['CANT_CONSEC']);
//                             //               $pLineaConteo = strval($detalle['CANT_LEIDA']);
//                             //               // Llamar al método para procesar cada detalle
//                             //               $pedidoguardado = $model->sp_InsertUpdatePedido('W', $pUsuario, 'P', 'WMS_VP', $pConsecutivoPed, $pArticulo, $pLineaConsec,$pLineaConteo,null,null);
//                             //           }


//                         foreach ($detalles as $detalle) 
//                                 {
//                                     $pArticulo = $detalle['ARTICULO'];
//                                     $pLineaConsec = $detalle['CANT_CONSEC'];
//                                     $pLineaConteo = $detalle['CANT_LEIDA'];
//                                      $pedidoguardado = $model->sp_InsertUpdatePedido('W', $pUsuario, 'P', 'WMS_VP', $pConsecutivoPed, $pArticulo, $pLineaConsec,$pLineaConteo,null,null);
//                                     // $pedidoguardado = $model->sp_InsertUpdatePedido($pSistema, $pUsuario, 'G', $pModulo, $pConsecutivoPed, $pArticulo, $pLineaConsec, $pLineaConteo, $pEstado, $pBodega);
//                                 }


//                         return $this->getResponse(
//                           [
//                             'msg'       => 'SUCCESS',
//                             'message'   => 'Pedido procesado con exito',
//                             'pedidoguardado'   => $pedidoguardado
//                           ]
//                         );

//                         } catch (Exception $e) {
//                             // Manejo del error
//                             return $this->getResponse([
//                                 'msg' => 'ERROR',
//                                 'message' => 'Error al Guardar los detalles del pedido' . $e->getMessage()
//                             ]);
//                         }
// 					break;		
//           //ELIMINAR ARTICULOS
// 					case 'E':
//                     $articuloemilinado  = $model->ActualizarFilasEliminadas('W',$pUsuario, $pOpcion,'WMS_VP',$pConsecutivoPed,$pArticulo,null,null,'N',$pBodega);
//                               return $this->getResponse(
//                               [
//                                   'msg'       => 'SUCCESS',
//                                   'message'   => 'Pedido devuelto con exito',
//                                   'articuloemilinado'   => $articuloemilinado 
//                               ]
//                           );
//                     break;                  
// 					default:
// 					# code...
// 					break;
// 				}

// 			}
//     }
// }