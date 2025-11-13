<?php
namespace App\Controllers;

use App\Models\WMSdeleteDatosInventario_Model;
use CodeIgniter\HTTP\Response;
use CodeIgniter\HTTP\ResponseInterface;
use Exception;

class WMSdeleteDatosInventario extends BaseController
{
    public function delDatosinv()
    {
        $model = new WMSdeleteDatosInventario_Model();
        $msg = "";
  
  		
		$pUsuario = $_GET['pUsuario'] ?? null;  
        $pBodega = $_GET['pBodega'] ?? null;  
        $pFecha = $_GET['pFecha'] ?? null;  
        $jsonDetalles = $_GET['jsonDetalles'] ?? null;


         try {                    
                $respuesta = $model->sp_Delete_Datos($pUsuario,$pBodega,$pFecha,$jsonDetalles);
            
                    return $this->getResponse([
                    'msg' => 'SUCCESS',
                    'message' => 'Consulta exitosa',
                    'respuesta' => $respuesta 
                    ]);
            } catch (Exception $e) {
                    return $this->getResponse([
                        'msg' => 'ERROR',
                        'message' => 'Error alejecutar el sp: ' . $e->getMessage()
                        ]);
        }
    }
}