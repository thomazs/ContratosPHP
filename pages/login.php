<?php
    include_once '../inc/inc.php';
    //Se estiver logado, força a perda da sessão
    if (isset($_SESSION[SESSION_CTR_VAR])) {
        unset($_SESSION[SESSION_CTR_VAR]);
        session_destroy();
        session_start();
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Gerenciador de Contratos</title>

    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include_once "../classes/Usuario.php";
    $usuario = new Usuario();
    if (!$usuario->authenticate($_POST['usuario'], $_POST['password'])){
        echo "<h4>Usuario / Senha incorreto </h4>";
    }else{
        $usuario->login();
        if (isset($_REQUEST['next']))
            echo '<script>window.location="'. $_REQUEST['next'] .'"; </script>';
        echo '<script>window.location="index.php"; </script>';
    }
}
?>


    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Entrar</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" method="POST">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Usuário" name="usuario" type="text" autofocus required value="<?=@$_POST['usuario'];?>">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Senha" name="password" type="password" value="" required>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input name="lembrarme" type="checkbox" value="lembrarme">Lembrar-me
                                    </label>
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <input type="submit" class="btn btn-lg btn-success btn-block" value="Acessar">
                                <?php if (isset($_REQUEST['next'])) { ?>
                                    <input type="hidden" name="next" value="<?=$_REQUEST['next'];?>" />
                                <?php } ?>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

</body>

</html>
