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
        <script type="text/javascript" src="../static/js/auxilio.js"></script>
    </head>
    <body style="background-color: #F8F9FA;" onload="listar()">
        <div class="container" id="container" style=" background-color: #fff;">
            <h2>
                <p class="text-center" style="color: #000"><i><b>Expedientes</b></i></p>
            </h2>
            <hr>
            <div id="msg">
			
		    </div>
            <table class="table table-secondary table-striped table-bordered table-hover" id="peças">
                <thead >
                    <tr>
                        <th class="col-12">
                            <input type="text" class="form-control" style="font-family: FontAwesome; font-size: 1.05rem" placeholder="&#xF002; Pesquise pelo nome do expediemte">
                        </th>
                        <th class="col-3">
                            <a href="#" class="btn btn-dark col-12" data-toggle="modal" data-target="#incluiExpediente">
                                <i class="fas fa-plus" style="margin-top: 0.1rem; margin-right: 0.5rem"></i> Cadastrar expediente
                            </a>
                        </th>
                    </tr>
                </thead>
                <tbody data-link="row" id="expedientes">
                    <!--<tr>
                        <td scope="row">Expediente</td>
                        <td scope="row" class="text-center">
                        <a href="#" class="btn btn-dark btn-sm" title="Visualizar">
                            <i class="fas fa-eye "></i>
                        </a>
                        <a href="#" class="btn btn-dark btn-sm" title="Alterar">
                            <i class="fas fa-edit "></i>
                        </a>
                        <a href="#" class="btn btn-dark btn-sm" title="Remover">
                            <i class="fas fa-trash "></i>
                        </a>
                        </td>
                    </tr>-->
                </tbody>
            </table>
            <nav>
                <ul class="pager" id="paginacao">
                    
                </ul>
            </nav>
       </div>
       <!-- Modal incluir expediente -->
       <div class="modal fade" id="incluiExpediente" tabindex="-1" role="dialog" aria-labelledby="adicionaExpediente" aria-hidden="true">
            <div id="preloader_modal" class="carregando" style="display: none">
                <img src="../static/gif/loading.gif" style="position: fixed; margin-top: 25%; margin-left: 45%;">
            </div>
            <div class="modal-dialog modal-md" id="modal_expedientes" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Cadastro de expedientes</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" id="adicionaPeca-body" style="overflow-y: auto">
                    <div id="msg">
                    </div>
                        <div class="row">
                            <div class="col-12">
                                <h6  style="margin-top:1rem"><i>Título do expediente</i></h6>
                                <div class="input-group ">
                                    <span class="input-group-addon" id="sizing-addon1"><i class="fas fa-calendar"></i></span>
                                    <input type="text" id="titulo_expediente" class="form-control" placeholder="Ex.: Exemplo">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <h6  style="margin-top:1rem"><i>Descrição do expediente</i></h6>
                                <div class="input-group ">
                                    <span class="input-group-addon" id="sizing-addon1"><i class="fas fa-sticky-note"></i></span>
                                    <textarea id="descricao_expediente" class="form-control"  placeholder="Ex.: Exemplo"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <h6  style="margin-top:1rem"><i>Observações</i></h6>
                                <div class="input-group ">
                                    <span class="input-group-addon" id="sizing-addon1"><i class="fas fa-sticky-note"></i></span>
                                    <textarea id="observacao_expediente" class="form-control"  placeholder="Ex.: Exemplo"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" onclick="cadastro()" class="btn btn-dark btn-block">
                            <i class="fa fa-check float-left" style="margin-top: 0.3rem;"></i> Salvar
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </body>	
    <script>
        function cadastro(){
            //Recupera valores dos campos
            var titulo = $('#titulo_expediente').val();
            var descricao = $('#descricao_expediente').val();
            var observacoes = $('#observacao_expediente').val();
            //Mostra a div de loading no carregamento da pagina
            $('#preloader_modal').show();
            //alert(desc_servico);
            var data = {
                titulo: titulo,
                descricao: descricao,
                observacoes: observacoes,
                funcao: "cadastrar"
            };
            $.ajax({
                url: '../../controller/expedientes.php',
                method: "post",
                data: data ,
                success: function(data){
                    if (data){
                        $('#preloader_modal').hide();
                        monta_msg_sucesso(" Cadastro realizado com sucesso.")
                        $('#titulo_expediente').val("");
                        $('#descricao_expediente').val("");
                        $('#observacao_expediente').val("");

                    }
                }
            });
        }

        //Lista os expedientes cadastrados

        var nr_pag = 1;
        var lista_registros ;

        function atualiza_nr_pag(numero){
            nr_pag = numero;
            monta_lista(lista_registros);
        }

        function listar(){
            $('#paginacao').html("")
            $('#expedientes').html("");
            //Limpara variável do campo de cadastro, após ser realizado um cadastro
            //Mostra a div de loading no carregamento da pagina
            $('#preloader').show();
            //var desc_servico = $('#input_pesquisa').val();
            //alert(desc_servico);
            var data = {
                funcao: "consultar"
            };
            $.ajax({
                url: '../../controller/expedientes.php',
                method: "post",
                data: data ,
                success: function(data){
                    if (!data){
                        $('#preloader').hide();
                        monta_msg_alerta_permanente(" Você não possui expedientes. Clique em <b>cadastrar expediente</b> para iniciar uma inclusão.")
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
            $('#paginacao').html("");
            $('#expedientes').html("");
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
                html += '<tr>'+
                            '<td scope="row">'+lista[inicio].titulo+'</td>'+
                            '<td scope="row" class="text-center">'+
                                '<button type="button" class="btn btn-dark btn-sm" title="Visualizar">'+
                                    '<i class="fas fa-eye "></i>'+
                                '</button>'+
                                '<button type="button" class="btn btn-dark btn-sm" style="margin-left: 0.2rem" title="Alterar">'+
                                    '<i class="fas fa-edit "></i>'+
                                '</button>'+
                                '<button type="button" class="btn btn-dark btn-sm" style="margin-left: 0.2rem" onclick="confirma_exclusao('+lista[inicio].id+')" title="Remover">'+
                                    '<i class="fas fa-trash "></i>'+
                                '</button>'+
                            '</td>'+
                        '</tr>';
                inicio += 1 ;
            }
                $('#expedientes').append(html);
            }else{
                for(var i = 0; i < 6 ; i++){
                    html += '<tr>'+
                                '<td scope="row">'+lista[inicio].titulo+'</td>'+
                                '<td scope="row" class="text-center">'+
                                    '<button type="button" class="btn btn-dark btn-sm" title="Visualizar">'+
                                        '<i class="fas fa-eye "></i>'+
                                    '</button>'+
                                    '<button type="button" class="btn btn-dark btn-sm" style="margin-left: 0.2rem" title="Alterar">'+
                                        '<i class="fas fa-edit "></i>'+
                                    '</button>'+
                                    '<button type="button" class="btn btn-dark btn-sm" style="margin-left: 0.2rem" onclick="confirma_exclusao('+lista[inicio].id+')" title="Remover">'+
                                        '<i class="fas fa-trash "></i>'+
                                    '</button>'+
                                '</td>'+
                            '</tr>';
                    inicio += 1 ;
                }
                    $('#expedientes').append(html);
            }
        }

        //Funções para excluir registro
        function confirma_exclusao(id){
            //Mensagem de confirmação
            monta_msg_confirma(' Confirma exclusão do serviço? <a href="#" id="confirma" class="btn btn-dark btn-sm" onclick="excluir('+id+', this)">Sim</a> <a href="#" id="cancela" class="btn btn-secondary btn-sm" onclick="excluir(0, this)">Não</a> ');
        }  

        function excluir(id, id_button){
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
    </script>
    
</html>