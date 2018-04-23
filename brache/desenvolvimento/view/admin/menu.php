<?php
include "controle.php";
//var_dump($_SESSION);
?>
<!DOCTYPE html>
<html lang="pt-br" style="min-height:100%; position: relative;">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Portal da Oficina</title>
        <link rel="shortcut icon" href="" type="image/x-icon">
        <!-- Arquivos CSS -->
        <link rel="stylesheet" href="../static/css/bootstrap.css">
        <link href="../static/css/jasny-bootstrap.css" rel="stylesheet">
        <link rel="stylesheet" href="../static/css/jquery-ui.css">
        <link rel="stylesheet" href="../static/css/menu-custom.css">
        <link rel="stylesheet" href="../static/css/customScrollbar.css">
        <!-- Arquivos JS -->
        <script src="../static/js/jquery.js"></script>
        <script src="../static/js/customScrollbat.js"></script>
        <script src="../static/js/fontawesome-all.js"></script>
        <script src="../static/js/jasny-bootstrap.js"></script>
    </head>
    <body>
        <input type="hidden" id="usuario" value="<?=$_SESSION['usuario']?>">
        <input type="hidden" id="meu_id" value="<?=$_SESSION['meu_id_funcionario']?>">
        <div class="overlay"></div>
        <div id="preloader" class="carregando" style="display: none">
            <img src="../static/gif/loading.gif" style="position: fixed; margin-top: 25%; margin-left: 45%;">
        </div>
        <div class="wrapper">
            <nav id="sidebar">
                <div id="dismiss">
                    <i class="fas fa-chevron-circle-left"></i>
                </div>
                <div class="sidebar-header">

                    <?php if(isset($_SESSION['img_usurio'])){ ?>
                        <img src="../<?=$_SESSION['img_usurio']?>" class="rounded-circle" height="156" width="156">                    
                    <?php  } else{ ?>
                        <img src="../static/img/user.png" class="rounded-circle" height="156" width="156">
                    <?php  } ?>

                    <div class="row">
                        <div class="col-8">  
                            <strong><?php echo $_SESSION['usuario'] ?></strong>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <small><?php echo $_SESSION['cargo'] ?></small>
                        </div>
                    </div>
                </div>
                <hr style="border-color: #5E636B">
                <ul class="list-unstyled components">
                    <li class="active">
                        <a href="inicio.php">Início</a>
                    </li>
                    <li>
                        <a href="#atendimentoSubmenu" data-toggle="collapse" aria-expanded="false">Atendimentos</a>
                        <ul class="collapse list-unstyled" id="atendimentoSubmenu">
                            <li><a href="cadastro.php">Cadastro</a></li>
                            <li><a href="listarAtendimento.php">Listagem</a></li>
                         </ul>
                    </li>
                    <li>
                    <li>
                        <a href="veiculoCadastro.php">Veículo</a>
                    </li>
                    <li>
                        <a href="osCadastro.php">Ordem de Serviços</a>
                    </li>
                    <li>
                        <a href="#funcionarioSubmenu" data-toggle="collapse" aria-expanded="false">Funcionários</a>
                        <ul class="collapse list-unstyled" id="funcionarioSubmenu">
                            <li><a href="funcionarioCadastro.php">Cadastro</a></li>
                            <li><a href="funcionarioListar.php">Listagem</a></li>
                         </ul>
                    </li>
                    <li>
                        <a href="expedientes.php">Expedientes</a>
                    </li>
                     <!--
                    <li>
                        <a href="funcionarioCadastroServico.php">Cadastro de Serviços para Funcionários</a>
                    </li>
                  
                    <li>
                        <a href="pecas.php">Peças</a>
                    </li>
                    -->
                    <li>
                        <a href="servico.php">Serviços</a>
                    </li>
                    <!--
                    <li>
                        <a href="veiculoCadastro.php">Cadastro de Veículos</a>
                    </li>
                    -->
                </ul>
            </nav>

            <!-- Pagina do navbar -->
            <div class="navbar navbar-dark">
                <div class="float-left">
                    <button type="button" id="sidebarCollapse" class="btn btn-dark navbar-btn">
                        <i class="fas fa-bars"></i>
                        <span>Menu</span>
                    </button>
                </div>
                <div class="float-right">
                    <button type="" id="sidebarCollapse" class="btn btn-dark navbar-btn" data-toggle="modal" data-target="#comunicacao">
                        <i class="fas fa-comment-alt"></i>
                        <span>Comunicador</span>
                    </button>
                    <button type="" id="sidebarCollapse" class="btn btn-dark navbar-btn" onClick="logout()">
                        <i class="fas fa-sign-out-alt"></i>
                        <span>Sair</span>
                    </button>
                </div>
            </div>
        </div>
        <!-- Modal comunicador -->
        <div class="modal fade" id="comunicacao" tabindex="-1" role="dialog" aria-labelledby="comunicacaoInterna" aria-hidden="true">
            <div class="modal-dialog modal-elg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="btn-group " role="group" aria-label="Button group with nested dropdown">
                            <button type="button" id="btn_conversa" class="btn btn-dark active" onclick="seleciona_chat(this)">Conversas</button>
                            <button type="button" id="btn_grupo" class="btn btn-dark" onclick="seleciona_chat(this)">Grupos</button>

                            <div class="btn-group" role="group">
                                <button id="btnGroupDrop1" type="button" class="btn btn-dark dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span>Criar</span>    
                                </button>
                                <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                    <a class="dropdown-item" id="nova_conversa" href="#" onclick="criar(this)">Nova Conversa</a>
                                    <a class="dropdown-item" id="novo_grupo" href="#" onclick="criar(this)">Novo Grupo</a>
                                </div>
                            </div>
                        </div>
                        <h5 class="modal-title">Comunicador</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" id="comunicador-body" >
                        <div class="row">
                            <div class="col-4 ">
                                <div id="conversas">
                                    <div class="input-group">
                                        <span class="input-group-addon " id="sizing-addon1"><i class="fa fa-search"></i></span>
                                        <input type="text" id="pesquisa_conversas" onkeyup="busca_usuarios()" class="form-control" placeholder="Pesquisar funcionarios" maxlength="200" name="">
                                    </div>
                                    <hr>
                                    <div id="col-4" style="overflow-y: auto ; overflow-x : hidden" >
                                        <div id="chat_usuarios">
                                        
                                        </div>
                                    </div>
                                </div>

                                <div id="grupos">
                                    <div class="input-group " >
                                        <span class="input-group-addon " id="sizing-addon1"><i class="fa fa-search"></i></span>
                                        <input type="text" id="pesquisa_grupos" onkeyup="busca_grupos()" class="form-control" placeholder="Pesquisar grupos" maxlength="200" name="">
                                    </div>
                                    <hr>
                                    <div id="col-5" style="overflow-y: auto ; overflow-x : hidden" >
                                        <div id="chat_grupos">
                                        </div>
                                    </div>
                                </div>

                                
                            </div>
                            <div class="col-8">
                                <div id="criar_grupo">
                                    <div class="row">
                                        <div class="col-7">
                                            <h6 ><i>Nome do Grupo</i></h6>	
                                            <div class="input-group ">
                                                <span class="input-group-addon " id="sizing-addon1"><i class="fa fa-search"></i></span>
                                                <input type="text" id="nome_grupo" class="form-control" placeholder="Ex.: Exemplo exemplo">
                                            </div>
                                            <div class="text-danger"></div>
                                        </div>
                                        <div class="col-5">
                                            <button  class="btn btn-dark btn-block" onclick="salvar_grupo()" style="margin-top: 1.5rem;">
                                                <i class="fa fa-check float-left" style="margin-top: 0.3rem;"></i> Salvar
                                            </button>
                                        </div>
                                        <div class="col-12">
                                            <div class="row">
                                            <div class="col-7">
                                                <h6  style="margin-top:1rem"><i>Funcionários</i></h6> 
                                                <div class="card" style="margin-top:1rem;height:22rem;">
                                                    <div class="card-head">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="input-group ">
                                                                    <span class="input-group-addon " id="sizing-addon1"><i class="fa fa-search"></i></span>
                                                                    <input type="text" id="pesquisa_funcionarios" onkeyup="busca_participantes()" class="form-control" placeholder="Pesquisar funcionários" maxlength="200" name="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card-body" style="height:18rem; overflow-y: auto; overflow-x: hidden">
                                                        <div class="row">
                                                            <div class="col-12" id="adicionar_funcionario">
                                                                <!--
                                                                <div class="card  border-dark ">
                                                                    <div class="body"  style="margin-top:0.5rem ; margin-bottom : 0.5rem">
                                                                        <div class="row">
                                                                            <div class="col-12">
                                                                                <div class="row">
                                                                                    <div class="col-2"  >
                                                                                        <img src="../static/img/user.png"  style="margin-left:0.5rem" class="rounded-circle" height="50" width="50">
                                                                                    </div>
                                                                                    <div class="col-7">
                                                                                        <div style="margin-top:0.4rem"><strong>Usuário Usuário </strong></div>
                                                                                    </div>
                                                                                    <div class="col-3"  id="badge">
                                                                                        <button class="btn btn-dark"  style="margin-top:0.5rem" type="button"><i class="fa fa-plus"></i></button>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-5">
                                                <h6 style="margin-top:1rem;"><i>Participantes do grupo</i></h6> 
                                                <div class="card" style="margin-top:1rem; height:22rem;">
                                                    <div class="card-body" style="height:18rem; overflow-y: auto ; overflow-x: hidden">
                                                        <div class="row">
                                                            <div class="col-12" id="participantes_grupo">
                                                                <!--
                                                                <div class="input-group" style="margin-top:0.5rem">
                                                                    <input type="text" class="form-control" disabled placeholder="Serviço serviço" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                                                    <div class="input-group-append">
                                                                        <button class="btn btn-dark" type="button"><i class="fa fa-trash"></i></button>
                                                                    </div>
                                                                </div>
                                                                -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <br>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </div>
                                <div id="criar_conversa">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="input-group ">
                                                <span class="input-group-addon " id="sizing-addon1"><i class="fa fa-search"></i></span>
                                                <input type="text" id="pesquisa_nova_conversa" onkeyup="busca_nova_conversa()" class="form-control" placeholder="Pesquisar funcionários" maxlength="200" name="">
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="container-fluid" >
                                            <div class="row" id="lista_funcionarios">
                                            
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div  class="card" id="card_msg">
                                    <div class="card-head">
                                        <div class="row" style="margin-top: 0.5rem ; margin-bottom : 0.5rem">
                                            <div class="col-12">
                                                <div class="row">
                                                    <div class="col-2" id="img_contato"  >
                                                        <img src="../static/img/user.png"  style="margin-left:0.5rem" class="rounded-circle" height="50" width="50">
                                                    </div>
                                                    <div class="col-10">
                                                        <input type="hidden" id="id_contato">
                                                        <input type="hidden" id="id_grupo">
                                                        <div style="margin-top:0.8rem"><strong id="nome_contato">Usuário</strong></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="chat-box" class="card-body" style="overflow-x: hidden">
                                        <!--
                                        <div class="row" style="margin-top: 1rem">
                                            <div class="col-10" style="margin-left:0.5rem">
                                                <div class="card text-white bg-primary ">
                                                    <div class="body" style="margin-top:0.5rem ; margin-bottom : 0.5rem">
                                                        <div style="margin-left:0.5rem"><strong>Usuário</strong></div>
                                                        <div style="margin-left:1rem">teste</div> 
                                                    </div>
                                                </div>
                                            </div>    
                                        </div>
                                        <div class="row justify-content-end" style="margin-top: 1rem">
                                            <div class="col-10 " style="margin-right:0.5rem">
                                                <div class="card text-white bg-success ">
                                                    <div class="body" style="margin-top:0.5rem ; margin-bottom : 0.5rem">
                                                        <div style="margin-right:0.5rem"  class="text-right"><strong>Usuário</strong></div>
                                                        <div style="margin-right:1rem" class="text-right">teste</div> 
                                                    </div>
                                                </div>
                                            </div>    
                                        </div>
                                        -->
                                    </div>
                                    <div class="card-footer">
                                        <div class="form-group">
                                            <form name="frmChat" id="frmChat">
                                                <div class="row">
                                                    <div class="col-n-11">
                                                        <textarea placeholder="Mensagem..." id="chat-message" rows="2" class="form-control"></textarea>
                                                    </div>
                                                    <div class="col-n-1" style="padding-left: 0.3rem">
                                                        <button class="btn btn-dark" id="btnSend" name="send-chat-message" title="Enviar"> 
                                                            <i class="fa fa-share-square float-left" style="height: 3.5rem"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>  
                    </div>
                </div>
            </div>
        </div>
    </body>
    <script src="../static/js/popper.js"></script>
    <script src="../static/js/bootstrap.js"></script> 
    <script src="../static/js/jquery-ui.js"></script>
    <script src="../static/js/mascaraMoeda.js"></script> 
    <script src="../static/js/auxilio.js"></script> 
    <script>


    $('#grupos').hide();

    function seleciona_chat(elm){
        if(elm.id == "btn_conversa"){
            $('#grupos').hide();
            $('#conversas').show();
            $('#btn_grupo').removeClass('active');
            $('#btn_conversa').addClass('active');
        }else if(elm.id == "btn_grupo"){
            $('#btn_grupo').addClass('active');
            $('#btn_conversa').removeClass('active');
            busca_grupos();
            $('#grupos').show();
            $('#conversas').hide();
        }
    }

    function criar(elm){
        if(elm.id == "nova_conversa"){
            busca_nova_conversa();
            $('#card_msg').hide();
            $('#criar_conversa').show();
            $('#criar_grupo').hide();
            qtd_msg = 0 ; 
        }else if(elm.id == "novo_grupo"){
            busca_participantes();
            $('#card_msg').hide();
            $('#criar_conversa').hide();
            $('#criar_grupo').show();
        }
    }

    var lista_grupos = [];
    function busca_grupos(){
        var pesquisa = $('#pesquisa_grupos').val();
        var data = {funcao : 'busca_grupos', id : meu_id , pesquisa : pesquisa};

        $.ajax({
            url: '../../controller/chat.php',
            method: "post",
            data: data ,
            success: function(data){
                if(data){
                    var lista = $.parseJSON(data);
                    lista_grupos = lista;
                    if(lista.length > 0){
                        var html="";
                        for(var i = 0; i < lista.length ; i++){
                            html += '<div class="card border-dark " style="margin-top:0.2rem" onclick="seleciona_grupo('+i+')">'+
                                        '<div class="body"  style="margin-top:0.5rem ; margin-bottom : 0.5rem">'+
                                        '<div class="row">'+
                                        '<div class="col-12">'+
                                        '<div class="row">'+
                                        '<div class="col-3">'+
                                        '<img src="../static/img/users.png"  style="margin-left:0.5rem" class="rounded-circle" height="50" width="50">'+
                                        '</div>'+
                                        '<div class="col-9">'+
                                        '<div style="margin-top:0.8rem"><strong>'+lista[i].nome+'</strong></div>'+
                                        '</div>'+
                                        '</div>'+
                                        '</div>'+
                                        '</div>'+
                                        '</div>'+
                                        '</div>';
                        }
                        $('#chat_grupos').html(html);
                    }
                }
            }
        })
    }

    function seleciona_grupo(i){

        $('#comunicacao').hide();
        $('#preloader').show();
        $('#criar_conversa').hide();
        $('#criar_grupo').hide();
        var html = '<img src="../static/img/users.png"  style="margin-left:0.5rem" class="rounded-circle" height="50" width="50">';
        nome_funcionario = lista_grupos[i].nome;

        altura = $('#chat-box').height();

        $('#img_contato').html(html);
        $('#nome_contato').html(lista_grupos[i].nome);
        $('#id_contato').val('');
        $('#id_grupo').val(lista_grupos[i].id);
        busca_mensagem(lista_grupos[i].id , true);
        $('#card_msg').show();
    }

    lista_id = [];
    lista_nome = [];
    lista_funcionarios = [];
    function busca_participantes(){
        $('#preloader').show();
        var pesquisa = $('#pesquisa_funcionarios').val();
        var data = {funcao: 'busca_usuarios' , pesquisa : pesquisa };
        var html ;
        $.ajax({
            url: '../../controller/funcionarioListar.php',
            method: "post",
            data: data ,
            success: function(data){
                if(data){
                    var lista = $.parseJSON(data);
                    lista_funcionarios = lista;
                    var html = "";
                    if(lista.length > 0){
                        for(var i = 0; i < lista.length ; i++){

                            if(lista[i].id != meu_id){
                                html += '<div class="card border-dark " style="margin-top:0.2rem">'+
                                        '<div class="body"  style="margin-top:0.5rem ; margin-bottom : 0.5rem">'+
                                        '<div class="row">'+
                                        '<div class="col-12">'+
                                        '<div class="row">'+
                                        '<div class="col-2">';
                                if(lista[i].url_imagem == null){
                                    html += '<img src="../static/img/user.png"  style="margin-left:0.5rem" class="rounded-circle" height="50" width="50">';
                                }else{
                                    html += '<img src="../'+lista[i].url_imagem+'"  style="margin-left:0.5rem" class="rounded-circle" height="50" width="50">';
                                }       
                                html += '</div>'+
                                        '<div class="col-7">'+
                                        '<div style="margin-top:0.8rem"><strong>'+lista[i].nome+'</strong></div>'+
                                        '</div>'+
                                        '<div class="col-3"  id="badge">'+
                                        '<button class="btn btn-dark"  style="margin-top:0.5rem" type="button" onclick="adiciona_participante('+i+')"><i class="fa fa-plus"></i></button>'+
                                        '</div>'+
                                        '</div>'+
                                        '</div>'+
                                        '</div>'+
                                        '</div>'+
                                        '</div>';
                            }

                        }
                        $('#adicionar_funcionario').html(html);
                    }
                }
                $('#preloader').hide();
            }
        })
    }

    function adiciona_participante(posicao){
        

        var id = lista_funcionarios[posicao].id;
        var confere = true;

        for(var i = 0 ; i < lista_id.length ; i++){
            if( id == lista_id[i] ){
                confere = false;
            }
        }

        if(confere){
            lista_id.push(lista_funcionarios[posicao].id);
            lista_nome.push(lista_funcionarios[posicao].nome);
            atualiza_participantes();
        }
    }

    function atualiza_participantes(){
        var html = "";
        for(var i = 0; i < lista_id.length ; i++ ){
            html += '<div class="input-group" id="'+lista_id[i]+'input" style="margin-top:0.5rem">'+
                    '<input type="text" class="form-control" disabled  value="'+lista_nome[i]+'"  aria-describedby="basic-addon2">'+
                    '<div class="input-group-append">'+
                    '<button class="btn btn-dark" type="button" onclick="remove_participante('+lista_id[i]+')"><i class="fa fa-trash"></i></button>'+
                    '</div>'+
                    '</div>';
        }
        $('#participantes_grupo').html(html);
    }

    function remove_participante(id){
        var nova_lista = lista_id;
        var nova_lista_nomes = lista_nome;
        lista_id = [];
        lista_nome = [];
        for(var i = 0; i < nova_lista.length ; i++ ){
            if ( nova_lista[i] != id ){
                lista_id.push(nova_lista[i]);
                lista_nome.push(nova_lista_nomes[i]);
            }
        }
        $('#'+id+'input').remove();

    }

    function salvar_grupo(){
        var validacao_ok = true;
        var nome_grupo = $('#nome_grupo').val();

        if(nome_grupo.length == 0 ){
            add_erro_input($('#nome_grupo') , "Por favor preencha o campo Nome do Grupo");
            validacao_ok = false;
        }else{
            remove_erro_input($('#nome_grupo'));
        }

        if(lista_id.length == 0){
            $('#participantes_grupo').html("<div class='text-danger'>Adicione pelo menos um participante ao grupo</div>");
            validacao_ok = false;
        }else{
            $('#erro').html('');
        }
        
        if (validacao_ok){

            var data = {
                funcao : 'salva_grupo',
                nome : nome_grupo , 
                id : meu_id
            }

            $.ajax({
            url: '../../controller/chat.php',
            method: "post",
            data: data ,
            success: function(data){
                if(data){
                    for(var i = 0 ; i < lista_id.length; i++  ){
                        salva_participantes(data , lista_id[i]);
                    }
                    lista_id = [];
                    lista_nome = [];

                    busca_grupos();

                    $('#pesquisa_funcionarios').val('');
                    $('#nome_grupo').val('');
                    $('#participantes_grupo').html('');
                    $('#comunicacao').hide();
                    $('#preloader').show();
                    $('#criar_conversa').hide();
                    $('#criar_grupo').hide();
                    
                    nome_funcionario = nome_grupo;

                    altura = $('#chat-box').height();
                    var html = '<img src="../static/img/users.png"  style="margin-left:0.5rem" class="rounded-circle" height="50" width="50">';
                    $('#img_contato').html(html);
                    $('#nome_contato').html(nome_grupo);
                    $('#id_contato').val('');
                    $('#id_grupo').val(data);
                    $('#card_msg').show();
                    busca_mensagem(data , true);

                }
            }
            })
        }

    }

    function salva_participantes(id_grupo , id_funcionario){

        var data = {
            funcao : 'salva_participantes',
            id_grupo : id_grupo , 
            id_funcionario : id_funcionario
        }

        $.ajax({
        url: '../../controller/chat.php',
        method: "post",
        data: data ,
        success: function(data){
            }
        })
    }

    var usuario = $('#usuario').val();
    var meu_id = $('#meu_id').val();
    //Mensagem
    function showMessage(messageHTML) {
        $('#chat-box').append(messageHTML);
    }

    var altura = $('#chat-box').height();

    $('#card_msg').hide();
    $('#criar_grupo').hide();
    $('#criar_conversa').hide();

    $(document).ready(function(){
        var websocket = new WebSocket("ws://localhost:8090/php-socket.php"); 
        websocket.onopen = function(event) { 
           // showMessage("<div class='chat-connection-ack'>Connection is established!</div>");       
        }
        websocket.onmessage = function(event) {
            var Data = JSON.parse(event.data);
            if(Data.usuario != null){
                if (usuario == Data.usuario){
                    var html = '<div class="row justify-content-end" style="margin-top: 1rem">';
                        html += '<div class="col-10 " style="margin-right:0.5rem">';
                        html += '<div class="card text-white bg-success ">';
                        html += '<div class="body" style="margin-top:0.5rem ; margin-bottom : 0.5rem">';
                        html += '<div style="margin-right:0.5rem"  class="text-right"><small>'+Data.data+' - '+Data.hora+' &nbsp;&nbsp; </small><strong> Eu </strong></div>';
                        html += '<div style="margin-right:1rem" class="text-right">'+Data.message+'</div>';
                        html += '</div>';
                        html += '</div>';
                        html += '</div>';
                        html += '</div>';
                    showMessage(html);
                }else if(meu_id == Data.usuario2 && Data.id_user ==  $('#id_contato').val()  ){
                    var html = '<div class="row" style="margin-top: 1rem">';
                        html += '<div class="col-10" style="margin-left:0.5rem">';
                        html += '<div class="card text-white bg-primary ">';
                        html += '<div class="body" style="margin-top:0.5rem ; margin-bottom : 0.5rem">';
                        html += '<div style="margin-left:0.5rem"><strong>'+Data.usuario+'</strong><small> &nbsp;&nbsp;'+Data.data+' - '+Data.hora+'</small></div>';
                        html += '<div style="margin-left:1rem">'+Data.message+'</div>';
                        html += '</div>';
                        html += '</div>';
                        html += '</div>';    
                        html += '</div>';
                    showMessage(html);
                }else if(Data.grupo_id == $('#id_grupo').val()){
                    var html = '<div class="row" style="margin-top: 1rem">';
                        html += '<div class="col-10" style="margin-left:0.5rem">';
                        html += '<div class="card text-white bg-primary ">';
                        html += '<div class="body" style="margin-top:0.5rem ; margin-bottom : 0.5rem">';
                        html += '<div style="margin-left:0.5rem"><strong>'+Data.usuario+'</strong><small> &nbsp;&nbsp;'+Data.data+' - '+Data.hora+'</small></div>';
                        html += '<div style="margin-left:1rem">'+Data.message+'</div>';
                        html += '</div>';
                        html += '</div>';
                        html += '</div>';    
                        html += '</div>';
                    showMessage(html);
                }
            }

            altura += 90;

            $('#chat-box').animate({
                    scrollTop: altura
                }, 500);

            $('#chat-message').val('');
        };
        
        websocket.onerror = function(event){
            showMessage("<div class='error'>Problem due to some Error</div>");
        };
        websocket.onclose = function(event){
            showMessage("<div class='chat-connection-ack'>Connection Closed</div>");
        }; 
        
        $('#frmChat').on("submit",function(event){
            var data2 = new Date();
 
            // Guarda cada pedaço em uma variável
            var dia     = data2.getDate();           // 1-31
            var mes     = data2.getMonth();          // 0-11 (zero=janeiro)
            var ano4    = data2.getFullYear();       // 4 dígitos
            var hora    = data2.getHours();          // 0-23
            var min     = data2.getMinutes();        // 0-59
            // Formata a data e a hora (note o mês + 1)
            var m1 = mes+1;
            if (m1 < 10){
                m1 = "0"+ m1;
            }

            if (min < 10){
                min = "0"+ min;
            }

            if (hora < 10){
                hora = "0"+ hora;
            }

            var str_hora = hora +':'+min;
            var str_data = dia + '/' + m1 + '/' + ano4;


            event.preventDefault(); 
            
            var id_grupo = $('#id_grupo').val();
            var id_contato = $('#id_contato').val();

            var messageJSON = {};
            
            if(id_contato.length == 0){
                 messageJSON = {
                    chat_user : usuario , 
                    usuario2 : null , 
                    id_grupo : $('#id_grupo').val(),
                    chat_message: $('#chat-message').val(),
                    hora : str_hora,
                    data : str_data,
                    id_user : meu_id
                };
            }else{

                 messageJSON = {
                    chat_user : usuario , 
                    usuario2 : $('#id_contato').val() , 
                    id_grupo : null,
                    chat_message: $('#chat-message').val(),
                    hora : str_hora,
                    data : str_data,
                    id_user : meu_id
                };
                
            }

            var texto = $('#chat-message').val();
            if (texto.length > 0){

                msg = messageJSON;
                if(id_contato.length == 0){               
                    salva_mensagem(true);
                }else{               
                    salva_mensagem(false);
                }

            }else{

                 messageJSON = {
                    chat_user : null , 
                    usuario2 : null, 
                    id_grupo : null ,
                    chat_message: null ,
                    hora : null,
                    data : null 
                };
            }
            $('#chat-message').val('');

            

            websocket.send(JSON.stringify(messageJSON));
        });
        $('#chat-box').append(messageHTML);
    });
    //Fim mensagem
    
    $(document).ready(function () {
        $("#sidebar").mCustomScrollbar({
            theme: "minimal"
        });

        // Abrir o sidebar
        $('#sidebarCollapse').on('click', function () {
            // open sidebar
            $('#sidebar').addClass('active');
            // fade in the overlay
            $('.overlay').fadeIn();
            $('.collapse.in').toggleClass('in');
            $('a[aria-expanded=true]').attr('aria-expanded', 'false');
        });

        // Click para abrir e fechar
        $('#dismiss, .overlay').on('click', function () {
          // hide the sidebar
          $('#sidebar').removeClass('active');
          // fade out the overlay
          $('.overlay').fadeOut();
        });
    });

    var msg = [];

    function logout(){  
        var usuario = null;
        var senha = null;
        var data = {usuario: usuario , senha:senha , funcao: 'logout'};
        var html ;
        $.ajax({
            url: '../../controller/login.php',
            method: "post",
            data: data ,
            success: function(data){
                window.location.href = "controle.php";
            }
        })
    }

    busca_usuarios();
    var lista_usuarios = [];
    function busca_usuarios(){  
        var pesquisa = $('#pesquisa_conversas').val();
        var data = {funcao: 'busca_conversas' , pesquisa : pesquisa , meu_id : meu_id };
        var html ;
        $.ajax({
            url: '../../controller/chat.php',
            method: "post",
            data: data ,
            success: function(data){ 
                if(data){
                    var lista = $.parseJSON(data);
                    lista_usuarios = lista;
                    var lista_verificacao = [];
                    var lista_ids = [];

                    for(var i = 0; i < lista.length ; i++){
                        if(!lista_ids.includes(lista[i].id)){
                            lista_ids.push(lista[i].id);
                            lista_verificacao.push(lista[i]);
                        }
                    } 

                    lista = lista_verificacao;

                    var html = "";
                    if(lista.length > 0){
                        for(var i = 0; i < lista.length ; i++){
                            if(lista[i].id != meu_id){
                                html += '<div class="card border-dark " onclick="seleciona_funcionario('+i+')" style="margin-top:0.2rem">'+
                                        '<div class="body"  style="margin-top:0.5rem ; margin-bottom : 0.5rem">'+
                                        '<div class="row">'+
                                        '<div class="col-12">'+
                                        '<div class="row">'+
                                        '<div class="col-3">';
                                if(lista[i].url_imagem == null){
                                    html += '<img src="../static/img/user.png"  style="margin-left:0.5rem" class="rounded-circle" height="50" width="50">';
                                }else{
                                    html += '<img src="../'+lista[i].url_imagem+'"  style="margin-left:0.5rem" class="rounded-circle" height="50" width="50">';
                                }       
                                html += '</div>'+
                                        '<div class="col-9">'+
                                        '<div style="margin-top:0.8rem"><strong>'+lista[i].nome+'</strong></div>'+
                                        '</div>'+
                                        '</div>'+
                                        '</div>'+
                                        '</div>'+
                                        '</div>'+
                                        '</div>';
                            }

                        }
                        $('#chat_usuarios').html(html);
                    }
                }
            }
        })
    }

    var lista_usuarios2 = [];
    function busca_nova_conversa(){  
        var pesquisa = $('#pesquisa_nova_conversa').val();
        var data = {funcao: 'busca_usuarios' , pesquisa : pesquisa  };
        var html ;
        $.ajax({
            url: '../../controller/funcionarioListar.php',
            method: "post",
            data: data ,
            success: function(data){ 
                if(data){
                    var lista = $.parseJSON(data);
                    lista_usuarios2 = lista;

                    var html = "";
                    if(lista.length > 0){
                        for(var i = 0; i < lista.length ; i++){
                            if(lista[i].id != meu_id){
                                html += '<div class="col-6">'+
                                        '<div class="card border-dark " onclick="seleciona_funcionario2('+i+')" style="margin-top:0.2rem">'+
                                        '<div class="body"  style="margin-top:0.5rem ; margin-bottom : 0.5rem">'+
                                        '<div class="row">'+
                                        '<div class="col-12">'+
                                        '<div class="row">'+
                                        '<div class="col-3">';
                                if(lista[i].url_imagem == null){
                                    html += '<img src="../static/img/user.png"  style="margin-left:0.5rem" class="rounded-circle" height="50" width="50">';
                                }else{
                                    html += '<img src="../'+lista[i].url_imagem+'"  style="margin-left:0.5rem" class="rounded-circle" height="50" width="50">';
                                }       
                                html += '</div>'+
                                        '<div class="col-9">'+
                                        '<div style="margin-top:0.8rem"><strong>'+lista[i].nome+'</strong></div>'+
                                        '</div>'+
                                        '</div>'+
                                        '</div>'+
                                        '</div>'+
                                        '</div>'+
                                        '</div>'+
                                        '</div>';
                            }

                        }
                        $('#lista_funcionarios').html(html);
                    }
                }
            }
        })
    }

    function seleciona_funcionario(i){
        $('#comunicacao').hide();
        $('#preloader').show();
        $('#criar_conversa').hide();
        $('#criar_grupo').hide();
        var html = ""
        if(lista_usuarios[i].url_imagem == null){
            html += '<img src="../static/img/user.png"  style="margin-left:0.5rem" class="rounded-circle" height="50" width="50">';
        }else{
            html += '<img src="../'+lista_usuarios[i].url_imagem+'"  style="margin-left:0.5rem" class="rounded-circle" height="50" width="50">';
        }
        
        nome_funcionario = lista_usuarios[i].nome;

        altura = $('#chat-box').height();

        $('#img_contato').html(html);
        $('#nome_contato').html(lista_usuarios[i].nome);
        $('#id_contato').val(lista_usuarios[i].id);
        $('#id_grupo').val('');
        busca_mensagem(lista_usuarios[i].id , false);
    }

    function seleciona_funcionario2(i){
        $('#comunicacao').hide();
        $('#preloader').show();
        $('#criar_conversa').hide();
        $('#criar_grupo').hide();
        var html = ""
        if(lista_usuarios2[i].url_imagem == null){
            html += '<img src="../static/img/user.png"  style="margin-left:0.5rem" class="rounded-circle" height="50" width="50">';
        }else{
            html += '<img src="../'+lista_usuarios2[i].url_imagem+'"  style="margin-left:0.5rem" class="rounded-circle" height="50" width="50">';
        }
        
        nome_funcionario = lista_usuarios2[i].nome;

        altura = $('#chat-box').height();

        $('#img_contato').html(html);
        $('#nome_contato').html(lista_usuarios2[i].nome);
        $('#id_contato').val(lista_usuarios2[i].id);
        $('#id_grupo').val('');
        busca_mensagem(lista_usuarios2[i].id , false);
    }

    var nome_funcionario = "";
    var qtd_msg = 0;

    function busca_mensagem(funcionario_id , is_grupo){

        $('#chat-box').html('');
        var data = {};
        if(is_grupo){
            var data = {
                funcao : 'busca_mensagem',
                id_grupo : funcionario_id ,
                login : "" , 
                funcionario : "",
            };
        }else{
            var data = {
                funcao : 'busca_mensagem',
                id_grupo : "",
                login : usuario , 
                funcionario : funcionario_id,
            };
        }

         $.ajax({
            url: '../../controller/chat.php',
            method: "post",
            data: data ,
            success: function(data){
                if(data){
                    var lista = $.parseJSON(data);
                    var html = "";
                    if(lista.length > 0){
                        for(var i = 0; i < lista.length ; i++){   
                            if(is_grupo){
                                if (meu_id == lista[i].funcionario_id){
                                        html += '<div class="row justify-content-end" style="margin-top: 1rem">';
                                        html += '<div class="col-10 " style="margin-right:0.5rem">';
                                        html += '<div class="card text-white bg-success ">';
                                        html += '<div class="body" style="margin-top:0.5rem ; margin-bottom : 0.5rem">';
                                        html += '<div style="margin-right:0.5rem"  class="text-right"><small>'+lista[i].data_envio+' - '+lista[i].hora_envio+' &nbsp;&nbsp; </small><strong> Eu </strong></div>';
                                        html += '<div style="margin-right:1rem" class="text-right">'+lista[i].mensagem+'</div>';
                                        html += '</div>';
                                        html += '</div>';
                                        html += '</div>';
                                        html += '</div>';
                                }else  {
                                        html += '<div class="row" style="margin-top: 1rem">';
                                        html += '<div class="col-10" style="margin-left:0.5rem">';
                                        html += '<div class="card text-white bg-primary ">';
                                        html += '<div class="body" style="margin-top:0.5rem ; margin-bottom : 0.5rem">';
                                        html += '<div style="margin-left:0.5rem"><strong>'+lista[i].nome+'</strong><small> &nbsp;&nbsp;'+lista[i].data_envio+' - '+lista[i].hora_envio+'</small></div>';
                                        html += '<div style="margin-left:1rem">'+lista[i].mensagem+'</div>';
                                        html += '</div>';
                                        html += '</div>';
                                        html += '</div>';    
                                        html += '</div>';
                                }
                            }else{
                                qtd_msg = lista.length;
                                if (meu_id == lista[i].funcionario_id){
                                        html += '<div class="row justify-content-end" style="margin-top: 1rem">';
                                        html += '<div class="col-10 " style="margin-right:0.5rem">';
                                        html += '<div class="card text-white bg-success ">';
                                        html += '<div class="body" style="margin-top:0.5rem ; margin-bottom : 0.5rem">';
                                        html += '<div style="margin-right:0.5rem"  class="text-right"><small>'+lista[i].data+' - '+lista[i].hora+' &nbsp;&nbsp; </small><strong> Eu </strong></div>';
                                        html += '<div style="margin-right:1rem" class="text-right">'+lista[i].mensagem+'</div>';
                                        html += '</div>';
                                        html += '</div>';
                                        html += '</div>';
                                        html += '</div>';
                                }else  {
                                        html += '<div class="row" style="margin-top: 1rem">';
                                        html += '<div class="col-10" style="margin-left:0.5rem">';
                                        html += '<div class="card text-white bg-primary ">';
                                        html += '<div class="body" style="margin-top:0.5rem ; margin-bottom : 0.5rem">';
                                        html += '<div style="margin-left:0.5rem"><strong>'+nome_funcionario+'</strong><small> &nbsp;&nbsp;'+lista[i].data+' - '+lista[i].hora+'</small></div>';
                                        html += '<div style="margin-left:1rem">'+lista[i].mensagem+'</div>';
                                        html += '</div>';
                                        html += '</div>';
                                        html += '</div>';    
                                        html += '</div>';
                                }
                            }
                            altura += 90;
                        }
                    }   
                }
                $('#chat-box').append(html);
                
                 $('#chat-box').animate({
                    scrollTop: altura
                }, 5);

                $('#comunicacao').show();
                $('#preloader').hide();
                $('#card_msg').show();
            }
        })

    }

    function salva_mensagem(is_grupo){

        var data = {};
        if(is_grupo){
             data = {
                funcao : 'salva_mensagem',
                login : "" , 
                funcionario_id1 : meu_id ,
                id_grupo : $('#id_grupo').val() , 
                data : msg.data , 
                hora : msg.hora , 
                mensagem : msg.chat_message
            };

        }else{
             data = {
                funcao : 'salva_mensagem',
                login : usuario , 
                funcionario_id1 : $('#id_contato').val() ,
                id_grupo : "" , 
                data : msg.data , 
                hora : msg.hora , 
                mensagem : msg.chat_message
            };

        }

         $.ajax({
            url: '../../controller/chat.php',
            method: "post",
            data: data ,
            success: function(data){
                if(!is_grupo){
                    if(qtd_msg == 0){
                        busca_usuarios();
                        qtd_msg == 1;
                    }
                }
            }
        })
    }

    atualiza_tamanho1();

    function atualiza_tamanho1(){
        var tamanho_container = $(window).height();
        var tamanho_div_modal = $(window).height();
        var tamanho_div_usuario = $(window).height();
        var tamanho_div_msg = $(window).height();
        tamanho_container -= 66;
        tamanho_div_modal -= 130;
        tamanho_div_usuario -= 250;
        tamanho_div_msg -= 350;
        $('#container').css("height", tamanho_container);
        $('#comunicador-body').css("height", tamanho_div_modal);
        $('#col-4').css("height", tamanho_div_usuario);
        $('#col-5').css("height", tamanho_div_usuario);
        $('#chat-box').css("height", tamanho_div_msg);
    }

    window.addEventListener('resize', function(){
        atualiza_tamanho1();
    });

    </script>
</html>