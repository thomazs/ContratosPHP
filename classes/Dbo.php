<?php

include_once '../inc/inc.php';

class ConnectionDB {

    public static $instance;

    private function __construct() {
        //
    }

    public static function getInstance() {
        if (!isset(self::$instance)) {
            self::$instance = new PDO('mysql:host=localhost;dbname=contratos', DB_USR, DB_PWD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
            self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            self::$instance->setAttribute(PDO::ATTR_ORACLE_NULLS, PDO::NULL_EMPTY_STRING);
        }

        return self::$instance;
    }

}

class Dbo
{

    protected $id;
    private $instanceDb;
    private $lastQuery;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Function to validate record before save on database
     * @return bool
     */
    public function validate(){
        return true;
    }


    public function __construct()
    {
        $this->instanceDb = ConnectionDB::getInstance();
        $this->init();
    }

    public function query($sql, $params = null){
        if (isset($params)){
            $this->lastQuery = $this->instanceDb->prepare($sql);
            $this->lastQuery->execute($params);
        }else
            $this->lastQuery = $this->instanceDb->query($sql);
        return $this;
    }

    public function fetchAll(){
        return $this->lastQuery->fetchAll();
    }

    public function applyValues(){
        throw  new Exception("É preciso implementar o método");
    }

    /**
     * Return the relation
     * 'nameRelation' => array( 'field' => CampoTabelaAtual, 'class' => ClasseAlvo)
     * tipoRelacionamento: '1to1' , '1ton'
     * @return array
     *
     * Used in 'magic method' for lookups
     */
    public function relations(){
        return array();
    }

    /**
     * Filtros especializados e customizados
     * array('nomeDoFiltro' => 'sintaxeWhere')
     */
    public function customFilters(){
        return array();
    }

    public function init(){

    }

    /**
     * Valores especiais para combobox
     *  Array('nomeDoCampo' => array("values"=>array( [valores] ), "default" => "valorDefault") )
     */
    public function choices(){
        return array();
    }

    public function getTableName(){
        return ''.get_class($this).'';
    }

    public function _insert_save(){
        if ($this->validate()){
            $values = $this->applyValues();
            $ip1 = '';
            $ip2 = '';
            foreach ($values as $fk => $fv){
                $ip1 .= ($ip1 != '' ? ', ' : '') . $fk;
                $ip2 .= ($ip2 != '' ? ', :' : ':') . $fk;
            }
            $cmd = 'insert into ' . $this->getTableName() . '(' . $ip1 . ') values (' . $ip2 . ')';
            $this->query($cmd, $values);
            $v = $this->query('select last_insert_id()');
            $this->id = $v;
        }
        return false;
    }

    public function _update_save(){
        if ($this->validate() && $this->getId() > 0) {
            $values = $this->applyValues();
            $cmd = '';
            foreach ($values as $fk => $fv){
                $cmd .= ($cmd != '' ? ', ' : '') . $fk . '=:' . $fk;
            }
            $cmd = 'update ' . $this->getTableName() . ' set ' . $cmd . ' where id=:id';
            $values['id'] = $this->getId();
            $this->query($cmd, $values);
            return true;
        }
        return false;
    }

    public function save(){
        if (isset($this->id) && $this->getId() > 0){
            $this->_update_save();
        }else{
            $this->_insert_save();
        }
        return true;
    }

    /**
     * @param $data Array (dict) que indica qual campo irá para qual valor. Normalmente pego do método applyValues
     * @param null $exceptions  - Vetor que traz apenas os nomes dos campos que não terão carga automática de valores.
     */
    public function loadByData($data, $exceptions=null){
        $cvalues = $this->applyValues();
        foreach($data as $fk => $fv){
            if (!isset($exceptions) || !in_array($fk, $exceptions)) {
                $this->$fk = $fv;
            }
        }
    }

    public function get($id){
        $cmd = 'select * from '.$this->getTableName().' where id = :id';
        $this->query($cmd, array('id'=>$id));
        $data = $this->fetchAll();

        if (count($data) == 0)
            throw new Exception("Falha na recuperacao da informacao");

        $data = $data[0];
        $this->loadByData($data);

    }


