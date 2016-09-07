<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="ocorrenica")
 */
class Ocorrencia
{
    /**
     * @ORM\Id
     * @ORM\Column(name="id", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Bairro", fetch="EXTRA_LAZY", cascade={"persist"})
     * @ORM\JoinColumn(name="idBairro", referencedColumnName="id", onDelete="CASCADE", nullable=false)
     *
     * @var \App\Entity\Bairro
     */
    protected $bairro;

    /**
     * @ORM\Column(name="local", type="string", length=255, nullable=true)
     * @var string
     */
    protected $local;

    /**
     * @ORM\Column(name="descricao", type="string", nullable=true)
     * @var string
     */
    protected $descricao;

    /**
     * @ORM\Column(name="tipoOcorrencia", type="string", columnDefinition="ENUM('assalto', 'acidente', 'homicidio', 'tumulto')")
     * @var string
     */
    protected $tipoOcorrencia;

    /**
     * @ORM\Column(name="dataCriacao", type="datetime", nullable=false)
     * @var \DateTime
     */
    protected $dataCriacao;

    public function __construct()
    {
        $this->dataCriacao = new \DateTime();
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
    public function getLocal()
    {
        return $this->local;
    }

    /**
     * @param string $local
     */
    public function setLocal($local)
    {
        $this->local = $local;
    }

    /**
     * @return string
     */
    public function getDescricao()
    {
        return $this->descricao;
    }

    /**
     * @param string $descricao
     */
    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
    }

    /**
     * @return string
     */
    public function getTipoOcorrencia()
    {
        return $this->tipoOcorrencia;
    }

    /**
     * @param string $tipoOcorrencia
     */
    public function setTipoOcorrencia($tipoOcorrencia)
    {
        $this->tipoOcorrencia = $tipoOcorrencia;
    }

    /**
     * @return \DateTime
     */
    public function getDataCriacao($format = 'd/m/Y H:i:s')
    {
        if($this->dataCriacao instanceof \DateTime){
            return $this->dataCriacao->format($format);
        }

        return $this->dataCriacao;
    }

    /**
     * @param \DateTime $dataCriacao
     */
    public function setDataCriacao($dataCriacao)
    {
        $this->dataCriacao = $dataCriacao;
    }

    public static function getNomeTipoOcorrencia($key)
    {
        $tiposOcorrenica = [
            'assalto' => 'Assalto',
            'acidente' => 'Acidente',
            'homicidio' => 'Homicícidio',
            'tumulto' => 'Tumulto'
        ];

        return $tiposOcorrenica[$key];
    }
}