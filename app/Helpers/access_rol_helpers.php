<?php

use App\Models\RolModel;
use Config\Services;
use Firebase\JWT\JWT;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

function validateAcess($roles, $authHeader){
    
    if (!is_array($roles)) 
    return false;
    
    $key = Services::getSecretKey();

        $arr = explode('', $authHeader);
        $jwt = $arr[1];

        $jwt = JWT::decode($jwt, $key, ['HS256']);

        $rolModel = new RolModel();
                $rol = $rolModel->find($jwt->data->rol);

                if ($rol == null) 
                    return Services::response()->setStatusCode(ResponseInterface::HTTP_UNAUTHORIZED, 'El rol del JWT es invalido');

                    return false;

    if(!in_array($rol["nombre"], $roles))
    return false;

        return true;

}