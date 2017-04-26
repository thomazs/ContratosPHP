<?php
include_once '../inc/inc.php';
$user = loginRequired();
$_title = ' :: Cadastro de Contratos';
include_once 'top.php';
?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Painel de Cadastro</h1>                    
                </div>
                
                <!-- /.col-lg-12 -->
            </div>
            
            
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Cadastrar Contratos
                        </div>
                        
                        <h1>Formulário de Cadastro</h1>
                        <br>
                        <form>
	                                    <div class="row">
	                                        <div class="col-md-5">
												<div class="form-group label-floating">
													<label class="control-label">Nome do Contrato</label>
													<input type="text" class="form-control" >
												</div>
	                                        </div>
	                                        <div class="col-md-3">
												<div class="form-group label-floating">
													<label class="control-label">Número do Contrato</label>
													<input type="text" class="form-control" >
												</div>
	                                        </div>
	                                        <div class="col-md-4">
												<div class="form-group label-floating">
													<label class="control-label">Fonte de Recurso</label>
													<input type="text" class="form-control" >
												</div>
	                                        </div>
	                                    </div>

	                                    <div class="row">
	                                        <div class="col-md-6">
												<div class="form-group label-floating">
													<label class="control-label">Valor Inicial</label>
													<input type="text" class="form-control" >
												</div>
	                                        </div>
	                                        <div class="col-md-6">
												<div class="form-group label-floating">
													<label class="control-label">Período de Vigência</label>
													<input type="text" class="form-control" >
												</div>
	                                        </div>
	                                    </div>

	                                    <div class="row">
	                                        <div class="col-md-12">
												<div class="form-group label-floating">
													<label class="control-label">Período de Execução</label>
													<input type="text" class="form-control" >
												</div>
	                                        </div>
	                                    </div>

	                                    <div class="row">
	                                        <div class="col-md-4">
												<div class="form-group label-floating">
													<label class="control-label">Data da Ordem de Serviço</label>
													<input type="date" class="form-control" >
												</div>
	                                        </div>
	                                        <div class="col-md-4">
												<div class="form-group label-floating">
													<label class="control-label">Data Final de Vigência</label>
													<input type="date" class="form-control" >
												</div>
	                                        </div>
	                                        <div class="col-md-4">
												<div class="form-group label-floating">
													<label class="control-label">Data final de execução</label>
													<input type="date" class="form-control" >
												</div>
	                                        </div>
	                                    </div>

	                                    

	                                    
	                                </form>
                        
                        
                        
                        <!-- /.panel-body -->
                    </div>
                    
                    <button type="button" class="btn btn-success" onclick="funcao1()" value="Exibir Alert">Cadastrar</button>
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
