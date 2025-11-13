<?php

// namespace App\Controllers;

// use App\Models\WMSodenesDeCompras_Model;
// use CodeIgniter\HTTP\ResponseInterface;
// use Exception;

// class WMSodenesDeCompras extends BaseController
// {
// 	protected $format = 'json';
//     /**
//      * Get a single client by ID
//      */
//     public function show_OrdenesDeCompras()
//     {
//         try {
//             $model = new WMSodenesDeCompras_Model();
//             //Definir los parametros
//             $pSistema = "WMS";             
//             $pUsuario = !empty($_GET['pUsuario']) ? $_GET["pUsuario"] : null;
//             $pOpcion = 'E';
//             $pBodega = !empty($_GET['pBodega']) ? $_GET["pBodega"] : null;
//             //$pEstado = !empty($_GET['pEstado']) ? $_GET["pEstado"] : null;
//             $pEstado = 'E';
//             $pOrden = !empty($_GET['pOrden']) ? $_GET["pOrden"] : null;
           

//             // Llama al procedimiento almacenado con los parámetros adecuados
//             $ordenCompra = $model->sp_getOrdenesdeCompras($pSistema, $pUsuario, $pOpcion,$pBodega,$pEstado, $pOrden);

//             return $this->getResponse([
//                 'msg' => 'SUCCESS',
//                 'message' => 'Consulta recuperada con éxito',
//                 'ordenCompra' => $ordenCompra
//             ]);
//         } catch (Exception $e) {
//             return $this->getResponse([
//                 'message' => 'No se pudo completar la consulta: ' . $e->getMessage()
//             ], ResponseInterface::HTTP_INTERNAL_SERVER_ERROR);
//         }
//     }
// //muestra las lioneas de una orden de compras
//     public function show_OrdenDeComprasList()
//     {
//         try {
//             $model = new WMSodenesDeCompras_Model();
//             //Definir los parametros
//              $pSistema = "WMS";             
//             $pUsuario = !empty($_GET['pUsuario']) ? $_GET["pUsuario"] : null;
            
//             $pOpcion = 'D';
//             $pBodega = !empty($_GET['pBodega']) ? $_GET["pBodega"] : null;
//             $pEstado = !empty($_GET['pEstado']) ? $_GET["pEstado"] : null;
//             //$pEstado = 'E';
//             $pOrden = !empty($_GET['pOrden']) ? $_GET["pOrden"] : null;
//             // Llama al procedimiento almacenado con los parámetros adecuados
//             $detalleOC = $model->sp_getOrdenesdeCompraList($pSistema, $pUsuario, $pOpcion,$pBodega,$pEstado, $pOrden);

//             return $this->getResponse([
//                 'msg' => 'SUCCESS',
//                 'message' => 'Consulta recuperada con éxito',
//                 'detalleOC' => $detalleOC
//             ]);
//         } catch (Exception $e) {
//             return $this->getResponse([
//                 'message' => 'No se pudo completar la consulta: ' . $e->getMessage()
//             ], ResponseInterface::HTTP_INTERNAL_SERVER_ERROR);
//         }
//     }

//     // GUARDA Y PROCESA LA LECTURA DE LAS ORDENES DE COMPRA

//    public function guardaOrdenCompra()
//     {
//             $model = new WMSodenesDeCompras_Model();
//             $msg ="";
           
//             if(!empty($_GET['pUsuario'])) {$pUsuario = $_GET["pUsuario"];}else {$pUsuario = null;}                                                   
//             if(!empty($_GET['pConsecutivo'])) {$pConsecutivo = $_GET["pConsecutivo"];}else {$pConsecutivo = null;}
//             if(!empty($_GET['pBodega'])) {$pBodega = $_GET["pBodega"];}else {$pBodega = null;}
//             if(!empty($_GET['pEstado'])) {$pEstado = $_GET["pEstado"];}else {$pEstado = null;}
//             if(!empty($_GET['jsonDetalles'])) {$jsonDetalles = $_GET["jsonDetalles"];}else {$jsonDetalles = null;}
            
//                 $pArticulo = "";
//                 $pLineaConsec = "";
//                 $pLineaConteo = "";    

               
             
//                 	try {
//                             if (!empty($_GET['jsonDetalles'])) {
//                                 $jsonDetalles = $_GET["jsonDetalles"];
//                                 $detalles = json_decode($jsonDetalles, true); // true para que sea un array asociativo
//                             } else {
//                                 $detalles = [];
//                             }

//                           foreach ($detalles as $detalle) {

//                                     $pArticulo = $detalle['ARTICULO'];
//                                     $pLineaConsec = $detalle['CANT_CONSEC'];
//                                     $pLineaConteo = $detalle['CANT_LEIDA'];
//                                         // $ordencompra = $model->spGuardaOrdenCompraLectura('WMS', $pUsuario, 'G', 'WMS_BE', $pConsecutivo, $pArticulo , $pLineaConsec, $pLineaConteo, $pEstado, $pBodega);
//                                     if ($pLineaConteo > 0) {
//                                         $ordencompra = $model->spGuardaOrdenCompraLectura('WMS', $pUsuario, 'G', 'WMS_BE', $pConsecutivo, $pArticulo , $pLineaConsec, $pLineaConteo, $pEstado, $pBodega);
//                                     }
                                    
