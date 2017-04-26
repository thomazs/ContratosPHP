<?php
include_once '../inc/inc.php';
$user = loginRequired();
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Gerenciador de Contratos<?=(isset($_title) ? $_title : '');?></title>

    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="../vendor/morrisjs/morris.css" rel="stylesheet">

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


<div id="wrapper">

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">Gerenciador de Contratos<?=(isset($_title) ? $_title : '');?></a>
        </div>
        <!-- /.navbar-header -->

        <ul class="nav navbar-top-links navbar-right">

            <!-- /.dropdown -->
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-user fa-fw"></i> <?=$user->getNome(); ?> <i class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-user">
                    <li><a href="usuarios-form.php?id=<?=$user->getId();?>&bk=root"><i class="fa fa-user fa-fw"></i>Perfil de Usuário</a>
                    </li><li class="divider"></li>
                    <li><a href="<?=LOGOUT_URL;?>"><i class="fa fa-sign-out fa-fw"></i>Sair</a>
                    </li>
                </ul>
                <!-- /.dropdown-user -->
            </li>
            <!-- /.dropdown -->
        </ul>
        <!-- /.navbar-top-links -->

        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">
                <ul class="nav" id="side-menu">
                    <li class="sidebar-search">
                        <form action="contratos.php">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Pesquisar  (Nome Contrato)..." name="nome__like">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="button">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                        </form>
                        <!-- /input-group -->
                    </li>
                    <li>
                        <a href="index.php"><i class="fa fa-dashboard fa-fw"></i>Página Inicial</a>
                    </li>

                    <li>
                        <a href="financiadores.php"><i class="fa fa-table fa-fw"></i>Financiadores</a>
                    </li>

                    <li>
                        <a href="fonterecursos.php"><i class="fa fa-table fa-fw"></i>Fontes de Recurso</a>
                    </li>

                    <li>
                        <a href="contratos.php"><i class="fa fa-table fa-fw"></i>Contratos</a>
                    </li>

                    <?php if ($user->getNivel() == 9){ ?>
                    <li>
                        <a href="usuarios.php"><i class="fa fa-table fa-fw"></i>Usuários</a>
                    </li>
                    <?php } ?>


                </ul>
            </div>
            <!-- /.sidebar-collapse -->
        </div>
        <!-- /.navbar-static-side -->
    </nav>
