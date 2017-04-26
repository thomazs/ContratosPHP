<?php
include_once '../inc/inc.php';
$user = loginRequired();
$_title = ' :: '.(isset($_GET['id']) ? 'Alteração' : 'Cadastro').' de Contratos';
$voltar = 'contratos.php';
$_sh = '';
$readwrite = true;

if (isset($_GET['RO'])){
    $_sh = ' disabled="disabled" readonly="readonly" ';
    $readwrite = false;
}

$f = new Contrato();
if (isset($_GET['id'])){
    $f->get($_GET['id']);
    if ($user->getNivel() < 9){
        $_title = ' :: Visualizando Contrato';
        $_sh = ' disabled="disabled" readonly="readonly" ';
        $readwrite = false;
    }
}else if ($user->getNivel() < 9){
    header('Location: '.$voltar);
    die('');
}

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    if ($user->getNivel() < 9){
        header('Location: '.$voltar);
        die('');
    }
    if (isset($_REQUEST['_sysop']) && $_REQUEST['_sysop'] == 'del'){
        $f->delete();
    }else {
        $f->setNome($_POST['nome']);
        $f->setAno($_POST['ano']);
        $f->setNumero($_POST['numero']);
        $f->setFinanciadorId($_POST['financiador_id']);
        $f->setFonterecursoId($_POST['fonterecurso_id']);
        $f->setVlInicial($_POST['vl_inicial']);
        $f->setSituacao($_POST['situacao']);
        $f->setDtOrdemservico($_POST['dt_ordemservico']);
        $f->setPeriodoVigencia($_POST['periodo_vigencia']);
        $f->setPeriodoExecucao($_POST['periodo_execucao']);
        $f->setDtVigenciaIni(_td(date('d/m/Y', strtotime($f->getDtOrdemservico(). ' + '.$f->getPeriodoVigencia().' months'))));
        $f->setDtExecucaoIni(_td(date('d/m/Y', strtotime($f->getDtOrdemservico(). ' + '.$f->getPeriodoExecucao().' months'))));
/*        $f->setDtVigencia($_POST['dt_vigencia']);
        $f->setDtExecucao($_POST['dt_execucao']);
        $f->setVlContrato($_POST['vl_contrato']);*/
        $f->save();
    }
    header('Location: '.$voltar);
}

include_once 'top.php';

?>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"><?=substr($_title, 4); ?></h1>
        </div>

        <!-- /.col-lg-12 -->
    </div>
    <!-- /#page-wrapper -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Formulário
                </div>
                <form method="POST">
                    <div class="row">
                        <div class="col-md-5 col-md-offset-1">
                            <div class="form-group label-floating">
                                <label class="control-label">Descrição/Nome do Contrato</label>
                                <input type="text" class="form-control" name="nome" value="<?=$f->getNome();?>" required <?=$_sh;?> >
                            </div>
                        </div>
                        <div class="col-md-2 col-md-offset-0">
                            <div class="form-group label-floating">
                                <label class="control-label">Ano</label>
                                <input type="number" class="form-control" name="ano" value="<?=$f->getAno();?>" required <?=$_sh;?>>
                            </div>
                        </div>
                        <div class="col-md-3 col-md-offset-0">
                            <div class="form-group label-floating">
                                <label class="control-label">Número</label>
                                <input type="number" class="form-control" name="numero" value="<?=$f->getNumero();?>" required <?=$_sh;?>>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-5 col-md-offset-1">
                            <div class="form-group label-floating">
                                <label class="control-label">Financiador</label>
                                <?php _select_by_lookup($f, 'financiador', '', array(), '',$_sh); ?>
                            </div>
                        </div>
                        <div class="col-md-5 col-md-offset-0">
                            <div class="form-group label-floating">
                                <label class="control-label">Fonte de Recurso</label>
                                <?php _select_by_lookup($f, 'fonterecurso', '', array(), '',$_sh); ?>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3 col-md-offset-1">
                            <div class="form-group label-floating">
                                <label class="control-label">Valor Inicial</label>
                                <input type="number" class="form-control" name="vl_inicial" value="<?=$f->getVlInicial();?>" required <?=$_sh;?>>
                            </div>
                        </div>
                        <div class="col-md-3 col-md-offset-0">
                            <div class="form-group label-floating">
                                <label class="control-label">Situação</label>
                                <?php _select_by_choice($f, 'situacao', '', $_sh); ?>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3 col-md-offset-1">
                            <div class="form-group label-floating">
                                <label class="control-label">Dt.Ordem de Serviço</label>
                                <input type="date" class="form-control" name="dt_ordemservico" value="<?=$f->getDtOrdemservico();?>"  <?=$_sh;?>>
                            </div>
                        </div>
                        <div class="col-md-3 col-md-offset-0">
                            <div class="form-group label-floating">
                                <label class="control-label">Período da Vigência (meses)</label>
                                <input type="number" class="form-control" name="periodo_vigencia" value="<?=$f->getPeriodoVigencia();?>" required  <?=$_sh;?>>
                            </div>
                        </div>
                        <div class="col-md-3 col-md-offset-0">
                            <div class="form-group label-floating">
                                <label class="control-label">Período da Exec.(meses)</label>
                                <input type="number" class="form-control" name="periodo_execucao" value="<?=$f->getPeriodoExecucao();?>" required  <?=$_sh;?>>
                            </div>
                        </div>
                    </div>

                    <?php if (isset($_GET['id'])){ ?>
                    <div class=" col-md-offset-1 col-md-10">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Acompanhamento
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-3 col-md-offset-1">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Dt.Vigência (inicial)</label>
                                        <input type="date" class="form-control" name="dt_vigencia_ini" value="<?=$f->getDtVigenciaIni();?>" disabled="disabled" readonly="readonly">
                                    </div>
                                </div>
                                <div class="col-md-3 col-md-offset-1">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Dt.Execução (inicial)</label>
                                        <input type="date" class="form-control" name="dt_execucao_ini" value="<?=$f->getDtExecucaoIni();?>" disabled="disabled" readonly="readonly">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                    <?php } ?>

                    <div class="row">
                        <div class="col-md-10 col-lg-offset-1 btn-group btn-group-lg">
                            <?php if ($user->getNivel() == 9 && $readwrite){ ?>
                            <button type="submit" class="btn btn-success" >Salvar</button>
                            <?php } ?>
                            <a href="<?=$voltar;?>" type="submit" class="btn btn-warning" >Voltar</a>
                        </div>
                    </div>
                    <br>
                </form>

                <!-- /.panel-body -->
            </div>

            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>



    <!-- /.row -->
</div>
<!-- /#page-wrapper -->

<?php
include_once 'bottom.php';
?>
