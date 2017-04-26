<?php

define("DB_DB", "contratos");
define("DB_PWD", "suaSenhaBD");
define("DB_USR", "root");

define("SESSION_CTR_VAR", "ctruser");
define("LOGOUT_URL", "login.php");

session_start();
ini_set("display_errors", 'on');
error_reporting(E_ALL & ~E_WARNING);

include_once '../classes/Usuario.php';
include_once '../classes/Financiador.php';
include_once '../classes/FonteRecurso.php';
include_once '../classes/Contrato.php';

function loginRequired(){
    $uri = $_SERVER['REQUEST_URI'];
    $usr = new Usuario();
    $usr = $usr->getBySession();
    if (!isset($usr)){
        header('Location: /pages/login.php?next='.$uri);
    }
    return $usr;
}

function _select_by_choice($obj, $field, $vazio="--", $extraComp=''){
    $val = ($obj->applyValues());
    $val = $val[$field];
    $chs = $obj->choices();
    echo '<select class="form-control" name="'.$field.'" id="id_'.$field.'"  '.$extraComp.'  >';
    echo '  <option value="">'.$vazio.'</option>';
    if (key_exists($field, $chs)){
        $sd = $chs[$field]['default'];
        if (isset($val) && $val != '')
            $sd = $val;
        foreach($chs[$field]['values'] as $sv => $so){
            echo '  <option value="'.$sv.'" '.($sv==$sd ? 'selected' : '').'>'.$so.'</option>';
        }
    }
    echo '</select>';
}


function _select_by_lookup($obj, $nlookup, $filter='', $filter_params=array(), $sort='', $extraComp=''){

    $lookup = $obj->relations();
    $lookup = $lookup[$nlookup];
    $field = $lookup['field'];
    $dclass = $lookup['class'];
    $rval = $lookup['show'];
    $sd = $obj->applyValues();
    $sd = $sd[$field];

    $dinst = new $dclass();
    $choices = $dinst->filter($filter, $filter_params, $sort);

    echo '<select class="form-control" name="'.$field.'" id="id_'.$field.'"  '.$extraComp.' >';
    echo '  <option value="">--</option>';
    foreach($choices as $od){
        $sv = $od->getId();
        $so = call_user_func_array(array($od, $rval), array());
        //$od->getFieldValueByName($rval);
        echo '  <option value="'.$sv.'" '.($sv==$sd ? 'selected' : '').'>'.$so.'</option>';
    }
    echo '</select>';
}


function _td($d){
    if ($d == '') return '';
    $v = explode('/' , $d);
    return ($v[2] . '-' . $v[1] . '-' . $v[0]);
}