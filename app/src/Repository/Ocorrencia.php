<?php


namespace App\Repository;


use App\AbstractResource;

class Ocorrencia extends AbstractResource
{
    public function create($data){
        $ocorrencia = new \App\Entity\Ocorrencia();
        $id = $data['bairro'];
        $bairro = $this->entityManager->getRepository('App\Entity\Bairro')->find($id);

        $ocorrencia->setBairro($bairro);
        $ocorrencia->setTipoOcorrencia($data['tipo_ocorrencia']);
        if(!empty($data['local'])){
            $ocorrencia->setLocal($data['local']);
        }
        if(!empty($data['descricao'])){
            $ocorrencia->setDescricao($data['descricao']);
        }
        try{
            $this->entityManager->persist($ocorrencia);
            $this->entityManager->flush();
            return true;
        }catch (\Exception $e){
            return false;
        }
    }
}