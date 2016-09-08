<?php

namespace App\Repository;


use App\AbstractResource;

class Usuario extends AbstractResource
{
    public function create($data)
    {
        $usuario = new \App\Entity\Usuario();
        $id = $data['bairro'];
        $bairro = $this->entityManager->getRepository('App\Entity\Bairro')->find($id);
        $usuario->setBairro($bairro);


        $this->entityManager->persist($usuario);
        $this->entityManager->flush();

        if (count($data['bairros'])) {
            foreach ($data['bairros'] as $id) {
                $usuarioBairros = new \App\Entity\UsuarioBairros();
                $bairro = $this->entityManager->getRepository('App\Entity\Bairro')->find($id);
                $usuarioBairros->setBairro($bairro);
                $usuarioBairros->setUsuario($usuario);

                $this->entityManager->persist($usuarioBairros);
                $this->entityManager->flush();
            }
        }

        return $usuario->getHash();
    }

    public function timeline($id)
    {
        $usuario = $this->entityManager->getRepository('App\Entity\Usuario')->findOneBy(['hash' => $id]);
        /* @var $usuario \App\Entity\Usuario */

        $timeline = [];

        if (count($usuario->getBairro()->getOcorrencias())) {
            foreach ($usuario->getBairro()->getOcorrencias() as $ocorrencia) {
                /* @var $ocorrencia \App\Entity\Ocorrencia */

                $timeline[] = [
                    'data' => $ocorrencia->getDataCriacao(),
                    'tipo_ocorrencia' => \App\Entity\Ocorrencia::getNomeTipoOcorrencia($ocorrencia->getTipoOcorrencia()),
                    'local' => $ocorrencia->getLocal(),
                    'descricao' => $ocorrencia->getDescricao(),
                    'bairro' => $ocorrencia->getBairro()->getNome()
                ];
            }
        }

        if (count($usuario->getBairros())) {
            foreach ($usuario->getBairros() as $bairro) {
                /* @var $bairro \App\Entity\UsuarioBairros */
                if (count($bairro->getBairro()->getOcorrencias())) {
                    foreach ($bairro->getBairro()->getOcorrencias() as $ocorrencia) {
                        /* @var $ocorrencia \App\Entity\Ocorrencia */
                        $timeline[] = [
                            'data' => $ocorrencia->getDataCriacao(),
                            'tipo_ocorrencia' => \App\Entity\Ocorrencia::getNomeTipoOcorrencia($ocorrencia->getTipoOcorrencia()),
                            'local' => $ocorrencia->getLocal(),
                            'descricao' => $ocorrencia->getDescricao(),
                            'bairro' => $ocorrencia->getBairro()->getNome()
                        ];
                    }
                }
            }
        }

        return $timeline;
    }
}