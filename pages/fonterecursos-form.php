<?php
include_once '../inc/inc.php';
$user = loginRequired();
$_title = ' :: '.(isset($_GET['id']) ? 'Alteração' : 'Cadastro').' de Fonte de Recurso';
$voltar = 'fonterecursos.php';

if ($user->getNivel() < 9){
    header('Location: '.$voltar);
    die('');
}

$f = new FonteRecurso();
if (isset($_REQUEST['id'])){
    $f->get($_REQUEST['id']);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    if (isset($_REQUEST['_sysop']) && $_REQUEST['_sysop'] == 'del'){
        $f->delete();
    }else {
        $f->setCodigo($_POST['codigo']);
        $f->setDescricao($_POST['descricao']);
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
                        <div class="col-md-6 col-md-offset-1">
                            <div class="form-group label-floating">
                                <label class="control-label">Descrição</label>
                                <input type="text" class="form-control" name="descricao" value="<?=$f->getDescricao();?>" required>
                            </div>
                        </div>
                        <div class="col-md-3 col-md-offset-1">
                            <div class="form-group label-floating">
                                <label class="control-label">Código</label>
                                <input type="text" class="form-control" name="codigo" value="<?=$f->getCodigo();?>" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-10 col-lg-offset-1 btn-group btn-group-lg">
                            <button type="submit" class="btn btn-success" >Salvar</button>
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
