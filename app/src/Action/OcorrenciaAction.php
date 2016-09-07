<?php


namespace App\Action;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

final class OcorrenciaAction
{
    protected $ocorrenciaRepository;

    public function __construct(\App\Repository\Ocorrencia $ocorrenciaRepository)
    {
        $this->ocorrenciaRepository = $ocorrenciaRepository;
    }

    public function create(Request $request, Response $response, $args)
    {
        $data = $request->getParsedBody();
        $isCreated = $this->ocorrenciaRepository->create($data);

        if ($isCreated) {
            return $response;
        } else {
            return $response->withJSON(['Não foi possivel criar a ocorrência.'])->withStatus(404);
        }
    }
}