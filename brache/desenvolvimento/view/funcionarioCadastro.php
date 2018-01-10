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
        <link href="static/css/jasny-bootstrap.css" rel="stylesheet">
        <link href="static/css/bootstrap-datepicker.css" rel="stylesheet">
        <link  href="static/css/fontawesome-all.min.css" rel="stylesheet">
        <!-- Arquivos JS -->
        <script type="text/javascript" src="static/js/jasny-bootstrap.js"></script>

    </head>
    <body>
        <div class="container" style=" background-color: #fff; margin-top: 1rem">
            <h2>
                <p class="text-center" style="color: #000"><i><b>Cadastro de funcionários</b></i></p>
            </h2>
            <hr>
            <div class="row">
                <div class="col-4">
                    <div class="fileinput fileinput-new " data-provides="fileinput" style="margin-left: 1rem">
                        <div class="fileinput-preview thumbnail img-thumbnail" data-trigger="fileinput" style="width: 20rem;  height: 17.5rem"></div>
                        <div>
                            <span class="btn btn-dark btn-file col-12">
                                <span class="fileinput-new ">Selecione a imagem</span>
                                <span class="fileinput-exists" data-dismiss="fileinput">Alterar</span>
                                <input type="file" name="...">
                            </span>
                            <a href="#" class="btn btn-dark fileinput-exists col-12" data-dismiss="fileinput" style="margin-top: 0.5rem">Remover</a>
                        </div>
                    </div>
                </div>
                <div class="col-8">
                    <div class="row">
                        <div class="col-12">
                            <h6  style="margin-top:1rem"><i>Nome</i></h6>   
                            <div class="input-group ">
                                <span class="input-group-addon " id="sizing-addon1"><i class="fa fa-user"></i></span>
                                <input type="text" id="nome" class="form-control" placeholder="Ex.:  Exemplo exemplo " maxlength="200" name="">
                            </div>
                            <div class="text-danger"></div>
                        </div>
                        <div class="col-6">
                            <h6  style="margin-top:1rem"><i>CPF</i></h6>    
                            <div class="input-group ">
                                <span class="input-group-addon" id="sizing-addon1"><i class="fa fa-user"></i></span>
                                <input type="text" id="cpf" class="form-control" placeholder="Ex.: 999.999.999-99" data-mask="999.999.999-99" name="">
                            </div>
                            <div class="text-danger"></div>
                        </div>
                        <div class="col-6">
                            <h6  style="margin-top:1rem"><i>Nascimento</i></h6> 
                            <div class="input-group ">
                                <span class="input-group-addon " id="sizing-addon1"><i class="fa fa-user"></i></span>
                                <input class="form-control" placeholder="Ex.: 99/99/9999"  id="nascimento" name="event_date" id="event_date" type="text" >
                            </div>
                            <div class="text-danger"></div>
                        </div>
                        <div class="col-6">
                            <h6  style="margin-top:1rem"><i>RG</i></h6> 
                            <div class="input-group ">
                                <span class="input-group-addon " id="sizing-addon1"><i class="fa fa-user"></i></span>
                                <input type="text" id="rg" class="form-control" placeholder="Ex.: 9999999"  name="">
                            </div>
                            <div class="text-danger"></div>
                        </div>
                        <div class="col-6">
                            <h6  style="margin-top:1rem"><i>Orgão Emissor</i></h6>  
                            <div class="input-group ">
                                <span class="input-group-addon " id="sizing-addon1"><i class="fa fa-user"></i></span>
                                <input type="text" id="orgao_emissor" class="form-control" placeholder="Ex.: SSP-DF" maxlength="50" name="">
                            </div>
                            <div class="text-danger"></div>
                        </div>
                        <div class="col-12">
                            <h6  style="margin-top:1rem"><i>E-Mail</i></h6> 
                            <div class="input-group ">
                                <span class="input-group-addon " id="sizing-addon1"><i class="fa fa-user"></i></span>
                                <input type="email" id="email" class="form-control" placeholder="Ex.: exemplo@exemplo.com"  name="">
                            </div>
                            <div class="text-danger"></div>
                        </div>
                        <div class="col-6">
                            <h6  style="margin-top:1rem"><i>Telefone</i></h6>   
                            <div class="input-group ">
                                <span class="input-group-addon " id="sizing-addon1"><i class="fa fa-phone"></i></span>
                                <input type="text" id="telefone" class="form-control" placeholder="Ex.: (99) 9999-9999" data-mask="(99) 9999-9999" name="">
                            </div>
                            <div class="text-danger"></div>
                        </div>
                        <div class="col-6">
                            <h6  style="margin-top:1rem"><i>Celular</i></h6>    
                            <div class="input-group ">
                                <span class="input-group-addon " id="sizing-addon1"><i class="fa fa-mobile"></i></span>
                                <input type="text" id="celular" class="form-control" placeholder="Ex.: (99) 99999-9999" data-mask="(99) 99999-9999" name="">
                            </div>
                            <div class="text-danger"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <h6  style="margin-top:1rem"><i>Nome de Usuário</i></h6>    
                    <div class="input-group ">
                        <span class="input-group-addon " id="sizing-addon1"><i class="fa fa-user"></i></span>
                        <input type="text" id="nome_usuario" class="form-control" placeholder="Ex.: Exemplo exemplo" name="">
                    </div>
                    <div class="text-danger"></div>
                </div>
                <div class="col-6">
                    <h6  style="margin-top:1rem"><i>Cargo</i></h6>    
                    <div class="input-group ">
                        <span class="input-group-addon " id="sizing-addon1"><i class="fa fa-user"></i></span>
                        <select class="form-control" id="cargo" onchange="busca_servicos()">
                            <option>Selecione...</option>
                            <option>Lanterneiro</option>
                            <option>Mecânico</option>
                            <option>Polidor</option>
                            <option>Montador</option>
                        </select>
                    </div>
                    <div class="text-danger"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-4">
                    <h6  style="margin-top:1rem"><i>CEP</i></h6>    
                    <div class="input-group" >
                        <span class="input-group-addon " id="sizing-addon1"><i class="fa fa-user"></i></span>
                        <input type="text" id="cep" class="form-control" placeholder="Ex.: 99999-999" data-mask="99999-999"  onkeyup="busca_cep()">
                    </div>
                    <div class="text-danger"></div>
                </div>
                <div class="col-2">
                    <div class="form-check" style="margin-top: 3rem">
                        <input class="form-check-input" type="checkbox" value="" id="sem_cep" onchange="nao_sei_cep()" style="margin-left: 0.1rem ">
                        <label class="form-check-label" for="defaultCheck1">
                            Não sei o CEP
                        </label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <h6  style="margin-top:1rem"><i>Endereco</i></h6>   
                    <div class="input-group ">
                        <span class="input-group-addon " id="sizing-addon1"><i class="fa fa-user"></i></span>
                        <input type="text" id="endereco" class="form-control" placeholder="Ex.: Exemplo exemplo exemplo"  disabled>
                    </div>
                    <div class="text-danger"></div>
                </div>
                <div class="col-2">
                    <h6  style="margin-top:1rem"><i>Número</i></h6> 
                    <div class="input-group ">
                        <span class="input-group-addon " id="sizing-addon1"><i class="fa fa-user"></i></span>
                        <input type="text" id="numero" class="form-control" placeholder="Ex.: 99 "  disabled>
                    </div>
                    <div class="text-danger"></div>
                </div>
                <div class="col-4">
                    <h6  style="margin-top:1rem"><i>Complemento</i></h6>    
                    <div class="input-group ">
                        <span class="input-group-addon " id="sizing-addon1"><i class="fa fa-user"></i></span>
                        <input type="text" id="complemento" class="form-control" placeholder="Ex.: Exemplo Exemplo " maxlength="50" disabled>
                    </div>
                    <div class="text-danger"></div>
                </div>
                <div class="col-6">
                    <h6  style="margin-top:1rem"><i>Bairro</i></h6> 
                    <div class="input-group ">
                        <span class="input-group-addon " id="sizing-addon1"><i class="fa fa-user"></i></span>
                        <input type="text" id="bairro" class="form-control" placeholder="Ex.: Exemplo Exemplo " maxlength="100" disabled>
                    </div>
                    <div class="text-danger"></div>
                </div>
                <div class="col-4">
                    <h6  style="margin-top:1rem"><i>Cidade</i></h6> 
                    <div class="input-group ">
                        <span class="input-group-addon " id="sizing-addon1"><i class="fa fa-user"></i></span>
                        <input type="text" id="cidade" class="form-control" placeholder="Ex.: Exemplo exemplo" maxlength="100" disabled>
                    </div>
                    <div class="text-danger"></div>
                </div>
                <div class="col-2">
                    <h6  style="margin-top:1rem"><i>UF</i></h6> 
                    <div class="input-group ">
                        <span class="input-group-addon " id="sizing-addon1"><i class="fa fa-user"></i></span>
                        <input type="text" id="uf" class="form-control" placeholder="Ex.: DF" maxlength="2" disabled>
                    </div>
                    <div class="text-danger"></div>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-12">
                    <button style="margin-top: 1rem;margin-bottom: 2rem" class="btn btn-dark btn-lg btn-block" onclick="salvar()">
                        <i class="fa fa-check float-left" style="margin-top: 0.3rem;"></i> Salvar
                    </button>
                </div>
            </div>
        </div>
    </body>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script type="text/javascript" src="static/js/popper.js"></script>
    <script type="text/javascript" src="static/js/bootstrap.js"></script>   
    <script src="static/js/bootstrap-datepicker.js"></script>
    <script src="static/js/bootstrap-datepicker.pt-BR.min.js"></script> 
    
</html>