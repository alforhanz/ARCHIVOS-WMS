<?php
namespace App\Controllers;
use App\Models\WMScreacionDeBoletas_Model;
use CodeIgniter\HTTP\Response;
use CodeIgniter\HTTP\ResponseInterface;
use Exception;

class WMScreacionDeBoletas extends BaseController
{
    protected $format = 'json';
    /**
    * Get all Filtros (clase, marca, tipo, subtipo, subtipo2, envase)
    * @return Response
    **/
    public function presentarBoleta()
    {
        $model = new WMScreacionDeBoletas_Model();
     
        if(!empty($_GET['pSistema'])) {$pSistema = $_GET["pSistema"];}else {$pSistema = null;}
        if(!empty($_GET['pUsuario'])) {$pUsuario = $_GET["pUsuario"];}else {$pUsuario = null;}
        if(!empty($_GET['TipoConsulta'])) {$TipoConsulta = $_GET["TipoConsulta"];}else {$TipoConsulta = null;}        
        if(!empty($_GET['FechaProceso'])) {$FechaProceso = $_GET["FechaProceso"];}else {$FechaProceso = null;}
        if(!empty($_GET['Bodega'])) {$Bodega = $_GET["Bodega"];}else {$Bodega = null;}  
        if(!empty($_GET['SoloDiferencia'])) {$SoloDiferencia = $_GET["SoloDiferencia"];}else {$SoloDiferencia = null;}
        if(!empty($_GET['SoloConteoCero'])) {$SoloConteoCero = $_GET["SoloConteoCero"];}else {$SoloConteoCero = null;}  
        if(!empty($_GET['Clasificacion'])) {$Clasificacion = $_GET["Clasificacion"];}else {$Clasificacion = null;}
        if(!empty($_GET['Articulo'])) {$Articulo = $_GET["Articulo"];}else {$Articulo = null;}

        $resultado = $model->GetPresentaBoleta($pSistema,$pUsuario,$TipoConsulta,$FechaProceso,$Bodega,$SoloDiferencia,$SoloConteoCero,null,null);
		
        return $this->getResponse(
            [
                'msg' => 'SUCCESS',
                'message' => 'Reporte del Inventario General',
                'resultado' => $resultado
            ]
        );
    }


    public function actualizaCostos()
    {
        $model = new WMScreacionDeBoletas_Model();
     
        if(!empty($_GET['pSistema'])) {$pSistema = $_GET["pSistema"];}else {$pSistema = null;}
        if(!empty($_GET['pUsuario'])) {$pUsuario = $_GET["pUsuario"];}else {$pUsuario = null;}
        if(!empty($_GET['pOrigen'])) {$pOrigen = $_GET["pOrigen"];}else {$pOrigen = null;}        
        
		 $resultado = $model->GetActualizaCostos($pSistema,$pUsuario,$pOrigen,null,null,null,null);
        return $this->getResponse(
            [
                'msg' => 'SUCCESS',
                'message' => 'Reporte del Inventario General',
                'resultado' => $resultado
            ]
        );
    }

    public function crearBoleta()
    {
        $model = new WMScreacionDeBoletas_Model();
     
        if(!empty($_GET['pSistema'])) {$pSistema = $_GET["pSistema"];}else {$pSistema = null;}
        if(!empty($_GET['pUsuario'])) {$pUsuario = $_GET["pUsuario"];}else {$pUsuario = null;}       
        if(!empty($_GET['FechaProceso'])) {$FechaProceso = $_GET["FechaProceso"];}else {$FechaProceso = null;}
        if(!empty($_GET['Bodega'])) {$Bodega = $_GET["Bodega"];}else {$Bodega = null;}  
       
        $resultado = $model->GetCrearBoleta($pSistema,$pUsuario,'I',$FechaProceso,$Bodega,'S',null, null);
        return $this->getResponse(
            [
                'msg' => 'SUCCESS',
                'message' => 'Consecutivo Boleta Inventario',
                'resultado' => $resultado
            ]
        );
    }


}



 // public function crearBoleta()
 //    {
 //        $model = new WMScreacionDeBoletas_Model();
     
 //        if(!empty($_GET['pSistema'])) {$pSistema = $_GET["pSistema"];}else {$pSistema = null;}
 //        if(!empty($_GET['pUsuario'])) {$pUsuario = $_GET["pUsuario"];}else {$pUsuario = null;}
 //        // if(!empty($_GET['pOpcion'])) {$pOpcion = $_GET["pOpcion"];}else {$pOpcion = null;}        
 //        if(!empty($_GET['FechaProceso'])) {$FechaProceso = $_GET["FechaProceso"];}else {$FechaProceso = null;}
 //        if(!empty($_GET['Bodega'])) {$Bodega = $_GET["Bodega"];}else {$Bodega = null;}  
 //        // if(!empty($_GET['SoloDiferencia'])) {$SoloDiferencia = $_GET["SoloDiferencia"];}else {$SoloDiferencia = null;}        
 //        // if(!empty($_GET['Clasificacion'])) {$Clasificacion = $_GET["Clasificacion"];}else {$Clasificacion = null;}
 //        // if(!empty($_GET['Articulo'])) {$Articulo = $_GET["Articulo"];}else {$Articulo = null;}    

 //        // 	 // $resultado = $model->GetCrearBoleta($pSistema,$pUsuario,$pOpcion,$FechaProceso,$Bodega,$SoloDiferencia,$Clasificacion,$Articulo);
 //        //  $resultado = $model->GetCrearBoleta($pSistema,$pUsuario,'I',$FechaProceso,$Bodega,'S',null, null);
 //        // return $this->getResponse(
 //        //     [                
 //        //         'resultado' => $resultado
 //        //     ]  
        
	// 	 //$resultado = $model->GetCrearBoleta($pSistema,$pUsuario,$pOpcion,$FechaProceso,$Bodega,$SoloDiferencia,$Clasificacion,$Articulo);
 //        $resultado = $model->GetCrearBoleta($pSistema,$pUsuario,'I',$FechaProceso,$Bodega,'S',null, null);
 //        return $this->getResponse(
 //            [
 //                'msg' => 'SUCCESS',
 //                'message' => 'Reporte del Inventario General',
 //                'resultado' => $resultado
 //            ]
 //        );
 //    }