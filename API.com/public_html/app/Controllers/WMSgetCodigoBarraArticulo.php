<?php
namespace App\Controllers;

use App\Models\WMSgetCodigoBarraArticulo_Model;
use CodeIgniter\HTTP\ResponseInterface;
use Exception;

class WMSgetCodigoBarraArticulo extends BaseController
{
    protected $format = 'json';
    /**
     * Get a single client by ID
     */
    public function show_OrdenesDeCompras()
    {
        try {
            $model = new WMSgetCodigoBarraArticulo_Model();
            //Definir los parametros            
            $pCodigoBarra = !empty($_GET['pCodigoBarra']) ? $_GET["pCodigoBarra"] : null;       
            $pArticulo = !empty($_GET['pArticulo']) ? $_GET["pArticulo"] : null;

            // Llama al procedimiento almacenado con los parámetros adecuados
            $ordenCompra = $model->getCodigoBarraArticulo($pCodigoBarra, $pArticulo);

            return $this->getResponse([
                'msg' => 'SUCCESS',
                'message' => 'Consulta recuperada con éxito',
                'ordenCompra' => $ordenCompra
            ]);
        } catch (Exception $e) {
            return $this->getResponse([
                'message' => 'No se pudo completar la consulta: ' . $e->getMessage()
            ], ResponseInterface::HTTP_INTERNAL_SERVER_ERROR);
        }
    }  
}



// namespace App\Controllers;

// use App\Models\WMSgetCodigoBarraArticulo_Model;
// use CodeIgniter\HTTP\ResponseInterface;
// use Exception;

// class WMSgetCodigoBarraArticulo extends BaseController
// {
//         protected $format = 'json';    
//         /**
//      * Get a single client by ID
//      */
//     public function showCodigoBarra()
//     {
//         try {
//             $model = new WMSgetCodigoBarraArticulo_Model();
//             //Definir los parametros
               
//             $pCodigoBarra = !empty($_GET['pCodigoBarra']) ? $_GET["pCodigoBarra"] : null;
         
//             $pArticulo = !empty($_GET['pArticulo']) ? $_GET["pArticulo"] : null;
            

//             // Llama al procedimiento almacenado con los parámetros adecuados
//             $ordenCompra = $model->getCodigoBarraArticulo($pCodigoBarra, $pArticulo);

//             return $this->getResponse([
//                 'msg' => 'SUCCESS',
//                 'message' => 'Consulta recuperada con éxito',
//                 'ordenCompra' => $ordenCompra
//             ]);
//         } catch (Exception $e) {
//             return $this->getResponse([
//                 'message' => 'No se pudo completar la consulta: ' . $e->getMessage()
//             ], ResponseInterface::HTTP_INTERNAL_SERVER_ERROR);
//         }
//     }
// }
