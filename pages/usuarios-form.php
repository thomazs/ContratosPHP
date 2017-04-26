<?php
include_once '../inc/inc.php';
$user = loginRequired();
$_title = ' :: '.(isset($_GET['id']) ? 'Alteração' : 'Cadastro').' de Usuários';
$voltar = 'usuarios.php';

if (isset($_GET['bk']) || $user->getNivel() < 9)
    $voltar = 'index.php';

$f = new Usuario();
if (isset($_GET['id'])){
    if ($user->getNivel() < 9 && $_GET['id'] != $user->getId()){
        header('Location: '.$voltar);
        die('');
    }
    $f->get($_GET['id']);
}else if ($user->getNivel() < 9){
    header('Location: '.$voltar);
    die('');
}

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    if (isset($_REQUEST['_sysop']) && $_REQUEST['_sysop'] == 'del'){
        if ($user->getNivel() < 9){
            header('Location: '.$voltar);
            die('');
        }
        $f->delete();
    }else {
        $f->setLogin($_POST['login']);
        if ($f->getSenha() !== $_POST['senha']){
            $f->setSenha($_POST['senha']);
        }
        $f->setNome($_POST['nome']);
        $f->setEmail($_POST['email']);
        if ($user->getNivel() < 9) {
        }else{
            $f->setNivel($_POST['nivel']);
        }
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
                                <label class="control-label">Nome do Usuário</label>
                                <input type="text" class="form-control" name="nome" value="<?=$f->getNome();?>" required>
                            </div>
                        </div>
                        <?php if ($user->getNivel() == 9){ ?>
                        <div class="col-md-3 col-md-offset-1">
                            <div class="form-group label-floating">
                                <label class="control-label">Nível</label>
                                <?php _select_by_choice($f, 'nivel'); ?>
                            </div>
                        </div>
                        <?php } ?>
                    </div>

                    <div class="row">
                        <div class="col-md-5 col-md-offset-1">
                            <div class="form-group label-floating">
                                <label class="control-label">Login</label>
                                <input type="text" class="form-control" name="login" value="<?=$f->getLogin();?>" required>
                            </div>
                        </div>
                        <div class="col-md-4 col-md-offset-1">
                            <div class="form-group label-floating">
                                <label class="control-label">Senha</label>
                                <input type="password" class="form-control" name="senha" value="<?=$f->getSenha();?>" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-9 col-md-offset-1">
                            <div class="form-group label-floating">
                                <label class="control-label">Email</label>
                                <input type="email" class="form-control" name="email" value="<?=$f->getEmail();?>" required>
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
