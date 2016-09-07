<?php
namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="bairro")
 */
class Bairro
{
    /**
     * @ORM\Id
     * @ORM\Column(name="id", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(name="nome", type="string", length=64)
     */
    protected $nome;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Ocorrencia", mappedBy="bairro")
     * @var ArrayCollection
     */
    protected $ocorrencias;

    public function __construct()
    {
        $this->ocorrencias = new ArrayCollection();
    }

    /**
     * @return ArrayCollection
     */
    public function getOcorrencias()
    {
        return $this->ocorrencias;
    }

    /**
     * @param ArrayCollection $ocorrencias
     */
    public function setOcorrencias($ocorrencias)
    {
        $this->ocorrencias = $ocorrencias;
    }

    /**
     * Get array copy of object
     *
     * @return array
     */
    public function getArrayCopy()
    {
        return get_object_vars($this);
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
     * @return mixed
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @param mixed $nome
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
    }


}
