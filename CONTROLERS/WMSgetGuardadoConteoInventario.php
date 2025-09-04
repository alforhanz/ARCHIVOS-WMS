<?php
namespace App\Controllers;

use App\Models\WMSgetGuardadoConteoInventario_Model;
use CodeIgniter\HTTP\Response;
use CodeIgniter\HTTP\ResponseInterface;
use Exception;

class WMSgetGuardadoConteoInventario extends BaseController
{
    public function show($pOpcion)
    {
        $model = new WMSgetGuardadoConteoInventario_Model();
        $msg = "";

        $pUsuario = $_GET['pUsuario'] ?? null;
        // $pOpcion = $_GET['pOpcion'] ?? null;
        $pBodega = $_GET['pBodega'] ?? null;
        $pEstado = $_GET['pEstado'] ?? null;
        $pFecha = $_GET['pFecha'] ?? null;
        $jsonDetalles = $_GET['jsonDetalles'] ?? null;
        $pUbicacion = $_GET['pUbicacion'] ?? null;

        if ($pOpcion) {
           
            switch ($pOpcion) {
                case 'I':
                    try {                     
                       
                        $conteoguardado = $model->sp_InsertUpdate_DatosInventario_Web($pUsuario,$pOpcion,$pBodega,$pEstado,$pFecha,$jsonDetalles,$pUbicacion);

                        return $this->getResponse([
                            'msg' => 'SUCCESS',
                            'message' => 'Pedido guardado con exito...',
                            'conteoguardado' => $conteoguardado
                        ]);
                    } catch (Exception $e) {
                        return $this->getResponse([
                            'msg' => 'ERROR',
                            'message' => 'Error al Guardar los detalles del conteo: ' . $e->getMessage()
                        ]);
                    }
                    break;               

                default:
                    break;
            }
        }
    }
}