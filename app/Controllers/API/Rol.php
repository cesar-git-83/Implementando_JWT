<?php namespace App\Controllers\API;

use App\Models\RolModel;
use CodeIgniter\RESTful\ResourceController;

class Rol extends ResourceController
{
    public function __construct(){
        $this->model= $this-> setModel(new RolModel());
        helper('access_rol');
    }

	public function index()
	{
        try {
            if (!validateAccess(array('admin'), $this->request->getServer('HTTP_AUTHORIZATION')))
            return $this->failserverError('El rol no tiene acceso a este recurso');
            $rol = $this->model->findAll();
            return $this->respond($rol);
            
         } catch (\Exception $e) {
            return $this->failserverError('Ha ocurrido un error con el servidor');
        }
    }
    public function create()
    {
        try {
            $rol = $this->request->getJSON();
            if($this->model->insert($rol)):
                $rol->id = $this->model->insertID();
                return $this->respondCreated($rol);
            else:
                return $this->failValidationError($this->model->validation->listErrors());
            endif;
        } catch (\Exception $e) {
           
            return $this->failserverError('Ha ocurrido un error en el servidor');
        }
    }

    public function edit($id = null)
	{
        try {
            if($id == null)
            return $this->failValidationError('No se ha pasado un Id valido');

            $rol = $this->model->find($id);

            if($rol == null)
            return $this->failNotFound('No se ha encontrado el rol con el id:'.$id);

            return $this->respond($rol);
        } catch (\Exception $e) {
           
            return $this->failserverError('Ha ocurrido un error en el servidor');
        }
        
    }
    
    public function update($id = null)
	{
        try {
            if($id == null)
            return $this->failValidationError('No se ha pasado un Id valido');

            $rolVerificado = $this->model->find($id);

            if($rolVerificado == null)
            return $this->failNotFound('No se ha encontrado el profesor con el id:'.$id);

            $rol = $this->request->getJSON();

            if($this->model->update($id, $rol)):
               $rol->id = $id;
                return $this->respondUpdated($rol);
            else:
                return $this->failValidationError($this->model->validation->listErrors());
            endif;

        } catch (\Exception $e) {
           
            return $this->failserverError('Ha ocurrido un error en el servidor');
        }
        
    }
    
    public function delete($id = null)
	{
        try {
            if($id == null)
            return $this->failValidationError('No se ha pasado un Id valido');

            $rolVerificado = $this->model->find($id);

            if($rolVerificado == null)
            return $this->failNotFound('No se ha encontrado el usuario con el id:'.$id);

            
            if($this->model->delete($id)):
            
                return $this->respondDeleted($rolVerificado);
            else:
                return $this->failserverError('No se ha podido eliminar el dato');
            endif;

        } catch (\Exception $e) {
           
            return $this->failserverError('Ha ocurrido un error en el servidor');
        }
        
	}

	
}