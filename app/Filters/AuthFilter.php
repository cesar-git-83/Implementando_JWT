<?php
namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Config\Services;
use Firebase\JWT\JWT;
use Firebase\JWT\ExpiredException;
use CodeIgniter\API\ResponseTrait;

class AuthFilter implements FilterInterface{

    use ResponseTrait;

    public function before(RequestInterfase $request, $arguments = null){

            try {
            $key = Services::getsecretKey();
            $authHeader = $request->getServer('HTTP_AUTHORIZATION');
            if ($authHeader == null) {
                return Services::response()->setStatusCode(ResponseInterface::HTTP_UNAUTHORIZED, 'No se ha enviado el JWT autorizado');

                $arr = explode('', $authHeader);
                $jwt = $arr[1];

                JWT::decode($jwt, $key, ['HS256']);

            }           

        } catch (\Exceptrion $e) {
            return Services::response()->setStatusCode(ResponseInterface::HTTP__INTERNAL_SERVER_ERROR,'Ocurrio un error en el servidor al validar el token');        }

    }

    public function after(RequestInterfase $request, $arguments = null){

    }

    
}