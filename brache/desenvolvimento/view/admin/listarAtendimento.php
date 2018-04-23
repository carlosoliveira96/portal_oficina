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
                <p class="text-center" style="color: #000"><i><b>Listar cadastros</b></i></p>
            </h2>
            <hr>
            <div id="msg_expediente">
			
		    </div>
            <div id="msg">
			
		    </div>
            <table class="table table-secondary table-striped table-bordered table-hover" id="peças">
                <thead >
                    <tr>
                        <th class="col-12" style="width: 70%; font-weight: normal">
                            <input type="text" id="pesquisaNome" class="form-control" style="font-family: FontAwesome; font-size: 1.05rem" placeholder="&#xF002; Pesquise pelo nome do cliente" onkeyup="listar()">
                        </th>
                        <th class="col-12" style="width: 30%; font-weight: normal">
                            <select class="form-control" id="tipoPesquisa" onchange="listar()" >
                                <option value="cliente">Cliente</option>
                                <option value="seguradora">Seguradora</option>
                                <option value="corretor">Corretor</option>
                            </select>
                            <!--
                                <input type="text" id="input_pesquisa_cargo" class="form-control" placeholder="&#xF002; Cargo" style="font-family: FontAwesome; font-size: 1.05rem;" onkeyup="busca_funcionario()">
                            -->
                            <div>                            
                        </th>
                    </tr>
                </thead>
                <tbody data-link="row" id="listarAtendimento">
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
            <!-- Modal para visualizaçao e alteração -->
            <div class="modal fade" data-backdrop="static" id="cadastrosAtendimento" tabindex="-1" role="dialog" aria-labelledby="atendimentos" aria-hidden="true">
                <div id="preloader_modal" class="carregando" style="display: none">
                    <img src="../static/gif/loading.gif" style="position: fixed; margin-top: 25%; margin-left: 45%;">
                </div>
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <div class="btn-group " role="group" aria-label="Button group with nested dropdown">
                                <button class="btn btn-dark" id="cancelar" onclick="cancela_alteracao()">
                                    <i class="fa fa-times float-left" style="margin-top: 0.2rem; margin-right: 0.3rem"></i> Cancelar
                                </button>
                                <button class="btn btn-dark" id="alterar" onclick="alterar()">
                                    <i class="fa fa-edit float-left" style="margin-top: 0.2rem; margin-right: 0.3rem"></i> Alterar
                                </button>
                            </div>
                            <h5 class="" style="margin-right: 5rem;" id="titulo_cliente">Modal title</h5>
                            <button type="button" onclick="cancela_alteracao(); listar();" class="close" data-dismiss="modal">
                                    <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                        <div id="msg_sucesso">
                        </div>
                            <div class="row justify-content-md-center" id="dados">
                                <div class="col-6" id="img_funconario">

                                </div>
                            </div>
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-12">
                                        <h6  style="margin-top:1rem" id="nome-fantasia"><i>Nome</i></h6>   
                                        <div class="input-group ">
                                            <span class="input-group-addon " id="sizing-addon1"><i class="fa fa-address-book"></i></span>
                                            <input type="text" id="nome" class="form-control" disabled placeholder="Ex.:  Exemplo exemplo " maxlength="200" >
                                            <input type="text" id="idCadastro" hidden>
                                        </div>
                                        <div class="text-danger"></div>
                                    </div>
                                    <div class="col-6">
                                        <h6  style="margin-top:1rem" id="cpf-cnpj"><i>CPF</i></h6>    
                                        <div class="input-group ">
                                            <span class="input-group-addon" id="sizing-addon1"><i class="fa fa-address-book"></i></span>
                                            <input type="text" id="cpf"  onkeyup="verifica_cpf()" disabled class="form-control" placeholder="Ex.: 999.999.999-99" data-mask="999.999.999-99" >
                                        </div>
                                        <div class="text-danger"></div>
                                    </div>
                                    <div class="col-6" id="divNascimento">
                                        <h6  style="margin-top:1rem"><i>Nascimento</i></h6> 
                                        <div class="input-group ">
                                            <span class="input-group-addon " id="sizing-addon1"><i class="fa fa-calendar"></i></span>
                                            <input class="form-control" placeholder="Ex.: 99/99/9999" disabled  id="nascimento"   type="text" >
                                        </div>
                                        <div class="text-danger"></div>
                                    </div>
                                    <div class="col-6" id="divRg">
                                        <h6  style="margin-top:1rem"><i>RG</i></h6> 
                                        <div class="input-group ">
                                            <span class="input-group-addon " id="sizing-addon1"><i class="fa fa-address-book"></i></span>
                                            <input type="text" id="rg" class="form-control" disabled placeholder="Ex.: 9999999" >
                                        </div>
                                        <div class="text-danger"></div>
                                    </div>
                                    <div class="col-6" id="divOrgao">
                                        <h6  style="margin-top:1rem"><i>Orgão Emissor</i></h6>  
                                        <div class="input-group ">
                                            <span class="input-group-addon " id="sizing-addon1"><i class="fa fa-building"></i></span>
                                            <input type="text" id="orgao_emissor" class="form-control" disabled placeholder="Ex.: SSP-DF" maxlength="50" >
                                        </div>
                                        <div class="text-danger"></div>
                                    </div>
                                    <div class="col-12">
                                        <h6  style="margin-top:1rem"><i>E-Mail</i></h6> 
                                        <div class="input-group ">
                                            <span class="input-group-addon " id="sizing-addon1"><i class="fa fa-envelope"></i></span>
                                            <input type="email" id="email" onkeyup="valida_email()" disabled class="form-control" placeholder="Ex.: exemplo@exemplo.com"  >
                                        </div>
                                        <div class="text-danger"></div>
                                    </div>
                                    <div class="col-6">
                                        <h6  style="margin-top:1rem"><i>Telefone</i></h6>   
                                        <div class="input-group ">
                                            <span class="input-group-addon " id="sizing-addon1"><i class="fa fa-phone"></i></span>
                                            <input type="text" id="telefone" class="form-control" disabled placeholder="Ex.: (99) 9999-9999" data-mask="(99) 9999-9999" >
                                        </div>
                                        <div class="text-danger"></div>
                                    </div>
                                    <div class="col-6">
                                        <h6  style="margin-top:1rem"><i>Celular</i></h6>    
                                        <div class="input-group ">
                                            <span class="input-group-addon " id="sizing-addon1"><i class="fa fa-mobile"></i></span>
                                            <input type="text" id="celular" class="form-control" disabled placeholder="Ex.: (99) 99999-9999" data-mask="(99) 99999-9999" >
                                        </div>
                                        <div class="text-danger"></div>
                                    </div>
                                    <div class="col-12">
                                        <h6  style="margin-top:1rem"><i>Observação</i></h6>    
                                        <div class="input-group ">
                                            <span class="input-group-addon " id="sizing-addon1"><i class="fa fa-mobile"></i></span>
                                            <textarea id="observacao" class="form-control" disabled></textarea>
                                        </div>
                                        <div class="text-danger"></div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-4">
                                    <h6  style="margin-top:1rem"><i>CEP</i></h6>    
                                    <div class="input-group" >
                                        <span class="input-group-addon " id="sizing-addon1"><i class="fa fa-search"></i></span>
                                        <input type="text"  id="cep" disabled class="form-control" placeholder="Ex.: 99999-999" data-mask="99999-999"  onkeyup="busca_cep()">
                                    </div>
                                    <div class="text-danger"></div>
                                </div>
                                <div class="col-3">
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
                                        <span class="input-group-addon " id="sizing-addon1"><i class="fa fa-home"></i></span>
                                        <input type="text" id="endereco" disabled class="form-control" placeholder="Ex.: Exemplo exemplo exemplo"  disabled>
                                    </div>
                                    <div class="text-danger"></div>
                                </div>
                                <div class="col-2">
                                    <h6  style="margin-top:1rem"><i>Número</i></h6> 
                                    <div class="input-group ">
                                        <span class="input-group-addon " id="sizing-addon1"><i class="fa fa-home"></i></span>
                                        <input type="text" id="numero" disabled class="form-control" placeholder="Ex.: 99 "  disabled>
                                    </div>
                                    <div class="text-danger"></div>
                                </div>
                                <div class="col-4">
                                    <h6  style="margin-top:1rem"><i>Complemento</i></h6>    
                                    <div class="input-group ">
                                        <span class="input-group-addon " id="sizing-addon1"><i class="fa fa-home"></i></span>
                                        <input type="text" id="complemento" disabled class="form-control" placeholder="Ex.: Exemplo Exemplo " maxlength="50" disabled>
                                    </div>
                                    <div class="text-danger"></div>
                                </div>
                                <div class="col-6">
                                    <h6  style="margin-top:1rem"><i>Bairro</i></h6> 
                                    <div class="input-group ">
                                        <span class="input-group-addon " id="sizing-addon1"><i class="fa fa-home"></i></span>
                                        <input type="text" id="bairro" disabled class="form-control" placeholder="Ex.: Exemplo Exemplo " maxlength="100" disabled>
                                    </div>
                                    <div class="text-danger"></div>
                                </div>
                                <div class="col-4">
                                    <h6  style="margin-top:1rem"><i>Cidade</i></h6> 
                                    <div class="input-group ">
                                        <span class="input-group-addon " id="sizing-addon1"><i class="fa fa-home"></i></span>
                                        <input type="text" id="cidade" disabled class="form-control" placeholder="Ex.: Exemplo exemplo" maxlength="100" disabled>
                                    </div>
                                    <div class="text-danger"></div>
                                </div>
                                <div class="col-2">
                                    <h6  style="margin-top:1rem"><i>UF</i></h6> 
                                    <div class="input-group ">
                                        <span class="input-group-addon " id="sizing-addon1"><i class="fa fa-home"></i></span>
                                        <input type="text" id="uf" disabled  class="form-control" placeholder="Ex.: DF" maxlength="2" disabled>
                                    </div>
                                    <div class="text-danger"></div>
                                </div>
                            </div>
                            <div id="botao_salvar" hidden>
                                <hr>
                                <div class="row">
                                    <div class="col-12">
                                        <button type="button" class="btn btn-dark col-12" onclick="salva_alteracao()">
                                            <i class="fa fa-check float-left" style="margin-top: 0.3rem;"></i> Salvar alterações
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Fim modal -->
       </div>
    </body>	
    <script>
        //Lista os expedientes cadastrados
        var nr_pag = 1;
        var lista_registros ;

        function atualiza_nr_pag(numero){
            nr_pag = numero;
            monta_lista(lista_registros);
        }

        function listar(){
            var tipo = $('#tipoPesquisa').val();
            var pesquisa = $('#pesquisaNome').val();
            $('#paginacao').html("")
            $('#listarAtendimento').html("");
            //Limpara variável do campo de cadastro, após ser realizado um cadastro
            //Mostra a div de loading no carregamento da pagina
            $('#preloader').show();
            //var desc_servico = $('#input_pesquisa').val();
            //alert(desc_servico);
            var data = {
                funcao: "consultar",
                pesquisa, 
                tipo: tipo
            };
            $.ajax({
                url: '../../controller/cadastro.php',
                method: "post",
                data: data ,
                success: function(data){
                    if (!data){
                        $('#preloader').hide();
                        monta_msg_alerta_permanente(" Você não possui cadastros nessa seção.")
                    }else {
                        remove_msg_expediente();
                        var lista = $.parseJSON(data);
                        lista_registros = lista;
                        monta_lista(lista_registros);          
                    }
                }
            });
        }

        function monta_lista(lista){
            $('#paginacao').html("");
            $('#listarAtendimento').html("");
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
            var nomeCadastro = "";
            $('#preloader').hide();
            if(nr_pag == qtd_pag && ultima_pag != 0 ){
                for(var i = 0; i < ultima_pag ; i++){
                    if (lista[inicio].nome == null){
                        if(lista[inicio].nome_fantasia != null){
                            nomeCadastro = lista[inicio].nome_fantasia;
                        }else {
                            nomeCadastro = lista[inicio].nome;
                        }
                    }else{
                        nomeCadastro = lista[inicio].nome;
                    }
                    if(lista[inicio].situacao == 1){
                        var button = '<button type="button" class="btn btn-dark btn-sm" style="margin-left: 0.2rem" onclick="confirma_exclusao('+lista[inicio].id+')" title="Remover">'+
                                        '<i class="fas fa-trash"></i>'+
                                    '</button>';
                    }else{
                        button = '<button type="button" class="btn btn-dark btn-sm" style="margin-left: 0.2rem" onclick="confirma_reativacao('+lista[inicio].id+')" title="Reativar">'+
                                        '<i class="fas fa-check-circle"></i>'+
                                    '</button>';
                    }
                html += '<tr>'+
                            '<td scope="row">'+nomeCadastro+'</td>'+
                            '<td scope="row" class="text-center">'+
                                '<button type="button" class="btn btn-dark btn-sm" onclick="confirma_vinculacao('+lista[inicio].id+')" title="Vincular veículo">'+
                                    '<i class="fas fa-plus-square"></i>'+
                                '</button>'+
                                '<button type="button" data-toggle="modal" data-target="#cadastrosAtendimento" onclick="visualizar(\''+lista[inicio].id+'\', \''+lista[inicio].nome+'\', \''+lista[inicio].nome_fantasia+'\', \''+lista[inicio].cpf+'\', \''+lista[inicio].cnpj+'\', \''+lista[inicio].rg+'\', \''+lista[inicio].orgao_emissor+'\', \''+lista[inicio].data_nascimento+'\', \''+lista[inicio].telefone+'\', \''+lista[inicio].celular+'\', \''+lista[inicio].email+'\', \''+lista[inicio].cep+'\', \''+lista[inicio].endereco+'\', \''+lista[inicio].numero+'\', \''+lista[inicio].complemento+'\', \''+lista[inicio].bairro+'\', \''+lista[inicio].cidade+'\', \''+lista[inicio].uf+'\', \''+lista[inicio].observacao+'\')" class="btn btn-dark btn-sm" style="margin-left: 0.2rem" title="Alterar">'+
                                    '<i class="fas fa-eye "></i>'+
                                '</button>'+
                                button+
                            '</td>'+
                        '</tr>';
                inicio += 1 ;
            }
                $('#listarAtendimento').append(html);
            }else{
                for(var i = 0; i < 6 ; i++){
                    if (lista[inicio].nome == null){
                        if(lista[inicio].nome_fantasia != null){
                            nomeCadastro = lista[inicio].nome_fantasia;
                        }else {
                            nomeCadastro = lista[inicio].nome;
                        }
                    }else{
                        nomeCadastro = lista[inicio].nome;
                    }
                    if(lista[inicio].situacao == 1){
                        var button = '<button type="button" class="btn btn-dark btn-sm" style="margin-left: 0.2rem" onclick="confirma_exclusao('+lista[inicio].id+')" title="Remover">'+
                                        '<i class="fas fa-trash"></i>'+
                                    '</button>';
                    }else{
                        button = '<button type="button" class="btn btn-dark btn-sm" style="margin-left: 0.2rem" onclick="confirma_reativacao('+lista[inicio].id+')" title="Reativar">'+
                                        '<i class="fas fa-check-circle"></i>'+
                                    '</button>';
                    }
                    html += '<tr>'+
                                '<td scope="row">'+nomeCadastro+'</td>'+
                                '<td scope="row" class="text-center">'+
                                    '<button type="button" class="btn btn-dark btn-sm" onclick="confirma_vinculacao('+lista[inicio].id+')" title="Vincular veículo">'+
                                        '<i class="fas fa-plus-square"></i>'+
                                    '</button>'+
                                    '<button type="button" data-toggle="modal" data-target="#cadastrosAtendimento" onclick="visualizar(\''+lista[inicio].id+'\', \''+lista[inicio].nome+'\', \''+lista[inicio].nome_fantasia+'\', \''+lista[inicio].cpf+'\', \''+lista[inicio].cnpj+'\', \''+lista[inicio].rg+'\', \''+lista[inicio].orgao_emissor+'\', \''+lista[inicio].data_nascimento+'\', \''+lista[inicio].telefone+'\', \''+lista[inicio].celular+'\', \''+lista[inicio].email+'\', \''+lista[inicio].cep+'\', \''+lista[inicio].endereco+'\', \''+lista[inicio].numero+'\', \''+lista[inicio].complemento+'\', \''+lista[inicio].bairro+'\', \''+lista[inicio].cidade+'\', \''+lista[inicio].uf+'\', \''+lista[inicio].observacao+'\')" class="btn btn-dark btn-sm" style="margin-left: 0.2rem"  title="Alterar">'+
                                        '<i class="fas fa-eye "></i>'+
                                    '</button>'+
                                    button+
                                '</td>'+
                            '</tr>';
                    inicio += 1 ;
                }
                    $('#listarAtendimento').append(html);
            }
        }

        //Funções para visualizar registro
        var verifica = 0;
        function visualizar(id, nome, nome_fantasia, cpf, cnpj, rg, orgao_emissor, data_nascimento, telefone, celular, email, 
        cep, endereco, numero, complemento, bairro, cidade, uf, observacao){
            $('#cancelar').attr('hidden', true);
            $('#idCadastro').attr('value', id);
            if (nome == 'null'){
                if (nome_fantasia != 'null'){
                    $('#nome').attr('value', nome_fantasia);
                    $('#titulo_cliente').html(nome_fantasia);
                    $('#cpf-cnpj').html('Nome fantasia');
                    verifica = 1;
                }else {
                    $('#nome').attr('value', '');
                    $('#cpf-cnpj').html('Nome');
                }
            }else {
                $('#nome').attr('value', nome);
                $('#titulo_cliente').html(nome);
                $('#cpf-cnpj').html('Nome');
                verifica = 0;
            }
            if (cpf == 'null'){
                if (cnpj != 'null'){
                    $('#cpf').attr('value', cnpj);
                    $('#cpf-cnpj').html('CNPJ');
                    $('#divRg').attr('hidden', true);
                    $('#divOrgao').attr('hidden', true);
                    $('#divNascimento').attr('hidden', true);
                    verifica = 1;
                }else {
                    $('#cpf').attr('value', '');
                    $('#cpf-cnpj').html('CPF');
                    $('#divRg').removeAttr('hidden');
                    $('#divOrgao').removeAttr('hidden');
                    $('#divNascimento').removeAttr('hidden');
                }
            }else {
                $('#cpf').attr('value', cpf);
                $('#cpf-cnpj').html('CPF');
                $('#divRg').removeAttr('hidden');
                $('#divOrgao').removeAttr('hidden');
                $('#divNascimento').removeAttr('hidden');
                verifica = 0;
            }
            if (rg == 'null'){
                $('#rg').attr('value', '');
            }else {
                $('#rg').attr('value', rg);
            }
            if (orgao_emissor == 'null'){
                $('#orgao_emissor').attr('value', '');
            }else {
                $('#orgao_emissor').attr('value', orgao_emissor);
            }
            if (data_nascimento == 'null'){
                $('#nascimento').attr('value', '');
            }else {
                $('#nascimento').attr('value', data_nascimento);
            }
            if (telefone == 'null'){
                $('#telefone').attr('value', '');
            }else {
                $('#telefone').attr('value', telefone);
            }
            if (celular == 'null'){
                $('#celular').attr('value', '');
            }else {
                $('#celular').attr('value', celular);
            }
            if (email == 'null'){
                $('#email').attr('value', '');
            }else {
                $('#email').attr('value', email);
            }
            if (cep == 'null'){
                $('#cep').attr('value', '');
            }else {
                $('#cep').attr('value', cep);
            }
            if (endereco == 'null'){
                $('#endereco').attr('value', '');
            }else {
                $('#endereco').attr('value', endereco);
            }
            if (numero == 'null'){
                $('#numero').attr('value', '');
            }else {
                $('#numero').attr('value', numero);
            }
            if (complemento == 'null'){
                $('#complemento').attr('value', '');
            }else {
                $('#complemento').attr('value', complemento);
            }
            if (bairro == 'null'){
                $('#bairro').attr('value', '');
            }else {
                $('#bairro').attr('value', bairro);
            }
            if (cidade == 'null'){
                $('#cidade').attr('value', '');
            }else {
                $('#cidade').attr('value', cidade);
            }
            if (uf == 'null'){
                $('#uf').attr('value', '');
            }else {
                $('#uf').attr('value', uf);
            }
            if (observacao == 'null'){
                document.getElementById('observacao').value = '';
            }else {
                document.getElementById('observacao').value = observacao;
            }
        }

        //Funções para alterar registro
        function alterar(){
            $('#botao_salvar').removeAttr('hidden');
            $('#cancelar').removeAttr('hidden');
            $('#alterar').attr('hidden', true);
            $('#nome').removeAttr('disabled');
            $('#cpf').removeAttr('disabled');
            $('#rg').removeAttr('disabled');
            $('#orgao_emissor').removeAttr('disabled');
            $('#telefone').removeAttr('disabled');
            $('#celular').removeAttr('disabled');
            $('#email').removeAttr('disabled');
            $('#cep').removeAttr('disabled');
            $('#numero').removeAttr('disabled');
            $('#complemento').removeAttr('disabled');
            $('#observacao').removeAttr('disabled');
            
        }
        
        var validacao = true;
        function salva_alteracao(){
            //Recupera valores dos campos
            var id = $('#idCadastro').val();
            var nome = $('#nome').val();
            var cpf = $('#cpf').val();
            var rg = $('#rg').val();
            var orgao_emissor = $('#orgao_emissor').val();
            var telefone = $('#telefone').val();
            var celular = $('#celular').val();
            var email = $('#email').val();
            var cep = $('#cep').val();
            var endereco = $('#endereco').val();
            var bairro = $('#bairro').val();
            var cidade = $('#cidade').val();
            var uf = $('#uf').val();
            var numero = $('#numero').val();
            var complemento = $('#complemento').val();
            var observacao = $('#observacao').val();
            if (nome.length <= 0){
                add_erro_input($('#titulo_expediente'), "Nome inválido ou não informado.");
                validacao = false;
            } else {
                remove_erro_input($('#titulo_expediente'));
            }
            if (validacao){
                //Mostra a div de loading no carregamento da pagina
                $('#preloader_modal').show();
                //alert(desc_servico);
                var data = {
                    id: id,
                    nome: nome,
                    cpf: cpf,
                    rg: rg,
                    orgao_emissor: orgao_emissor,
                    telefone: telefone,
                    celular: celular,
                    email: email,
                    cep: cep,
                    endereco: endereco,
                    bairro: bairro,
                    cidade: cidade,
                    uf: uf,
                    numero: numero,
                    complemento: complemento,
                    observacao: observacao,
                    verifica: verifica,
                    funcao: "alterar"
                };
                $.ajax({
                    url: '../../controller/cadastro.php',
                    method: "post",
                    data: data ,
                    success: function(data){
                        if (data){
                            monta_msg_sucesso_modal(" Alteração realizada com sucesso.")
                        }
                        $('#preloader_modal').hide();
                    }
                });
            }
        }

        //Função que cancela ao clicar em alterar e retorna para campos bloqueados
        function cancela_alteracao(){
            $('#botao_salvar').attr('hidden', true);
            $('#cancelar').attr('hidden', true);
            $('#alterar').removeAttr('hidden');
            $('#nome').attr('disabled', true);
            $('#cpf').attr('disabled', true);
            $('#rg').attr('disabled', true);
            $('#orgao_emissor').attr('disabled', true);
            $('#telefone').attr('disabled', true);
            $('#celular').attr('disabled', true);
            $('#email').attr('disabled', true);
            $('#cep').attr('disabled', true);
            $('#numero').attr('disabled', true);
            $('#complemento').attr('disabled', true);
            $('#observacao').attr('disabled', true);
        }

        //Funções para excluir registro
        function confirma_exclusao(id){
            //Mensagem de confirmação
            monta_msg_confirma(' Confirma exclusão desse cadastro? <a href="#" id="confirmaExclusao" class="btn btn-dark btn-sm" onclick="excluir('+id+', this)">Sim</a> <a href="#" id="cancela" class="btn btn-secondary btn-sm" onclick="excluir(0, this)">Não</a> ');
        }

        function confirma_reativacao(id){
            //Mensagem de confirmação
            monta_msg_confirma(' Confirma reativação desse cadastro? <a href="#" id="confirmaReativacao" class="btn btn-dark btn-sm" onclick="excluir('+id+', this)">Sim</a> <a href="#" id="cancela" class="btn btn-secondary btn-sm" onclick="excluir(0, this)">Não</a> ');
        }

        function excluir(id, id_button){
            if (id_button.id == "confirmaExclusao"){
                var data = {
                    id: id,
                    verifica: 1,
                    funcao: "excluir"
                };
                $.ajax({
                    url: '../../controller/cadastro.php',
                    method: "post",
                    data: data ,
                    success: function(data){
                        listar();
                        monta_msg_sucesso(" O cadastro foi desativado. Para reativar, basta clicar na opção <i class='fa fa-check-circle'></i>.");
                    }
                });
            }else if(id_button.id == "confirmaReativacao") {
                var data = {
                    id: id,
                    verifica: 0,
                    funcao: "excluir"
                };
                $.ajax({
                    url: '../../controller/cadastro.php',
                    method: "post",
                    data: data ,
                    success: function(data){
                        listar();
                        monta_msg_sucesso(" Cadastro reativado com sucesso.");
                    }
                });
            }else {
                remove_msg();
            }
        }

        //Funções para vincular registro
        function confirma_vinculacao(id){
            //Mensagem de confirmação
            monta_msg_confirma(' Confirma criar um veículo vinculado a esse cliente? <a href="#" id="confirma" class="btn btn-dark btn-sm" onclick="vincula('+id+', this)">Sim</a> <a href="#" id="cancela" class="btn btn-secondary btn-sm" onclick="vincula(0, this)">Não</a> ');
        }

        function vincula(id, id_botao){
            if (id_botao.id == 'confirma'){
                window.location.href='clienteCadastroVeiculo.php?codCli='+id;
            }else{
                remove_msg();
            }
        }

        //Função que busca cep na alteração
        function busca_cep(){
            var cep =  $('#cep').val();
            if(cep.length > 8 && ($.isNumeric(cep.charAt(0))) &&
                ($.isNumeric(cep.charAt(1))) && ($.isNumeric(cep.charAt(2))) &&
                ($.isNumeric(cep.charAt(3))) && ($.isNumeric(cep.charAt(4))) &&
                ($.isNumeric(cep.charAt(6))) && ($.isNumeric(cep.charAt(7))) &&
                ($.isNumeric(cep.charAt(8))) ){

                $.ajax({
                        url : '../../controller/consultar_cep.php', /* URL que será chamada */ 
                        type : 'POST', /* Tipo da requisição */ 
                        data: 'cep=' + $('#cep').val(), /* dado que será enviado via POST */
                        dataType: 'json', /* Tipo de transmissão */
                        success: function(data){
                            if(data.sucesso == 1){
                    
                                $('#endereco').val(data.rua);
                                $('#bairro').val(data.bairro);
                                $('#cidade').val(data.cidade);
                                $('#uf').val(data.estado);

                                $('#numero').removeAttr("disabled");
                                $('#complemento').removeAttr("disabled");

                                $('#numero').focus();

                                remove_erro_input($('#cep'));

                                controle_cep = true;
                            }else{
                                validacao_ok = false;
                                controle_cep = false;
                                add_erro_input($('#cep') , "CEP inválido ");
                            }
                        }
                }); 
            }else{
                $('#endereco').val('');
                $('#numero').val('');
                $('#complemento').val('');
                $('#bairro').val('');
                $('#cidade').val('');
                $('#uf').val('');	

                $('#endereco').attr("disabled" , true);
                $('#numero').attr("disabled" , true);
                $('#complemento').attr("disabled" , true);
                $('#bairro').attr("disabled" , true);
                $('#cidade').attr("disabled" , true);
                $('#uf').attr("disabled" , true);
            }
        }
    </script>
    
</html>