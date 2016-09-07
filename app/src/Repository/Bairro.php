<?php

namespace App\Repository;

use App\AbstractResource;

/**
 * Class Resource
 * @package App
 */
class Bairro extends AbstractResource
{
    /**
     * @param int|null id
     *
     * @return array
     */
    public function get($id = null)
    {
        if ($id === null) {
            $bairros = $this->entityManager->getRepository('App\Entity\Bairro')->findAll();
            $bairros = array_map(
                function (\App\Entity\Bairro $bairro) {
                    return ['id' => $bairro->getId(), 'nome' => $bairro->getNome()];
                },
                $bairros
            );

            return $bairros;
        } else {
            $bairro = $this->entityManager->getRepository('App\Entity\Bairro')->findOneBy(array('id' => $id));
            if ($bairro) {
                return $bairro->getArrayCopy();
            }
        }

        return false;
    }
}
