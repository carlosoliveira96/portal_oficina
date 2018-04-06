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
        <link  href="../static/css/fontawesome-all.min.css" rel="stylesheet">
        <!-- Arquivos JS -->
        <script type="text/javascript" src="../static/js/jasny-bootstrap.1.js"></script>

    </head>
    <body style="background-color: #F8F9FA;" id="body">
       <div class="container" style=" background-color: #fff">
            <h2>
                <p class="text-center" style="color: #000"><i><b>Cadastro de O.S</b></i></p>
            </h2>
            <hr>
            <div id="msg"></div>
            <div class="row">
                <div class="col-4">
                    <h6  style="margin-top:1rem"><i>Empresa</i></h6>	
                    <div class="input-group ">
                        <span class="input-group-addon" id="sizing-addon1"><i class="fa fa-building"></i></span>
                        <select class="form-control" id="empresa">
                            <option value="0">Selecione...</option>
                        </select>
                    </div>
                    <div class="text-danger"></div>
                </div>
                <div class="col-5">
                    <h6  style="margin-top:1rem"><i>Pesquisa </i></h6>	
                    <div class="input-group ">
                        <span class="input-group-addon" id="sizing-addon1"><i class="fa fa-search"></i></span>
                        <input type="text" id="pesquisa" class="form-control" placeholder="Placa " name="">
                    </div>
                    <div class="text-danger"></div>
                </div>
                <div class="col-1">
                    <button class="btn btn-dark" style="margin-top:2.4rem" onclick="busca_placa()"><i class="fa fa-search"></i> Buscar</button>
                </div>
            </div>
            <hr>
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
                        <input type="text" id="sinistro" onKeyPress="return(MascaraMoeda(this,'','',event))" class="form-control"  placeholder="Ex.:  999999999" name="">
                    </div>
                    <div class="text-danger"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <h6  style="margin-top:1rem"><i>Cliente</i></h6>	
                    <div class="input-group ">
                        <span class="input-group-addon" id="sizing-addon1"><i class="fa fa-user"></i></span>
                        <input type="text" id="cliente" class="form-control" disabled placeholder="Ex.: Exemplo Exemplo Exemplo" name="">
                    </div>
                    <div class="text-danger"></div>
                </div>
                <div class="col-6">
                    <h6  style="margin-top:1rem"><i>E-mail</i></h6>	
                    <div class="input-group ">
                        <span class="input-group-addon" id="sizing-addon1"><i class="fa fa-envelope"></i></span>
                        <input type="text" id="email" class="form-control" disabled placeholder="Ex.: exemplo@exemplo.com" name="">
                    </div>
                    <div class="text-danger"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-3" id="col_celular">
                    <h6  style="margin-top:1rem"><i>Celular</i></h6>	
                    <div class="input-group ">
                        <span class="input-group-addon" id="sizing-addon1"><i class="fa fa-mobile"></i></span>
                        <input type="text" id="celular" class="form-control" disabled  placeholder="Ex.:(99) 99999-9999" name="">
                    </div>
                    <div class="text-danger"></div>
                </div>
                <div class="col-3" id="col_telefone">
                    <h6  style="margin-top:1rem"><i>Telefone</i></h6>	
                    <div class="input-group ">
                        <span class="input-group-addon" id="sizing-addon1"><i class="fa fa-phone"></i></span>
                        <input type="text" id="telefone" class="form-control" disabled  placeholder="Ex.: (99) 9999-9999" name="">
                    </div>
                    <div class="text-danger"></div>
                </div>
                <div class="col-6">
                    <h6  style="margin-top:1rem"><i>Tipo</i></h6>	
                    <div class="input-group ">
                        <span class="input-group-addon" id="sizing-addon1"><i class="fa fa-address-book"></i></span>
                        <select class="form-control" id="tipo">
                            <option value="0">Selecione...</option>
                            <option value="segurado">Segurado</option>
                            <option value="terceiro">Terceiro</option>
                            <option value="particular">Particular</option>
                        </select>
                    </div>
                    <div class="text-danger"></div>
                </div>
            </div>
            <div class="row " id="cadastro_cliente">
			<div class="col-6">
				<h6 style="margin-top:1rem"><i>Seguradora</i></h6>	
				<div class="input-group ">
					<span class="input-group-addon " id="sizing-addon1"><i class="fa fa-user"></i></span>
					<select class="form-control" id="seguradora">
						<option value="">Selecione...</option>
					</select>
				</div>
				<div class="text-danger"></div>
			</div>
			<div class="col-6">
				<h6  style="margin-top:1rem"><i>Corretor</i></h6>	
				<div class="input-group ">
					<span class="input-group-addon" id="sizing-addon1"><i class="fa fa-user"></i></span>
					<select class="form-control" id="corretor">
						<option value="">Selecione..</option>
					</select>
				</div>
				<div class="text-danger"></div>
			</div>
		</div>
            <div class="row">
                <div class="col-6">
                    <h6  style="margin-top:1rem"><i>Valor</i></h6>	
                    <div class="input-group ">
                        <span class="input-group-addon" id="sizing-addon1">R$</span>
                        <input type="text" id="valor" onKeyPress="return(MascaraMoeda(this,'',',',event))" class="form-control"   placeholder="Ex.:  9999999,99" name="">
                    </div>
                    <div class="text-danger"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-12" id="col_imagem"> 
                <h6  style="margin-top:1rem"><i>Imagem</i></h6>	
                    <div class="fileinput fileinput-new " style="margin-top: 1rem" data-provides="fileinput" style="margin-left: 1rem">
                        <div class="fileinput-preview thumbnail img-thumbnail" data-trigger="fileinput" style="width: 69.5rem;  height: 17.5rem"></div>
                        <div>
                            <span class="btn btn-dark btn-file col-12">
                                <span class="fileinput-new ">Selecione a imagem</span>
                                <span class="fileinput-exists" data-dismiss="fileinput">Alterar</span>
                                <input type="file" id="arquivo" name="arquivo" accept="image/*">
                            </span>
                            <a href="#" class="btn btn-dark fileinput-exists col-12" data-dismiss="fileinput" style="margin-top: 0.5rem">Remover</a>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <h6  style="margin-top:1rem"><i>Serviços</i></h6>	
                    <div class="table-responsive">
                        <table class="table table-responsive table-stripped">
                            <thead >
                                <tr>
                                    <th scope="col">Comp.</th>
                                    <th scope="col">Serviço</th>
                                    <th scope="col">Funcionário</th>
                                    <th scope="col">Qtd. Peças</th>
                                    <th scope="col">
                                        <button  onclick="busca_servicos()"  class="btn btn-dark col-12"><i class="fa fa-plus"></i> Adicionar</button>
                                    </th>
                                </tr>
                            </thead>
                            <tbody id="tbody">

                            </tbody>
                        </table>
                    </div>
                    <div id="msg_servicos"></div>
                </div>
                <div class="col-12">
                    <button style="margin-top: 1rem" class="btn btn-dark btn-lg btn-block"  onclick="salvar()">
                        <i class="fa fa-check float-left" style="margin-top: 0.3rem;"></i> Salvar
                    </button>
                    <br>
			    </div>
            </div>
        </div>
        <div class="modal fade" id="adicionaServicos" tabindex="-1" role="dialog" aria-labelledby="adicionaServicos" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Adicionar Serviços</h5> 
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
                                        <input type="text" id="pesquisa_servico" onkeyup="busca_servicos()" class="form-control"  placeholder="Digite para pesquisar" name="">
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
        <div class="modal fade" id="selecionaPlaca" tabindex="-1" role="dialog" aria-labelledby="selecionaPlaca" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Selecionar Veículo/Cliente</h5> 
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-12" id="lista_veiculos">

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
    <script>

    var lista        = [];
    var funcionarios = [];
    var id_servicos  = [];
    var id_cliente   = 0;
    var qtd_servico  = 0 ;


    busca_corretores();
    busca_seguradoras();
    busca_empresas();
    
    function salvar(){
        
        var validacao_ok = true ;
        
        var empresa = $('#empresa').val();
        var placa = $('#placa').val();
        var sinistro = $('#sinistro').val();
        var tipo = $('#tipo').val();
        var valor = $('#valor').val();
       
        if(id_servicos.length == 0 ){
            var html =  '<div class="alert alert-danger">'+
                        '<i class="fa fa-exclamation-triangle"></i>  Por favor adicione um serviço'+
                        '</div>';
            window.location.href='#msg_servicos';
            $('#msg_servicos').html(html);
            validacao_ok = false;
        }else{
            for (var i = 0 ; i < id_servicos.length ; i++ ){

                var qtd_pecas = $('#'+id_servicos[i]+'i' ).val();
                var id_funcionario = $('#'+id_servicos[i]+'s' ).val();

                if(!isNaN(qtd_pecas)){
                    if(qtd_pecas <= 0 ){
                        validacao_ok = false;
                        add_erro_input($('#'+id_servicos[i]+'i') , "Por favor informe a quantidade de peças");
                    }else{
                        remove_erro_input($('#'+id_servicos[i]+'i')); 
                    }
                }else{
                    remove_erro_input($('#'+id_servicos[i]+'i')); 
                }
                
                if(id_funcionario == 0){
                    validacao_ok = false;
                    add_erro_input($('#'+id_servicos[i]+'s') , "Por favor selecione um funcionário");
                }else{
                    remove_erro_input($('#'+id_servicos[i]+'s'));
                }

            }

            $('#msg_servicos').html("");            
        }
        
        
        if(valor.length == 0 ){
            add_erro_input($('#valor') , "Por favor informe o Valor");
            window.location.href='#valor';
            validacao_ok = false;
        }else{
            remove_erro_input($('#valor'));
        }
        
        if(tipo == 0 ){
            add_erro_input($('#tipo') , "Por favor selecione um Tipo");
            window.location.href='#tipo';
            validacao_ok = false;
        }else{
            remove_erro_input($('#tipo'));
        }
        
        if(placa.length == 0 ){
            add_erro_input($('#placa') , "Por favor selecione um Carro");
            add_erro_input($('#veiculo') , "Por favor selecione um Carro");
            window.location.href='#placa';
            validacao_ok = false;
        }else{
            remove_erro_input($('#placa'));
            remove_erro_input($('#veiculo'));
        }
        
        if(sinistro.length == 0 ){
            add_erro_input($('#sinistro') , "Por favor selecione um Sinistro");
            window.location.href='#sinistro';
            validacao_ok = false;
        }else{
            remove_erro_input($('#sinistro'));
        }
        
        if(id_cliente == 0 ){
            add_erro_input($('#cliente') , "Por favor selecione um Cliente");
            add_erro_input($('#email') , "Por favor selecione um Cliente");
            add_erro_input($('#celular') , "Por favor selecione um Cliente");
            add_erro_input($('#telefone') , "Por favor selecione um Cliente");
            window.location.href='#cliente';
            validacao_ok = false;
        }else{
            remove_erro_input($('#cliente'));
            remove_erro_input($('#email'));
            remove_erro_input($('#celular'));
            remove_erro_input($('#telefone'));
        }
        
        
        if(empresa.length == 0 ){
            add_erro_input($('#empresa') , "Por favor selecione uma Empresa");
            window.location.href='#empresa';
            validacao_ok = false;
        }else{
            remove_erro_input($('#empresa'));
        }



        
        if(validacao_ok){

            var corretor = $('#corretor').val();
            var seguradora = $('#seguradora').val();

            // Obtém a data/hora atual
            var data2 = new Date();
 
            // Guarda cada pedaço em uma variável
            var dia     = data2.getDate();           // 1-31
            var mes     = data2.getMonth();          // 0-11 (zero=janeiro)
            var ano4    = data2.getFullYear();       // 4 dígitos
            // Formata a data e a hora (note o mês + 1)
            
            var m1 = mes+1;

            if (m1 < 10){
                m1 = "0"+ m1;
            }

            if (dia < 10){
                dia = "0"+ dia;
            }


            var str_data = dia + '/' + m1 + '/' + ano4;

            var data = new FormData();
            data.append('arquivo',$('#arquivo').prop('files')[0]);
            data.append('funcao',"cadastro_os");
            data.append('cliente_id', id_cliente );
            data.append('placa',placa);
            data.append('tipo',tipo);
            data.append('seguradora',seguradora);
            data.append('corretor',corretor);
            data.append('valor',valor);
            data.append('empresa_id',empresa);
            data.append('sinistro',sinistro);
            data.append('data_registro',str_data);
            $('#preloader').show();
           var id_os = 0; 
           $.ajax({
            url: '../../controller/osCadastro.php',
            method: "post",
            data: data ,
            dataType: 'script',
            cache: false,
            contentType: false,
            processData: false,
            success: function(data){
                    if(data){
                        salva_servicos(data);
                    }else{
                        $('#preloader').hide();
                        window.location.href='#body';
						monta_msg_erro("Ocorreu um erro, por favor tente mais tarde!");
                    }
                }
            });
            
         }
        
    }

    var ok = 0;
    function salva_servicos(id_os){

        var tamanho = id_servicos.length;

        for (var i = 0 ; i < id_servicos.length ; i++ ){
                
                var qtd_pecas = $('#'+id_servicos[i]+'i' ).val();
                var id_funcionario = $('#'+id_servicos[i]+'s' ).val();
                var comp    = $('#'+id_servicos[i]+'c' );
                var complemento = 0;

                if(comp.is(':checked')){
                    complemento = 1;
                }

                var qtd = 0;
                if(!isNaN(qtd_pecas)){
                    qtd = qtd_pecas;
                }

                var data = {
                    os_id : id_os ,   
                    qtd : qtd ,
                    funcionario_id : id_funcionario,
                    complemento : complemento,
                    servico_id : id_servicos[i] , 
                    funcao : "cadastro_servicos"
                };  
                 $.ajax({
                    url: '../../controller/osCadastro.php',
                    method: "post",
                    data: data ,
                    success: function(data){
                        if(data){
                            if(tamanho == i){
                                $('#preloader').hide();
                                $('#msg').html('');
                                html = '<div class="alert alert-success"><i class="fa fa-check"></i><strong> Cadastro efetuado com sucesso</strong></div>';
                                $('#msg').html(html);
                                window.location.href='#body';
                                window.setInterval(function(){
                                    window.location.href='os.php?codOS='+id_os;
                                },3000);
                            }
                        }else{
                            ('#preloader').hide();
                            window.location.href='#body';
                            monta_msg_erro("Ocorreu um erro, por favor tente mais tarde!");
                        }
                    }
                });

            }


            $('#corretor').val('');
            $('#seguradora').val('');
            $('#empresa').val('');
            $('#placa').val('');
            $('#sinistro').val('');
            $('#tipo').val('0');
            $('#cliente').val('');
            $('#email').val('');
            $('#veiculo').val('');
            $('#telefone').val('');
            $('#celular').val('');
            $('#valor').val('');

            $('#col_telefone').show();
            $('#col_celular').show();
            $('#tbody').html('');

            $('#col_imagem').load( "osCadastro.php #col_imagem" );

            lista        = [];
            funcionarios = [];
            id_servicos  = [];
            id_cliente   = 0;
            qtd_servico  = 0 ;

    }
    
    
