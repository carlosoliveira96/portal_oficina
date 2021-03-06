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
    </head>
    <body style="background-color: #F8F9FA;" id="body" onload="busca_servico()">
        <div class="container" id="container" style=" background-color: #fff;">
            <h2>
                <p class="text-center" style="color: #000"><i><b>Serviços</b></i></p>
            </h2>
            <hr>
            <div id="msg">
			
		    </div>
            <table class="table table-secondary table-bordered table-striped table-hover" id="servico">
                <thead>
                    <tr>
                        <th class="col-12" style="width: 90%; font-weight: normal">
                            <input type="text" id="input_pesquisa" class="form-control" placeholder="&#xF002; Pesquise pelo nome da serviço" style="font-family: FontAwesome; font-size: 1.05rem;" onkeyup="busca_servico()">
                            <div>
                            <div class="text-danger"></div>
                                <div class="input-group" id="div_cadastro" style=" display: none;">
                                    <span class="input-group-addon">
                                        <input type="checkbox" id="check_pecas" aria-label="Checkbox for following text input"> 
                                        <span class="input-group-text" id="">&nbsp;Pagamento por peças</span>
                                    </span>
                                    <input type="text" id="input_cadastro" class="form-control" placeholder="Descrição do serviço" style="font-family: FontAwesome;" onkeyup="verifica_preenchimento()">
                                    <input type="text" id="input_id" style="display: none">
                                </div>
                            </div>
                            
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
                            <a href="#" id="confirma_alteracao" class="btn btn-dark btn-sm" style="display: none" onclick="altera_registro(this)">
                                <i class="fas fa-check"></i>
                            </a>
                            <a href="#" id="cancela_alteracao" class="btn btn-dark btn-sm" style="display: none" onclick="altera_registro(this)">
                                <i class="fas fa-times "></i>
                            </a>
                        </th>
                    </tr>
                </thead>
                <tbody data-link="row" id="tbody_servico">
                </tbody>
            </table>
            <nav>
                <ul class="pager" id="paginacao">
                    
                </ul>
            </nav>
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
                $('#div_cadastro').show();
                $('#input_pesquisa').hide();
                $('#novo_servico').hide();
            } else if (e.id == "cancela_inclusao"){
                $('#confirma_inclusao').hide();
                $('#cancela_inclusao').hide();
                $('#div_cadastro').hide();
                $('#input_pesquisa').show();
                $('#novo_servico').show();
            } else if (e.id == "confirma_inclusao"){
                
            var t = document.getElementById("check_pecas"); 
            var validacao_ok = true; 
            var desc_servico = $('#input_cadastro').val();
            if (desc_servico.length <= 0){
                add_erro_input($('#input_cadastro') , "Descrição do serviço inválido ou não informado");
                var validacao_ok = true;
            } else if (desc_servico.length <= 3){
                add_erro_input($('#input_cadastro') , "Descrição do serviço deve possuir mais que 3 caracteres");
                var validacao_ok = true;
            } else {
                $('#preloader').show();
                if (t.checked == true){
                    remove_erro_input($('#input_cadastro'));
                    if (validacao_ok){
                        var data = {
                            desc_servico: desc_servico,
                            check: "1",
                            funcao: "salvar"
                        };
                    }
                }else {
                    remove_erro_input($('#input_cadastro'));
                    if (validacao_ok){
                        var data = {
                            desc_servico: desc_servico,
                            check: "0",
                            funcao: "salvar"
                        };
                    }
                }
                    $.ajax({
                        url: '../../controller/servico.php',
                        method: "post",
                        data: data ,
                        success: function(data){
                            busca_servico();
                            monta_msg_sucesso(" Inclusão realizada com sucesso.");
                        }
                    });
            }
            }
        }
        var nr_pag = 1;
        var lista_registros ;

        function atualiza_nr_pag(numero){
            nr_pag = numero;
            monta_lista(lista_registros);
        }
        
        function busca_servico(){
            $('#paginacao').html("")
            $('#tbody_servico').html("");
            //Limpara variável do campo de cadastro, após ser realizado um cadastro
            $('#input_cadastro').val("");
            var check = document.getElementById("check_pecas");
            check.checked = false;
            //Mostra a div de loading no carregamento da pagina
            $('#preloader').show();
            var desc_servico = $('#input_pesquisa').val();
            //alert(desc_servico);
            var data = {
                desc_servico: desc_servico,
                funcao: "consulta"
            };
            $.ajax({
                url: '../../controller/servico.php',
                method: "post",
                data: data ,
                success: function(data){
                    if (data == "0"){
                        $('#preloader').hide();
                        monta_msg_alerta_permanente(" Você não possui serviços cadastrados. Cliquem em <b>cadastrar serviço</b> para iniciar.")
                    }else {
                        remove_msg();
                        var lista = $.parseJSON(data);
                        lista_registros = lista;
                        monta_lista(lista_registros);          
                    }
                }
            });
        }

        function monta_lista(lista){
            $('#paginacao').html("")
           $('#tbody_servico').html("");
            var qtd_pag = lista.length / 6 ;
            qtd_pag = parseInt(qtd_pag);
            var ultima_pag = lista.length % 6;
            if(ultima_pag != 0){
                qtd_pag += 1 ;
            }
            //Paginação começa aqui
            var active = "";
            if (nr_pag == 1){
                active = 'disabled';
            }
            var html2 = '<li class="'+active+'">'
                            +'<a href="#" onclick="atualiza_nr_pag(1)">Primeira</a>'
                        +'</li>'
                        +'<li class="'+active+'">'
                            +'<a href="#" onclick="atualiza_nr_pag('+(nr_pag-1)+')"><</a>'
                        +'</li>';
            $('#paginacao').append(html2);
            var inicio = 0;
            inicio = (nr_pag * 6) - 6  ;
            for(var i = 1 ; i <= qtd_pag ; i++){
                var active = "";
                if (nr_pag == i){
                    active = 'active';
                }
                var html = '<li class="' +active+'"><a href="#" onclick="atualiza_nr_pag('+i+')">'+i+'</a></li>';
            $('#paginacao').append(html);
            }
            var active = "";
            if (qtd_pag == nr_pag){
                active = 'disabled';
            }
            var html2 = '<li class="'+active+'">'
                            +'<a href="#" onclick="atualiza_nr_pag('+(nr_pag + 1)+')">></a>'
                        +'</li>'
                        +'<li class="'+active+'">'
                            +'<a href="#" onclick="atualiza_nr_pag('+qtd_pag+')">Última</a>'
                        +'</li>';
            $('#paginacao').append(html2);
            //Paginação termina aqui
            var html = "";
            $('#preloader').hide();
            if(nr_pag == qtd_pag && ultima_pag != 0 ){
                for(var i = 0; i < ultima_pag ; i++){
                html += '<tr>'
                            +'<td scope="row">'+lista[inicio].descricao+'</td>'
                            +'<td scope="row" class="text-center">'
                                +'<button type="button" class="btn btn-dark btn-sm" onclick="monta_alteracao('+lista[inicio].id+')" title="Alterar serviço">'
                                    +'<i class="fas fa-edit"></i>'
                                +'</button>'
                                +'<button type="button" class="btn btn-dark btn-sm" style="margin-left: 0.2rem" onclick="confirma_exclusao('+lista[inicio].id+')" title="Remover serviço">'
                                    +'<i class="fas fa-trash"></i>'
                                +'</button>'
                            +'</td>'
                        +'</tr>';
                inicio += 1 ;
            }
                $('#tbody_servico').append(html);
            }else{
                for(var i = 0; i < 6 ; i++){
                    html += '<tr>'
                                +'<td scope="row">'+lista[inicio].descricao+'</td>'
                                +'<td scope="row" class="text-center">'
                                    +'<button type="button" class="btn btn-dark btn-sm" onclick="monta_alteracao('+lista[inicio].id+')" title="Alterar serviço">'
                                        +'<i class="fas fa-edit"></i>'
                                    +'</button>'
                                    +'<button type="button" class="btn btn-dark btn-sm" style="margin-left: 0.2rem" onclick="confirma_exclusao('+lista[inicio].id+')" title="Remover serviço">'
                                        +'<i class="fas fa-trash"></i>'
                                    +'</button>'
                                +'</td>'
                            +'</tr>';
                    inicio += 1 ;
                }
                    $('#tbody_servico').append(html);
            }
        }  

        function monta_alteracao(id){
            $('#preloader').show();
            var data = {
                id_servico: id,
                funcao: "consulta_unico"
            };
            $.ajax({
                method: "post",
                data: data ,
                url: '../../controller/servico.php',                
                success: function(data){
                    var lista = $.parseJSON(data);
                    $('#preloader').hide();
                    $('#confirma_alteracao').show();
                    $('#cancela_alteracao').show();
                    $('#div_cadastro').show();
                    $('#confirma_inclusao').hide();
                    $('#cancela_inclusao').hide();
                    $('#input_pesquisa').hide();
                    $('#novo_servico').hide();
                    $('#input_cadastro').val(lista.descricao);
                    $('#input_id').val(lista.id);    
                }
            });
        }

        function altera_registro(e){
            $('#preloader').show();
            if (e.id == "cancela_alteracao"){
                $('#confirma_alteracao').hide();
                $('#cancela_alteracao').hide();
                $('#div_cadastro').hide();
                $('#input_cadastro').val("");
                $('#input_pesquisa').show();
                $('#novo_servico').show();
                $('#preloader').hide();
            } else if (e.id == "confirma_alteracao"){
                var validacao_ok = true; 
                var desc_servico = $('#input_cadastro').val();
                var id = $('#input_id').val();
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
                            id_servico: id,
                            funcao: "altera"
                        };
                        $.ajax({
                            url: '../../controller/servico.php',
                            method: "post",
                            data: data ,
                            success: function(data){
                                $('#preloader').hide();
                                busca_servico();
                                monta_msg_sucesso(" Alteração realizada com sucesso.");
                                $('#confirma_alteracao').hide();
                                $('#cancela_alteracao').hide();
                                $('#div_cadastro').hide();
                                $('#input_pesquisa').show();
                                $('#novo_servico').show();
                            }
                        });
                    }
                }
            }
        }

        function confirma_exclusao(id){
            //Mensagem de confirmação
            monta_msg_confirma(' Confirma exclusão do serviço? <a href="#" id="confirma" class="btn btn-dark btn-sm" onclick="exclui_servico('+id+', this)">Sim</a> <a href="#" id="cancela" class="btn btn-secondary btn-sm" onclick="exclui_servico(0, this)">Não</a> ');
        }    

        function exclui_servico(id, id_button){
            if (id_button.id == "confirma"){
                var desc_servico = $('#input_cadastro').val();
                var data = {
                    id_servico: id,
                    funcao: "excluir"
                };
                $.ajax({
                    url: '../../controller/servico.php',
                    method: "post",
                    data: data ,
                    success: function(data){
                        busca_servico();
                        monta_msg_alerta(" Serviço inativado! Caso deseje ativá-lo novamente, entre em contato com o administrador.");
                    }
                });
            }else {
                remove_msg();
            }
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
            input.parent().prev().html(msg);
	    }
        function remove_erro_input(input){
            input.removeClass("is-invalid");
            input.parent().prev().html("");
        }

        //Função para atualizar tamanho do container
        atualiza_tamanho();
        function atualiza_tamanho(){
            var tamanho_container = $(window).height();
            tamanho_container -= 66;
            $('#container').css("height", tamanho_container);
        }
        
        window.addEventListener('resize', function(){
            atualiza_tamanho();
        });

        //Monta mensagem de alerta ao excluir registro
        function monta_msg_alerta(msg){
            html = '<div class="alert alert-warning"><i class="fas fa-exclamation-triangle"></i><strong>'+ msg +'</strong></div>';
            $('#msg').html(html);
            window.setInterval(function(){
                remove_msg();
            },10000);
        }

        //Monta mensagem de quando não existem registros
        function monta_msg_alerta_permanente(msg){
            html = '<div class="alert alert-warning"><i class="fas fa-exclamation-triangle"></i><strong>'+ msg +'</strong></div>';
            $('#msg').html(html);
        }

        //Monta mensagem de alerta ao incluir registro
        function monta_msg_sucesso(msg){
            html = '<div class="alert alert-success"><i class="fas fa-exclamation-triangle"></i><strong>'+ msg +'</strong></div>';
            $('#msg').html(html);
            window.setInterval(function(){
                remove_msg();
            },10000);
        }

        //Monta mensagem de confirmação
        function monta_msg_confirma(msg){
            html = '<div class="alert alert-dark"><i class="fas fa-exclamation-triangle"></i><strong>'+ msg +'</strong></div>';
            $('#msg').html(html);
        }

        function remove_msg(){
            $('#msg').html('');
        }
    </script>
    
</html>