//                                 }                                    
//                                     return $this->getResponse([
//                                             'msg'       => 'SUCCESS',
//                                             'message'   => 'Orden de compra guardado con exito',
//                                             'ordencompra'   => $ordencompra
//                                             ]);

//                         } catch (Exception $e) {
//                                 // Manejo del error
//                                 return $this->getResponse(
//                                 	[
//                                     'msg' => 'ERROR',
//                                     'message' => 'Error al guardar los detalles del la orden de comrpa ' . $e->getMessage()
//                                 	]
//                             	);
//                             } 
//     }

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //  public function guardaProcesaOrdenCompra($pTipoConsulta)
    // {

    //         $model = new WMSodenesDeCompras_Model();
    //         $msg ="";
           
    //         if(!empty($_GET['pUsuario'])) {$pUsuario = $_GET["pUsuario"];}else {$pUsuario = null;}                                                   
    //         if(!empty($_GET['pConsecutivo'])) {$pConsecutivo = $_GET["pConsecutivo"];}else {$pConsecutivo = null;}
    //         if(!empty($_GET['pBodega'])) {$pBodega = $_GET["pBodega"];}else {$pBodega = null;}
    //         if(!empty($_GET['pEstado'])) {$pEstado = $_GET["pEstado"];}else {$pEstado = null;}
    //         if(!empty($_GET['jsonDetalles'])) {$jsonDetalles = $_GET["jsonDetalles"];}else {$jsonDetalles = null;}
            
    //             $pArticulo = "";
    //             $pLineaConsec = "";
    //             $pLineaConteo = "";    

    //         if($pTipoConsulta){
                
    //             switch ($pTipoConsulta) {                     

    //                 case 'G':
    //                         try {
    //                                 if (!empty($_GET['jsonDetalles'])) {
    //                                     $jsonDetalles = $_GET["jsonDetalles"];
    //                                     $detalles = json_decode($jsonDetalles, true); // true para que sea un array asociativo
    //                                 } else {
    //                                     $detalles = [];
    //                                 }

    //                               foreach ($detalles as $detalle) {
    //                                     $pArticulo = $detalle['ARTICULO'];
    //                                     $pLineaConsec = $detalle['CANT_CONSEC'];
    //                                     $pLineaConteo = $detalle['CANT_LEIDA'];
    //                                     $ordencompra = $model->spGuardaOrdenCompraLectura('WMS', $pUsuario, 'G', 'WMS_BE', $pConsecutivo, $pArticulo , $pLineaConsec, $pLineaConteo, $pEstado, $pBodega);
    //                                 // if ($pLineaConteo > 0) {
    //                                 //     $ordencompra = $model->spGuardaOrdenCompraLectura('WMS', $pUsuario, 'G', 'WMS_BE', $pConsecutivo, $pArticulo , $pLineaConsec, $pLineaConteo, $pEstado, $pBodega);
    //                                 // }
    //                                 }
                                    
    //                                 return $this->getResponse(
    //                                         [
    //                                         'msg'       => 'SUCCESS',
    //                                         'message'   => 'Orden de compra guardado con exito',
    //                                         'ordencompra'   => $ordencompra
    //                                         ]
    //                                      );

    //                             } catch (Exception $e) {
    //                             // Manejo del error
    //                             return $this->getResponse(
    //                             	[
    //                                 'msg' => 'ERROR',
    //                                 'message' => 'Error al guardar los detalles del la orden de comrpa ' . $e->getMessage()
    //                             	]
    //                         	);
    //                         }
    //                 break;      

    //                 case 'P':
    //                         try {
    //                                 if (!empty($_GET['jsonDetalles'])) {
    //                                     $jsonDetalles = $_GET["jsonDetalles"];
    //                                     $detalles = json_decode($jsonDetalles, true); // true para que sea un array asociativo
    //                                 } else {
    //                                     $detalles = [];
    //                                 }

    //                               foreach ($detalles as $detalle) {
    //                                     $pArticulo = $detalle['ARTICULO'];
    //                                     $pLineaConsec = $detalle['CANT_CONSEC'];
    //                                     $pLineaConteo = $detalle['CANT_LEIDA'];
                                        
    //                                     if ($pLineaConteo > 0) {                                                
    //                                         $ordencompra = $model->spGuardaOrdenCompraLectura('WMS', $pUsuario, 'P', 'WMS_BE', $pConsecutivo, $pArticulo , $pLineaConsec, $pLineaConteo, $pEstado, $pBodega);
    //                                     }
    //                                 }

                                    
    //                                 return $this->getResponse(
    //                                         [
    //                                         'msg'       => 'SUCCESS',
    //                                         'message'   => 'Orden de compra procesada con exito',
    //                                         'ordencompra'   => $ordencompra
    //                                         ]
    //                                      );

    //                             } catch (Exception $e) {
    //                             // Manejo del error
    //                             return $this->getResponse([
    //                                 'msg' => 'ERROR',
    //                                 'message' => 'Error al guardar los detalles del la orden de compra' . $e->getMessage()
    //                             ]);
    //                         }
    //                 break;                          
                    
    //                 default:                    
    //                 break;
    //             }
                
    //         }
    // }

}
