<?php
namespace App\Controllers;

use App\Models\WMSgetResumenInventario_Model;
use CodeIgniter\HTTP\Response;
use CodeIgniter\HTTP\ResponseInterface;
use Exception;

class WMSgetResumenInventario extends BaseController
{
    public function getResumeninv()
    {
        $model = new WMSgetResumenInventario_Model();
        $msg = "";
  
  		$pSistema = $_GET['pSistema'] ?? null;
		$pUsuario = $_GET['pUsuario'] ?? null;  
        $pOpcion = $_GET['pOpcion'] ?? null;  
        $pBodega = $_GET['pBodega'] ?? null;  
        $pFecha = $_GET['pFecha'] ?? null;  
        $jsonDetalles = $_GET['jsonDetalles'] ?? null;
        $pSoloContados = $_GET['pSoloContados'] ?? null;
        $pArticulo = $_GET['pArticulo'] ?? null;

         try {                    
                $resumen = $model->sp_getInventario_web($pSistema,$pUsuario,$pOpcion,$pBodega,$pFecha,$jsonDetalles,$pSoloContados,$pArticulo);
                // $resumen = $model->sp_getInventario_web($pSistema,$pUsuario,$pBodega,$pFecha,$jsonDetalles,'S',$pArticulo);
                    return $this->getResponse([
                    'msg' => 'SUCCESS',
                    'message' => 'Consulta exitosa',
                    'resumen' => $resumen 
                    ]);
            } catch (Exception $e) {
                    return $this->getResponse([
                        'msg' => 'ERROR',
                        'message' => 'Error alejecutar el sp: ' . $e->getMessage()
                        ]);
        }
    }
}