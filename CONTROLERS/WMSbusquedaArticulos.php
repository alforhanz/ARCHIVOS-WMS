<?php
namespace App\Controllers;

use App\Models\WMSbusquedaArticulos_Model;
use CodeIgniter\HTTP\Response;
use CodeIgniter\HTTP\ResponseInterface;

use Exception;

class WMSbusquedaArticulos extends BaseController
{
    protected $format = 'json';
  
    public function show($id)
    {
      
        try {
          switch ($id) {
        
              //Busqueda con Filtros para WMS
              case 1:
              $model = new WMSbusquedaArticulos_Model();
              	  if(!empty($_GET['pExistencia'])) {$pExistencia = $_GET["pExistencia"];}else {$pExistencia = null;}
                  if(!empty($_GET['pArticulo'])) {$pArticulo = $_GET["pArticulo"];}else {$pArticulo = null;}
                  if(!empty($_GET['pClase'])) {$pClase = $_GET["pClase"];}else {$pClase = null;}
                  if(!empty($_GET['pMarca'])) {$pMarca = $_GET["pMarca"];}else {$pMarca = null;}
                  if(!empty($_GET['pUso'])) {$pUso = $_GET["pUso"];}else {$pUso = null;}
                  if(!empty($_GET['pEnvase'])) {$pEnvase = $_GET["pEnvase"];}else {$pEnvase = null;} 
                  if(!empty($_GET['pBodega'])) {$pBodega = $_GET["pBodega"];}else {$pBodega = null;}

                  $result = $model->Busqueda('S',$pExistencia,$pArticulo,$pClase,$pMarca,$pUso,$pEnvase,$pBodega,0);
                 // $result = $model->Busqueda('S',null,$pArticulo,$pClase,$pMarca,$pUso,$pEnvase,$pBodega,0);
              break;
            default:
              # code...
              break;
          }
              return $this->getResponse(
                  [
                      'msg'        => 'SUCCESS',
                      'message'    => 'Busqueda recuperado con exito',
                      'data'    => $result,
                  ]
              );
        } catch (Exception $e) {
            return $this->getResponse(
                [
                    'message' => 'Error en la busqueda'
                ],
                ResponseInterface::HTTP_NOT_FOUND
            );
        }
    }
}