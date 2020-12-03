<?php namespace App\Controllers;
use codeIgniter\API\ResponseTrait;

class Auth extends BaseController
{
    use ResponseTrair;

	public function login()
	{
		try {
            $username = $this->request->getPost('username');
            $password = $this->request->getPost('password');

            $usuarioModel = new UsuarioModel();
            $where = ['username'=>$username, 'password'=>$password];

            $validateUsuario = $usuarioModel->where($where)->find();

        } catch (\Exception $e) {
            return $this->failServerError('Ha ocurrido un error en el servidor');
        }
	}

	
}
