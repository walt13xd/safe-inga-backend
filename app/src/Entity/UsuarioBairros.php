<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="usuario_bairros")
 */
class UsuarioBairros
{
    /**
     * @ORM\Id
     * @ORM\Column(name="id", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Usuario", fetch="EXTRA_LAZY", cascade={"persist"})
     * @ORM\JoinColumn(name="idUsuario", referencedColumnName="id", onDelete="CASCADE", nullable=false)
     *
     * @var \App\Entity\Usuario
     */
    protected $usuario;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Bairro", fetch="EXTRA_LAZY", cascade={"persist"})
     * @ORM\JoinColumn(name="idBairro", referencedColumnName="id", onDelete="CASCADE", nullable=false)
     *
     * @var \App\Entity\Bairro
     */
    protected $bairro;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return \App\Entity\Usuario
     */
    public function getUsuario()
    {
        return $this->usuario;
    }

    /**
     * @param Usuario $usuario
     */
    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;
    }

    /**
     * @return \App\Entity\Bairro
     */
    public function getBairro()
    {
        return $this->bairro;
    }

    /**
     * @param Bairro $bairro
     */
    public function setBairro($bairro)
    {
        $this->bairro = $bairro;
    }


}