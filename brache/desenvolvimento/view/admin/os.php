<?php
include 'menu.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Portal da Oficina</title>

        <!-- Arquivos CSS -->
        <link href="../static/css/jasny-bootstrap.css" rel="stylesheet">
        <link  href="../static/css/fontawesome-all.min.css" rel="stylesheet">
        <!-- Arquivos JS -->
        <script type="text/javascript" src="../static/js/jasny-bootstrap.1.js"></script>

    </head>
    <body style="background-color: #F8F9FA;" onload="busca_os(); busca_funcionario_select();">
        <div class="container" style=" background-color: #fff">
            <h2>
                <p class="text-center" style="color: #000"><i><b>Processo Eletrônico </b></i></p>
            </h2>
            <hr>
            <div class="row">
                <div class="col-12">
                    <button class="btn btn-dark float-right" id="btnEnviar" disabled> 
                        <i class="fa fa-check float-left" style="margin-top: 0.1rem; margin-right: 0.3rem"></i> 
                            Salvar
                    </button>
                </div>
            </div>
            <hr>
            <!-- Inicio do collapse -->
            <div id="accordion">
                <div class="card">
                    <button class="btn btn-secondary card-body" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        <h5 class="mb-0 text-left font-weight-normal">    
                            Cliente
                        </h5>
                    </button>
                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-9">
                                    <h6  style="margin-top:1rem"><i>Nome</i></h6>	
                                    <div class="input-group ">
                                        <span class="input-group-addon " id="sizing-addon1"><i class="fa fa-address-book"></i></span>
                                        <input type="text" id="nome" class="form-control" disabled placeholder="Ex.:  Exemplo exemplo " maxlength="200" name="">
                                    </div>
                                    <div class="text-danger"></div>
                                </div>
                                <div class="col-3">
                                    <h6  style="margin-top:1rem"><i>Nascimento</i></h6>	
                                    <div class="input-group ">
                                        <span class="input-group-addon " id="sizing-addon1"><i class="fa fa-calendar"></i></span>
                                        <input class="form-control" placeholder="Ex.: 99/99/9999" disabled id="nascimento" name="event_date" id="event_date" type="text" >
                                    </div>
                                    <div class="text-danger"></div>
                                </div>
                                <div class="col-4">
                                    <h6  style="margin-top:1rem"><i>CPF</i></h6>	
                                    <div class="input-group ">
                                        <span class="input-group-addon" id="sizing-addon1"><i class="fa fa-address-book"></i></span>
                                        <input type="text" id="cpf" class="form-control" disabled placeholder="Ex.: 999.999.999-99" name="">
                                    </div>
                                    <div class="text-danger"></div>
                                </div>
                                <div class="col-4">
                                    <h6  style="margin-top:1rem"><i>RG</i></h6>	
                                    <div class="input-group ">
                                        <span class="input-group-addon " id="sizing-addon1"><i class="fa fa-address-book"></i></span>
                                        <input type="text" id="rg" class="form-control" disabled placeholder="Ex.: 9999999"  name="">
                                    </div>
                                    <div class="text-danger"></div>
                                </div>
                                <div class="col-4">
                                    <h6  style="margin-top:1rem"><i>Orgão Emissor</i></h6>	
                                    <div class="input-group ">
                                        <span class="input-group-addon " id="sizing-addon1"><i class="fa fa-building"></i></span>
                                        <input type="text" id="orgao_emissor" class="form-control" disabled placeholder="Ex.: SSP-DF" maxlength="50" name="">
                                    </div>
                                    <div class="text-danger"></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <h6  style="margin-top:1rem"><i>E-Mail</i></h6>	
                                    <div class="input-group ">
                                        <span class="input-group-addon " id="sizing-addon1"><i class="fa fa-envelope"></i></span>
                                        <input type="email" id="email" class="form-control" disabled placeholder="Ex.: exemplo@exemplo.com"  name="">
                                    </div>
                                    <div class="text-danger"></div>
                                </div>
                                <div class="col-3">
                                    <h6  style="margin-top:1rem"><i>Telefone</i></h6>	
                                    <div class="input-group ">
                                        <span class="input-group-addon " id="sizing-addon1"><i class="fa fa-phone"></i></span>
                                        <input type="text" id="telefone" class="form-control" disabled placeholder="Ex.: (99) 9999-9999" name="">
                                    </div>
                                    <div class="text-danger"></div>
                                </div>
                                <div class="col-3">
                                    <h6  style="margin-top:1rem"><i>Celular</i></h6>	
                                    <div class="input-group ">
                                        <span class="input-group-addon " id="sizing-addon1"><i class="fa fa-mobile"></i></span>
                                        <input type="text" id="celular" class="form-control" disabled placeholder="Ex.: (99) 99999-9999" name="">
                                    </div>
                                    <div class="text-danger"></div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-4">
                                    <h6  style="margin-top:1rem"><i>CEP</i></h6>	
                                    <div class="input-group ">
                                        <span class="input-group-addon " id="sizing-addon1"><i class="fa fa-search"></i></span>
                                        <input type="text" id="cep" class="form-control" placeholder="Ex.: 99999-999" disabled>
                                    </div>
                                    <div class="text-danger"></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <h6  style="margin-top:1rem"><i>Endereco</i></h6>	
                                    <div class="input-group ">
                                        <span class="input-group-addon " id="sizing-addon1"><i class="fa fa-home"></i></span>
                                        <input type="text" id="endereco" class="form-control" placeholder="Ex.: Exemplo exemplo exemplo" disabled>
                                    </div>
                                    <div class="text-danger"></div>
                                </div>
                                <div class="col-2">
                                    <h6  style="margin-top:1rem"><i>Número</i></h6>	
                                    <div class="input-group ">
                                        <span class="input-group-addon " id="sizing-addon1"><i class="fa fa-home"></i></span>
                                        <input type="text" id="numero" class="form-control" placeholder="Ex.: 99 "  disabled>
                                    </div>
                                    <div class="text-danger"></div>
                                </div>
                                <div class="col-4">
                                    <h6  style="margin-top:1rem"><i>Complemento</i></h6>	
                                    <div class="input-group ">
                                        <span class="input-group-addon " id="sizing-addon1"><i class="fa fa-home"></i></span>
                                        <input type="text" id="complemento" class="form-control" placeholder="Ex.: Exemplo Exemplo " maxlength="50" disabled>
                                    </div>
                                    <div class="text-danger"></div>
                                </div>
                                <div class="col-6">
                                    <h6  style="margin-top:1rem"><i>Bairro</i></h6>	
                                    <div class="input-group ">
                                        <span class="input-group-addon " id="sizing-addon1"><i class="fa fa-home"></i></span>
                                        <input type="text" id="bairro" class="form-control" placeholder="Ex.: Exemplo Exemplo " maxlength="100" disabled>
                                    </div>
                                    <div class="text-danger"></div>
                                </div>
                                <div class="col-4">
                                    <h6  style="margin-top:1rem"><i>Cidade</i></h6>	
                                    <div class="input-group ">
                                        <span class="input-group-addon " id="sizing-addon1"><i class="fa fa-home"></i></span>
                                        <input type="text" id="cidade" class="form-control" placeholder="Ex.: Exemplo exemplo" maxlength="100" disabled>
                                    </div>
                                    <div class="text-danger"></div>
                                </div>
                                <div class="col-2">
                                    <h6  style="margin-top:1rem"><i>UF</i></h6>	
                                    <div class="input-group ">
                                        <span class="input-group-addon " id="sizing-addon1"><i class="fa fa-home"></i></span>
                                        <input type="text" id="uf" class="form-control" placeholder="Ex.: DF" maxlength="2" disabled>
                                    </div>
                                    <div class="text-danger"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <button class="btn btn-secondary card-body" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        <h5 class="mb-0 text-left font-weight-normal">    
                            Veículo
                        </h5>
                    </button>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                        <div class="card-body">
                            <div id="dados_veiculo">
                                <div class="row">
                                    <div class="col-4">
                                        <h6  style="margin-top:1rem"><i>Placa</i></h6>	
                                        <div class="input-group ">
                                            <span class="input-group-addon " id="sizing-addon1"><i class="fa fa-search"></i></span>
                                            <input type="text" id="placa" class="form-control" placeholder="Ex.: AAA-9999" disabled name="">
                                        </div>
                                        <div class="text-danger"></div>
                                    </div>
                                    <div class="col-8">
                                        <h6  style="margin-top:1rem"><i>Modelo</i></h6>	
                                        <div class="input-group ">
                                            <span class="input-group-addon " id="sizing-addon1"><i class="fa fa-car"></i></span>
                                            <input type="text" id="modelo" class="form-control" disabled placeholder="Ex.: Exemplo Exemplo"  maxlength="100" name="">
                                        </div>
                                        <div class="text-danger"></div>
                                    </div>
                                    <div class="col-3">
                                        <h6  style="margin-top:1rem"><i>Ano Modelo</i></h6>	
                                        <div class="input-group ">
                                            <span class="input-group-addon " id="sizing-addon1"><i class="fa fa-calendar"></i></span>
                                            <input type="text" id="ano_modelo" class="form-control" disabled placeholder="Ex.: Exemplo Exemplo" maxlength="100" name="">
                                        </div>
                                        <div class="text-danger"></div>
                                    </div>
                                    <div class="col-3">
                                        <h6  style="margin-top:1rem"><i>Ano Fabricação</i></h6>	
                                        <div class="input-group ">
                                            <span class="input-group-addon " id="sizing-addon1"><i class="fa fa-calendar"></i></span>
                                            <input type="text" id="ano_fabricacao" class="form-control" disabled placeholder="Ex.: Exemplo Exemplo" maxlength="100" name="">
                                        </div>
                                        <div class="text-danger"></div>
                                    </div>
                                    <div class="col-6">
                                        <h6  style="margin-top:1rem"><i>Fabricante</i></h6>	
                                        <div class="input-group ">
                                            <span class="input-group-addon " id="sizing-addon1"><i class="fa fa-calendar"></i></span>
                                            <select name="" id="fabricante" disabled class="form-control">
                                                <option value="0">Selecione...</option>
                                            </select>
                                        </div>
                                        <div class="text-danger"></div>
                                    </div>
                                    <div class="col-4">
                                        <h6  style="margin-top:1rem"><i>Cor</i></h6>	
                                        <div class="input-group ">
                                            <span class="input-group-addon " id="sizing-addon1"><i class="fa fa-paint-brush"></i></span>
                                            <input type="text" id="cor" class="form-control" disabled placeholder="Ex.: Exemplo "   maxlength="50" name="">
                                        </div>
                                        <div class="text-danger"></div>
                                    </div>
                                    <div class="col-8">
                                        <h6  style="margin-top:1rem"><i>Chassi</i></h6>	
                                        <div class="input-group ">
                                            <span class="input-group-addon " id="sizing-addon1"><i class="fa fa-car"></i></span>
                                            <input type="text" id="chassi" class="form-control" placeholder="Ex.: Exemplo" disabled maxlength="50" name="">
                                        </div>
                                        <div class="text-danger"></div>
                                    </div>                  
                                </div>
                                <div class="row " id="cadastro_cliente">
                                    <div class="col-6">
                                        <h6 style="margin-top:1rem"><i>Seguradora</i></h6>	
                                        <div class="input-group ">
                                            <span class="input-group-addon " id="sizing-addon1"><i class="fa fa-user"></i></span>
                                            <select class="form-control" id="seguradora" disabled>
                                                <option value="">Selecione...</option>
                                            </select>
                                        </div>
                                        <div class="text-danger"></div>
                                    </div>
                                    <div class="col-6">
                                        <h6  style="margin-top:1rem"><i>Corretor</i></h6>	
                                        <div class="input-group ">
                                            <span class="input-group-addon" id="sizing-addon1"><i class="fa fa-user"></i></span>
                                            <select class="form-control" id="corretor" disabled>
                                                <option value="">Selecione..</option>
                                            </select>
                                        </div>
                                        <div class="text-danger"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <button class="btn btn-secondary card-body" style="width: 100%" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        <h5 class="mb-0 text-left font-weight-normal">    
                           Tramitação do processo
                        </h5>
                    </button>
                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                        <div class="card-body">
                            <form id="dados_servico" onkeyup="envia();" onchange="envia();">
                                <div class="row">
                                    <div class="col-4">
                                        <h6 style="margin-top:1rem"><i>Sinistro</i></h6>
                                        <div class="input-group ">
                                            <span class="input-group-addon" id="sizing-addon1"><i class="fas fa-info-circle"></i></span>
                                            <input type="text" id="sinistro" class="form-control" disabled placeholder="123456" name="">
                                        </div>
                                    </div>
                                    <div class="col-2" style="margin-top:3rem">
                                        <h6 class="text-left">
                                            <input type="checkbox" id="pt" onclick="verifica_pt()"> Perda Total
                                        </h6>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-3">
                                        <h6 style="margin-top:1rem"><i>Vistoria realizada</i></h6>
                                            <div class="input-group ">
                                                <span class="input-group-addon" id="sizing-addon1"><i class="fas fa-calendar"></i></span>
                                                <input type="text" id="vistoria_realizada" class="form-control" data-mask="99/99/9999" placeholder="12/02/2018" name="">
                                            </div>
                                    </div>
                                    <div class="col-3">
                                        <h6 style="margin-top:1rem"><i>Autorização</i></h6>
                                        <div class="input-group ">
                                            <span class="input-group-addon" id="sizing-addon1"><i class="fas fa-calendar"></i></span>
                                            <input type="text" id="autorizacao" class="form-control" data-mask="99/99/9999" placeholder="12/02/2018" name="">
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <h6 style="margin-top:1rem"><i>Entrada</i></h6>
                                        <div class="input-group ">
                                            <span class="input-group-addon" id="sizing-addon1"><i class="fas fa-calendar"></i></span>
                                            <input type="text" id="entrada" class="form-control" data-mask="99/99/9999" placeholder="12/02/2018" name="">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-3">
                                        <h6 style="margin-top:1rem"><i>Saída</i></h6>
                                        <div class="input-group ">
                                            <span class="input-group-addon" id="sizing-addon1"><i class="fas fa-calendar"></i></span>
                                            <input type="text" id="saida" data-mask="99/99/9999" class="form-control"  placeholder="12/02/2018" name="">
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <h6 style="margin-top:1rem"><i>Complemento realizado</i></h6>
                                        <div class="input-group ">
                                            <span class="input-group-addon" id="sizing-addon1"><i class="fas fa-calendar"></i></span>
                                            <input type="text" id="icomplemento" class="form-control" data-mask="99/99/9999" placeholder="12/02/2018" name="">
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <h6 style="margin-top:1rem"><i>Agendamento</i></h6>
                                        <div class="input-group ">
                                            <span class="input-group-addon" id="sizing-addon1"><i class="fas fa-calendar"></i></span>
                                            <input type="text" id="agendamento" class="form-control" data-mask="99/99/9999" placeholder="12/02/2018" name="">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-3">
                                        <h6 style="margin-top:1rem"><i>Previsão de entrega</i></h6>
                                        <div class="input-group ">
                                            <span class="input-group-addon" id="sizing-addon1"><i class="fas fa-calendar"></i></span>
                                            <input type="text" id="previsao_entrega" class="form-control" data-mask="99/99/9999" placeholder="12/02/2018" name="">
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <h6 style="margin-top:1rem"><i>Entregue</i></h6>
                                        <div class="input-group ">
                                            <span class="input-group-addon" id="sizing-addon1"><i class="fas fa-calendar"></i></span>
                                            <input type="text" id="entregue" class="form-control" data-mask="99/99/9999" placeholder="12/02/2018" name="">
                                        </div>
                                    </div>
                                <div class="col-2" style="margin-top:3rem">
                                        <h6 class="text-left">
                                            <input type="checkbox" onclick="habilita_retorno()" id="retorno"> Retorno
                                        </h6>
                                    </div>
                                    <div class="col-3">
                                        <h6 style="margin-top:1rem"><i>Data do retorno</i></h6>
                                        <div class="input-group ">
                                            <span class="input-group-addon" id="sizing-addon1"><i class="fas fa-calendar"></i></span>
                                            <input type="text" id="dtRetorno" class="form-control" data-mask="99/99/9999" disabled placeholder="12/02/2018" name="">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <h6 style="margin-top:1rem"><i>Particular</i></h6>
                                        <div class="input-group ">
                                            <span class="input-group-addon" id="sizing-addon1"><i class="fas fa-question"></i></span>
                                            <select class="custom-select" id="particular" disabled>
                                                <option selected>Selecione...</option>
                                                <option value="1">Sim</option>
                                                <option value="2">Não</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <button class="btn btn-secondary card-body" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                        <h5 class="mb-0 text-left font-weight-normal">    
                            Pendências internas
                        </h5>
                    </button>
                    <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordion">
                        <div class="card-body">
                            <div class="col-12">
                                <h6  style="margin-top:1rem"><i>Pendência interna</i></h6>	
                                <div class="table-responsive">
                                    <table class="table table-responsive table-stripped">
                                        <thead >
                                            <tr>
                                                <th scope="col">Funcionário</th>
                                                <th scope="col">Serviço</th>
                                                <th scope="col">
                                                    <button  onclick="busca_funcionario()"  class="btn btn-dark col-12"><i class="fa fa-plus"></i> Adicionar</button>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody id="tbody">
                                            
                                        </tbody>
                                    </table>
                                </div>
                                <div class="msg_servicos">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <button class="btn btn-secondary card-body" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                        <h5 class="mb-0 text-left font-weight-normal">    
                            Expedientes
                        </h5>
                    </button>
                    <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordion">
                        <div class="card-body">
                            <label for="comunicador">
                                <h6 style="margin-top:1rem"><i>Modelo da carta padronizada</i></h6>
                            </label>
                            <div class="row">
                                <div class="col-12">
                                    <textarea id="carta" rows="6" class="form-control"></textarea>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-12">
                                    <a href="emitirRelatorio.php" class="btn btn-dark float-right" id="btnImprimir"> 
                                        <i class="fa fa-print float-left" style="margin-top: 0.1rem; margin-right: 0.3rem"></i> 
                                        Imprimir
                                    </a>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <button class="btn btn-secondary card-body" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                        <h5 class="mb-0 text-left font-weight-normal">    
                            Comunicações
                        </h5>
                    </button>
                    <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordion">
                    <div class="card-body">
                        <h6 style="margin-top:1rem"><i>Comunicador</i></h6>
                        <div id="msg">
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="row">
                                    <div class="col-12">
                                        <table class="table" id="funcionariosComunicador" style="height: 15rem">
                                            <thead>
                                            </thead>
                                            <tbody data-link="row" id="lista_mensagens">
                                                <tr style="border: 1px solid #343A40; ">
                                                    <th style="border: 1px solid #343A40;">
                                                        <div class="alert alert-warning  float-right" style="width: 90%; position: absolute; bottom: 0.5rem;" role="alert">
                                                            <h6 class="text-right">Mensagem enviada <br>
                                                            <font size="1px" class="text-left">19/03/2018 - 10:00</font>
                                                            </h6>
                                                        </div>
                                                        <div class="alert alert-success float-left" style="width: 90%; position: absolute; bottom: 5rem;" role="alert">
                                                            <h6 class="text-left">Mensagem recebida <br>
                                                            <font size="1px" class="text-left">19/03/2018 - 10:00</font><br>
                                                            <font size="1px" class="text-left"><b>Funcionário</b></font>
                                                            </h6>
                                                        </div>
                                                    </th>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-5">
                                        <div class="form-group">
                                            <label for="comunicador">
                                                <h6 style="margin-top:1rem"><i>Funcionário</i></h6>
                                            </label>
                                            <select multiple class="form-control" id="comunicadorFuncionario">
                                            </select>
                                        </div>
                                        <div class="text-danger"></div>
                                    </div>
                                    <div class="col-7">
                                        <div class="form-group">
                                            <label for="comunicador">
                                                <h6 style="margin-top:1rem"><i>Mensagem</i></h6>
                                            </label>
                                            <textarea class="form-control" id="comunicadorMensagem" rows="2"></textarea>
                                        </div>
                                        <div class="text-danger"></div>
                                        <button class="btn btn-dark float-right" id="enviar_comunicador" onclick="envia_comunicador(this.id)"> 
                                            <i class="fa fa-share-square float-left" style="margin-top: 0.1rem; margin-right: 0.3rem"></i> 
                                                Enviar
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="linha-vertical"></div>
                            <div class="col-5">
                                <div class="col-12">
                                    <table class="table" id="funcionariosComunicador" style="height: 15rem">
                                        <thead>
                                        </thead>
                                        <tbody data-link="row" id="lista_mensagens">
                                            <tr style="border: 1px solid #343A40; ">
                                                <th style="border: 1px solid #343A40;">
                                                    <div class="alert alert-light float-left" style="width: 88%; position: absolute; bottom: 0rem;" role="alert">
                                                        <h6 class="text-left">Mensagem recebida <br>
                                                        <font size="1px" class="text-left">19/03/2018 - 10:00</font> <br>
                                                        <font size="1px" class="text-left"><b>Funcionário</b></font>
                                                        </h6>
                                                    </div>
                                                </th>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="comunicador">
                                            <h6 style="margin-top:1rem"><i>Registro interno</i></h6>
                                        </label>
                                        <textarea class="form-control" id="registro_interno" rows="2"></textarea>
                                    </div>
                                    <div class="text-danger"></div>
                                    <button class="btn btn-dark float-right" id="enviar_registro" onclick="envia_comunicador(this.id)"> 
                                        <i class="fa fa-share-square float-left" style="margin-top: 0.1rem; margin-right: 0.3rem"></i> 
                                            Enviar
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--Modal para busca-->
            <div class="modal fade" id="adicionaFuncionario" tabindex="-1" role="dialog" aria-labelledby="adicionaFuncionario" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Adicionar Funcionarios</h5> 
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
                                            <input type="text" id="pesquisa_funcionario" onkeyup="busca_funcionario()" class="form-control"  placeholder="Digite para pesquisar" name="">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12" id="lista_servicos">
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
    </body>
    <script>
    function envia(){ 
        $("#dados_servico").data("changed",true);
        if ($("#dados_servico").data("changed")) {
            $('#btnEnviar').removeAttr('disabled');
        }else {
            $('#btnEnviar').attr('disabled', 'true');
        }
    }
    
    //Função datepicker
    $( function() {
        $('#vistoria_realizada').datepicker();
        $('#autorizacao').datepicker();
        $('#entrada').datepicker();
        $('#saida').datepicker();
        $('#icomplemento').datepicker();
        $('#agendamento').datepicker();
        $('#previsao_entrega').datepicker();
        $('#entregue').datepicker();
        $('#dtRetorno').datepicker();
    });

    atualiza_tamanho();

    function atualiza_tamanho(){
        var tamanho_container = $(window).height();
        tamanho_container -= 66;
        $('.container').css("height", tamanho_container);
    }

    window.addEventListener('resize', function(){
        atualiza_tamanho();
    });

    //Função para desabilitar campos quando PT
    function verifica_pt(){
        var check_pt = document.getElementById("pt");
        if (check_pt.checked){
            $('#autorizacao').val("");
            $('#entrada').val("");
            $('#saida').val("");
            $('#icomplemento').val("");
            $('#agendamento').val("");
            $('#previsao_entrega').val("");
            $('#entregue').val("");
            $('#particular').val("");

            $('#autorizacao').attr('disabled', 'true');
            $('#entrada').attr('disabled', 'true');
            $('#saida').attr('disabled', 'true');
            $('#icomplemento').attr('disabled', 'true');
            $('#agendamento').attr('disabled', 'true');
            $('#previsao_entrega').attr('disabled', 'true');
            $('#entregue').attr('disabled', 'true');
            $('#particular').attr('disabled', 'true');
        } else {
            $('#autorizacao').removeAttr('disabled');
            $('#entrada').removeAttr('disabled');
            $('#saida').removeAttr('disabled');
            $('#icomplemento').removeAttr('disabled');
            $('#agendamento').removeAttr('disabled');
            $('#previsao_entrega').removeAttr('disabled');
            $('#entregue').removeAttr('disabled');
            $('#particular').removeAttr('disabled');
        }
    }

    //função que habilida campo de retorno
    function habilita_retorno(){
        var check_retorno = document.getElementById("retorno");
        if (check_retorno.checked){
            $('#dtRetorno').removeAttr('disabled');
        } else {
            $('#dtRetorno').attr('disabled', 'true');
        }
    }

    //Função para buscar funcionários da pendencia interna
    function busca_funcionario (){
        $('#preloader').show();
        $('#lista_servicos').val("");
        var pesquisa = $('#pesquisa_funcionario').val();
        var data = {funcao : "buscar_funcionario" , pesquisa : pesquisa };
        var html= "";
        $.ajax({
            url: '../../controller/os.php',
            method: "post",
            data: data ,
            success: function(data){
                if(data){
                    var resultado = $.parseJSON(data);
                    if(resultado.length > 0){
                        $('#adicionaFuncionario').modal('show');
                        for(var i = 0; i < resultado.length ; i++){
                            html += '<div class="input-group" style="margin-top:1rem">'+
                            '<input type="text" class="form-control" disabled placeholder="'+resultado[i].nome+'" aria-label="Recipients username" aria-describedby="basic-addon2">'+
                            '<div class="input-group-append">'+
                            '<button class="btn btn-dark" id="'+resultado[i].nome+'" onclick="adiciona_funcionario('+resultado[i].id+', this); pendencia_interna();" type="button">Adicionar</button>'+
                            '</div>'+
                            '</div>';
                        }
                        $('#lista_servicos').html(html);
                        $('#preloader').hide();
                    }else{
    
                    }
                }else{
                    $('#preloader').hide();
                }
            }
        });
    }

    //Função para adicionar funcionario a tabela
    var id_funcionarios = [];
    function adiciona_funcionario(id, nome){
        var html = "";
        var confere = true;
        for(var i = 0 ; i < id_funcionarios.length ; i++){
            if( id == id_funcionarios[i] ){
                confere = false;
            }
        }
        id_funcionarios.push(id);
        html += '<tr id="'+id+'tr">'+
                '<th style="display:none" id="'+id+'">'+id+'</th>'+
                '<th scope="col">'+nome.id+'</th>'+
                '<th scope="col">'+
                '<input id="servico_pendencia" class="form-control">'+       
                '</th>'+
                '<th scope="col">'+
                '<button class="btn btn-dark col-12" onclick="remove_funcionario('+id+');"><i class="fa fa-trash"></i> Remover</buttona>'+
                '</th>'+
            '</tr>';
        $('#tbody').append(html);
    }

    //Função para verificar acionamento de pendencias internas para desabilitar botão
    function pendencia_interna(){
        if (id_funcionarios.length > 0){
            $('#btnEnviar').removeAttr('disabled');
        }else {
            $('#btnEnviar').attr('disabled', 'true');
        }
    }

    //Função para remover funcionário da tabela
    function remove_funcionario(id){
        var nova_lista = id_funcionarios;
        id_funcionario = [];
        for(var i = 0; i < nova_lista.length ; i++ ){
            if ( nova_lista[i] != id ){
                id_funcionario.push(nova_lista[i]);
            }
        }
        $('#'+id+'tr').remove();
    }

    //Função para buscar funcionário para adicionar no select Comunicações
    function busca_funcionario_select(){
        $('#preloader').show();
        var data = {funcao : "buscar_funcionario"};
        $.ajax({
            url: '../../controller/os.php',
            method: "post",
            data: data ,
            success: function(data){
                $('#preloader').hide();
                if(data){
                    var html = '';
                    var resultado = $.parseJSON(data);
                    for(var i = 0; i < resultado.length ; i++  ){
                        html += '<option value="'+resultado[i].id+'">'+resultado[i].nome+'</option>'; 
                    }   
                    $('#comunicadorFuncionario').append(html);
                }
            }
        });
    }

    //Função para buscar dados da OS
    function busca_os(){
        $('#preloader').show();
        var data = {funcao : "buscar_os"};
        $.ajax({
            url: '../../controller/os.php',
            method: "post",
            data: data ,
            success: function(data){
                $('#preloader').hide();
                if(data){
                    var resultado = $.parseJSON(data);
                    $('#nome').attr('value', resultado.nome);
                    $('#nascimento').attr('value', resultado.data_nascimento);
                    $('#cpf').attr('value', resultado.cpf);
                    $('#rg').attr('value', resultado.rg);
                    $('#orgao_emissor').attr('value', resultado.orgao_emissor);
                    $('#email').attr('value', resultado.email);
                    $('#telefone').attr('value', resultado.telefone);
                    $('#celular').attr('value', resultado.celular);
                    $('#cep').attr('value', resultado.cep);
                    $('#endereco').attr('value', resultado.endereco);
                    $('#numero').attr('value', resultado.numero);
                    $('#complemento').attr('value', resultado.complemento);
                    $('#bairro').attr('value', resultado.bairro);
                    $('#cidade').attr('value', resultado.cidade);
                    $('#uf').attr('value', resultado.uf);
                }
            }
        });
    }

    //Função para enviar mensagem do comunicador
    function envia_comunicador(id){
        if (id == "enviar_comunicador"){
            var funcionario = $('#comunicadorFuncionario').val();
            var mensagem = $('#comunicadorMensagem').val();
            
            if ((funcionario == "selecione") || (mensagem == "")){
                $('#comunicadorMensagem').addClass("is-invalid");
                add_erro_input($('#comunicadorFuncionario') , "Os campos Funcionário e Mensagem devem ser preenchidos");
            }else if (mensagem.length <= 5){
                add_erro_input($('#comunicadorMensagem') , "A mensagem deve possuir mais de 5 caracteres");
                remove_erro_input($('#comunicadorFuncionario'));
            }else {
                remove_erro_input($('#comunicadorFuncionario'));
                remove_erro_input($('#comunicadorMensagem'));
                //enviar
            }
        }else {
            var registro_interno = $('#registro_interno').val();

            if (registro_interno == ""){
                add_erro_input($('#registro_interno') , "O campo de mensagem deve ser preenchido");
            }else if (registro_interno.length <= 5){
                add_erro_input($('#registro_interno') , "A mensagem deve possuir mais de 5 caracteres");
            }else {
                remove_erro_input($('#registro_interno'));
                //enviar
            }
        }
    }
        
    </script>
</html>