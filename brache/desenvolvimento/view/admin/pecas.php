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
        <link href="../static/css/bootstrap-datepicker.css" rel="stylesheet">
        <!-- Arquivos JS -->
        <script type="text/javascript" src="../static/js/jasny-bootstrap.js"></script>
    </head>
    <body style="background-color: #F8F9FA;" >
        <div class="container" id="container" style=" background-color: #fff;">
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
                            <a href="#" class="btn btn-dark col-12" data-toggle="modal" data-target="#incluiPeca">
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
       <!-- Modal incluir peça -->
       <div class="modal fade" id="incluiPeca" tabindex="-1" role="dialog" aria-labelledby="adicionaPecas" aria-hidden="true">
            <div class="modal-dialog modal-lg" id="modal_pecas" role="document" style="max-width: 1200px;">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Cadastro de peças</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" id="adicionaPeca-body" style="overflow-y: auto">
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
                            <div class="col-4" id="data_c">
                                <h6  style="margin-top:1rem"><i>Data da compra</i></h6>
                                <div class="input-group ">
                                    <span class="input-group-addon" id="sizing-addon1"><i class="fas fa-calendar"></i></span>
                                    <input type="text" id="data_compra" class="form-control"  placeholder="Ex.: 99/99/9999" name="">
                                </div>
                            </div>
                            <div class="col-4" id="fornecedor">
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
                            <div class="col-4" style="display: none" id="peca">
                                <h6  style="margin-top:1rem"><i>Peça</i></h6>
                                <div class="input-group ">
                                    <span class="input-group-addon" id="sizing-addon1"><i class="fab fa-product-hunt"></i></span>
                                    <input type="text" id="nome_peca" class="form-control"  placeholder="Ex.: Para choque" name="">
                                </div>
                            </div>
                            <div class="col-6" style="display: none" id="desc_veiculo">
                                <h6  style="margin-top:1rem"><i>Veículo</i></h6>
                                <div class="input-group ">
                                    <span class="input-group-addon" id="sizing-addon1"><i class="fas fa-car"></i></span>
                                    <input type="text" id="veículo" class="form-control"  placeholder="Ex.: Gol 2010/2011" name="">
                                </div>
                            </div>
                            <div class="col-4" id="total_notafiscal">
                                <h6  style="margin-top:1rem"><i>Total da nota</i></h6>
                                <div class="input-group ">
                                    <span class="input-group-addon" id="sizing-addon1"><i class="fas fa-calendar"></i></span>
                                    <input type="text" disabled id="total_nota" class="form-control"  value="520.00">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3" style="display: none" id="qtde_peca">
                                <h6  style="margin-top:1rem"><i>Quantidade</i></h6>
                                <div class="input-group ">
                                    <span class="input-group-addon" id="sizing-addon1"><i class="fas fa-sort-numeric-up"></i></span>
                                    <input type="text" id="quantidade_peca" class="form-control"  placeholder="Ex.: 3" name="">
                                </div>
                            </div>
                        </div>
                        <br>
                        <table class="table table-secondary table-striped table-bordered table-hover" id="peças_table">
                            <thead >
                                <tr>
                                    <th scope="col" class="text-center">Peças</th>
                                    <th scope="col" class="text-center">Veículo</th>
                                    <th scope="col" class="text-center">Valor Unitário</th>
                                    <th scope="col" class="text-center">Qtde.</th>
                                    <th scope="col" class="text-center">Valor Total</th>
                                    <th scope="col">
                                    <a href="#" class="btn btn-dark col-12" data-toggle="modal" data-target="#adicionaPeca">
                                        <i class="fas fa-plus" style="margin-top: 0.1rem; margin-right: 0.5rem"></i> Adicionar peça
                                    </a>
                                    </th>
                                </tr>
                            </thead>
                            <tbody data-link="row">
                                <tr>
                                    <th scope="col">Peça Peça Peça</th>
                                    <th scope="col">Gol</th>
                                    <th scope="col">
                                        <input type="text" class="form-control" placeholder="Ex.: 10.00">
                                    </th>
                                    <th scope="col">
                                        <input type="text" class="form-control" placeholder="Ex.: 2">
                                    </th>
                                    <th scope="col">
                                        <input type="text" class="form-control" placeholder="Ex.: 20.00">
                                    </th>
                                    <th scope="col" class="text-center">
                                        <a href="#" class="btn btn-dark btn-sm" title="Alterar peça">
                                            <i class="fas fa-edit "></i>
                                        </a>
                                        <a href="#" class="btn btn-dark btn-sm" title="Remover peça">
                                            <i class="fas fa-trash "></i>
                                        </a>
                                    </th>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-dark btn-block">
                            <i class="fa fa-check float-left" style="margin-top: 0.3rem;"></i> Salvar
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal adicona peça -->
       <div class="modal fade" id="adicionaPeca" tabindex="-1" role="dialog" aria-labelledby="incluiPecas" aria-hidden="true">
            <div class="modal-dialog modal-lg" id="modal_inclui_pecas" role="document" style="max-width: 800px; margin-top: 7%;">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Incluir peças</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" id="inclusao_pecas" style="overflow-y: auto">
                        <table class="table table-secondary table-striped table-bordered table-hover" id="peças_table">
                            <thead >
                                <tr>
                                    <th scope="col" class="text-center">
                                        <input type="text" id="nome_peca" class="form-control" style="font-family: FontAwesome; font-size: 1.05rem" placeholder="&#xF002; Pesquise pelo nome da peça"> 
                                    </th>
                                    <th scope="col" class="text-center">
                                    <input type="text" id="descvricao_veiculo" class="form-control" style="font-family: FontAwesome; font-size: 1.05rem" placeholder="&#xF002; Pesquise pelo nome do veículo">
                                    </th>
                                    <th scope="col" class="text-center">Ação</th>
                                </tr>
                            </thead>
                            <tbody data-link="row">
                                <tr>
                                    <th scope="col">Peça Peça Peça</th>
                                    <th scope="col">Gol</th>
                                    <th scope="col" class="text-center">
                                        <a href="#" class="btn btn-dark btn-sm">
                                            <i class="fas fa-plus"></i> Adicionar
                                        </a>
                                    </th>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                    </div>
                </div>
            </div>
        </div>
    </body>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="../static/js/popper.js"></script>
    <script src="../static/js/bootstrap.js"></script>
    <script src="../static/js/bootstrap-datepicker.js"></script>
	<script src="../static/js/bootstrap-datepicker.pt-BR.min.js"></script>	
    <script>
        $('#data_compra').datepicker({
            format: 'dd/mm/yyyy',
            language : 'pt-BR'
        });
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
                $('#data_c').hide();
                $('#notafiscal').hide();
                $('#total_notafiscal').hide();
                $('#peças_table').hide();
                $('#qtde_peca').show();
                $('#desc_veiculo').show();
                $('#peca').show();
                document.getElementById("modal_pecas").style.maxWidth = "800px";
                $('#adicionaPeca-body').css("height", "300px");
            } else {
                $('#fornecedor').show();
                $('#data_c').show();
                $('#notafiscal').show();
                $('#peças_table').show();
                $('#total_notafiscal').show();
                $('#qtde_peca').hide();
                $('#desc_veiculo').hide();
                $('#peca').hide();
                document.getElementById("modal_pecas").style.maxWidth = "1200px";
                //Ajusta tamanho da modal
                atualiza_tamanho();
                function atualiza_tamanho(){
                    var tamanho_container = $(window).height();
                    var tamanho_body_modal = $(window).height();
                    tamanho_body_modal -= 200;
                    tamanho_container -= 66;
                    $('#container').css("height", tamanho_container);
                    $('#adicionaPeca-body').css("height", tamanho_body_modal);
                }
                window.addEventListener('resize', function(){
                    atualiza_tamanho();
                });
            }
        }
        
        document.getElementById("inclusao_pecas").style.maxHeight = "300px";
    </script>
    
</html>