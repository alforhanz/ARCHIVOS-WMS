<?php

namespace App\Controllers;

use App\Models\WMSverificaCodigo_Model;
use CodeIgniter\HTTP\ResponseInterface;
use Exception;

class WMSverificaCodigo extends BaseController
{
	
    public function verificaCodigo()
    {
        try {
                $model = new WMSverificaCodigo_Model();
                //Definir los parametros
                       
                $pCodigoLectura = !empty($_GET['pCodigoLectura']) ? $_GET["pCodigoLectura"] : null;             
                // $pArticulo = !empty($_GET['pArticulo']) ? $_GET["pArticulo"] : null;   

                // Llama al procedimiento almacenado con los parámetros adecuados
                $codigo = $model->sp_getCodigoBarraArticulo($pCodigoLectura);

                return $this->getResponse([
                    'msg' => 'SUCCESS',
                    'message' => 'Consulta recuperada con éxito',
                    'codigo' => $codigo
                ]);
            } catch (Exception $e) {
                return $this->getResponse(['message' => 'No se pudo completar la consulta: ' . $e->getMessage()], ResponseInterface::HTTP_INTERNAL_SERVER_ERROR);
            }
    }

}