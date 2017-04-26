<?php


include_once '../inc/inc.php';
include_once "Dbo.php";

class Contrato extends Dbo
{
    protected $ano, $nome, $numero, $financiador_id, $fonterecurso_id, $vl_inicial, $situacao;
    protected $dt_ordemservico, $periodo_vigencia, $periodo_execucao, $dt_vigencia_ini, $dt_execucao_ini,
        $dt_vigencia, $dt_execucao, $vl_contrato;

    /**
     * @return mixed
     */
    public function getAno()
    {
        return $this->ano;
    }

    /**
     * @param mixed $ano
     */
    public function setAno($ano)
    {
        $this->ano = $ano;
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

    /**
     * @return mixed
     */
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * @param mixed $numero
     */
    public function setNumero($numero)
    {
        $this->numero = $numero;
    }

    /**
     * @return mixed
     */
    public function getFinanciadorId()
    {
        return $this->financiador_id;
    }

    /**
     * @param mixed $financiador_id
     */
    public function setFinanciadorId($financiador_id)
    {
        $this->financiador_id = $financiador_id;
    }

    /**
     * @return mixed
     */
    public function getFonterecursoId()
    {
        return $this->fonterecurso_id;
    }

    /**
     * @param mixed $fonterecurso_id
     */
    public function setFonterecursoId($fonterecurso_id)
    {
        $this->fonterecurso_id = $fonterecurso_id;
    }

    /**
     * @return mixed
     */
    public function getVlInicial()
    {
        return $this->vl_inicial;
    }

    /**
     * @param mixed $vl_inicial
     */
    public function setVlInicial($vl_inicial)
    {
        $this->vl_inicial = $vl_inicial;
    }

    /**
     * @return mixed
     */
    public function getSituacao()
    {
        return $this->situacao;
    }

    /**
     * @param mixed $situacao
     */
    public function setSituacao($situacao)
    {
        $this->situacao = $situacao;
    }

    /**
     * @return mixed
     */
    public function getDtOrdemservico()
    {
        return $this->dt_ordemservico;
    }

    /**
     * @param mixed $dt_ordemservico
     */
    public function setDtOrdemservico($dt_ordemservico)
    {
        $this->dt_ordemservico = $dt_ordemservico;
    }

    /**
     * @return mixed
     */
    public function getPeriodoVigencia()
    {
        return $this->periodo_vigencia;
    }

    /**
     * @param mixed $periodo_vigencia
     */
    public function setPeriodoVigencia($periodo_vigencia)
    {
        $this->periodo_vigencia = $periodo_vigencia;
    }

    /**
     * @return mixed
     */
    public function getPeriodoExecucao()
    {
        return $this->periodo_execucao;
    }

    /**
     * @param mixed $periodo_execucao
     */
    public function setPeriodoExecucao($periodo_execucao)
    {
        $this->periodo_execucao = $periodo_execucao;
    }

    /**
     * @return mixed
     */
    public function getDtVigenciaIni()
    {
        return $this->dt_vigencia_ini;
    }

    /**
     * @param mixed $dt_vigencia_ini
     */
    public function setDtVigenciaIni($dt_vigencia_ini)
    {
        $this->dt_vigencia_ini = $dt_vigencia_ini;
    }

    /**
     * @return mixed
     */
    public function getDtExecucaoIni()
    {
        return $this->dt_execucao_ini;
    }

    /**
     * @param mixed $dt_execucao_ini
     */
    public function setDtExecucaoIni($dt_execucao_ini)
    {
        $this->dt_execucao_ini = $dt_execucao_ini;
    }

    /**
     * @return mixed
     */
    public function getDtVigencia()
    {
        return $this->dt_vigencia;
    }

    /**
     * @param mixed $dt_vigencia
     */
    public function setDtVigencia($dt_vigencia)
    {
        $this->dt_vigencia = $dt_vigencia;
    }

    /**
     * @return mixed
     */
    public function getDtExecucao()
    {
        return $this->dt_execucao;
    }

    /**
     * @param mixed $dt_execucao
     */
    public function setDtExecucao($dt_execucao)
    {
        $this->dt_execucao = $dt_execucao;
    }

    /**
     * @return mixed
     */
    public function getVlContrato()
    {
        return $this->vl_contrato;
    }

    /**
     * @param mixed $vl_contrato
     */
    public function setVlContrato($vl_contrato)
    {
        $this->vl_contrato = $vl_contrato;
    }


    public function applyValues()
    {
        return array(
            'ano' => $this->getAno(),
            'nome' => $this->getNome(),
            'numero'  => $this->getNumero() ,
            'financiador_id' => $this->getFinanciadorId(),
            'fonterecurso_id' => $this->getFonterecursoId(),
            'vl_inicial' => $this->getVlInicial(),
            'situacao' => $this->getSituacao(),
            'dt_ordemservico' => $this->getDtOrdemservico(),
            'periodo_vigencia' => $this->getPeriodoVigencia(),
            'periodo_execucao' => $this->getPeriodoExecucao(),
            'dt_vigencia_ini' => $this->getDtVigenciaIni(),
            'dt_execucao_ini' => $this->getDtExecucaoIni(),
            'dt_vigencia' => $this->getDtVigencia(),
            'dt_execucao' => $this->getDtExecucao(),
            'vl_contrato' => $this->getVlContrato()
        );
    }

    public function choices(){
        return array('situacao' => array(
            'values' => array(
                '0' => 'Ativo',
                '3' => 'Suspenso',
                '5' => 'Cancelado',
                '9' => 'Concluído'
            ), 'default' => '0')
        );
    }

    public function init()
    {
        $this->setSituacao('0');
        $this->setAno(date('Y'));
    }

    public function relations(){
        $f1 = new Financiador();
        $f2 = new FonteRecurso();
        return array(
            'financiador' => array('field' => 'financiador_id', 'class' => get_class($f1), 'show' => 'getNome'),
            'fonterecurso' => array('field' => 'fonterecurso_id', 'class' => get_class($f2), 'show' => 'getDescricao')
        );
    }

    public function totalContratos(){
        $this->query('select count(*) from '.$this->getTableName());
        $f = $this->fetchAll();
        return $f[0][0];
    }

    public function totalDentroDoPrazo(){
        $cf = $this->customFilters();
        $this->query('select count(*) from '.$this->getTableName().' where '.$cf['noPrazo']);
        $f = $this->fetchAll();
        return $f[0][0];
    }

    public function totalProximoVencimento(){
        $cf = $this->customFilters();
        $this->query('select count(*) from '.$this->getTableName().' where '.$cf['pertoPrazo']);
        $f = $this->fetchAll();
        return $f[0][0];
    }

    public function totalVencidos(){
        $cf = $this->customFilters();
        $this->query('select count(*) from '.$this->getTableName().' where '.$cf['vencidos']);
        $f = $this->fetchAll();
        return $f[0][0];
    }

    public function getStatus(){
        $diferenca = strtotime(($this->getDtVigenciaIni())) - strtotime(date('Y-m-d'));
        $dias = floor($diferenca / (60 * 60 * 24));
        if ($dias >  5) return 'No Prazo';
        if ($dias >= 0) return 'Perto do Prazo';
        return 'Em atraso';
    }

    public function customFilters(){
        return array(
            'noPrazo'    => ' dt_vigencia_ini > curdate() ',
            'pertoPrazo' => ' dt_vigencia_ini >= curdate() and dt_vigencia_ini+5 > curdate() ',
            'vencidos' => ' dt_vigencia_ini < curdate() ',
        );
    }

}