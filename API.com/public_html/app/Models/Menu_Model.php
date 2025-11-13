<?php

namespace App\Models;

use CodeIgniter\Model;
use Exception;

class Menu_Model extends Model
{
    //-------------------------------------------------------------
    public function sp_getModulosUsuario($pUser,$pSistema,$pTipoMenu=null)
    {
      try {
          $db = db_connect();
          $sql = "CLSA.sp_getModulosUsuario ?,?,?";
          $params = array($pUser,$pSistema,$pTipoMenu); 
          $query = $db->query($sql, $params)->getResult();
          return $query;
          $query->free_result();
          $db->close();
      } catch (Exception $e) {
          die('Error GlobalModel(validarusuario) '.$e->getMessage());
      }finally{
          $query = null;
      }
    }
    //-------------------------------------------------------------
      public function sp_getPrivilegiosModulosUsuario($pUser,$pSistema,$pModulo=null)
    {
      try {
          $db = db_connect();
          $sql = "CLSA.sp_getPrivilegiosModulosUsuario ?,?,?";
          $params = array($pUser,$pSistema,$pModulo); 
          $query = $db->query($sql, $params)->getResult();
          return $query;
          $query->free_result();
          $db->close();
      } catch (Exception $e) {
          die('Error GlobalModel(validarusuario) '.$e->getMessage());
      }finally{
          $query = null;
      }
    }

}
