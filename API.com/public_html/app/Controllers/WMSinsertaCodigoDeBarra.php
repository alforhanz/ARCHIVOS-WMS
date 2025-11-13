<?php
namespace App\Controllers;
use App\Models\WMSinsertaCodigoDeBarra_Model;
use CodeIgniter\HTTP\Response;
use CodeIgniter\HTTP\ResponseInterface;
use Exception;

class WMSinsertaCodigoDeBarra extends BaseController
{
	protected $format = 'json';
    /**
     * Get a single client by ID
     */
   
//muestra las lioneas de una orden de compras
    public function insertaCodigo()
    {
        try {
                 $model = new WMSinsertaCodigoDeBarra_Model();
                    //Definir los parametros
                       
                    $pUsuario = !empty($_GET['pUsuario']) ? $_GET["pUsuario"] : null;  
                    $pClave = !empty($_GET['pClave']) ? $_GET["pClave"] : null;  
                    $pArticulo = !empty($_GET['pArticulo']) ? $_GET["pArticulo"] : null;
                    $pCodigoBarra = !empty($_GET['pCodigoBarra']) ? $_GET["pCodigoBarra"] : null;
                    $pOpcion = !empty($_GET['pOpcion']) ? $_GET["pOpcion"] : null;
                   
                    // Llama al procedimiento almacenado con los parámetros adecuados
                    $codigobarra = $model->sp_insert_codigobarra($pUsuario, $pClave, $pArticulo, $pCodigoBarra, $pOpcion);

                    return $this->getResponse([
                        'msg' => 'SUCCESS',
                        'message' => 'Consulta recuperada con éxito',
                        'codigobarra' => $codigobarra
                            ]);
                        } catch (Exception $e) {
                            return $this->getResponse([
                        'message' => 'No se pudo completar la consulta: ' . $e->getMessage()
                            ], ResponseInterface::HTTP_INTERNAL_SERVER_ERROR);
                        }
    }
    
}