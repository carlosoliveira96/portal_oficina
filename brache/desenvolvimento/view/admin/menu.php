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
                    <img src="../static/img/user.png" class="rounded-circle" height="156" width="156">
                    <p>Usuário logado</p>
                    <p>Cargo</p>
                </div>
                <hr style="border-color: #5E636B">
                <ul class="list-unstyled components">
                    <li class="active">
                        <a href="inicio.php">Início</a>
                    </li>
                    <li>
                        <a href="cadastro.php">Atendimentos</a>
                    </li>
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
                        <a href="funcionarioCadastroServico.php">Cadastro de Serviços para Funcionários</a>
                    </li>
                    <!--
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
                        <h5 class="modal-title">Comunicador</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" id="comunicador-body" >
                        <div class="row">
                            <div class="col-4 border-right">
                                <div class="input-group ">
                                    <span class="input-group-addon " id="sizing-addon1"><i class="fa fa-search"></i></span>
                                    <input type="text" id="pesquisa" onkeyup="busca_usuarios()" class="form-control" placeholder="Pesquisar funcionarios" maxlength="200" name="">
                                </div>
                                <hr>
                                <div id="col-4" style="overflow-y: auto ; overflow-x : hidden" >
                                    <div id="chat_usuarios">
                                    
                                    </div>
                                </div>
                                 
                                <div class="card  border-dark ">
                                    <div class="body"  style="margin-top:0.5rem ; margin-bottom : 0.5rem">
                                       <!--
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="row">
                                                    <div class="col-3"  >
                                                        <img src="../static/img/user.png"  style="margin-left:0.5rem" class="rounded-circle" height="50" width="50">
                                                    </div>
                                                    <div class="col-7">
                                                        <div style="margin-top:0.8rem"><strong>Usuário</strong></div>
                                                    </div>
                                                    <div class="col-2"  id="badge">
                                                        <span class="badge badge-dark" style="margin-top:1rem">
                                                            <i class="fa fa-envelope"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                      -->
                                    </div>
                                </div>
                            </div>
                            <div class="col-8">
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
                                                        <div style="margin-top:0.8rem"><strong id="nome_contato">Usuário</strong></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="chat-box" class="cadr-body" style="overflow-x: hidden">
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
    var usuario = $('#usuario').val();
    var meu_id = $('#meu_id').val();
    //Mensagem
    function showMessage(messageHTML) {
        $('#chat-box').append(messageHTML);
    }

    var altura = $('#chat-box').height();

    $('#card_msg').hide();

    $(document).ready(function(){
        var websocket = new WebSocket("ws://localhost:8090/php-socket.php"); 
        websocket.onopen = function(event) { 
           // showMessage("<div class='chat-connection-ack'>Connection is established!</div>");       
        }
        websocket.onmessage = function(event) {
            var Data = JSON.parse(event.data);
            alert(JSON.stringify(Data));
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
                }else if( $('#id_contato').val() == Data.usuario2 && usuario == Data.usuario ) {
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

            var str_hora = hora +':'+min;
            var str_data = dia + '/' + m1 + '/' + ano4;


            event.preventDefault(); 
            var messageJSON = {
                chat_user : usuario , 
                usuario2 : $('#id_contato').val() , 
                chat_message: $('#chat-message').val(),
                hora : str_hora,
                data : str_data,
                id_user : meu_id
            };

            var texto = $('#chat-message').val();
            if (texto.length > 0){

                msg = messageJSON;
                salva_mensagem();

            }else{

                var messageJSON = {
                    chat_user : null , 
                    usuario2 : null, 
                    chat_message: null ,
                    hora : null,
                    data : null 
                };
            }
            
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
        var pesquisa = $('#pesquisa').val();
        var data = {funcao: 'busca_usuarios' , pesquisa : pesquisa };
        var html ;
        $.ajax({
            url: '../../controller/funcionarioListar.php',
            method: "post",
            data: data ,
            success: function(data){
                if(data){
                    var lista = $.parseJSON(data);
                    lista_usuarios = lista;
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

    function seleciona_funcionario(i){

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
        busca_mensagem(lista_usuarios[i].id);
    }

    var nome_funcionario = "";

    function busca_mensagem(funcionario_id){

        $('#chat-box').html('');

        var data = {
            funcao : 'busca_mensagem',
            login : usuario , 
            funcionario : funcionario_id,
        };

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
                            altura += 90;
                        }
                    }   
                }
                $('#chat-box').append(html);
                
                 $('#chat-box').animate({
                    scrollTop: altura
                }, 500);

                $('#card_msg').show();
            }
        })

    }

    function salva_mensagem(){
        var data = {
            funcao : 'salva_mensagem',
            login : usuario , 
            funcionario_id1 : $('#id_contato').val() ,
            data : msg.data , 
            hora : msg.hora , 
            mensagem : msg.chat_message
        };

         $.ajax({
            url: '../../controller/chat.php',
            method: "post",
            data: data ,
            success: function(data){
              
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
        $('#chat-box').css("height", tamanho_div_msg);
    }

    window.addEventListener('resize', function(){
        atualiza_tamanho1();
    });

    </script>
</html>