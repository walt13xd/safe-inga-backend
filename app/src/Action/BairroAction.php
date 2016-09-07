<?php
namespace App\Action;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

final class BairroAction
{

    private $bairroRepository;

    public function __construct(\App\Repository\Bairro $bairroRepository)
    {
        $this->bairroRepository = $bairroRepository;
    }

    public function fetch(Request $request, Response $response, $args)
    {
        $bairros = $this->bairroRepository->get();
        return $response->withJSON($bairros);
    }

    public function fetchOne(Request $request, Response $response, $args)
    {
        $bairro = $this->bairroRepository->get($args['id']);
        if ($bairro) {
            return $response->withJSON($bairro);
        }
        return $response->withJSON(['Bairro não encontrado.'])->withStatus(404);
    }
}
