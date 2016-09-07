<?php


namespace App\Action;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

final class UsuarioAction
{
    private $usuarioRepository;

    public function __construct(\App\Repository\Usuario $usuarioRepository)
    {
        $this->usuarioRepository = $usuarioRepository;
    }

    public function create(Request $request, Response $response, $args){
        $data = $request->getParsedBody();
        $hash = $this->usuarioRepository->create($data);

        return $response->withJSON($hash);
    }

    public function timeline(Request $request, Response $response, $args){
        $timeline = $this->usuarioRepository->timeline($args['hash']);
        return $response->withJSON($timeline);
    }

}