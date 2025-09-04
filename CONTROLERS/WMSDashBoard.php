<?php

namespace App\Controllers;

use App\Models\WMSDashBoard_Model;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\HTTP\Exceptions\HTTPException;

class WMSDashBoard extends BaseController
{
    public function DashInfo()
    {
        try {
            $model = new WMSDashBoard_Model();

            $pUsuario = $this->request->getVar('pUsuario');
            $pOpcion = $this->request->getVar('pOpcion');

            $result = $model->DashInfo($pOpcion, $pUsuario);

            if ($result !== null) {
                return $this->getResponse([
                    'status' => ResponseInterface::HTTP_OK,
                    'message' => 'Búsqueda recuperada con éxito',
                    'data' => $result,
                ]);
            } else {
                return $this->getResponse([
                    'status' => ResponseInterface::HTTP_NOT_FOUND,
                    'message' => 'No se encontraron datos para los parámetros especificados',
                ]);
            }
        } catch (HTTPException $e) {
            return $this->getResponse([
                'status' => $e->getCode(),
                'message' => $e->getMessage(),
            ]);
        } catch (\Exception $e) {
            return $this->getResponse([
                'status' => ResponseInterface::HTTP_INTERNAL_SERVER_ERROR,
                'message' => 'Error interno del servidor: ' . $e->getMessage(),
            ]);
        }
    }
}
