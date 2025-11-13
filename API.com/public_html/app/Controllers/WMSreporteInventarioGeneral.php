<?php

namespace App\Controllers;

use App\Models\WMSreporteInventarioGeneral_Model;
use CodeIgniter\HTTP\Response;
use CodeIgniter\HTTP\ResponseInterface;
use Exception;

class WMSreporteInventarioGeneral extends BaseController
{
    protected $format = 'json';
    /**
    * Get all Filtros (clase, marca, tipo, subtipo, subtipo2, envase)
    * @return Response
    **/
    public function ResumenInventarioGeneral()
    {
        $model = new WMSreporteInventarioGeneral_Model();
     
        if(!empty($_GET['pSistema'])) {$pSistema = $_GET["pSistema"];}else {$pSistema = null;}
        if(!empty($_GET['pUsuario'])) {$pUsuario = $_GET["pUsuario"];}else {$pUsuario = null;}
        if(!empty($_GET['pTipoRpt'])) {$pTipoRpt = $_GET["pTipoRpt"];}else {$pTipoRpt = null;}
        if(!empty($_GET['pSoloContados'])) {$pSoloContados = $_GET["pSoloContados"];}else {$pSoloContados = null;}
        if(!empty($_GET['pFecha'])) {$pFecha = $_GET["pFecha"];}else {$pFecha = null;}
        if(!empty($_GET['pBodega'])) {$pBodega = $_GET["pBodega"];}else {$pBodega = null;}
    // --Tipo de agrupado--
        if(!empty($_GET['pAgrupadoClase'])) {$pAgrupadoClase = $_GET["pAgrupadoClase"];}else {$pAgrupadoClase = null;}
        if(!empty($_GET['pAgrupadoMarca'])) {$pAgrupadoMarca = $_GET["pAgrupadoMarca"];}else {$pAgrupadoMarca = null;}
    // --clasificaciones--
        if(!empty($_GET['pclase'])) {$pclase = $_GET["pclase"];}else {$pclase = null;}
        if(!empty($_GET['pmarca'])) {$pmarca = $_GET["pmarca"];}else {$pmarca = null;}
        if(!empty($_GET['ptipo'])) {$ptipo = $_GET["ptipo"];}else {$ptipo = null;}
		if(!empty($_GET['pEnvase'])) {$pEnvase = $_GET["pEnvase"];}else {$pEnvase = null;}
        if(!empty($_GET['pVentas'])) {$pVentas = $_GET["pVentas"];}else {$pVentas = null;}
        if(!empty($_GET['pT6'])) {$pT6 = $_GET["pT6"];}else {$pT6 = null;}

        $resultado = $model->GetResumenInventarioGeneral($pSistema,$pUsuario,$pTipoRpt,$pSoloContados,$pFecha,$pBodega,$pAgrupadoClase,$pAgrupadoMarca,$pclase,$pmarca,$ptipo,$pEnvase,$pVentas,$pT6);
		
        return $this->getResponse(
            [
                'msg' => 'SUCCESS',
                'message' => 'Reporte del Inventario General',
                'resultado' => $resultado
            ]
        );
    }
}