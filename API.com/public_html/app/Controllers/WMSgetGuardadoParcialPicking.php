<?php
namespace App\Controllers;

use App\Models\WMSgetGuardadoParcialPicking_Model;
use CodeIgniter\HTTP\Response;
use CodeIgniter\HTTP\ResponseInterface;
use Exception;

class WMSgetGuardadoParcialPicking extends BaseController
{
    public function show($proceso)
    {
        $model = new WMSgetGuardadoParcialPicking_Model();
        $msg = "";

        $pUsuario = $_GET['pUsuario'] ?? null;
        $pOpcion = $_GET['pOpcion'] ?? null;
        $pConsecutivoPed = $_GET['pConsecutivoPed'] ?? null;
        $pBodega = $_GET['pBodega'] ?? null;
        $jsonDetalles = $_GET['jsonDetalles'] ?? null;

        if ($proceso) {
        

            switch ($proceso) {
                case 'G':
                    try { //($pSistema, $pUsuario, $pOpcion, $pModulo, $pConsecutivoPed,$pBodega,$jsonDetalles, $pEstado);              

                            $pedidoguardado = $model->sp_InsertUpdatePicking('W', $pUsuario, $pOpcion, 'WMS_PK', $pConsecutivoPed,$pBodega, $jsonDetalles, 'G');

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
              
                       $pedidoprocesado = $model->sp_InsertUpdatePicking('W', $pUsuario, $pOpcion, 'WMS_PK', $pConsecutivoPed,$pBodega, $jsonDetalles, 'A');
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

				case 'PP':
                    try {
              
                       $pedidoprocesado = $model->sp_InsertUpdatePicking('W', $pUsuario, $pOpcion, 'WMS_VP', $pConsecutivoPed,$pBodega, $jsonDetalles, 'P');
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

                // case 'E':
                //     $articuloemilinado = $model->ActualizarFilasEliminadas(
                //         'W', $pUsuario, $pOpcion, 'WMS_VP', 
                //         $pConsecutivoPed, $pArticulo, null, null, 'N', $pBodega
                //     );
                //     return $this->getResponse([
                //         'msg' => 'SUCCESS',
                //         'message' => 'Pedido devuelto con exito',
                //         'articuloemilinado' => $articuloemilinado
                //     ]);
                //     break;

                default:
                    break;
            }
        }
    }
}


