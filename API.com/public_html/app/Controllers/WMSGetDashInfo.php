<?php
namespace App\Controllers;

use App\Models\WMSGetDashInfo_Model;
use CodeIgniter\HTTP\Response;
use CodeIgniter\HTTP\ResponseInterface; 
use Exception;

class WMSGetDashInfo extends BaseController
{	
    public function show($id)
    {

        try {
          switch ($id) {

            case 1:
                  $model = new WMSGetDashInfo_Model();
                  if(isset($_GET['pUsuario'])) {$pUsuario = $_GET["pUsuario"];}else {$pUsuario = null;}
                     
                     $pOpcion= null;
                     $data = $model->GetDashInfo($pOpcion,$pUsuario);

                     return $this->getResponse(
                        [
                            'msg'        => 'SUCCESS',
                            'message'    => 'Busqueda recuperado con exito',
                            'data'    => $data,
                        ]
                    );

            break;
            
            case 2:
                  $model = new WMSGetDashInfo_Model();
                  if(isset($_GET['pUsuario'])) {$pUsuario = $_GET["pUsuario"];}else {$pUsuario = null;}
                 
                     $result = $model->GetDashInfo('D',$pUsuario);

                     return $this->getResponse(
                        [
                            'msg'        => 'SUCCESS',
                            'message'    => 'Busqueda recuperado con exito',
                            'data'    => $result,
                        ]
                    );

            break;
        
            case 3:
                  $model = new WMSGetDashInfo_Model();
                  if(isset($_GET['pUsuario'])) {$pUsuario = $_GET["pUsuario"];}else {$pUsuario = null;}
                  
                    $pOpcion= null;
                     $data = $model->GetDashInfoOrdenesDeCompras($pOpcion,$pUsuario);

                     return $this->getResponse(
                        [
                            'msg'        => 'SUCCESS',
                            'message'    => 'Busqueda recuperado con exito',
                            'data'    => $data,
                        ]
                    );

            break;

            case 4:
                  $model = new WMSGetDashInfo_Model();
                  if(isset($_GET['pUsuario'])) {$pUsuario = $_GET["pUsuario"];}else {$pUsuario = null;}
                  
                     
                     $data = $model->GetDashInfoOrdenesDeCompras('D',$pUsuario);

                     return $this->getResponse(
                        [
                            'msg'        => 'SUCCESS',
                            'message'    => 'Busqueda recuperado con exito',
                            'data'    => $data,
                        ]
                    );

            break;

             case 5:
                  $model = new WMSGetDashInfo_Model();
                  if(isset($_GET['pUsuario'])) {$pUsuario = $_GET["pUsuario"];}else {$pUsuario = null;}
                  
                     
                     $data = $model->GetDashInfoContenedores('D',$pUsuario);

                     return $this->getResponse(
                        [
                            'msg'        => 'SUCCESS',
                            'message'    => 'Busqueda recuperado con exito',
                            'data'    => $data,
                        ]
                    );

            break;

             case 6:
                  $model = new WMSGetDashInfo_Model();
                  if(isset($_GET['pUsuario'])) {$pUsuario = $_GET["pUsuario"];}else {$pUsuario = null;}
                  
                     
                     $data = $model->GetDashInfoContenedores('D',$pUsuario);

                     return $this->getResponse(
                        [
                            'msg'        => 'SUCCESS',
                            'message'    => 'Busqueda recuperado con exito',
                            'data'    => $data,
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