<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="usuario")
 */
class Usuario
{
    /**
     * @ORM\Id
     * @ORM\Column(name="id", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(name="dataCriacao", type="datetime", nullable=false)
     * @var \DateTime
     */
    protected $dataCriacao;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Bairro", fetch="EXTRA_LAZY", cascade={"persist"})
     * @ORM\JoinColumn(name="idBairro", referencedColumnName="id", onDelete="CASCADE", nullable=false)
     *
     * @var \App\Entity\Bairro
     */
    protected $bairro;

    /**
     * @ORM\Column(name="hash", type="string", length=255, nullable=true)
     * @var string
     */
    protected $hash;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\UsuarioBairros", mappedBy="usuario")
     * @var ArrayCollection
     */
    protected $bairros;

    public function __construct()
    {
        $this->dataCriacao = new \DateTime();
        $this->hash = hash('ripemd160', time());
        $this->bairros = new ArrayCollection();
    }

    /**
     * @return ArrayCollection
     */
    public function getBairros()
    {
        return $this->bairros;
    }

    /**
     * @param ArrayCollection $bairros
     */
    public function setBairros($bairros)
    {
        $this->bairros = $bairros;
    }


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
     * @return \DateTime
     */
    public function getDataCriacao()
    {
        return $this->dataCriacao;
    }

    /**
     * @param \DateTime $dataCriacao
     */
    public function setDataCriacao($dataCriacao)
    {
        $this->dataCriacao = $dataCriacao;
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

    /**
     * @return string
     */
    public function getHash()
    {
        return $this->hash;
    }

    /**
     * @param string $hash
     */
    public function setHash($hash)
    {
        $this->hash = $hash;
    }


}