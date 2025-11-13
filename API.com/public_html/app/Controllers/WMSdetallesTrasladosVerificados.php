<?php
namespace App\Controllers;
use App\Models\WMSdetallesTrasladosVerificados_Model;
use CodeIgniter\HTTP\Response;
use CodeIgniter\HTTP\ResponseInterface;
use Exception;

class WMSdetallesTrasladosVerificados extends BaseController
{
    protected $format = 'json';
    /**
    * 
    * @return Response
    **/
    public function detalleTrasladosVerif()
    {
        $model = new WMSdetallesTrasladosVerificados_Model();
     
        if(!empty($_GET['pSistema'])) {$pSistema = $_GET["pSistema"];}else {$pSistema = null;}
        if(!empty($_GET['pUsuario'])) {$pUsuario = $_GET["pUsuario"];}else {$pUsuario = null;}
        if(!empty($_GET['pOpcion'])) {$pOpcion = $_GET["pOpcion"];}else {$pOpcion = null;}          
        if(!empty($_GET['pBodega'])) {$pBodega = $_GET["pBodega"];}else {$pBodega = null;}  
        if(!empty($_GET['pFechaDesde'])) {$pFechaDesde = $_GET["pFechaDesde"];}else {$pFechaDesde = null;}
        if(!empty($_GET['pFechaHasta'])) {$pFechaHasta = $_GET["pFechaHasta"];}else {$pFechaHasta = null;}  
        if(!empty($_GET['pTraslado'])) {$pTraslado = $_GET["pTraslado"];}else {$pTraslado = null;}
        if(!empty($_GET['pArticulo'])) {$pArticulo = $_GET["pArticulo"];}else {$pArticulo = null;}  
        // clasificaciones
        if(!empty($_GET['pClase'])) {$pClase = $_GET["pClase"];}else {$pClase = null;}  
        if(!empty($_GET['pMarca'])) {$pMarca = $_GET["pMarca"];}else {$pMarca = null;}  
        if(!empty($_GET['pTipo'])) {$pTipo = $_GET["pTipo"];}else {$pTipo = null;}  
        if(!empty($_GET['pEnvase'])) {$pEnvase = $_GET["pEnvase"];}else {$pEnvase = null;}  
        if(!empty($_GET['pVentas'])) {$pVentas = $_GET["pVentas"];}else {$pVentas = null;}  
        if(!empty($_GET['pT6'])) {$pT6 = $_GET["pT6"];}else {$pT6 = null;}  
        // Tipo de transaccion.
        if(!empty($_GET['pTipoTransaccion'])) {$pTipoTransaccion = $_GET["pTipoTransaccion"];}else {$pTipoTransaccion = null;}  
       

        $resultado = $model->GetDetalleTraslados($pSistema,$pUsuario,$pOpcion,$pBodega,$pFechaDesde,$pFechaHasta,$pTraslado,$pArticulo,$pClase,$pMarca,$pTipo,$pEnvase,$pVentas,$pT6,$pTipoTransaccion);
    
        return $this->getResponse(
            [
                'msg' => 'SUCCESS',
                'message' => 'Detalle de los traslado verificados',
                'resultado' => $resultado,
            ]
        );
    } 
}