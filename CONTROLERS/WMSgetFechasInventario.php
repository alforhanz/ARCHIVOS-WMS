<?php
namespace App\Controllers;

use App\Models\WMSgetFechasInventario_Model;
use CodeIgniter\HTTP\Response;
use CodeIgniter\HTTP\ResponseInterface;
use Exception;

class WMSgetFechasInventario extends BaseController
{
    public function getfechainv()
    {
        $model = new WMSgetFechasInventario_Model();
        $msg = "";
  
        $pBodega = $_GET['pBodega'] ?? null;  
        $pFecha = $_GET['pFecha'] ?? null;  

         try {                     
                   
                $fechainv = $model->sp_getFechas_Inventario($pBodega,$pFecha);

                return $this->getResponse([
                    'msg' => 'SUCCESS',
                    'message' => 'Consulta exitosa',
                    'fechainv' => $fechainv 
                    ]);
            } catch (Exception $e) {
                    return $this->getResponse([
                        'msg' => 'ERROR',
                        'message' => 'Error alejecutar el sp: ' . $e->getMessage()
                        ]);
        }
    }
}