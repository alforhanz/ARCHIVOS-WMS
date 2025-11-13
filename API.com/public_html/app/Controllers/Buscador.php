<?php
namespace App\Controllers;

use App\Models\Buscador_Model;
use CodeIgniter\HTTP\Response;
use CodeIgniter\HTTP\ResponseInterface;
use Exception;

class Buscador extends BaseController
{
    protected $format = 'json';
    /**
    * Get all MarcasVehiculo
    * @return Response
    **/ 
    public function index()
    {
        $model = new Buscador_Model();
        return $this->getResponse(
            [
                'message' => 'Tipo recuperados con exito',
                'Tipo' => $model->findTipoAll()
            ]
        );
    }
    /**
    * Create a new Client
    **/
    public function store()
    {
        $rules = [
            'name' => 'required',
//          'email' => 'required|min_length[6]|max_length[50]|valid_email|is_unique[client.email]',
            'password' => 'required|max_length[255]'
        ];

        $input = $this->getRequestInput($this->request);

        if (!$this->validateRequest($input, $rules)) {
            return $this
                ->getResponse(
                    $this->validator->getErrors(),
                    ResponseInterface::HTTP_BAD_REQUEST
                );
        }

        $user  = $input['name'];
        $model = new MarcasVehiculo_Model();
        $model->save($input);
        $marcas = $model->where('name', $user)->first();
        return $this->getResponse(
            [
                'message' => 'Client added successfully',
                'client' => $marcas
            ]
        );
    }

    /**
     * Get a single client by ID
     */
    public function show($id)
    {
      /*
      MODULO BUSCADOR
      id: 1 para busqueda en general y Servicios
      id: 3 para busqueda de secciones
      id: 4 para busqueda de rines
      id: 5 para busqueda de llantas
      id: 6 para busqueda de filtros
      */
        try {
          switch ($id) {
            case 1:
                  $model = new Buscador_Model();
                  if(isset($_GET['ptiporpt'])) {$pTIPORPT = $_GET["ptiporpt"];}else {$pTIPORPT = null;}
                  if(isset($_GET['ptipoclase'])) {$pTIPOCLASE = $_GET["ptipoclase"];}else {$pTIPOCLASE = null;}
                  if(isset($_GET['articulo'])) {$pArt = $_GET["articulo"];}else {$pArt = null;}
                  if(isset($_GET['bodega'])) {$bodega = $_GET["bodega"];}else {$bodega = null;}
				  if(isset($_GET['ptipoprod'])) {$pTipoProd = $_GET["ptipoprod"];}else {$pTipoProd = null;}
                  $result = $model->Busqueda($pTIPORPT,$pTIPOCLASE,$pArt,$bodega,$pTipoProd);
              break;
            case 2:
              $model = new Buscador_Model();
                  if(isset($_GET['ptiporpt'])) {$pTIPORPT = $_GET["ptiporpt"];}else {$pTIPORPT = null;}
                  if(isset($_GET['ptipoclase'])) {$pTIPOCLASE = $_GET["ptipoclase"];}else {$pTIPOCLASE = null;}
                  if(isset($_GET['articulo'])) {$pArt = $_GET["articulo"];}else {$pArt = null;}
                  if(isset($_GET['bodega'])) {$bodega = $_GET["bodega"];}else {$bodega = null;}
                  $result = $model->Busqueda($pTIPORPT,$pTIPOCLASE,$pArt,$bodega);
              break;
            default:
              # code...
              break;
          }
              return $this->getResponse(
                  [
                      'msg'        => 'SUCCESS',
                      'message'    => 'Busqueda recuperado con exito',
                      'data'    => $result,
                  ]
              );
        } catch (Exception $e) {
            return $this->getResponse(
                [
                    'message' => 'No se pudo encontrar el Cliente para la ID especificada'
                ],
                ResponseInterface::HTTP_NOT_FOUND
            );
        }
    }

    public function update($id)
    {
        try {
            $model = new ClientModel();
            $model->findClientById($id);

            $input = $this->getRequestInput($this->request);

            $model->update($id, $input);
            $client = $model->findClientById($id);

            return $this->getResponse(
                [
                    'message' => 'Client updated successfully',
                    'client' => $client
                ]
            );

        } catch (Exception $exception) {

            return $this->getResponse(
                [
                    'message' => $exception->getMessage()
                ],
                ResponseInterface::HTTP_NOT_FOUND
            );
        }
    }

    public function destroy($id)
    {
        try {

            $model = new ClientModel();
            $client = $model->findClientById($id);
            $model->delete($client);

            return $this
                ->getResponse(
                    [
                        'message' => 'Client deleted successfully',
                    ]
                );

        } catch (Exception $exception) {
            return $this->getResponse(
                [
                    'message' => $exception->getMessage()
                ],
                ResponseInterface::HTTP_NOT_FOUND
            );
        }
    }
}