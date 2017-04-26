<?php
include_once '../inc/inc.php';
$user = loginRequired();
$_title = ' :: '.(isset($_GET['id']) ? 'Alteração' : 'Cadastro').' de Financiadores';
$voltar = 'financiadores.php';

if ($user->getNivel() < 9){
    header('Location: '.$voltar);
    die('');
}

$f = new Financiador();
if (isset($_GET['id'])){
    $f->get($_GET['id']);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    if (isset($_REQUEST['_sysop']) && $_REQUEST['_sysop'] == 'del'){
        $f->delete();
    }else {
        $f->setNome($_POST['nome']);
        $f->setCnpj($_POST['cnpj']);
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
                            <label class="control-label">Nome do Financiador</label>
                            <input type="text" class="form-control" name="nome" value="<?=$f->getNome();?>" required>
                        </div>
                    </div>
                    <div class="col-md-3 col-md-offset-1">
                        <div class="form-group label-floating">
                            <label class="control-label">CNPJ</label>
                            <input type="text" class="form-control" name="cnpj" value="<?=$f->getCnpj();?>" required>
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
