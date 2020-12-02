<?php namespace App\Controllers\API;

use App\Models\EstudianteModel;
use CodeIgniter\RESTful\ResourceController;

class Estudiante extends ResourceController
{
    public function __constuct(){
        $this->model= $this-> setModel(new EstudianteModel());


    }

	public function index()
	{
        $estudiante = $this->model->findAll();
		return $this->respond($estudiante);
	}

	public function create()
    {
        try {
            $estudiante = $this->request->getJSON();
            if($this->model->insert($estudiante)):
                $estudiante->id = $this->model->insertID();
                return $this->respondCreated($estudiante);
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

            $estudiante = $this->model->find($id);

            if($estudiante == null)
            return $this->failNotFound('No se ha encontrado el estudiante con el id:'.$id);
            
            $profesorModel = new ProfesorModel();
            $estudiante["profesor"] = $profesorModel->where('estudiante_id',$estudiante['id'])->findAll();

            return $this->respond($estudiante);
        } catch (\Exception $e) {
           
            return $this->failserverError('Ha ocurrido un error en el servidor');
        }
        
    }
    
    public function update($id = null)
	{
        try {
            if($id == null)
            return $this->failValidationError('No se ha pasado un Id valido');

            $estudianteVerificado = $this->model->find($id);

            if($estudianteVerificado == null)
            return $this->failNotFound('No se ha encontrado el estudiante con el id:'.$id);

            $estudiante = $this->request->getJSON();

            if($this->model->update($id, $estudiante)):
               $estudiante->id = $id;
                return $this->respondUpdated($estudiante);
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

            $estudianteVerificado = $this->model->find($id);

            if($estudianteVerificado == null)
            return $this->failNotFound('No se ha encontrado el estudiante con el id:'.$id);

            
            if($this->model->delete($id)):
            
                return $this->respondDeleted($estudianteVerificado);
            else:
                return $this->failserverError('No se ha podido eliminar el dato');
            endif;

        } catch (\Exception $e) {
           
            return $this->failserverError('Ha ocurrido un error en el servidor');
        }
        
	}
}