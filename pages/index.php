<?php
    include_once '../inc/inc.php';
    $user = loginRequired();
    include_once 'top.php';
    $c = new Contrato();
?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Painel Inicial</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-tasks fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?=$c->totalContratos();?></div>
                                    <div>Total de Contratos</div>
                                </div>
                            </div>
                        </div>
                        <a href="contratos.php">
                            <div class="panel-footer">
                                <span class="pull-left">Ver Contratos</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-tasks fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?=$c->totalDentroDoPrazo();?></div>
                                    <div>Dentro do prazo</div>
                                </div>
                            </div>
                        </div>
                        <a href="contratos.php?__customFilter=noPrazo">
                            <div class="panel-footer">
                                <span class="pull-left">Ver Contratos</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-tasks fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?=$c->totalProximoVencimento();?></div>
                                    <div>Próximo do vencimento (até 5 dias)</div>
                                </div>
                            </div>
                        </div>
                        <a href="contratos.php?__customFilter=pertoPrazo">
                            <div class="panel-footer">
                                <span class="pull-left">Ver Contratos</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-tasks fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?=$c->totalVencidos();?></div>
                                    <div>Contratos vencidos</div>
                                </div>
                            </div>
                        </div>
                        <a href="contratos.php?__customFilter=vencidos">
                            <div class="panel-footer">
                                <span class="pull-left">Ver Contratos</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <!-- /.row -->
            <div class="row"  style="visibility: hidden;display: none">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-bar-chart-o fa-fw"></i> Monitor de Contratos
                            <div class="pull-right">
                                
                            </div>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div id="morris-area-chart"></div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                                      
                
                    
                </div>
                <!-- /.col-lg-4 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

<?php
    include_once 'bottom.php';
?>