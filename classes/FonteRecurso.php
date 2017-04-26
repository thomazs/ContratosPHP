<?php

include_once '../inc/inc.php';
include_once "Dbo.php";

class FonteRecurso extends Dbo
{
    protected $codigo, $descricao;

    /**
     * @return mixed
     */
    public function getCodigo()
    {
        return $this->codigo;
    }

    /**
     * @param mixed $codigo
     */
    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;
    }

    /**
     * @return mixed
     */
    public function getDescricao()
    {
        return $this->descricao;
    }

    /**
     * @param mixed $descricao
     */
    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
    }


    public function applyValues()
    {
        return array(
            'codigo'  => $this->getCodigo(),
            'descricao'  => $this->getDescricao()
        );
    }

}