<?php namespace App\Models;

use CodeIgniter\Model;

class WMSGetDashInfo_Model extends Model
{
      //------------------------------------------------------------
     //  BUSQUEDA DE VALORES PARA DASHBOARD WMS PEDIDOS
    //------------------------------------------------------------
    public function GetDashInfo($pOpcion=null,$pUsuario=null)
    {
      try {
          $db = db_connect();
          $sql = "{CALL [CLSA].[SP_valores_Dashboard] (?,?)}";
          $params = array($pOpcion,$pUsuario);
          $query = $db->query($sql, $params)->getResult();
          return $query;
      } catch (Exception $e) {
          die('Error GlobalModel(validarusuario) '.$e->getMessage());
      }finally{
        $query = null;
      }
    }

        //------------------------------------------------------------
       //  BUSQUEDA DE VALORES PARA DASHBOARD WMS ORDENES DE COMPRAS
      //------------------------------------------------------------
    public function GetDashInfoOrdenesDeCompras($pOpcion=null,$pUsuario=null)
    {
      try {
          $db = db_connect();
          $sql = "{CALL [CLSA].[SP_valores_Dashboard_OrdenCompra] (?,?)}";
          $params = array($pOpcion,$pUsuario);
          $query = $db->query($sql, $params)->getResult();
          return $query;
      } catch (Exception $e) {
          die('Error GlobalModel(validarusuario) '.$e->getMessage());
      }finally{
        $query = null;
      }
    }


        //------------------------------------------------------------
       //  BUSQUEDA DE VALORES PARA DASHBOARD WMS ORDENES DE COMPRAS
      //------------------------------------------------------------
    public function GetDashInfoContenedores($pOpcion=null,$pUsuario=null)
    {
      try {
          $db = db_connect();
          $sql = "{CALL [CLSA].[SP_valores_Dashboard_Contenedor] (?,?)}";
          $params = array($pOpcion,$pUsuario);
          $query = $db->query($sql, $params)->getResult();
          return $query;
      } catch (Exception $e) {
          die('Error GlobalModel(validarusuario) '.$e->getMessage());
      }finally{
        $query = null;
      }
    }
   
}