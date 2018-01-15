<!DOCTYPE html>
<?php
include 'menu.php';
?>
<!DOCTYPE html>
<html lang="pt-br" style="min-height:100%; position: relative;">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Portal da Oficina</title>

        <!-- Arquivos CSS -->
        <link href="../static/css/jasny-bootstrap.css" rel="stylesheet">
        <link href="../static/css/bootstrap-datepicker.css" rel="stylesheet">
        <link  href="../static/css/fontawesome-all.min.css" rel="stylesheet">
        <!-- Arquivos JS -->
        <script type="text/javascript" src="../static/js/jasny-bootstrap.js"></script>

    </head>

    <body style="background-color: #F8F9FA;">
       <div class="container" style=" background-color: #fff">
            <h2>
                <p class="text-center" style="color: #000"><i><b>Cadastro de O.S</b></i></p>
            </h2>
            <hr>
            <div class="row">
                <div class="col-4">
                    <h6  style="margin-top:1rem"><i>Empresa</i></h6>	
                    <div class="input-group ">
                        <span class="input-group-addon" id="sizing-addon1"><i class="fa fa-building"></i></span>
                        <select class="form-control" id="empresa">
                            <option value="">Selecione...</option>
                            <option value="crt">CRT</option>
                            <option value="smart">Smart</option>
                            <option value="master">Master</option>
                        </select>
                    </div>
                    <div class="text-danger"></div>
                </div>
                <div class="col-5">
                    <h6  style="margin-top:1rem"><i>Pesquisa </i></h6>	
                    <div class="input-group ">
                        <span class="input-group-addon" id="sizing-addon1"><i class="fa fa-search"></i></span>
                        <input type="text" id="pesquisa" class="form-control" placeholder="Placa/Sinistro " name="">
                    </div>
                    <div class="text-danger"></div>
                </div>
                <div class="col-1">
                    <button class="btn btn-dark" style="margin-top:2.4rem"><i class="fa fa-search"></i> Buscar</button>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-6">
                    <h6  style="margin-top:1rem"><i>Nome</i></h6>	
                    <div class="input-group ">
                        <span class="input-group-addon" id="sizing-addon1"><i class="fa fa-user"></i></span>
                        <input type="text" id="nome" class="form-control" disabled placeholder="Ex.: Exemplo Exemplo Exemplo" name="">
                    </div>
                    <div class="text-danger"></div>
                </div>
                <div class="col-6">
                    <h6  style="margin-top:1rem"><i>Corretor</i></h6>	
                    <div class="input-group ">
                        <span class="input-group-addon" id="sizing-addon1"><i class="fa fa-user-circle"></i></span>
                        <input type="text" id="corretor" class="form-control" disabled  placeholder="Ex.: Exemplo Exemplo " name="">
                    </div>
                    <div class="text-danger"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-4">
                    <h6  style="margin-top:1rem"><i>E-mail</i></h6>	
                    <div class="input-group ">
                        <span class="input-group-addon" id="sizing-addon1"><i class="fa fa-envelope"></i></span>
                        <input type="text" id="email" class="form-control" disabled placeholder="Ex.: exemplo@exemplo.com" name="">
                    </div>
                    <div class="text-danger"></div>
                </div>
                <div class="col-4">
                    <h6  style="margin-top:1rem"><i>Celular</i></h6>	
                    <div class="input-group ">
                        <span class="input-group-addon" id="sizing-addon1"><i class="fa fa-mobile"></i></span>
                        <input type="text" id="celular" class="form-control" disabled  placeholder="Ex.:(99) 99999-9999" name="">
                    </div>
                    <div class="text-danger"></div>
                </div>
                <div class="col-4">
                    <h6  style="margin-top:1rem"><i>Telefone</i></h6>	
                    <div class="input-group ">
                        <span class="input-group-addon" id="sizing-addon1"><i class="fa fa-phone"></i></span>
                        <input type="text" id="telefone" class="form-control" disabled  placeholder="Ex.: (99) 9999-9999" name="">
                    </div>
                    <div class="text-danger"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <h6  style="margin-top:1rem"><i>Tipo</i></h6>	
                    <div class="input-group ">
                        <span class="input-group-addon" id="sizing-addon1"><i class="fa fa-address-book"></i></span>
                        <select class="form-control" id="tipo">
                            <option value="">Selecione...</option>
                            <option value="segurado">Segurado</option>
                            <option value="terceiro">Terceiro</option>
                            <option value="particular">Particular</option>
                        </select>
                    </div>
                    <div class="text-danger"></div>
                </div>
                <div class="col-6">
                    <h6  style="margin-top:1rem"><i>Seguradora</i></h6>	
                    <div class="input-group ">
                        <span class="input-group-addon" id="sizing-addon1"><i class="fa fa-building"></i></span>
                        <input type="text" id="seguradora" class="form-control" disabled  placeholder="Ex.:  Exemplo Exemplo" name="">
                    </div>
                    <div class="text-danger"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <h6  style="margin-top:1rem"><i>Veículo</i></h6>	
                    <div class="input-group ">
                        <span class="input-group-addon" id="sizing-addon1"><i class="fa fa-car"></i></span>
                        <input type="text" id="veiculo" class="form-control" disabled  placeholder="Ex.:  Exemplo Exemplo" name="">
                    </div>
                    <div class="text-danger"></div>
                </div>
                <div class="col-3">
                    <h6  style="margin-top:1rem"><i>Placa</i></h6>	
                    <div class="input-group ">
                        <span class="input-group-addon" id="sizing-addon1"><i class="fa fa-car"></i></span>
                        <input type="text" id="placa" class="form-control" disabled  placeholder="Ex.:  XXX-9999" name="">
                    </div>
                    <div class="text-danger"></div>
                </div>
                <div class="col-3">
                    <h6  style="margin-top:1rem"><i>Sinistro</i></h6>	
                    <div class="input-group ">
                        <span class="input-group-addon" id="sizing-addon1"><i class="fa fa-info-circle"></i></span>
                        <input type="text" id="sinistro" class="form-control" disabled  placeholder="Ex.:  999999999" name="">
                    </div>
                    <div class="text-danger"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <h6  style="margin-top:1rem"><i>Serviços</i></h6>	
                    <textarea name="" id="servicos"  rows="5" class="form-control"></textarea>
                </div>
                <div class="col-12">
                    <div class="table-responsive">
                        <table class="table table-responsive table-stripped">
                            <thead >
                                <tr>
                                    <th scope="col">Comp.</th>
                                    <th scope="col">Serviço</th>
                                    <th scope="col">Qtd.</th>
                                    <th scope="col">Vl. Unitário</th>
                                    <th scope="col">Vl. Total</th>
                                    <th scope="col">
                                        <Button data-toggle="modal" data-target="#adicionaServicos" class="btn btn-dark col-12"><i class="fa fa-plus"></i> Adicionar</a>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="col"><input type="checkbox"></th>
                                    <th scope="col">Serviço Serviço Serviço Serviço Serviço Serviço Serviço Serviço</th>
                                    <th scope="col">
                                        <input type="text" class="form-control" style="margin-top:1rem" placeholder="Qtd...">
                                    </th>
                                    <th scope="col">
                                        <input type="text" class="form-control" style="margin-top:1rem" placeholder="Vl. Unitário">
                                    </th>
                                    <th scope="col">
                                        <input type="text" class="form-control" style="margin-top:1rem"  placeholder="Vl. Total" disabled>
                                    </th>
                                    <th scope="col">
                                        <a href="#" class="btn btn-dark col-12"><i class="fa fa-trash"></i> Remover</a>
                                    </th>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="alert alert-danger">
                        <i class="fa fa-exclamation-triangle"></i>  Adicione um Serviço
                    </div>
                </div>
                <div class="col-12">
                    <button style="margin-top: 1rem" class="btn btn-dark btn-lg btn-block"  onclick="salvar()">
                        <i class="fa fa-check float-left" style="margin-top: 0.3rem;"></i> Salvar
                    </button>
                    <br>
			    </div>
            </div>
            <div class="modal fade" id="adicionaServicos" tabindex="-1" role="dialog" aria-labelledby="adicionaServicos" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h2>Adicionar Serviços</h2> 
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="input-group ">
                                            <span class="input-group-addon" id="sizing-addon1"><i class="fa fa-search"></i></span>
                                            <input type="text" id="sinistro" class="form-control" disabled  placeholder="Digite para pesquisar" name="">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="input-group" style="margin-top:1rem">
                                            <input type="text" class="form-control" disabled placeholder="Serviço serviço" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                            <div class="input-group-append">
                                                <button class="btn btn-dark" type="button">Adicionar</button>
                                            </div>
                                        </div>
                                        <div class="input-group" style="margin-top:1rem">
                                            <input type="text" class="form-control" disabled placeholder="Serviço serviço" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                            <div class="input-group-append">
                                                <button class="btn btn-dark" type="button">Adicionar</button>
                                            </div>
                                        </div>
                                        <div class="input-group" style="margin-top:1rem">
                                            <input type="text" class="form-control" disabled placeholder="Serviço serviço" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                            <div class="input-group-append">
                                                <button class="btn btn-dark" type="button">Adicionar</button>
                                            </div>
                                        </div>
                                        <div class="input-group" style="margin-top:1rem">
                                            <input type="text" class="form-control" disabled placeholder="Serviço serviço" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                            <div class="input-group-append">
                                                <button class="btn btn-dark" type="button">Adicionar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="../static/js/bootstrap-datepicker.js"></script>
    <script src="../static/js/bootstrap-datepicker.pt-BR.min.js"></script> 
    
</html>