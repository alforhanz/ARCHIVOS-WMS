<?php 
namespace App\Models;
use CodeIgniter\Model;
use Exception;

class WMScambiaBodegaDestinoOrdenCompra_Model extends Model
{
                   //----------------------------//
                  // Cambia las bodegas         //
                 //----------------------------//
    public function sp_update_Bodegas_Embarque($Bodega = null, $Embarque = null, $OrdenCompra = null)
    {
        try{
            $db = db_connect();
            $params = array($Bodega, $Embarque, $OrdenCompra);
            $sql = "CLSA.sp_update_Bodegas_Embarque ?, ?, ?"; 
            $query = $db->query($sql,$params)->getResult();
            return $query;
            // $query->free_result();
            // $db->close();
        } catch (Exception $e) {
                throw new Exception('Error al ejecutar el procedimiento almacenado para obtener las bodegas: ' . $e->getMessage());
        }
    }
}