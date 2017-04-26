<?php
include_once '../inc/inc.php';
$user = loginRequired();
$_title = ' :: Pesquisa de Contratos';
include_once 'top.php';

$f = new Contrato();
$lista = $f->filter_by_request($_GET);
$formbase = 'contratos-form.php';

if (isset($_GET['financiador_id']) && $_GET['financiador_id'] != '')
    $f->setFinanciadorId($_GET['financiador_id']);

if (isset($_GET['fonterecurso_id']) && $_GET['fonterecurso_id'] != '')
    $f->setFonterecursoId($_GET['fonterecurso_id']);

if (isset($_GET['situacao']) && $_GET['situacao'] != '')
    $f->setSituacao($_GET['situacao']);
else
    $f->setSituacao(999);

?>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Painel de Contratos</h1>
        </div>

        <!-- /.col-lg-12 -->
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-yellow">
                <div class="panel-heading">
                    Termos de Pesquisa
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">

                    <form method="GET">
                        <div class="row">
                            <div class="col-md-5 col-md-offset-0">
                                <div class="form-group label-floating">
                                    <label class="control-label">Descrição/Nome do Contrato</label>
                                    <input type="text" class="form-control" name="nome__like" value="<?=@$_GET['nome__like'];?>" >
                                </div>
                            </div>
                            <div class="col-md-2 col-md-offset-0">
                                <div class="form-group label-floating">
                                    <label class="control-label">Ano</label>
                                    <input type="number" class="form-control" name="ano" value="<?=$_GET['ano'];?>" >
                                </div>
                            </div>
                            <div class="col-md-3 col-md-offset-0">
                                <div class="form-group label-floating">
                                    <label class="control-label">Número</label>
                                    <input type="number" class="form-control" name="numero__like" value="<?=$_GET['numero__like'];?>" >
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3 col-md-offset-0">
                                <div class="form-group label-floating">
                                    <label class="control-label">Financiador</label>
                                    <?php _select_by_lookup($f, 'financiador'); ?>
                                </div>
                            </div>
                            <div class="col-md-3 col-md-offset-0">
                                <div class="form-group label-floating">
                                    <label class="control-label">Fonte de Recurso</label>
                                    <?php _select_by_lookup($f, 'fonterecurso'); ?>
                                </div>
                            </div>
                            <div class="col-md-2 col-md-offset-0">
                                <div class="form-group label-floating">
                                    <label class="control-label">Situação</label>
                                    <?php _select_by_choice($f, 'situacao'); ?>
                                </div>
                            </div>
                            <div class="col-md-2 col-md-offset-0">
                                <div class="form-group label-floating">
                                    <label class="control-label">Status</label>
                                    <select name="__customFilter"  class="form-control" >
                                        <option value="">--</option>
                                        <option value="noPrazo" <?=(isset($_GET['__customFilter']) && $_GET['__customFilter'] == 'noPrazo' ? 'selected' : '');?> >Dentro do Prazo</option>
                                        <option value="pertoPrazo"  <?=(isset($_GET['__customFilter']) && $_GET['__customFilter'] == 'pertoPrazo' ? 'selected' : '');?>>Próximo ao Vencimento</option>
                                        <option value="vencidos"  <?=(isset($_GET['__customFilter']) && $_GET['__customFilter'] == 'vencidos' ? 'selected' : '');?>>Vencidos</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-1 col-md-offset-9">
                                <button class="btn btn-primary btn-lg btn-block" type="submit">Pesquisar</button>
                            </div>
                            <div class="col-md-2 col-md-offset-0">
                                <a class="btn btn-success btn-lg btn-block" href="<?=$_SERVER['SCRIPT_NAME'];?>">Limpar Filtro</a>
                            </div>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>


    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-yellow">
                <div class="panel-heading">
                    Lista de Contratos
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <?php if ($user->getNivel() == 9){ ?>
                    <div class="col-lg-3 col-lg-offset-9">
                        <a href="<?=$formbase;?>" class="btn btn-primary btn-lg btn-block">Adicionar</a>
                    </div>
                    <?php } ?>
                    <table width="100%" class="table table-striped table-bordered table-hover dataTables" id="dataTables-example">
                        <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Número</th>
                            <th>Financiador</th>
                            <th>Fonte</th>
                            <th>Situação</th>
                            <th>Status</th>
                            <th>Opções</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $k = true;
                        foreach ($lista as $finan){
                            $style = ($k ? 'odd gradeX' : 'even gradeC');
                            ?>
                            <tr class="<?=$style;?>">
                                <td><?=$finan->getNome();?></td>
                                <td><?=$finan->getNumero();?></td>
                                <td><?=$finan->get_financiador__lookup()->getNome();?></td>
                                <td><?=$finan->get_fonterecurso__lookup()->getDescricao();?></td>
                                <td><?=$finan->get__situacao__display();?></td>
                                <td><?=$finan->getStatus();?></td>
                                <td>
                                    <?php if ($user->getNivel() == 9){ ?>
                                    <a href="<?=$formbase;?>?id=<?=$finan->getId();?>" class="btn btn-sm btn-success"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
                                    <form action="<?=$formbase;?>?id=<?=$finan->getId();?>&_sysop=del"  style="display:inline;" method="POST"><button  type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Confirma a exclusão?');"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button></form>
                                    <?php } ?>
                                    <a href="<?=$formbase;?>?id=<?=$finan->getId();?>&RO=1" class="btn btn-sm btn-info" title="Visualizar"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></a>
                                </td>
                            </tr>
                            <?php
                        }
                        ?>
                        </tbody>
                    </table>

                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>



    <!-- /.row -->
</div>
<!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<?php
$_has_data_tables = true;
include_once 'bottom.php';
?>
