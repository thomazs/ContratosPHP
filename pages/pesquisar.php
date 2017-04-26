<?php
include_once '../inc/inc.php';
$user = loginRequired();
$_title = ' :: Pesquisa de Contratos';
include_once 'top.php';
?>

<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Painel de Contratos</h1>                    
                </div>
                
                <!-- /.col-lg-12 -->
            </div>
            
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Pesquisar Contratos
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover dataTables" id="dataTables-example">
                                <thead>
                                    <tr>
                                    	<th>Status</th>
                                        <th>Nome</th>
                                        <th>Número</th>
                                        <th>Fonte de Recurso</th>
                                        <th>Valor Inicial</th>
                                        <th>Período de vigência</th>                                        
                                        <th>Período de execução</th>
                                        <th>Data Ordem de Serviço</th>
                                        <th>Data final de Vigência</th>
                                        <th>Data final de Execução</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="odd gradeX">
                                        <td>Vencido</td>
                                        <td>Contrato 1</td>
                                        <td>0001</td>
                                        <td class="center">Fonte 1</td>
                                        <td class="center">10000</td>
                                        <td>2 anos</td>
                                        <td>1 ano</td>
                                        <td>02/02/2017</td>
                                        <td class="center">02/02/2019</td>
                                        <td class="center">02/02/2018</td>
                                    </tr>
                                    <tr class="even gradeC">
                                        <td>No Prazo</td>
                                        <td>Contrato 1</td>
                                        <td>0001</td>
                                        <td class="center">Fonte 1</td>
                                        <td class="center">10000</td>
                                        <td>2 anos</td>
                                        <td>1 ano</td>
                                        <td>02/02/2017</td>
                                        <td class="center">02/02/2019</td>
                                        <td class="center">02/02/2018</td>
                                    </tr>
                                    <tr class="odd gradeA">
                                        <td>Vencido</td>
                                        <td>Contrato 1</td>
                                        <td>0001</td>
                                        <td class="center">Fonte 1</td>
                                        <td class="center">10000</td>
                                        <td>2 anos</td>
                                        <td>1 ano</td>
                                        <td>02/02/2017</td>
                                        <td class="center">02/02/2019</td>
                                        <td class="center">02/02/2018</td>
                                    </tr>
                                    <tr class="even gradeA">
                                        <td>No Prazo</td>
                                        <td>Contrato 1</td>
                                        <td>0001</td>
                                        <td class="center">Fonte 1</td>
                                        <td class="center">10000</td>
                                        <td>2 anos</td>
                                        <td>1 ano</td>
                                        <td>02/02/2017</td>
                                        <td class="center">02/02/2019</td>
                                        <td class="center">02/02/2018</td>
                                    </tr>
                                    <tr class="odd gradeA">
                                        <td>Vencido</td>
                                        <td>Contrato 1</td>
                                        <td>0001</td>
                                        <td class="center">Fonte 1</td>
                                        <td class="center">10000</td>
                                        <td>2 anos</td>
                                        <td>1 ano</td>
                                        <td>02/02/2017</td>
                                        <td class="center">02/02/2019</td>
                                        <td class="center">02/02/2018</td>
                                    </tr>
                                    <tr class="even gradeA">
                                        <td>No Prazo</td>
                                        <td>Contrato 1</td>
                                        <td>0001</td>
                                        <td class="center">Fonte 1</td>
                                        <td class="center">10000</td>
                                        <td>2 anos</td>
                                        <td>1 ano</td>
                                        <td>02/02/2017</td>
                                        <td class="center">02/02/2019</td>
                                        <td class="center">02/02/2018</td>
                                    </tr>
                                    <tr class="gradeA">
                                        <td>Vencido</td>
                                        <td>Contrato 1</td>
                                        <td>0001</td>
                                        <td class="center">Fonte 1</td>
                                        <td class="center">10000</td>
                                        <td>2 anos</td>
                                        <td>1 ano</td>
                                        <td>02/02/2017</td>
                                        <td class="center">02/02/2019</td>
                                        <td class="center">02/02/2018</td>
                                    </tr>
                                    <tr class="gradeA">
                                        <td>No Prazo</td>
                                        <td>Contrato 1</td>
                                        <td>0001</td>
                                        <td class="center">Fonte 1</td>
                                        <td class="center">10000</td>
                                        <td>2 anos</td>
                                        <td>1 ano</td>
                                        <td>02/02/2017</td>
                                        <td class="center">02/02/2019</td>
                                        <td class="center">02/02/2018</td>
                                    </tr>
                                    <tr class="gradeA">
                                        <td>No Prazo</td>
                                        <td>Contrato 1</td>
                                        <td>0001</td>
                                        <td class="center">Fonte 1</td>
                                        <td class="center">10000</td>
                                        <td>2 anos</td>
                                        <td>1 ano</td>
                                        <td>02/02/2017</td>
                                        <td class="center">02/02/2019</td>
                                        <td class="center">02/02/2018</td>
                                    </tr>
                                    <tr class="gradeA">
                                        <td>Vencido</td>
                                        <td>Contrato 1</td>
                                        <td>0001</td>
                                        <td class="center">Fonte 1</td>
                                        <td class="center">10000</td>
                                        <td>2 anos</td>
                                        <td>1 ano</td>
                                        <td>02/02/2017</td>
                                        <td class="center">02/02/2019</td>
                                        <td class="center">02/02/2018</td>
                                    </tr>
                                    <tr class="gradeA">
                                        <td>No Prazo</td>
                                        <td>Contrato 1</td>
                                        <td>0001</td>
                                        <td class="center">Fonte 1</td>
                                        <td class="center">10000</td>
                                        <td>2 anos</td>
                                        <td>1 ano</td>
                                        <td>02/02/2017</td>
                                        <td class="center">02/02/2019</td>
                                        <td class="center">02/02/2018</td>
                                    </tr>
                                    <tr class="gradeA">
                                        <td>Vencido</td>
                                        <td>Contrato 1</td>
                                        <td>0001</td>
                                        <td class="center">Fonte 1</td>
                                        <td class="center">10000</td>
                                        <td>2 anos</td>
                                        <td>1 ano</td>
                                        <td>02/02/2017</td>
                                        <td class="center">02/02/2019</td>
                                        <td class="center">02/02/2018</td>
                                    </tr>
                                    <tr class="gradeA">
                                        <td>No Prazo</td>
                                        <td>Contrato 1</td>
                                        <td>0001</td>
                                        <td class="center">Fonte 1</td>
                                        <td class="center">10000</td>
                                        <td>2 anos</td>
                                        <td>1 ano</td>
                                        <td>02/02/2017</td>
                                        <td class="center">02/02/2019</td>
                                        <td class="center">02/02/2018</td>
                                    </tr>
                                    <tr class="gradeA">
                                        <td>Vencido</td>
                                        <td>Contrato 1</td>
                                        <td>0001</td>
                                        <td class="center">Fonte 1</td>
                                        <td class="center">10000</td>
                                        <td>2 anos</td>
                                        <td>1 ano</td>
                                        <td>02/02/2017</td>
                                        <td class="center">02/02/2019</td>
                                        <td class="center">02/02/2018</td>
                                    </tr>
                                    <tr class="gradeA">
                                        <td>No Prazo</td>
                                        <td>Contrato 1</td>
                                        <td>0001</td>
                                        <td class="center">Fonte 1</td>
                                        <td class="center">10000</td>
                                        <td>2 anos</td>
                                        <td>1 ano</td>
                                        <td>02/02/2017</td>
                                        <td class="center">02/02/2019</td>
                                        <td class="center">02/02/2018</td>
                                    </tr>
                                    <tr class="gradeA">
                                        <td>Vencido</td>
                                        <td>Contrato 1</td>
                                        <td>0001</td>
                                        <td class="center">Fonte 1</td>
                                        <td class="center">10000</td>
                                        <td>2 anos</td>
                                        <td>1 ano</td>
                                        <td>02/02/2017</td>
                                        <td class="center">02/02/2019</td>
                                        <td class="center">02/02/2018</td>
                                    </tr>
                                    <tr class="gradeA">
                                        <td>No Prazo</td>
                                        <td>Contrato 1</td>
                                        <td>0001</td>
                                        <td class="center">Fonte 1</td>
                                        <td class="center">10000</td>
                                        <td>2 anos</td>
                                        <td>1 ano</td>
                                        <td>02/02/2017</td>
                                        <td class="center">02/02/2019</td>
                                        <td class="center">02/02/2018</td>
                                    </tr>
                                    <tr class="gradeA">
                                        <td>Vencido</td>
                                        <td>Contrato 1</td>
                                        <td>0001</td>
                                        <td class="center">Fonte 1</td>
                                        <td class="center">10000</td>
                                        <td>2 anos</td>
                                        <td>1 ano</td>
                                        <td>02/02/2017</td>
                                        <td class="center">02/02/2019</td>
                                        <td class="center">02/02/2018</td>
                                    </tr>
                                    <tr class="gradeA">
                                        <td>No Prazo</td>
                                        <td>Contrato 1</td>
                                        <td>0001</td>
                                        <td class="center">Fonte 1</td>
                                        <td class="center">10000</td>
                                        <td>2 anos</td>
                                        <td>1 ano</td>
                                        <td>02/02/2017</td>
                                        <td class="center">02/02/2019</td>
                                        <td class="center">02/02/2018</td>
                                    </tr>
                                    <tr class="gradeA">
                                        <td>Vencido</td>
                                        <td>Contrato 1</td>
                                        <td>0001</td>
                                        <td class="center">Fonte 1</td>
                                        <td class="center">10000</td>
                                        <td>2 anos</td>
                                        <td>1 ano</td>
                                        <td>02/02/2017</td>
                                        <td class="center">02/02/2019</td>
                                        <td class="center">02/02/2018</td>
                                    </tr>
                                    <tr class="gradeA">
                                        <td>Vencido</td>
                                        <td>Contrato 1</td>
                                        <td>0001</td>
                                        <td class="center">Fonte 1</td>
                                        <td class="center">10000</td>
                                        <td>2 anos</td>
                                        <td>1 ano</td>
                                        <td>02/02/2017</td>
                                        <td class="center">02/02/2019</td>
                                        <td class="center">02/02/2018</td>
                                    </tr>
                                    <tr class="gradeA">
                                        <td>Vencido</td>
                                        <td>Contrato 1</td>
                                        <td>0001</td>
                                        <td class="center">Fonte 1</td>
                                        <td class="center">10000</td>
                                        <td>2 anos</td>
                                        <td>1 ano</td>
                                        <td>02/02/2017</td>
                                        <td class="center">02/02/2019</td>
                                        <td class="center">02/02/2018</td>
                                    </tr>
                                    <tr class="gradeA">
                                        <td>No Prazo</td>
                                        <td>Contrato 1</td>
                                        <td>0001</td>
                                        <td class="center">Fonte 1</td>
                                        <td class="center">10000</td>
                                        <td>2 anos</td>
                                        <td>1 ano</td>
                                        <td>02/02/2017</td>
                                        <td class="center">02/02/2019</td>
                                        <td class="center">02/02/2018</td>
                                    </tr>
                                    <tr class="gradeA">
                                        <td>Vencido</td>
                                        <td>Contrato 1</td>
                                        <td>0001</td>
                                        <td class="center">Fonte 1</td>
                                        <td class="center">10000</td>
                                        <td>2 anos</td>
                                        <td>1 ano</td>
                                        <td>02/02/2017</td>
                                        <td class="center">02/02/2019</td>
                                        <td class="center">02/02/2018</td>
                                    </tr>
                                    <tr class="gradeA">
                                        <td>Vencido</td>
                                        <td>Contrato 1</td>
                                        <td>0001</td>
                                        <td class="center">Fonte 1</td>
                                        <td class="center">10000</td>
                                        <td>2 anos</td>
                                        <td>1 ano</td>
                                        <td>02/02/2017</td>
                                        <td class="center">02/02/2019</td>
                                        <td class="center">02/02/2018</td>
                                    </tr>
                                    <tr class="gradeA">
                                        <td>Vencido</td>
                                        <td>Contrato 1</td>
                                        <td>0001</td>
                                        <td class="center">Fonte 1</td>
                                        <td class="center">10000</td>
                                        <td>2 anos</td>
                                        <td>1 ano</td>
                                        <td>02/02/2017</td>
                                        <td class="center">02/02/2019</td>
                                        <td class="center">02/02/2018</td>
                                    </tr>
                                    <tr class="gradeA">
                                        <td>Vencido</td>
                                        <td>Contrato 1</td>
                                        <td>0001</td>
                                        <td class="center">Fonte 1</td>
                                        <td class="center">10000</td>
                                        <td>2 anos</td>
                                        <td>1 ano</td>
                                        <td>02/02/2017</td>
                                        <td class="center">02/02/2019</td>
                                        <td class="center">02/02/2018</td>
                                    </tr>
                                    <tr class="gradeA">
                                        <td>No Prazo</td>
                                        <td>Contrato 1</td>
                                        <td>0001</td>
                                        <td class="center">Fonte 1</td>
                                        <td class="center">10000</td>
                                        <td>2 anos</td>
                                        <td>1 ano</td>
                                        <td>02/02/2017</td>
                                        <td class="center">02/02/2019</td>
                                        <td class="center">02/02/2018</td>
                                    </tr>
                                    <tr class="gradeA">
                                        <td>Vencido</td>
                                        <td>Contrato 1</td>
                                        <td>0001</td>
                                        <td class="center">Fonte 1</td>
                                        <td class="center">10000</td>
                                        <td>2 anos</td>
                                        <td>1 ano</td>
                                        <td>02/02/2017</td>
                                        <td class="center">02/02/2019</td>
                                        <td class="center">02/02/2018</td>
                                    </tr>
                                    <tr class="gradeA">
                                        <td>No Prazo</td>
                                        <td>Contrato 1</td>
                                        <td>0001</td>
                                        <td class="center">Fonte 1</td>
                                        <td class="center">10000</td>
                                        <td>2 anos</td>
                                        <td>1 ano</td>
                                        <td>02/02/2017</td>
                                        <td class="center">02/02/2019</td>
                                        <td class="center">02/02/2018</td>
                                    </tr>
                                    <tr class="gradeA">
                                        <td>Vencido</td>
                                        <td>Contrato 1</td>
                                        <td>0001</td>
                                        <td class="center">Fonte 1</td>
                                        <td class="center">10000</td>
                                        <td>2 anos</td>
                                        <td>1 ano</td>
                                        <td>02/02/2017</td>
                                        <td class="center">02/02/2019</td>
                                        <td class="center">02/02/2018</td>
                                    </tr>
                                    <tr class="gradeA">
                                        <td>No Prazo</td>
                                        <td>Contrato 1</td>
                                        <td>0001</td>
                                        <td class="center">Fonte 1</td>
                                        <td class="center">10000</td>
                                        <td>2 anos</td>
                                        <td>1 ano</td>
                                        <td>02/02/2017</td>
                                        <td class="center">02/02/2019</td>
                                        <td class="center">02/02/2018</td>
                                    </tr>
                                    <tr class="gradeA">
                                        <td>Vencido</td>
                                        <td>Contrato 1</td>
                                        <td>0001</td>
                                        <td class="center">Fonte 1</td>
                                        <td class="center">10000</td>
                                        <td>2 anos</td>
                                        <td>1 ano</td>
                                        <td>02/02/2017</td>
                                        <td class="center">02/02/2019</td>
                                        <td class="center">02/02/2018</td>
                                    </tr>
                                    <tr class="gradeA">
                                        <td>No Prazo</td>
                                        <td>Contrato 1</td>
                                        <td>0001</td>
                                        <td class="center">Fonte 1</td>
                                        <td class="center">10000</td>
                                        <td>2 anos</td>
                                        <td>1 ano</td>
                                        <td>02/02/2017</td>
                                        <td class="center">02/02/2019</td>
                                        <td class="center">02/02/2018</td>
                                    </tr>
                                    <tr class="gradeA">
                                        <td>Vencido</td>
                                        <td>Contrato 1</td>
                                        <td>0001</td>
                                        <td class="center">Fonte 1</td>
                                        <td class="center">10000</td>
                                        <td>2 anos</td>
                                        <td>1 ano</td>
                                        <td>02/02/2017</td>
                                        <td class="center">02/02/2019</td>
                                        <td class="center">02/02/2018</td>
                                    </tr>
                                    <tr class="gradeA">
                                        <td>No Prazo</td>
                                        <td>Contrato 1</td>
                                        <td>0001</td>
                                        <td class="center">Fonte 1</td>
                                        <td class="center">10000</td>
                                        <td>2 anos</td>
                                        <td>1 ano</td>
                                        <td>02/02/2017</td>
                                        <td class="center">02/02/2019</td>
                                        <td class="center">02/02/2018</td>
                                    </tr>
                                    <tr class="gradeA">
                                        <td>Vencido</td>
                                        <td>Contrato 1</td>
                                        <td>0001</td>
                                        <td class="center">Fonte 1</td>
                                        <td class="center">10000</td>
                                        <td>2 anos</td>
                                        <td>1 ano</td>
                                        <td>02/02/2017</td>
                                        <td class="center">02/02/2019</td>
                                        <td class="center">02/02/2018</td>
                                    </tr>
                                    <tr class="gradeA">
                                        <td>Vencido</td>
                                        <td>Contrato 1</td>
                                        <td>0001</td>
                                        <td class="center">Fonte 1</td>
                                        <td class="center">10000</td>
                                        <td>2 anos</td>
                                        <td>1 ano</td>
                                        <td>02/02/2017</td>
                                        <td class="center">02/02/2019</td>
                                        <td class="center">02/02/2018</td>
                                    </tr>
                                    <tr class="gradeA">
                                        <td>No Prazo</td>
                                        <td>Contrato 1</td>
                                        <td>0001</td>
                                        <td class="center">Fonte 1</td>
                                        <td class="center">10000</td>
                                        <td>2 anos</td>
                                        <td>1 ano</td>
                                        <td>02/02/2017</td>
                                        <td class="center">02/02/2019</td>
                                        <td class="center">02/02/2018</td>
                                    </tr>
                                    <tr class="gradeA">
                                        <td>Vencido</td>
                                        <td>Contrato 1</td>
                                        <td>0001</td>
                                        <td class="center">Fonte 1</td>
                                        <td class="center">10000</td>
                                        <td>2 anos</td>
                                        <td>1 ano</td>
                                        <td>02/02/2017</td>
                                        <td class="center">02/02/2019</td>
                                        <td class="center">02/02/2018</td>
                                    </tr>
                                    <tr class="gradeA">
                                        <td>No Prazo</td>
                                        <td>Contrato 1</td>
                                        <td>0001</td>
                                        <td class="center">Fonte 1</td>
                                        <td class="center">10000</td>
                                        <td>2 anos</td>
                                        <td>1 ano</td>
                                        <td>02/02/2017</td>
                                        <td class="center">02/02/2019</td>
                                        <td class="center">02/02/2018</td>
                                    </tr>
                                    <tr class="gradeA">
                                        <td>No Prazo</td>
                                        <td>Contrato 1</td>
                                        <td>0001</td>
                                        <td class="center">Fonte 1</td>
                                        <td class="center">10000</td>
                                        <td>2 anos</td>
                                        <td>1 ano</td>
                                        <td>02/02/2017</td>
                                        <td class="center">02/02/2019</td>
                                        <td class="center">02/02/2018</td>
                                    </tr>
                                    <tr class="gradeA">
                                        <td>Vencido</td>
                                        <td>Contrato 1</td>
                                        <td>0001</td>
                                        <td class="center">Fonte 1</td>
                                        <td class="center">10000</td>
                                        <td>2 anos</td>
                                        <td>1 ano</td>
                                        <td>02/02/2017</td>
                                        <td class="center">02/02/2019</td>
                                        <td class="center">02/02/2018</td>
                                    </tr>
                                    <tr class="gradeC">
                                        <td>Vencido</td>
                                        <td>Contrato 1</td>
                                        <td>0001</td>
                                        <td class="center">Fonte 1</td>
                                        <td class="center">10000</td>
                                        <td>2 anos</td>
                                        <td>1 ano</td>
                                        <td>02/02/2017</td>
                                        <td class="center">02/02/2019</td>
                                        <td class="center">02/02/2018</td>
                                    </tr>
                                    <tr class="gradeA">
                                        <td>No Prazo</td>
                                        <td>Contrato 1</td>
                                        <td>0001</td>
                                        <td class="center">Fonte 1</td>
                                        <td class="center">10000</td>
                                        <td>2 anos</td>
                                        <td>1 ano</td>
                                        <td>02/02/2017</td>
                                        <td class="center">02/02/2019</td>
                                        <td class="center">02/02/2018</td>
                                    </tr>
                                    <tr class="gradeA">
                                        <td>Vencido</td>
                                        <td>Contrato 1</td>
                                        <td>0001</td>
                                        <td class="center">Fonte 1</td>
                                        <td class="center">10000</td>
                                        <td>2 anos</td>
                                        <td>1 ano</td>
                                        <td>02/02/2017</td>
                                        <td class="center">02/02/2019</td>
                                        <td class="center">02/02/2018</td>
                                    </tr>
                                    <tr class="gradeX">
                                        <td>No Prazo</td>
                                        <td>Contrato 1</td>
                                        <td>0001</td>
                                        <td class="center">Fonte 1</td>
                                        <td class="center">10000</td>
                                        <td>2 anos</td>
                                        <td>1 ano</td>
                                        <td>02/02/2017</td>
                                        <td class="center">02/02/2019</td>
                                        <td class="center">02/02/2018</td>
                                    </tr>
                                    <tr class="gradeC">
                                        <td>Vencido</td>
                                        <td>Contrato 1</td>
                                        <td>0001</td>
                                        <td class="center">Fonte 1</td>
                                        <td class="center">10000</td>
                                        <td>2 anos</td>
                                        <td>1 ano</td>
                                        <td>02/02/2017</td>
                                        <td class="center">02/02/2019</td>
                                        <td class="center">02/02/2018</td>
                                    </tr>
                                    <tr class="gradeC">
                                        <td>No Prazo</td>
                                        <td>Contrato 1</td>
                                        <td>0001</td>
                                        <td class="center">Fonte 1</td>
                                        <td class="center">10000</td>
                                        <td>2 anos</td>
                                        <td>1 ano</td>
                                        <td>02/02/2017</td>
                                        <td class="center">02/02/2019</td>
                                        <td class="center">02/02/2018</td>
                                    </tr>
                                    <tr class="gradeA">
                                        <td>Vencido</td>
                                        <td>Contrato 1</td>
                                        <td>0001</td>
                                        <td class="center">Fonte 1</td>
                                        <td class="center">10000</td>
                                        <td>2 anos</td>
                                        <td>1 ano</td>
                                        <td>02/02/2017</td>
                                        <td class="center">02/02/2019</td>
                                        <td class="center">02/02/2018</td>
                                    </tr>
                                    <tr class="gradeA">
                                        <td>No Prazo</td>
                                        <td>Contrato 1</td>
                                        <td>0001</td>
                                        <td class="center">Fonte 1</td>
                                        <td class="center">10000</td>
                                        <td>2 anos</td>
                                        <td>1 ano</td>
                                        <td>02/02/2017</td>
                                        <td class="center">02/02/2019</td>
                                        <td class="center">02/02/2018</td>
                                    </tr>
                                    <tr class="gradeX">
                                        <td>Vencido</td>
                                        <td>Contrato 1</td>
                                        <td>0001</td>
                                        <td class="center">Fonte 1</td>
                                        <td class="center">10000</td>
                                        <td>2 anos</td>
                                        <td>1 ano</td>
                                        <td>02/02/2017</td>
                                        <td class="center">02/02/2019</td>
                                        <td class="center">02/02/2018</td>
                                    </tr>
                                    <tr class="gradeX">
                                        <td>Vencido</td>
                                        <td>Contrato 1</td>
                                        <td>0001</td>
                                        <td class="center">Fonte 1</td>
                                        <td class="center">10000</td>
                                        <td>2 anos</td>
                                        <td>1 ano</td>
                                        <td>02/02/2017</td>
                                        <td class="center">02/02/2019</td>
                                        <td class="center">02/02/2018</td>
                                    </tr>
                                    <tr class="gradeX">
                                        <td>No Prazo</td>
                                        <td>Contrato 1</td>
                                        <td>0001</td>
                                        <td class="center">Fonte 1</td>
                                        <td class="center">10000</td>
                                        <td>2 anos</td>
                                        <td>1 ano</td>
                                        <td>02/02/2017</td>
                                        <td class="center">02/02/2019</td>
                                        <td class="center">02/02/2018</td>
                                    </tr>
                                    <tr class="gradeC">
                                        <td>Vencido</td>
                                        <td>Contrato 1</td>
                                        <td>0001</td>
                                        <td class="center">Fonte 1</td>
                                        <td class="center">10000</td>
                                        <td>2 anos</td>
                                        <td>1 ano</td>
                                        <td>02/02/2017</td>
                                        <td class="center">02/02/2019</td>
                                        <td class="center">02/02/2018</td>
                                    </tr>
                                    <tr class="gradeC">
                                        <td>No Prazo</td>
                                        <td>Contrato 1</td>
                                        <td>0001</td>
                                        <td class="center">Fonte 1</td>
                                        <td class="center">10000</td>
                                        <td>2 anos</td>
                                        <td>1 ano</td>
                                        <td>02/02/2017</td>
                                        <td class="center">02/02/2019</td>
                                        <td class="center">02/02/2018</td>
                                    </tr>
                                    <tr class="gradeU">
                                        <td>No Prazo</td>
                                        <td>Contrato 1</td>
                                        <td>0001</td>
                                        <td class="center">Fonte 1</td>
                                        <td class="center">10000</td>
                                        <td>2 anos</td>
                                        <td>1 ano</td>
                                        <td>02/02/2017</td>
                                        <td class="center">02/02/2019</td>
                                        <td class="center">02/02/2018</td>
                                    </tr>
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
