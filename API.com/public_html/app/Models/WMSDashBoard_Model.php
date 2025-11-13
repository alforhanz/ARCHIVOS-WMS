<?php
namespace App\Models;

use CodeIgniter\Model;

class WMSDashBoard_Model extends Model
{  
    public function DashInfo($pOpcion = null, $pUsuario = null)
    {
        try {
            $db = db_connect();
            $sql = "{CALL [CLSA].[SP_valores_Dashboard] (?,?)}";
            $params = array($pOpcion, $pUsuario);
            $query = $db->query($sql, $params)->getResultArray();
            return $query;
        } catch (\Exception $e) {
            // Devolver null en caso de error
            return null;
        }
    }   
}

