<?php
namespace App\Controllers;

use App\Models\WMSmuestraBodegasConsultaOrdenCompra_Model;
use CodeIgniter\HTTP\ResponseInterface;
use Exception;

class WMSmuestraBodegasConsultaOrdenCompra extends BaseController
{
    /**
     * Get a single client by ID
     */
    public function show_Bodega()
    {
        try {
            $model = new WMSmuestraBodegasConsultaOrdenCompra_Model(); 
            // Llama al procedimiento almacenado con los parámetros adecuados
            $respuesta = $model->sp_ObtenerBodegas();
            return $this->getResponse(
                        [
                            'msg' => 'SUCCESS',
                            'message' => 'Consulta recuperada con éxito',
                            'respuesta' => $respuesta
                        ]
            );

        } catch (Exception $e) {
            return $this->getResponse([
                'message' => 'No se pudo completar la consulta: ' . $e->getMessage()
            ], ResponseInterface::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
