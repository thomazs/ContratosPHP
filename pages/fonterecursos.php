<?php
include_once '../inc/inc.php';
$user = loginRequired();
$_title = ' :: Pesquisa de Fontes de Recurso';
include_once 'top.php';

$f = new FonteRecurso();
$lista = $f->filter_by_request($_GET);
$formbase = 'fonterecursos-form.php';
?>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Painel de Fontes de Recurso</h1>
        </div>

        <!-- /.col-lg-12 -->
    </div>

    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Lista de Fontes de Recurso
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
                            <th>Descrição</th>
                            <th>Código</th>
                            <?php if ($user->getNivel() == 9){ ?>
                            <th>Opções</th>
                            <?php } ?>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $k = true;
                        foreach ($lista as $finan){
                            $style = ($k ? 'odd gradeX' : 'even gradeC');
                            ?>
                            <tr class="<?=$style;?>">
                                <td><?=$finan->getDescricao();?></td>
                                <td><?=$finan->getCodigo();?></td>
                                <?php if ($user->getNivel() == 9){ ?>
                                <td>
                                    <a href="<?=$formbase;?>?id=<?=$finan->getId();?>" class="btn btn-sm btn-success"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
                                    <form action="<?=$formbase;?>?id=<?=$finan->getId();?>&_sysop=del"  style="display:inline;" method="POST"><button  type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Confirma a exclusão?');"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button></form>
                                </td>
                                <?php } ?>
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
