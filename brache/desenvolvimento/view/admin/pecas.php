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
        <!-- Arquivos JS -->
        <script type="text/javascript" src="../static/js/jasny-bootstrap.js"></script>
    </head>
    <body style="background-color: #F8F9FA;" >
        <div class="container" style=" background-color: #fff;">
            <h2>
                <p class="text-center" style="color: #000"><i><b>Peças</b></i></p>
            </h2>
            <hr>
            <table class="table table-secondary table-striped table-bordered table-hover" id="peças">
                <thead >
                    <tr>
                        <th class="col-12">
                            <input type="text" class="form-control" style="font-family: FontAwesome; font-size: 1.05rem" placeholder="&#xF002; Pesquise pelo nome da peça">
                        </th>
                        <th class="col-3">
                            <a href="#" class="btn btn-dark col-12" data-toggle="modal" data-target="#incluiPeça">
                                <i class="fas fa-plus" style="margin-top: 0.1rem; margin-right: 0.5rem"></i> Cadastrar peça
                            </a>
                        </th>
                    </tr>
                </thead>
                <tbody data-link="row">
                    <tr>
                        <td scope="row">Peça Peça Peça</td>
                        <td scope="row" class="text-center">
                        <a href="#" class="btn btn-dark btn-sm" title="Alterar peça">
                            <i class="fas fa-edit "></i>
                        </a>
                        <a href="#" class="btn btn-dark btn-sm" title="Remover peça">
                            <i class="fas fa-trash "></i>
                        </a>
                        </td>
                    </tr>
                    <tr>
                        <td scope="row">Peça Peça Peça</td>
                        <td scope="row" class="text-center">
                        <a href="#" class="btn btn-dark btn-sm" title="Alterar peça">
                            <i class="fas fa-edit "></i>
                        </a>
                        <a href="#" class="btn btn-dark btn-sm" title="Remover peça">
                            <i class="fas fa-trash "></i>
                        </a>
                        </td>
                    </tr>
                    <tr>
                        <td scope="row">Peça Peça Peça</td>
                        <td scope="row" class="text-center">
                        <a href="#" class="btn btn-dark btn-sm" title="Alterar peça">
                            <i class="fas fa-edit "></i>
                        </a>
                        <a href="#" class="btn btn-dark btn-sm" title="Remover peça">
                            <i class="fas fa-trash "></i>
                        </a>
                        </td>
                    </tr>
                </tbody>
            </table>
       </div>
       <!-- Modal incluir serviço -->
       <div class="modal fade" id="incluiPeça" tabindex="-1" role="dialog" aria-labelledby="adicionaServicos" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Cadastro de peças compradas</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" id="verificaCarro-body" style="overflow-y: auto">
                    <div class="row">
                            <div class="col-6">
                                <h6  style="margin-top:1rem"><i>Selecione tipo de cadastro</i></h6>
                                <div class="input-group ">
                                    <span class="input-group-addon" id="sizing-addon1"><i class="fas fa-calendar"></i></span>
                                    <select id="tipo_cadastro" class="form-control" onchange="tipo_cadstro()">
                                        <option value="compras">Peças compradas</option>
                                        <option value="estoque">Peças em estoque</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4" id="notafiscal">
                                <h6  style="margin-top:1rem"><i>NF-e</i></h6>
                                <div class="input-group ">
                                    <span class="input-group-addon" id="sizing-addon1"><i class="fas fa-sticky-note"></i></span>
                                    <input type="text" id="nota_fiscal" class="form-control"  placeholder="Ex.: 123456" name="">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6" id="fornecedor">
                                <h6  style="margin-top:1rem"><i>Fornecedor</i></h6>
                                <div class="input-group ">
                                    <span class="input-group-addon" id="sizing-addon1"><i class="fab fa-product-hunt"></i></span>
                                    <select id="fornecedor_select" class="form-control">
                                        <option>Selecione...</option>
                                        <option id="brasal_volkswagen">Brasal Volkswagen</option>
                                        <option id="estacao_fiat">Estação Fiat</option>
                                        <option id="saga_volkswagen">Saga Volkswagen</option>
                                        <option id="premier_renault">Premier Renault</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <h6  style="margin-top:1rem"><i>Peça</i></h6>
                                <div class="input-group ">
                                    <span class="input-group-addon" id="sizing-addon1"><i class="fas fa-car"></i></span>
                                    <input type="text" id="peça" class="form-control" placeholder="Ex.: Para choque" name="">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <h6  style="margin-top:1rem"><i>Veículo</i></h6>
                                <div class="input-group ">
                                    <span class="input-group-addon" id="sizing-addon1"><i class="fas fa-car"></i></span>
                                    <input type="text" id="descricao_veiculo" class="form-control" placeholder="Ex.: Uno 2013" name="">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <h6  style="margin-top:1rem"><i>Valor unitário</i></h6>
                                <div class="input-group ">
                                    <span class="input-group-addon" id="sizing-addon1"><i class="fas fa-dollar-sign"></i></span>
                                    <input type="number" id="valor_unit" class="form-control" placeholder="Ex.: 10,00" name="">
                                </div>
                            </div>
                            <div class="col-4">
                                <h6  style="margin-top:1rem"><i>Quantidade</i></h6>
                                <div class="input-group ">
                                    <span class="input-group-addon" id="sizing-addon1"><i class="fas fa-info-circle"></i></span>
                                    <input type="number" id="quantidade" class="form-control" placeholder="Ex.: 2" name="">
                                </div>
                            </div>
                            <div class="col-4">
                                <h6  style="margin-top:1rem"><i>Valor total</i></h6>
                                <div class="input-group ">
                                    <span class="input-group-addon" id="sizing-addon1"><i class="fas fa-dollar-sign"></i></span>
                                    <input type="number" id="valor_total" class="form-control" disabled placeholder="Valor unitário * quantidade" name="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-dark btn-block">
                        <i class="fa fa-check float-left" style="margin-top: 0.3rem;"></i> Salvar
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </body>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script type="text/javascript" src="../static/js/popper.js"></script>
    <script type="text/javascript" src="../static/js/bootstrap.js"></script>
    <script>
        function tipo_cadstro(){
            var tipo_selecionado = $('#tipo_cadastro').val();

            //limpa campos do formulario
            $('#nota_fiscal').val("");
            $('#fornecedor').val("");
            $('#peça').val("");
            $('#descricao_veiculo').val("");
            $('#valor_unit').val("");
            $('#quantidade').val("");
            $('#valor_total').val("");

            if (tipo_selecionado == "estoque"){
                $('#fornecedor').hide();
                $('#notafiscal').hide();
            } else {
                $('#fornecedor').show();
                $('#notafiscal').show();
            }
        }
    </script>
    
</html>