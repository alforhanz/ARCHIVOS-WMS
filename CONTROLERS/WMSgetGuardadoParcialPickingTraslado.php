<?php
namespace App\Controllers;

use App\Models\WMSgetGuardadoParcialPickingTraslado_Model;
use CodeIgniter\HTTP\Response;
use CodeIgniter\HTTP\ResponseInterface;
use Exception;

class WMSgetGuardadoParcialPickingTraslado extends BaseController
{
    public function show($proceso)
    {
        $model = new WMSgetGuardadoParcialPickingTraslado_Model();
        $msg = "";
            $pSistema = $_GET['pSistema'] ?? null;
            $pUsuario = $_GET['pUsuario'] ?? null;
            $pOpcion = $_GET['pOpcion'] ?? null;
            $pModulo = $_GET['pModulo'] ?? null;
            $pConsecutivo = $_GET['pConsecutivo'] ?? null;
            $pBodega = $_GET['pBodega'] ?? null;
            $jsonDetalles = $_GET['jsonDetalles'] ?? null;            
            $pEstado = $_GET['pEstado'] ?? null;
            $pTipoConsecutivo = $_GET['pTipoConsecutivo'] ?? null;
            $pBodegaDestino = $_GET['pBodegaDestino'] ?? null;
            $pAplicacion = $_GET['pAplicacion'] ?? null;

if ($proceso) {        

 switch ($proceso) {
        case 'G':
          try{ 
                // $trasladoguardado = $model->sp_InsertUpdatePicking('W', $pUsuario, $pOpcion, 'WMS_PK', $pConsecutivo, $pBodega, $jsonDetalles, 'G', $pTipoConsecutivo,$pBodegaDestino,$pAplicacion);
              $trasladoguardado = $model->sp_InsertUpdatePicking($pSistema, $pUsuario, $pOpcion, $pModulo, $pConsecutivo, $pBodega, $jsonDetalles, $pEstado,$pTipoConsecutivo,$pBodegaDestino,$pAplicacion);

                return $this->getResponse(['msg' => 'SUCCESS','message' => 'Pedido guardado con exito...', 'trasladoguardado' => $trasladoguardado]);
                } catch (Exception $e) {
                        return $this->getResponse(['msg' => 'ERROR','message' => 'Error al Guardar los detalles del traslado: ' . $e->getMessage()]);
                    }
        break;

        case 'P':
            try {
              
             $trasladopreparado = $model->sp_InsertUpdatePicking($pSistema, $pUsuario, $pOpcion, $pModulo, $pConsecutivo, $pBodega, $jsonDetalles, $pEstado,$pTipoConsecutivo,$pBodegaDestino,$pAplicacion);
                        return $this->getResponse([
                            'msg' => 'SUCCESS',
                            'message' => 'Pedido procesado con exito',
                            'trasladopreparado' => $trasladopreparado
                        ]);
            } catch (Exception $e) {
                        return $this->getResponse([
                            'msg' => 'ERROR',
                            'message' => 'Error al Guardar los detalles del traslado: ' . $e->getMessage()
                        ]);
                    }
        break;

				case 'PP':
                    try {
              
              $trasladoguardado = $model->sp_InsertUpdatePicking($pSistema, $pUsuario, $pOpcion, $pModulo, $pConsecutivo, $pBodega, $jsonDetalles, $pEstado,$pTipoConsecutivo,$pBodegaDestino,$pAplicacion);
                        return $this->getResponse([
                            'msg' => 'SUCCESS',
                            'message' => 'Pedido procesado con exito',
                            'trasladoprocesado' => $trasladoprocesado
                        ]);
                    } catch (Exception $e) {
                        return $this->getResponse([
                            'msg' => 'ERROR',
                            'message' => 'Error al Guardar los detalles del traslado: ' . $e->getMessage()
                        ]);
                    }
                    break;               

                default:
                    break;
            }
        }
    }
}


