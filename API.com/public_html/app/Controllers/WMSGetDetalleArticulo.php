<?php
namespace App\Controllers;
use App\Models\WMSGetDetalleArticulo_Model;
use CodeIgniter\HTTP\Response;
use CodeIgniter\HTTP\ResponseInterface;
use Exception;

class WMSGetDetalleArticulo extends BaseController
{
    protected $format = 'json';
    /**
    * Get all Filtros (clase, marca, tipo, subtipo, subtipo2, envase)
    * @return Response
    **/
    public function articuloDetalleNota()
    {
        $model = new WMSGetDetalleArticulo_Model();
     
        // if(!empty($_GET['pSistema'])) {$pSistema = $_GET["pSistema"];}else {$pSistema = null;}
        if(!empty($_GET['pUsuario'])) {$pUsuario = $_GET["pUsuario"];}else {$pUsuario = null;}
        // if(!empty($_GET['pOpcion'])) {$pOpcion = $_GET["pOpcion"];}else {$pOpcion = null;}       
        // if(!empty($_GET['pClase'])) {$pClase = $_GET["pClase"];}else {$pClase = null;}
        // if(!empty($_GET['pMarca'])) {$pMarca = $_GET["pMarca"];}else {$pMarca = null;}  
        if(!empty($_GET['pCodigo'])) {$pCodigo = $_GET["pCodigo"];}else {$pCodigo = null;}

        // $resultado = $model->sp_getArticulosDesglose($pSistema,$pUsuario,$pOpcion,$pClase,$pMarca,$pCodigo);
           $resultado = $model->sp_getArticulosDesglose('WMS',$pUsuario,'C',null,null,$pCodigo);
		
        return $this->getResponse(
            [
                'msg' => 'SUCCESS',
                'message' => 'Detalle del articulo recuperada con exito',
                'resultado' => $resultado
            ]
        );
    }
}