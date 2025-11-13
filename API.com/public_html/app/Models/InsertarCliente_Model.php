<?php

namespace App\Models;

use CodeIgniter\Model;
use Exception;

class InsertarCliente_Model extends Model
{
    public function insertarcliente($tipoContribuyente, $nit, $razon_social, $alias, $creado_por, $dv, $tipoClienteFE, $telefono, $sucursal, $fax, $mail, $direccion, $notas, $nivel_precio, $ruta)
    {
      try {
          $db = db_connect();
          $params = array($tipoContribuyente,  $nit,  $razon_social,  $alias,  $creado_por,  $dv, $tipoClienteFE, $telefono,  $sucursal,  $fax,  $mail,  $direccion,  $notas,  $nivel_precio,  $ruta);
          $sql = "ECOMMERCE.cr_InsertarCliente ?,?,?,?,?,?,?,?,?,?,?,?,?,?,?";
          $query = $db->query($sql,$params)->getResult();
		  // $e=$query[0]->INFORMACION;
      /*    echo "<pre>";
          print_r($query);
          echo "</pre>";
          die();*/
          // $query->free_result();
		  return $query[0]->INFORMACION;
          $db->close();
      } catch (Exception $e) {
        // die('error globalmodel(insertarcliente)'.$e->getmessage());
		// // return "ERROR";
		// return $query[0]->INFORMACION;
		$query = null; 
        return false;
      }
	  
    }
}
