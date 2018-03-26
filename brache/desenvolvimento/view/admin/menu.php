<?php
include "controle.php";
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
                    <div class="modal-body" id="comunicador-body" style="overflow-y: auto">
                        <div class="row">
                            <div class="col-4">
                                <label for="comunicador">
                                    <h6 style="margin-top:1rem"><i>Funcionários</i></h6>
                                </label>
                                <table class="table table-secondary table-bordered table-striped table-hover" id="funcionariosComunicador">
                                    <thead>
                                    </thead>
                                    <tbody data-link="row" id="lista_funcionarios">
                                        <tr>
                                            <th class="col-12" style="width: 90%; font-weight: normal">
                                                funcionário
                                            </th>
                                        </tr>
                                        <tr>
                                            <th class="col-12" style="width: 90%; font-weight: normal">
                                                funcionário
                                            </th>
                                        </tr>
                                        <tr>
                                            <th class="col-12" style="width: 90%; font-weight: normal">
                                                funcionário
                                            </th>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="linha-vertical"></div>
                            <div class="col-7">
                                <label for="comunicador">
                                    <h6 style="margin-top:1rem"><i>Mensagen para o funcionário</i></h6>
                                </label>
                                <div id="chat-box"></div>
                                <br>
                                <table class="table" id="funcionariosComunicador" style="height: 30rem">
                                    <thead>
                                    </thead>
                                    <tbody data-link="row" id="lista_mensagens">
                                        <tr style="border: 1px solid #343A40; ">
                                            <th style="border: 1px solid #343A40;">
                                                <div class="alert alert-warning  float-right" style="width: 90%; position: absolute; bottom: 7rem;" role="alert">
                                                    <h6 class="text-right">Mensagem enviada</h6>
                                                </div>
                                                <div class="alert alert-success float-left" style="width: 90%; position: absolute; bottom: 12rem;" role="alert">
                                                    <h6 class="text-left">Mensagem recebida</h6>
                                                </div>
                                            </th>
                                        </tr>
                                    </tbody>
                                </table>
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
    </body>
    <script src="../static/js/popper.js"></script>
    <script src="../static/js/bootstrap.js"></script> 
    <script src="../static/js/jquery-ui.js"></script>
    <script src="../static/js/mascaraMoeda.js"></script> 
    <script src="../static/js/auxilio.js"></script> 
    <script>
    //Mensagem
    function showMessage(messageHTML) {
        $('#chat-box').append(messageHTML);
    }

    $(document).ready(function(){
        var websocket = new WebSocket("ws://localhost:8090/php-socket.php"); 
        websocket.onopen = function(event) { 
            showMessage("<div class='chat-connection-ack'>Connection is established!</div>");       
        }
        websocket.onmessage = function(event) {
            var Data = JSON.parse(event.data);
            showMessage("<div class='"+Data.message_type+"'>teste</div>");
            showMessage("<div class='"+Data.message_type+"'>"+Data.message+"</div>");
            $('#chat-message').val('');
        };
        
        websocket.onerror = function(event){
            showMessage("<div class='error'>Problem due to some Error</div>");
        };
        websocket.onclose = function(event){
            showMessage("<div class='chat-connection-ack'>Connection Closed</div>");
        }; 
        
        $('#frmChat').on("submit",function(event){
            event.preventDefault(); 
            var messageJSON = {
                chat_message: $('#chat-message').val()
            };
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
                alert(data);
                window.location.href = "controle.php";
            }
        })
    }

    atualiza_tamanho1();

    function atualiza_tamanho1(){
        var tamanho_container = $(window).height();
        var tamanho_div_modal = $(window).height();
        var tamanho_div_msg = $(window).height();
        tamanho_container -= 66;
        tamanho_div_modal -= 130;
        tamanho_div_msg -= 350;
        $('#container').css("height", tamanho_container);
        $('#comunicador-body').css("height", tamanho_div_modal);
        $('#chat-box').css("height", tamanho_div_msg);
    }

    window.addEventListener('resize', function(){
        atualiza_tamanho1();
    });

    </script>
</html>