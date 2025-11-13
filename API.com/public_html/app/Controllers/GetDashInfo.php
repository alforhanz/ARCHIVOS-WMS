<?php
namespace App\Controllers;

use App\Models\GetDashInfo_Model;
use CodeIgniter\HTTP\Response;
use CodeIgniter\HTTP\ResponseInterface; 
use Exception;

class GetDashInfo extends BaseController
{
    protected $format = 'json';
    /**
    * Get all MarcasVehiculo
    * @return Response
    **/ 
    public function index()
    {
        $model = new Buscador_Model();
        return $this->getResponse(
            [
                'message' => 'Tipo recuperados con exito',
                'Tipo' => $model->findTipoAll()
            ]
        );
    }
	
    public function show($id)
    {

        try {
          switch ($id) {
            case 1:
                  $model = new GetDashInfo_Model();
                  if(isset($_GET['pUsuario'])) {$pUsuario = $_GET["pUsuario"];}else {$pUsuario = null;}
                    // if(isset($_GET['pOpcion'])) {$pOpcion = $_GET["pOpcion"];}else {$pOpcion = null;}

                  // $result = $model->GetDashInfo($pOpcion,$pUsuario);

                     $result = $model->GetDashInfo('D',$pUsuario);

                     return $this->getResponse(
                        [
                            'msg'        => 'SUCCESS',
                            'message'    => 'Busqueda recuperado con exito',
                            'data'    => $result,
                        ]
                    );

            break;
            
            case 2:
                  $model = new GetDashInfo_Model();
                  if(isset($_GET['pUsuario'])) {$pUsuario = $_GET["pUsuario"];}else {$pUsuario = null;}
                  $pOpcion= null;
                     $result = $model->GetDashInfo($pOpcion,$pUsuario);

                     return $this->getResponse(
                        [
                            'msg'        => 'SUCCESS',
                            'message'    => 'Busqueda recuperado con exito',
                            'data'    => $result,
                        ]
                    );

            break;
            default:
              # code...
            break;
          }
              
        } catch (Exception $e) {
            return $this->getResponse(
                [
                    'message' => 'No se pudo encontrar el Cliente para la ID especificada'
                ],
                ResponseInterface::HTTP_NOT_FOUND
            );
        }
    }

}