<?php

include_once '../inc/inc.php';
include_once "Dbo.php";

class Financiador extends Dbo
{

    protected $nome, $cnpj;

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

    /**
     * @return mixed
     */
    public function getCnpj()
    {
        return $this->cnpj;
    }

    /**
     * @param mixed $cnpj
     */
    public function setCnpj($cnpj)
    {
        $this->cnpj = $cnpj;
    }

    public function applyValues()
    {
        return array(
            'nome'  => $this->getNome(),
            'cnpj'  => $this->getCnpj()
        );
    }


}