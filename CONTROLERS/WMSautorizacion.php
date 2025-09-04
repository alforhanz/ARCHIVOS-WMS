<?php
namespace App\Controllers;
use App\Models\WMSautorizacion_Model;
use CodeIgniter\HTTP\Response;
use CodeIgniter\HTTP\ResponseInterface;
use Exception;

class WMSautorizacion extends BaseController
{
	protected $format = 'json';
    /**
     * Get a single client by ID
     */
   
//muestra las lioneas de una orden de compras
    public function show_autoriza()
    {
        try {
                 $model = new WMSautorizacion_Model();
                    //Definir los parametros
                       
                    $pUsuario = !empty($_GET['pUsuario']) ? $_GET["pUsuario"] : null;  
                    $pOpcion = !empty($_GET['pOpcion']) ? $_GET["pOpcion"] : null;  
                   
                   
                    // Llama al procedimiento almacenado con los parámetros adecuados
                    $autorizacion = $model->sp_getUsuario_Privilegio('WMS',$pUsuario,$pOpcion,null);

                    return $this->getResponse([
                        'msg' => 'SUCCESS',
                        'message' => 'Consulta recuperada con éxito',
                        'autorizacion' => $autorizacion
                            ]);
            } catch (Exception $e) {
                return $this->getResponse([
                'message' => 'No se pudo completar la consulta: ' . $e->getMessage()
                ], ResponseInterface::HTTP_INTERNAL_SERVER_ERROR);
            }
    }
    
}