function busca_servicos (){
        $('#preloader').show();
        $('#lista_servicos').val("");
        var pesquisa = $('#pesquisa_servico').val();
        var data = {funcao : "buscar_servicos" , pesquisa : pesquisa };
        var html= "";
        $.ajax({
            url: '../../controller/osCadastro.php',
            method: "post",
            data: data ,
            success: function(data){
                if(data){
                    var resultado = $.parseJSON(data);
                    if(resultado.length > 0){

                        $('#msg_servicos').html("");

                        $('#adicionaServicos').modal('show');
                        var html = "";
                        for(var i = 0; i < resultado.length ; i++){

                            html += '<div class="input-group" style="margin-top:1rem">'+
                            '<input type="text" class="form-control" disabled placeholder="'+resultado[i].descricao+'" aria-label="Recipients username" aria-describedby="basic-addon2">'+
                            '<div class="input-group-append">'+
                            '<button class="btn btn-dark" id="'+resultado[i].descricao+'" onclick="adiciona_servico('+resultado[i].id +','+ resultado[i].tipo_pagamento+', this)" type="button">Adicionar</button>'+
                            '</div>'+
                            '</div>';
                        }
                        $('#lista_servicos').html(html);

                        $('#preloader').hide();

                    }else{

                        var html =  '<div class="alert alert-danger">'+
                                    '<i class="fa fa-exclamation-triangle"></i>  Ocorreu um erro, por favor tente mais tarde'+
                                    '</div>';

                        window.location.href='#msg_servicos';

                        $('#msg_servicos').html(html);

                        $('#preloader').hide();
                    }
                }else{
                    var html =  '<div class="alert alert-danger">'+
                                '<i class="fa fa-exclamation-triangle"></i>  Não possui nenhum serviço cadastrado,  cadastre um para prosseguir com esta ação'+
                                '</div>';
                    window.location.href='#msg_servicos';
                    $('#msg_servicos').html(html);

                    $('#preloader').hide();
                }
            }
        });
    }

    
    function adiciona_servico(id , tipo_pagamento , descricao){

        var html = "";
        var confere = true;

        for(var i = 0 ; i < id_servicos.length ; i++){
            if( id == id_servicos[i] ){
                confere = false;
            }
        }


        id_servicos.push(id);

        busca_funcionario(id);
        $('#msg_servicos').html("");  

        if(tipo_pagamento == 0 && confere){
            html += '<tr id="'+id+'tr">'+
                    '<th scope="col"><input type="checkbox" id="'+id+'c"></th>'+
                    '<th style="display:none" id="'+id+'">'+id+'</th>'+
                    '<th scope="col">'+descricao.id+'</th>'+
                    '<td scope="col">'+
                    '<div>'+
                    '<select class="form-control" id="'+id+'s">'+
                    '<option value="0">Selecione um Funcionario</option>'+       
                    '</select>'+     
                    '</div>'+   
                    '<div class="text-danger"></div>'+          
                    '</td>'+
                    '<th scope="col">'+
                        '<div>'+
                        '<input type="text" class="form-control" placeholder="Qtd. peças" id="'+id+'i"  disabled value="Por carro">'+
                        '</div>'+   
                        '<div class="text-danger"></div>'+ 
                    '</th>'+
                    '<th scope="col">'+
                    '<button class="btn btn-dark col-12" onclick="remove_servico('+id+');"><i class="fa fa-trash"></i> Remover</buttona>'+
                    '</th>'+
                    '</tr>';
        }else if(confere){
            html += '<tr id="'+id+'tr">'+
                    '<th scope="col"><input type="checkbox" ></th>'+
                    '<th style="display:none">'+id+'</th>'+
                    '<th scope="col">'+descricao.id+'</th>'+
                    '<td scope="col">'+
                    '<div>'+
                    '<select class="form-control" id="'+id+'s">'+
                    '<option value="0">Selecione um Funcionario</option>'+       
                    '</select>'+     
                    '</div>'+   
                    '<div class="text-danger"></div>'+     
                    '</td>'+
                    '<td scope="col">'+
                        '<div>'+
                        '<input type="text" class="form-control" id="'+id+'i"  placeholder="Qtd. peças">'+
                        '</div>'+   
                        '<div class="text-danger"></div>'+ 
                    '</td>'+
                    '<th scope="col">'+
                    '<button class="btn btn-dark col-12" onclick="remove_servico('+id+');"><i class="fa fa-trash"></i> Remover</buttona>'+
                    '</th>'+
                    '</tr>';
        }

        $('#tbody').append(html);

    }

    function busca_funcionario(servico_id){
        
        var data = {funcao : "busca_funcionarios" , servico_id : servico_id };
        $.ajax({
            url: '../../controller/osCadastro.php',
            method: "post",
            data: data ,
            success: function(data){
                if(data){
                    var html = '';
                    var resultado = $.parseJSON(data);
                    for(var i = 0; i < resultado.length ; i++  ){
                        html += '<option value="'+resultado[i].id+'">'+resultado[i].nome+'</option>'; 
                    }   
                    $('#'+servico_id+'s').append(html);
                }
            }
        });
    }

    function remove_servico(id ){

        var nova_lista = id_servicos;
        id_servicos = [];
        for(var i = 0; i < nova_lista.length ; i++ ){
            if ( nova_lista[i] != id ){
                id_servicos.push(nova_lista[i]);
            }
        }
        $('#'+id+'tr').remove();

    }


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

    function busca_empresas(){
        
        $('#preloader').show();
        var data = {funcao: 'busca_empresas'};
        var html ;

        $.ajax({
            url: '../../controller/osCadastro.php',
            method: "post",
            data: data ,
            success: function(data){
                if(data){
                    var retorno = $.parseJSON(data);

                    html = "";
                    html += '<option value="">Selecione...</option>';
                    
                    for(var i=0; i < retorno.length ; i++ ){
                        html += '<option value="'+retorno[i].id+'">'+retorno[i].nome_fantasia+ '</option>';
                    }

                    $('#empresa').html(html);
                }
                $('#preloader').hide();
            }
        });
    }

    

    function busca_placa(){

        var placa = $('#pesquisa').val();

        var data = {
            placa : placa,
            funcao : "busca_placa"
        };

        $.ajax({
            url: '../../controller/osCadastro.php',
            method: "post",
            data: data ,
            success: function(data){
                if(data){
                    var retorno = $.parseJSON(data);
                    lista = retorno;
                    if (retorno.length > 0){

                        var placa = "";
                        var placa_old = "";

                        html = "";
                        html += '<table class="table table-secondary table-bordered table-hover">';
                                
                        for(var i = 0; i <retorno.length ; i++ ){

                            placa = retorno[i].placa; 
                            
                            if(placa != placa_old){
                                html += '<thead>'+
                                        '<tr>'+
                                        '<th colspan="2">Placa</th>'+
                                        '<th colspan="3">Veiculo</th>'+
                                        '</tr>'+
                                        '</thead>'+
                                        '<tbody>'+
		                                '<tr class="table-light">'+
                                        '<td colspan="2">'+retorno[i].placa+'</td>'+
			                            '<td colspan="3">'+retorno[i].fabricante +' '+retorno[i].modelo +' '+ retorno[i].cor +' '+retorno[i].ano_modelo +'/' +retorno[i].ano_fabricacao +'</td>'+
                                        '</tr>'+
                                        '</tbody>'+
                                        '<thead>'+
                                        '<tr>'+
                                        '<th colspan="3">Cliente</th>'+
                                        '<th colspan="1">CPF/CNPJ</th>'+
                                        '<th colspan="1" class="text-center" >Selecione</th>'+
                                        '</tr>'+
                                        '</thead>'+
                                        '<tbody>';
                            }
                            
                            html += '<tr class="table-light">';

                            if(retorno[i].cpf == null){
                                html += '<td colspan="3">'+retorno[i].nome_fantasia+'</td>'+
			                            '<td colspan="1">'+retorno[i].cnpj+'</td>';
                            }else{
                                html += '<td colspan="3">'+retorno[i].nome+'</td>'+
                                        '<td colspan="1">'+retorno[i].cpf+'</td>';
                            }
                            
                            var placa2  = placa.replace(/-/g,"_");
                            
                            var cliente_id = retorno[i].cliente_id;
                            
                            html += '<td colspan="1">'+
                                    '<center><button class="btn btn-dark" onclick="preenche_campo('+i+')">Selecionar</button></center>'+
                                    '</td>'+
                                    '</tr>';	                

                            if(placa == placa_old){
                                html += '</tbody>';
                            }

                            placa_old = retorno[i].placa;
                        }

                        html += '</table>';

                        $('#lista_veiculos').html(html);
                        $('#selecionaPlaca').modal('show');

                    
                    }else{
                    
                    }
                }else{

                }
            }
        });

    }

    function preenche_campo(i){

        id_cliente = lista[i].cliente_id;

        var veiculo = lista[i].fabricante +' '+lista[i].modelo +' '+ lista[i].cor +' '+lista[i].ano_modelo +'/' +lista[i].ano_fabricacao;
        var placa   = lista[i].placa;
        var email   = lista[i].email;
        var celular = lista[i].celular;
        var telefone = lista[i].telefone;
        var cliente;
        if (lista[i].cpf == null){
            cliente = lista[i].nome_fantasia;
        }else{
            cliente = lista[i].nome;
        }

        if(lista[i].telefone == null){
            $('#col_telefone').hide();
        }else{
            $('#telefone').val(lista[i].telefone);                            
        }
        
        if(lista[i].celular == null){
            $('#col_celular').hide();
        }else{
            $('#celular').val(lista[i].celular);                            
        }

        $('#veiculo').val(veiculo);
        $('#placa').val(placa);
        $('#cliente').val(cliente);
        $('#email').val(email);

        $('#selecionaPlaca').modal('hide');
    }

    </script>
</html>