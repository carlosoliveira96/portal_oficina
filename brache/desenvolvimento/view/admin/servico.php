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
    <body style="background-color: #F8F9FA;" onload="busca_servico()">
        <div class="container" style=" background-color: #fff;">
            <h2>
                <p class="text-center" style="color: #000"><i><b>Serviços</b></i></p>
            </h2>
            <hr>
            <table class="table table-secondary table-bordered table-striped table-hover" id="servico">
                <thead>
                    <tr>
                        <th class="col-12" style="width: 90%; font-weight: normal">
                            <input type="text" id="input_pesquisa" class="form-control" placeholder="&#xF002; Pesquise pelo nome da serviço" style="font-family: FontAwesome; font-size: 1.05rem;">
                            <div>
                                <input type="text" id="input_cadastro" class="form-control" placeholder="&#xf067; Descrição do serviço" style="font-family: FontAwesome; display: none;" onkeyup="verifica_preenchimento()">
                            </div>
                            <div class="text-danger"></div>
                            
                        </th>
                        <th class="col-1 text-center"> 
                            <a href="#" id="novo_servico" class="btn btn-dark" onclick="cadastro_servico(this)">
                                <i class="fas fa-plus " style="margin-top: 0.1rem; margin-right: 0.5rem"></i> Cadastrar serviço
                            </a>
                            <a href="#" id="confirma_inclusao" class="btn btn-dark btn-sm" style="display: none" onclick="cadastro_servico(this)">
                                <i class="fas fa-check"></i>
                            </a>
                            <a href="#" id="cancela_inclusao" class="btn btn-dark btn-sm" style="display: none" onclick="cadastro_servico(this)">
                                <i class="fas fa-times "></i>
                            </a>
                        </th>
                    </tr>
                </thead>
                <tbody data-link="row" id="tbody_servico">
                </tbody>
            </table>
            <div id="paginacao">
            </div>
       </div>
    </body>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script type="text/javascript" src="../static/js/popper.js"></script>
    <script type="text/javascript" src="../static/js/bootstrap.js"></script>

    <script>
        //Função que troca os campos para pesquisa ou inclusão e realiza a inclusão no banco
        function cadastro_servico(e){
            if (e.id == "novo_servico"){
                $('#confirma_inclusao').show();
                $('#cancela_inclusao').show();
                $('#input_cadastro').show();
                $('#input_pesquisa').hide();
                $('#novo_servico').hide();
            } else if (e.id == "cancela_inclusao"){
                $('#confirma_inclusao').hide();
                $('#cancela_inclusao').hide();
                $('#input_cadastro').hide();
                $('#input_pesquisa').show();
                $('#novo_servico').show();
            } else if (e.id == "confirma_inclusao"){
                var validacao_ok = true; 
                var desc_servico = $('#input_cadastro').val();
                if (desc_servico.length <= 0){
                    add_erro_input($('#input_cadastro') , "Descrição do serviço inválido ou não informado");
                    var validacao_ok = true;
                } else if (desc_servico.length <= 3){
                    add_erro_input($('#input_cadastro') , "Descrição do serviço deve possuir mais que 3 caracteres");
                    var validacao_ok = true;
                } else {
                    remove_erro_input($('#input_cadastro'));

                    if (validacao_ok){
                        var data = {
                            desc_servico: desc_servico,
                            funcao: "salvar"
                        };
                        $.ajax({
                            url: '../../controller/servico.php',
                            method: "post",
                            data: data ,
                            success: function(data){
                                busca_servico();
                                alert(data);
                            }
                        });
                    }
                }
            }
        }

        function busca_servico(){
            $('#tbody_servico').html("");
            //Limpara variável do campo de cadastro, após ser realizado um cadastro
            $('#input_cadastro').val("");
            //Mostra a div de loading no carregamento da pagina
            $('#preloader').show();
            var desc_servico = $('#input_pesquisa').val();
            alert(desc_servico);
            var data = {
                desc_servico: desc_servico,
                funcao: "consulta"
            };

            $.ajax({
                url: '../../controller/servico.php',
                method: "post",
                data: data ,
                success: function(data){
                    alert(data);
                    var lista = $.parseJSON(data);
                    var html = "";
                    //var num_paginas = Math.round(lista.length/6);
                    $('#preloader').hide();
                    for(var i = 0; i < lista.length ; i++){
                        html += '<tr>'
                                    +'<td scope="row" style="display: none">'+lista[i].id+'</td>'
                                    +'<td scope="row">'+lista[i].descricao+'</td>'
                                    +'<td scope="row" class="text-center">'
                                        +'<a href="#" class="btn btn-dark btn-sm" title="Alterar serviço">'
                                            +'<i class="fas fa-edit "></i>'
                                        +'</a>'
                                        +'<a href="#" class="btn btn-dark btn-sm" style="margin-left: 0.2rem" title="Remover serviço">'
                                            +'<i class="fas fa-trash "></i>'
                                        +'</a>'
                                    +'</td>'
                                +'</tr>';
                    }
                        $('#tbody_servico').append(html);
                }
            });
        }

        function exclui_servico(){
            //alert();
            var desc_servico = $('#input_cadastro').val();
            var data = {
                desc_servico: desc_servico,
                funcao: "consulta"
            };
            $.ajax({
                url: '../../controller/servico.php',
                method: "post",
                data: data ,
                success: function(data){
                    var lista = $.parseJSON(data);
                    var html = "";
                    $('#preloader').hide();
                    for(var i = 0; i < lista.length ; i++){
                        //alert(lista[i].descricao);
                        html += '<tr>'
                                    +'<td scope="row">'+lista[i].descricao+'</td>'
                                    +'<td scope="row" class="text-center">'
                                        +'<a href="#" class="btn btn-dark btn-sm" title="Alterar serviço">'
                                            +'<i class="fas fa-edit "></i>'
                                        +'</a>'
                                        +'<a href="#" class="btn btn-dark btn-sm" style="margin-left: 0.2rem" title="Remover serviço">'
                                            +'<i class="fas fa-trash "></i>'
                                        +'</a>'
                                    +'</td>'
                                +'</tr>';
                    }
                        $('#tbody_servico').append(html);
                }
            });
        }

        //Função que faz a verificação do preenchimento do campo de cadastro ao digitar
        function verifica_preenchimento(){
            var validacao_ok = true; 
            var desc_servico = $('#input_cadastro').val();
            if (desc_servico.length <= 0){
                add_erro_input($('#input_cadastro') , "Descrição do serviço inválido ou não informado");
                var validacao_ok = true;
            } else if (desc_servico.length <= 3){
                add_erro_input($('#input_cadastro') , "Descrição do serviço deve possuir mais que 3 caracteres");
                var validacao_ok = true;
            } else {
                remove_erro_input($('#input_cadastro'));
            }
        }

        //Funções que add ou remove o erro
        function add_erro_input(input , msg){
            input.addClass("is-invalid");
            input.parent().next().html(msg);
	    }

        function remove_erro_input(input){
            input.removeClass("is-invalid");
            input.parent().next().html("");
        }
    </script>
    
</html>