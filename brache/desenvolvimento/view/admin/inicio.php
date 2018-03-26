<?php
include 'menu.php';
?>
<!DOCTYPE html>
<html lang="pt-br" >
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Portal da Oficina</title>

        <!-- Arquivos CSS -->
        <link href="../static/css/jasny-bootstrap.css" rel="stylesheet">
        <link  href="../static/css/fontawesome-all.min.css" rel="stylesheet">
        <!-- Arquivos JS -->
        <script type="text/javascript" src="../static/js/jasny-bootstrap.js"></script>
    </head>
    <body  id="body" style="background-color: #F8F9FA" onload="busca_os()">
        <div class="container" style="background-color: #fff;">
            <h2>
                <p class="text-center" style="color: #000"><i><b>Consulta de Veículos</b></i></p>
            </h2>
            <hr>
            <div class="row">
                <div class="col-3">
                    <h6 ><i>Placa/Sinistro/Nome/Carro</i></h6>
                    <div class="input-group">
                        <input type="text" id="pesquisa" class="form-control" placeholder="Placa/Sinistro/Nome/Carro" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                </div>

                <div class="col-2">
                    <h6 ><i>Data Início</i></h6>
                    <div class="input-group ">
                        <span class="input-group-addon" id="sizing-addon1"><i class="fas fa-calendar"></i></span>
                        <input type="text" id="data_inicio" class="form-control" data-mask="99/99/9999"  placeholder="99/99/9999" name="">
                    </div> 
                </div>
                <div class="col-2">
                    <h6 ><i>Data Fim</i></h6>
                    <div class="input-group ">
                        <span class="input-group-addon" id="sizing-addon1"><i class="fas fa-calendar"></i></span>
                        <input type="text" id="data_fim" class="form-control" data-mask="99/99/9999"  placeholder="99/99/9999" name="">
                    </div>
                </div>
                <div class="col-2">
                    <h6 ><i>Corretor</i></h6>
                    <div class="input-group">
                        <select class="form-control" id="corretor">
                            <option value="">Selecione..</option>
                        </select>
                    </div>
                </div>
                <div class="col-3">
                    <h6 ><i>Seguradora</i></h6>
                    <div class="input-group">
                        <select class="form-control" id="seguradora">
                            <option value="">Selecione...</option>
                        </select>
                        <div class="input-group-append">
                            <button class="btn btn-dark" id="buscar_os" onclick="busca_os()" type="button">
                                <i class="fas fa-search float-left" style="margin-top: 0.1rem;"></i> Buscar
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="div-veiculos" id="container" style="width: 100%; overflow-x: auto; background-color: #fff;">
                <div class="row" id="row" style="overflow: auto;  width: 141rem;">
                    <div class="" style="padding-right: 0; padding-left: 15px;">
                    <table class="table table-dark table-bordered table-striped table-hover" id="desmontagem">
                            <thead>
                                <tr>
                                    <th colspan="2" scope="col" class="text-center">Registro</th>
                                </tr>
                            </thead>
                            <tbody data-link="row" class="rowlink" id="tbody_registro">
                                <!--
                                <tr>
                                    <td scope="row" class="text-center"><b><a href="#" data-toggle="modal" data-target="#verificaCarro">ABC-1234</a></b></td>
                                </tr>
                                -->
                            </tbody>
                        </table>
                    </div>
                    <div class="" style="padding-right: 0; padding-left: 0;">
                        <table class="table table-dark table-bordered table-striped table-hover" id="lanternagem">
                            <thead>
                                <tr>
                                    <th scope="col" class="text-center">Entrada</th>
                                </tr>
                            </thead>
                            <tbody data-link="row" class="rowlink" id="tbody_entrada">
                                
                            </tbody>
                        </table>
                    </div>
                    <div class="" style="padding-right: 0; padding-left: 0;">
                        <table class="table table-dark table-bordered table-striped table-hover" id="lanternagem">
                            <thead>
                                <tr>
                                    <th scope="col" class="text-center">Autorizado com cliente</th>
                                </tr>
                            </thead>
                            <tbody data-link="row" class="rowlink" id="tbody_autorizado_cliente">
                                
                            </tbody>
                        </table>
                    </div>
                    <div class="" style="padding-right: 0; padding-left: 0;">
                        <table class="table table-dark table-bordered table-striped table-hover" id="pintura">
                            <thead>
                                <tr>
                                    <th scope="col" class="text-center">Autorizado na oficina</th>
                                </tr>
                            </thead>
                            <tbody data-link="row" class="rowlink" id="tbody_autorizado_oficina">
                                
                            </tbody>
                        </table>
                    </div>
                    <div class="" style="padding-right: 0; padding-left: 0;">
                        <table class="table table-dark table-bordered table-striped table-hover" id="finalizacao">
                            <thead>
                                <tr>
                                    <th scope="col" class="text-center">Pendência peças</th>
                                </tr>
                            </thead>
                            <tbody data-link="row" class="rowlink" id="tbody_pendencia_pecas">
                                
                            </tbody>
                        </table>
                    </div>
                    <div class="" style="padding-right: 0; padding-left: 0;">
                        <table class="table table-dark table-bordered table-striped table-hover" id="entregue">
                            <thead>
                                <tr>
                                    <th scope="col" class="text-center">Agendamento</th>
                                </tr>
                            </thead>
                            <tbody data-link="row" class="rowlink" id="tbody_agendamento">
                                
                            </tbody>
                        </table>
                    </div>
                    <div class="" style="padding-right: 0; padding-left: 0;">
                        <table class="table table-dark table-bordered table-striped table-hover" id="entregue">
                            <thead>
                                <tr>
                                    <th scope="col" class="text-center">Entrada</th>
                                </tr>
                            </thead>
                            <tbody data-link="row" class="rowlink" id="tbody_entrada">
                                
                            </tbody>
                        </table>
                    </div>
                    <div class="" style="padding-right: 0; padding-left: 0;">
                        <table class="table table-dark table-bordered table-striped table-hover" id="entregue">
                            <thead>
                                <tr>
                                    <th scope="col" class="text-center">Fazer OS</th>
                                </tr>
                            </thead>
                            <tbody data-link="row" class="rowlink" id="tbody_fazer_os">
                                
                            </tbody>
                        </table>
                    </div>
                    <div class="" style="padding-right: 0; padding-left: 0;">
                        <table class="table table-dark table-bordered table-striped table-hover" id="entregue">
                            <thead>
                                <tr>
                                    <th scope="col" class="text-center">Triagem</th>
                                </tr>
                            </thead>
                            <tbody data-link="row" class="rowlink" id="tbody_triagem">
                                
                            </tbody>
                        </table>
                    </div>
                    <div class="" style="padding-right: 0; padding-left: 0;">
                        <table class="table table-dark table-bordered table-striped table-hover" id="entregue">
                            <thead>
                                <tr>
                                    <th scope="col" class="text-center">Particular</th>
                                </tr>
                            </thead>
                            <tbody data-link="row" class="rowlink" id="tbody_particular">
                                
                            </tbody>
                        </table>
                    </div>
                    <div class="" style="padding-right: 0; padding-left: 0;">
                        <table class="table table-dark table-bordered table-striped table-hover" id="entregue">
                            <thead>
                                <tr>
                                    <th scope="col" class="text-center">Serviço</th>
                                </tr>
                            </thead>
                            <tbody data-link="row" class="rowlink" id="tbody_servico">
                                
                            </tbody>
                        </table>
                    </div>
                    <div class="" style="padding-right: 0; padding-left: 0;">
                        <table class="table table-dark table-bordered table-striped table-hover" id="entregue">
                            <thead>
                                <tr>
                                    <th scope="col" class="text-center">Pendência Interna</th>
                                </tr>
                            </thead>
                            <tbody data-link="row" class="rowlink" id="tbody_pendencia_interna">
                                
                            </tbody>
                        </table>
                    </div>
                    <div class="" style="padding-right: 0; padding-left: 0;">
                        <table class="table table-dark table-bordered table-striped table-hover" id="entregue">
                            <thead>
                                <tr>
                                    <th scope="col" class="text-center">Previsão entrega</th>
                                </tr>
                            </thead>
                            <tbody data-link="row" class="rowlink" id="tbody_previsao_entrega">
                                
                            </tbody>
                        </table>
                    </div>
                    <div class="" style="padding-right: 0; padding-left: 0;">
                        <table class="table table-dark table-bordered table-striped table-hover" id="entregue">
                            <thead>
                                <tr>
                                    <th scope="col" class="text-center">Saída</th>
                                </tr>
                            </thead>
                            <tbody data-link="row" class="rowlink" id="tbody_saida">
                                
                            </tbody>
                        </table>
                    </div>
                    <div class="" style="padding-right: 0; padding-left: 0;">
                        <table class="table table-dark table-bordered table-striped table-hover" id="entregue">
                            <thead>
                                <tr>
                                    <th scope="col" class="text-center">T.C</th>
                                </tr>
                            </thead>
                            <tbody data-link="row" class="rowlink" id="tbody_tc">
                                
                            </tbody>
                        </table>
                    </div>
                    <div class="" style="padding-right: 0; padding-left: 0;">
                        <table class="table table-dark table-bordered table-striped table-hover" id="entregue">
                            <thead>
                                <tr>
                                    <th scope="col" class="text-center">I.I</th>
                                </tr>
                            </thead>
                            <tbody data-link="row" class="rowlink" id="tbody_ii">
                                
                            </tbody>
                        </table>
                    </div>
                    <div class="" style="padding-right: 0; padding-left: 0;">
                        <table class="table table-dark table-bordered table-striped table-hover" id="entregue">
                            <thead>
                                <tr>
                                    <th scope="col" class="text-center">Retorno</th>
                                </tr>
                            </thead>
                            <tbody data-link="row" class="rowlink" id="tbody_retorno">
                                
                            </tbody>
                        </table>
                    </div>
                    <div class="" style="padding-right: 0; padding-left: 0;">
                        <table class="table table-dark table-bordered table-striped table-hover" id="entregue">
                            <thead>
                                <tr>
                                    <th scope="col" class="text-center">Conferência</th>
                                </tr>
                            </thead>
                            <tbody data-link="row" class="rowlink" id="tbody_conferencia">
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal ver mais -->
        <div class="modal fade" id="verificaCarro" tabindex="-1" role="dialog" aria-labelledby="adicionaServicos" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Informações do veículo</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" id="verificaCarro-body" style="overflow-y: auto">
                        <div class="row">
                            <div class="col-8">
                                <h6  style="margin-top:1rem"><i>Veículo</i></h6>
                                <div class="input-group ">
                                    <span class="input-group-addon" id="sizing-addon1"><i class="fas fa-car"></i></span>
                                    <input type="text" id="veiculo" class="form-control" disabled  placeholder="Honda Civic - Preto" name="">
                                </div>
                            </div>
                            <div class="col-4">
                                <h6  style="margin-top:1rem"><i>Data de liberação</i></h6>
                                <div class="input-group ">
                                    <span class="input-group-addon" id="sizing-addon1"><i class="fas fa-calendar"></i></span>
                                    <input type="text" id="data_liberacao" class="form-control" disabled  placeholder="10/01/2018" name="">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-5">
                                <h6  style="margin-top:1rem"><i>Placa</i></h6>
                                <div class="input-group ">
                                    <span class="input-group-addon" id="sizing-addon1"><i class="fas fa-car"></i></span>
                                    <input type="text" id="placa" class="form-control" disabled  placeholder="ABC-1234" name="">
                                </div>
                            </div>
                            <div class="col-7">
                                <h6  style="margin-top:1rem"><i>Sinistro</i></h6>
                                <div class="input-group ">
                                    <span class="input-group-addon" id="sizing-addon1"><i class="fas fa-info-circle"></i></span>
                                    <input type="text" id="sinistro" class="form-control" disabled  placeholder="123456" name="">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <h6  style="margin-top:1rem"><i>Nome</i></h6>
                                <div class="input-group ">
                                    <span class="input-group-addon" id="sizing-addon1"><i class="fas fa-user"></i></span>
                                    <input type="text" id="nome" class="form-control" disabled  placeholder="Nome do cliente" name="">
                                </div>
                            </div>
                            <div class="col-6">
                                <h6  style="margin-top:1rem"><i>Telefone</i></h6>
                                <div class="input-group ">
                                    <span class="input-group-addon" id="sizing-addon1"><i class="fas fa-phone"></i></span>
                                    <input type="text" id="telefone" class="form-control" disabled  placeholder="(61) 99999-9999" name="">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <h6  style="margin-top:1rem"><i>E-mail</i></h6>
                                <div class="input-group ">
                                    <span class="input-group-addon" id="sizing-addon1"><i class="fas fa-envelope"></i></span>
                                    <input type="text" id="email" class="form-control" disabled  placeholder="email@email.com" name="">
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-12">
                                <table class="table table-dark table-bordered" id="entregue">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Serviço</th>
                                            <th scope="col" class="text-center">Data Inicio</th>
                                            <th scope="col" class="text-center">Executante</th>
                                            <th scope="col" class="text-center">Data Fim</th>
                                        </tr>
                                    </thead>
                                    <tbody data-link="row">
                                        <tr>
                                            <td scope="row" class="text-center">Desmontagem</td>
                                            <td scope="row" class="text-center">10/01/2018</td>
                                            <td scope="row" class="text-center">Nome Nome Nome</td>
                                            <td scope="row" class="text-center">11/01/2018</td>
                                        </tr>
                                        <tr>
                                            <td scope="row" class="text-center">Desmontagem</td>
                                            <td scope="row" class="text-center">10/01/2018</td>
                                            <td scope="row" class="text-center">Nome Nome Nome</td>
                                            <td scope="row" class="text-center">11/01/2018</td>
                                        </tr>
                                        <tr>
                                            <td scope="row" class="text-center">Desmontagem</td>
                                            <td scope="row" class="text-center">10/01/2018</td>
                                            <td scope="row" class="text-center">Nome Nome Nome</td>
                                            <td scope="row" class="text-center">11/01/2018</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="os.php" class="btn btn-dark btn-block">Ver ordem de servoço completa</a>
                    </div>
                </div>
            </div>
        </div>
    </body>
    <script>
    
        atualiza_tamanho();
        busca_seguradoras();
        busca_corretores();

        //Função datepicker
        $( function() {
            $('#data_inicio').datepicker();
            $('#data_fim').datepicker();
        });
        
        function atualiza_tamanho(){
            var tamanho_container = $(window).height();
            var tamanho_row = $(window).height();
            var tamanho_body_modal = $(window).height();
            tamanho_container -= 255;
            tamanho_row -= 275;
            tamanho_body_modal -= 200;
            $('#container').css("height", tamanho_container);
            $('#row').css("height", tamanho_row);
            $('#verificaCarro-body').css("height", tamanho_body_modal);
        }
        
        window.addEventListener('resize', function(){
            atualiza_tamanho();
        });


    function busca_corretores(){
        var data = {funcao: 'busca_corretores'};
        var html ;
        $.ajax({
            url: '../../controller/cadastro.php',
            method: "post",
            data: data ,
            success: function(data){
                if(data){
                    var retorno = $.parseJSON(data);
                    html = "";
                    html += '<option value="">Selecione...</option>';
                    for(var i=0; i < retorno.length ; i++ ){
                        if(retorno[i].nome != null){
                            html += '<option value="'+retorno[i].id+'">'+retorno[i].nome+ '</option>';
                        }else{
                            html += '<option value="'+retorno[i].id+'">'+retorno[i].nome_fantasia+ '</option>';
                        }
                    }

                    $('#corretor').html(html);
                }
            }
        });
    }

    

    function busca_seguradoras(){
        var data = {funcao: 'busca_seguradoras'};
        var html ;
        $.ajax({
            url: '../../controller/cadastro.php',
            method: "post",
            data: data ,
            success: function(data){
                if(data){
                    var retorno = $.parseJSON(data);

                    html = "";
                    html += '<option value="">Selecione...</option>';
                    for(var i=0; i < retorno.length ; i++ ){
                        if(retorno[i].nome != null){
                            html += '<option value="'+retorno[i].id+'">'+retorno[i].nome+ '</option>';
                        }else{
                            html += '<option value="'+retorno[i].id+'">'+retorno[i].nome_fantasia+ '</option>';
                        }
                    }

                    $('#seguradora').html(html);
                }
            }
        });
    }

    function busca_os(){ 
        var corretor = $('#corretor').val();
        var seguradora = $('#seguradora').val();
        var pesquisa = $('#pesquisa').val();
        var data_inicio = $('#data_inicio').val();
        var data_fim = $('#data_fim').val();

        var data = {funcao: 'busca_os' , corretor : corretor , seguradora : seguradora , pesquisa : pesquisa , data_inicio : data_inicio , data_fim : data_fim };
        var html ;
        $.ajax({
            url: '../../controller/os.php',
            method: "post",
            data: data ,
            success: function(data){
                if(data){
                    var retorno = $.parseJSON(data);
                    if(retorno.length > 0 ){

                        var html_registro = "";
                        var html_autorizado_cliente = "";
                        var html_autorizado_oficina = "";
                        var html_pendencia_pecas = "";
                        var html_agendamento = "";
                        var html_entrada = "";
                        var html_fazer_os = "";
                        var html_triagem = "";
                        var html_particular = "";
                        var html_pendencia_interna = "";
                        var html_previsao_entrega = "";
                        var html_saida = "";
                        var html_tc = "";
                        var html_ii = "";
                        var html_retorno = "";
                        var html_conferencia = "";
                        var html_servico = "";

                        for(var i = 0 ; i <retorno.length ; i++ ){

                            if(retorno[i].perda_total == 1 ){
                                html_ii += '<tr>'+
                                    '<td>'+ retorno[i].modelo + ' - ' + retorno[i].placa + '</td>'+
                                    '</tr>';
                            }else if (retorno[i].data_entrada != null && retorno[i].data_autorizacao != null  ){
                                html_fazer_os += '<tr>'+
                                    '<td>'+ retorno[i].modelo + ' - ' + retorno[i].placa + '</td>'+
                                    '</tr>';
                                html_triagem += '<tr>'+
                                    '<td>'+ retorno[i].modelo + ' - ' + retorno[i].placa + '</td>'+
                                    '</tr>';
                                html_servico += '<tr>'+
                                    '<td>'+ retorno[i].modelo + ' - ' + retorno[i].placa + '</td>'+
                                    '</tr>';
                            }else if(retorno[i].data_saida != null ){
                                html_saida += '<tr>'+
                                    '<td>'+ retorno[i].modelo + ' - ' + retorno[i].placa + '</td>'+
                                    '</tr>';
                            }else if(retorno[i].data_agendamento != null){
                                html_agendamento += '<tr>'+
                                    '<td>'+ retorno[i].modelo + ' - ' + retorno[i].placa + '</td>'+
                                    '</tr>';
                            }else if(retorno[i].data_previsao_entrega != null){
                                html_previsao_entrega += '<tr>'+
                                    '<td>'+ retorno[i].modelo + ' - ' + retorno[i].placa + '</td>'+
                                    '</tr>';
                            }else if(retorno[i].data_retorno != null){
                                html_retorno += '<tr>'+
                                    '<td>'+ retorno[i].modelo + ' - ' + retorno[i].placa + '</td>'+
                                    '</tr>';
                                html_autorizado_oficina += '<tr>'+
                                    '<td>'+ retorno[i].modelo + ' - ' + retorno[i].placa + '</td>'+
                                    '</tr>';
                                html_pendencia_pecas += '<tr>'+
                                    '<td>'+ retorno[i].modelo + ' - ' + retorno[i].placa + '</td>'+
                                    '</tr>';
                                html_triagem += '<tr>'+
                                    '<td>'+ retorno[i].modelo + ' - ' + retorno[i].placa + '</td>'+
                                    '</tr>';
                                html_entrada += '<tr>'+
                                    '<td>'+ retorno[i].modelo + ' - ' + retorno[i].placa + '</td>'+
                                    '</tr>';
                                html_servico += '<tr>'+
                                    '<td>'+ retorno[i].modelo + ' - ' + retorno[i].placa + '</td>'+
                                    '</tr>';
                            }else{

                                if(retorno[i].data_vistoria_realizada != null){
                                    html_registro += '<tr>'+
                                            '<td>'+ retorno[i].modelo + ' - ' + retorno[i].placa + '</td>'+
                                            '</tr>';
                                }else if(retorno[i].data_autorizacao != null ){

                                        if(retorno[i].data_entrada != null){
                                            html_autorizado_cliente += '<tr>'+
                                            '<td>'+ retorno[i].modelo + ' - ' + retorno[i].placa + '</td>'+
                                            '</tr>';
                                        }else{
                                            html_autorizado_oficina += '<tr>'+
                                            '<td>'+ retorno[i].modelo + ' - ' + retorno[i].placa + '</td>'+
                                            '</tr>';
                                        }

                                         html_pendencia_pecas += '<tr>'+
                                            '<td>'+ retorno[i].modelo + ' - ' + retorno[i].placa + '</td>'+
                                            '</tr>';
                                }else{
                                    html_entrada += '<tr>'+
                                        '<td>'+ retorno[i].modelo + ' - ' + retorno[i].placa + '</td>'+
                                        '</tr>'; 
                                } 
                            }

                            if(retorno[i].particular == 1){

                                if(retorno[i].perda_total == 1 ){
                                    html_ii += '<tr>'+
                                        '<td>'+ retorno[i].modelo + ' - ' + retorno[i].placa + '</td>'+
                                        '</tr>';
                                }else if (retorno[i].data_entrada != null && retorno[i].data_autorizacao != null  ){
                                    html_fazer_os += '<tr>'+
                                        '<td>'+ retorno[i].modelo + ' - ' + retorno[i].placa + '</td>'+
                                        '</tr>';
                                    html_triagem += '<tr>'+
                                        '<td>'+ retorno[i].modelo + ' - ' + retorno[i].placa + '</td>'+
                                        '</tr>';
                                    html_servico += '<tr>'+
                                        '<td>'+ retorno[i].modelo + ' - ' + retorno[i].placa + '</td>'+
                                        '</tr>';
                                }else if(retorno[i].data_saida != null ){
                                    html_saida += '<tr>'+
                                        '<td>'+ retorno[i].modelo + ' - ' + retorno[i].placa + '</td>'+
                                        '</tr>';
                                }else if(retorno[i].data_agendamento != null){
                                    html_agendamento += '<tr>'+
                                        '<td>'+ retorno[i].modelo + ' - ' + retorno[i].placa + '</td>'+
                                        '</tr>';
                                }else if(retorno[i].data_previsao_entrega != null){
                                    html_previsao_entrega += '<tr>'+
                                        '<td>'+ retorno[i].modelo + ' - ' + retorno[i].placa + '</td>'+
                                        '</tr>';
                                }else if(retorno[i].data_retorno != null){
                                    html_retorno += '<tr>'+
                                        '<td>'+ retorno[i].modelo + ' - ' + retorno[i].placa + '</td>'+
                                        '</tr>';
                                    html_autorizado_oficina += '<tr>'+
                                        '<td>'+ retorno[i].modelo + ' - ' + retorno[i].placa + '</td>'+
                                        '</tr>';
                                    html_pendencia_pecas += '<tr>'+
                                        '<td>'+ retorno[i].modelo + ' - ' + retorno[i].placa + '</td>'+
                                        '</tr>';
                                    html_triagem += '<tr>'+
                                        '<td>'+ retorno[i].modelo + ' - ' + retorno[i].placa + '</td>'+
                                        '</tr>';
                                    html_entrada += '<tr>'+
                                        '<td>'+ retorno[i].modelo + ' - ' + retorno[i].placa + '</td>'+
                                        '</tr>';
                                    html_servico += '<tr>'+
                                        '<td>'+ retorno[i].modelo + ' - ' + retorno[i].placa + '</td>'+
                                        '</tr>';
                                }else{

                                    if(retorno[i].data_vistoria_realizada != null){
                                        html_registro += '<tr>'+
                                                '<td>'+ retorno[i].modelo + ' - ' + retorno[i].placa + '</td>'+
                                                '</tr>';
                                    }else if(retorno[i].data_autorizacao != null ){

                                            if(retorno[i].data_entrada != null){
                                                html_autorizado_cliente += '<tr>'+
                                                '<td>'+ retorno[i].modelo + ' - ' + retorno[i].placa + '</td>'+
                                                '</tr>';
                                            }else{
                                                html_autorizado_oficina += '<tr>'+
                                                '<td>'+ retorno[i].modelo + ' - ' + retorno[i].placa + '</td>'+
                                                '</tr>';
                                            }

                                            html_pendencia_pecas += '<tr>'+
                                                '<td>'+ retorno[i].modelo + ' - ' + retorno[i].placa + '</td>'+
                                                '</tr>';
                                    }
                                }
                            }
                        
                        }

                        $('#tbody_autorizado_cliente').html(html_autorizado_cliente);
                        $('#tbody_autorizado_oficina').html(html_autorizado_oficina);
                        $('#tbody_pendencia_pecas').html(html_pendencia_pecas);
                        $('#tbody_agendamento').html(html_agendamento);
                        $('#tbody_triagem').html(html_triagem);
                        $('#tbody_particular').html(html_particular);
                        $('#tbody_pendencia_interna').html(html_pendencia_interna);
                        $('#tbody_previsao_entrega').html(html_previsao_entrega);
                        $('#tbody_saida').html(html_saida);
                        $('#tbody_tc').html(html_tc);
                        $('#tbody_conferencia').html(html_conferencia);
                        $('#tbody_servico').html(html_servico);
                        $('#tbody_fazer_os').html(html_fazer_os);
                        $('#tbody_retorno').html(html_retorno);
                        $('#tbody_registro').html(html_registro);
                        $('#tbody_entrada').html(html_entrada);
                        $('#tbody_ii').html(html_ii);
                    }
                }
            }
        });
    }


    </script>
</html>