<?php

namespace App\Controllers;

use App\Models\WMSVerificadorDeContenedores_Model;
use CodeIgniter\HTTP\ResponseInterface;
use Exception;

class WMSVerificadorDeContenedores extends BaseController
{
	
    public function verificaContenedor()
        {

                    $model = new WMSVerificadorDeContenedores_Model();

            try {
                    // $model = new WMSVerificadorDeContenedores_Model();
                    //Definir los parametros
                           
                    $pSistema = !empty($_GET['pSistema']) ? $_GET["pSistema"] : null;             
                    $pUsuario = !empty($_GET['pUsuario']) ? $_GET["pUsuario"] : null; 
                    $pOpcion = !empty($_GET['pOpcion']) ? $_GET["pOpcion"] : null;  
                    $pBodegaEnvia = !empty($_GET['pBodegaEnvia']) ? $_GET["pBodegaEnvia"] : null;  
                    $pBodegaDestino = !empty($_GET['pBodegaDestino']) ? $_GET["pBodegaDestino"] : null;  
                    $pContenedor = !empty($_GET['pContenedor']) ? $_GET["pContenedor"] : null;  
                    $pEstado = !empty($_GET['pEstado']) ? $_GET["pEstado"] : null;  
                    $pFechaDesde = !empty($_GET['pFechaDesde']) ? $_GET["pFechaDesde"] : null;           
                    $pArticulo = !empty($_GET['pArticulo']) ? $_GET["pArticulo"] : null;      

                    // Llama al procedimiento almacenado con los parámetros adecuados
                    $ordenCompra = $model->sp_getLineasTrasladosMuelle($pSistema, $pUsuario, $pOpcion, $pBodegaEnvia,$pBodegaDestino, $pContenedor, $pEstado, $pFechaDesde,$pArticulo);

                    return $this->getResponse([
                        'msg' => 'SUCCESS',
                        'message' => 'Consulta recuperada con éxito',
                        'respuesta' => $ordenCompra
                    ]);
                } catch (Exception $e) {
                    return $this->getResponse(['message' => 'No se pudo completar la consulta: ' . $e->getMessage()], ResponseInterface::HTTP_INTERNAL_SERVER_ERROR);
                }
        }


       public function guardaCreaPaquete()
                {
                    try {
                             $model = new WMSVerificadorDeContenedores_Model();
                            //Definir los parametros
                                   
                            $pSistema = !empty($_GET['pSistema']) ? $_GET["pSistema"] : null;             
                            $pUsuario = !empty($_GET['pUsuario']) ? $_GET["pUsuario"] : null; 
                            $pOpcion = !empty($_GET['pOpcion']) ? $_GET["pOpcion"] : null;  
                            $pBodegaOrigen = !empty($_GET['pBodegaOrigen']) ? $_GET["pBodegaOrigen"] : null;  
                            $pBodegaDestino = !empty($_GET['pBodegaDestino']) ? $_GET["pBodegaDestino"] : null;  
                            $pFecha = !empty($_GET['pFecha']) ? $_GET["pFecha"] : null;  
                            $pPlaca = !empty($_GET['pPlaca']) ? $_GET["pPlaca"] : null;  
                            $jsonPaquete = !empty($_GET['jsonPaquete']) ? $_GET["jsonPaquete"] : null;    

                            // Llama al procedimiento almacenado con los parámetros adecuados
                            $ordenCompra = $model->spGuardaCreaPaquetes($pSistema, $pUsuario, $pOpcion, $pBodegaOrigen,$pBodegaDestino, $pFecha, $pPlaca, $jsonPaquete);

                            return $this->getResponse([
                                'msg' => 'SUCCESS',
                                'message' => 'Consulta recuperada con éxito',
                                'respuesta' => $ordenCompra
                            ]);
                        } catch (Exception $e) {
                            return $this->getResponse(['message' => 'No se pudo completar la consulta: ' . $e->getMessage()], ResponseInterface::HTTP_INTERNAL_SERVER_ERROR);
                            }
                }

public function impPaqueteReporte()
                {
                    try {
                            $model = new WMSVerificadorDeContenedores_Model();
                            //Definir los parametros
                                   
                            $pSistema = !empty($_GET['pSistema']) ? $_GET["pSistema"] : null;             
                            $pUsuario = !empty($_GET['pUsuario']) ? $_GET["pUsuario"] : null; 
                            $pTipoConsulta = !empty($_GET['pTipoConsulta']) ? $_GET["pTipoConsulta"] : null;  
                            $pTipoPaquete = !empty($_GET['pTipoPaquete']) ? $_GET["pTipoPaquete"] : null;  
                            $pPaquete = !empty($_GET['pPaquete']) ? $_GET["pPaquete"] : null;  
                            

                            // Llama al procedimiento almacenado con los parámetros adecuados
                            $ordenCompra = $model->imprimePaqueteDocInventario($pSistema, $pUsuario, $pTipoConsulta,$pTipoPaquete, $pPaquete);

                            return $this->getResponse([
                                'msg' => 'SUCCESS',
                                'message' => 'Reporte recuperada con éxito',
                                'respuesta' => $ordenCompra
                            ]);
                        } catch (Exception $e) {
                                    return $this->getResponse(['message' => 'No se pudo completar la consulta: ' . $e->getMessage()], ResponseInterface::HTTP_INTERNAL_SERVER_ERROR);
                                }
                }


  public function devuelveArticuloConstenedor()
                {
                    try {
                           $model = new WMSVerificadorDeContenedores_Model();
                            //Definir los parametros
                                   
                            $pSistema = !empty($_GET['pSistema']) ? $_GET["pSistema"] : null;             
                            $pUsuario = !empty($_GET['pUsuario']) ? $_GET["pUsuario"] : null; 
                            $pOpcion = !empty($_GET['pOpcion']) ? $_GET["pOpcion"] : null;  
                            $BodegaSolic = !empty($_GET['BodegaSolic']) ? $_GET["BodegaSolic"] : null;  
                            $BodegaEnvia = !empty($_GET['BodegaEnvia']) ? $_GET["BodegaEnvia"] : null;  
                            $pAutorizado = !empty($_GET['pAutorizado']) ? $_GET["pAutorizado"] : null;  
                            $jsonDetalles = !empty($_GET['jsonDetalles']) ? $_GET["jsonDetalles"] : null;  
                            

                            // Llama al procedimiento almacenado con los parámetros adecuados
                            $ordenCompra = $model->devolucionDeArticuloContenedor($pSistema,$pUsuario,$pOpcion,$BodegaSolic,$BodegaEnvia,$pAutorizado,$jsonDetalles);

                            return $this->getResponse([
                                'msg' => 'SUCCESS',
                                'message' => 'Reporte recuperada con éxito',
                                'respuesta' => $ordenCompra
                            ]);
                        } catch (Exception $e) {
                                    return $this->getResponse(['message' => 'No se pudo completar la consulta: ' . $e->getMessage()], ResponseInterface::HTTP_INTERNAL_SERVER_ERROR);
                                }
                }              


}