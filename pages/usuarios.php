<?php
include_once '../inc/inc.php';
$user = loginRequired();
if ($user->getNivel() < 9){
    header('Location: index.php');
    die('');
}

$_title = ' :: Pesquisa de Usuários';
include_once 'top.php';

$f = new Usuario();
$lista = $f->filter_by_request($_GET);
$formbase = 'usuarios-form.php';
?>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Painel de Usuários</h1>
        </div>

        <!-- /.col-lg-12 -->
    </div>

    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Lista de Usuários
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="col-lg-3 col-lg-offset-9">
                        <a href="<?=$formbase;?>" class="btn btn-primary btn-lg btn-block">Adicionar</a>
                    </div>
                    <table width="100%" class="table table-striped table-bordered table-hover dataTables" id="dataTables-example">
                        <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Login</th>
                            <th>Email</th>
                            <th>Nível</th>
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
                                <td><?=$finan->getLogin();?></td>
                                <td><a href="mailto:<?=$finan->getEmail();?>"><?=$finan->getEmail();?></a></td>
                                <td><?=$finan->get__nivel__display();?></td>
                                <td>
                                    <a href="<?=$formbase;?>?id=<?=$finan->getId();?>" class="btn btn-sm btn-success"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
                                    <form action="<?=$formbase;?>?id=<?=$finan->getId();?>&_sysop=del"  style="display:inline;" method="POST"><button  type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Confirma a exclusão?');"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button></form>
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