    /**
     * @param $name
     * @param $arguments
     * Chamada Padrão:  $obj->getRelation_lookup()
     */
    public function __call($name, $arguments)
    {
        $data = explode('__', $name);
        $lookups = $this->relations();
        $obj = null;
        if (count($data) == 2 && $data[1] = 'lookup'){
            $nr = substr($data[0], 4);
            if (key_exists($nr, $lookups)){
                try{
                    $cl = $lookups[$nr]['class'];
                    $fk = $lookups[$nr]['field'];
                    $obj = new $cl;
                    if (!isset($this->$fk) || $this->$fk == null || $this->$fk == '' )
                        return $obj;
                    $obj->get( $this->$fk);
                }catch (Exception $e){

                }
                return $obj;
            }

        }else if (count($data) == 3 && $data[0] == 'list' && $data[2] == 'lookup'){

        }else if (count($data) == 3 && $data[0] == 'get' && $data[2] == 'display'){
            $chs = $this->choices();
            $campo = $data[1];
            if (key_exists($campo, $chs)){
                $prof = $chs[$campo];
                return (key_exists($this->$campo, $prof['values']) ? $prof['values'][$this->$campo] : '');
            }
            return $this->$campo;
        }
        return null;
    }

    public function filter($filtro = '', $values = array(), $order = ''){
        $cmd = 'select id from ' . $this->getTableName();
        if ($filtro != ''){
            $cmd .= ' where '.$filtro;
        }
        if ($order != ''){
            $cmd .= ' order by ' . $order;
        }
        $this->query($cmd, $values);
        $dataBasic = $this->fetchAll();
        $ret = array();
        foreach($dataBasic as $row){
            try{
                $cls = get_class($this);
                $obj = new $cls;
                $obj->get($row['id']);
                $ret[count($ret)] = $obj;
            }catch (Exception $e){

            }
        }
        return $ret;
    }

    protected  function _operators($op){
        $ops = array('gt' => '>', 'gte' => '>=', 'lt' => '<', 'lte' => '<=', 'diff' => '<>');
        return (key_exists($op, $ops) ? $ops[$op] : $op);
    }

    public function filter_by_request($filters){
        $values = $this->applyValues();
        $values['id'] = 0;
        $filtrosCust = $this->customFilters();
        $valores = array();
        $cmd = '';
        $sortCmd = '';
        foreach($filters as $fs => $fv){
            if (empty($fv) || $fv=='' || trim($fv) == '' || (substr($fs,1,2) == '__' && $fs != '__customFilter'))
                continue;
            if ($fs == '__customFilter'){
                $fs = $fv;
                $fv = 1;
            }
            $campos = explode('__', $fs);
            $op = '=';
            if (count($campos) > 1)
                $op = $campos[1];
            if ($campos[0] == '_sortby'){
                $sortCmd .= ($sortCmd != '' ? ',' : '') . $fv;
            } else if (key_exists($campos[0], $values)){
                $campo = $campos[0];
                $cmd .= ($cmd != '' ? ' and ' : '') . '(' . $campo . ' ' . $this->_operators($op) . ' :' . $campo . ')';
                $valores[$campo] = $fv;
            }else if (key_exists($campos[0], $filtrosCust)){
                $campo = $campos[0];
                $sint = $filtrosCust[$campo];
                if ($fv == ''){
                    $cmd .= ($cmd != '' ? ' and ' : '') . '(' . $sint . ')';
                }else {
                    $cmd .= ($cmd != '' ? ' and ' : '') . '(' . $sint . $this->_operators($op) . ':' . $campo . ')';
                    $valores[$campo] = $fv;
                }
            }
        }
        return $this->filter($cmd, $valores, $sortCmd);
    }

    public function delete(){
        if (isset($this->id) && $this->getId() > 0){
            $cmd = 'delete from '.$this->getTableName().' where id=:id';
            $this->query($cmd, array('id' => $this->getId()));
            return true;
        }
        return false;
    }

    public function getFieldValueByName($name){
        return $this->$name;
    }

}