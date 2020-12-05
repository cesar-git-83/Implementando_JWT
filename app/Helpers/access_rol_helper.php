<?php 

use Config\Services;
use Firebase\JWT\JWT;
use App\Models\RolModel;

function validateAccess($roles, $authHeader)
{
    if(!is_array($roles))
    return false;

    $key = Services::getsecretKey();
    $arr = explode(' ', $authHeader);
    $jwt = $arr[1];
    $jwt = JWT::decode($jwt, $key, ['HS256']);

    $rolModel = new RolModel();
    $rol = $rolModel->find($jwt->data->rol);

    if(rol == null)
        return false;

    foreach ($roles as $key => $value):
        if($value != $rol["nombre"])
            return false;
    endforeach;
    return true;

}