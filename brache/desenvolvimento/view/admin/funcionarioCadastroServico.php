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
        <link href="../static/css/bootstrap-datepicker.css" rel="stylesheet">
        <link  href="../static/css/fontawesome-all.min.css" rel="stylesheet">
        <!-- Arquivos JS -->
        <script type="text/javascript" src="../static/js/jasny-bootstrap.js"></script>
    </head>
    <body style="background-color: #F8F9FA;" >
        <div class="container" style=" background-color: #fff;">
            <h2>
                <p class="text-center" style="color: #000"><i><b>Adicionar serviços</b></i></p>
            </h2>
            <hr>
            <div id="dados">
            <div class="row" >
                <div class="col-12">
                    <div class="row">
                        <div class="col-3">
                            <div class="col-12" id="img">
                                 <img src="../static/img/user.png" id="img" alt="..." class="img-thumbnail" style="width:10rem">
                            </div>
                        </div>
                        <div class="col-9">
                            <div class="row">
                                <div class="col-6">
                                    <h6  style="margin-top:1rem"><i>Nome</i></h6>   
                                    <div class="input-group ">
                                        <span class="input-group-addon " id="sizing-addon1"><i class="fa fa-address-book"></i></span>
                                        <input type="text" id="nome" class="form-control" value="Exemplo exemplo " maxlength="200" disabled name="">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <h6  style="margin-top:1rem"><i>CPF</i></h6>    
                                    <div class="input-group ">
                                        <span class="input-group-addon" id="sizing-addon1"><i class="fa fa-address-card"></i></span>
                                        <input type="text" id="cpf" class="form-control" value="999.999.999-99" disabled name="">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <h6  style="margin-top:1rem"><i>Nascimento</i></h6> 
                                    <div class="input-group ">
                                        <span class="input-group-addon " id="sizing-addon1"><i class="fa fa-calendar"></i></span>
                                        <input class="form-control" value="99/99/9999"  id="nascimento" disabled type="text" >
                                    </div>
                                </div>
                                <div class="col-6">
                                    <h6  style="margin-top:1rem"><i>Cargo</i></h6>    
                                    <div class="input-group ">
                                        <span class="input-group-addon " id="sizing-addon1"><i class="fa fa-address-book"></i></span>
                                        <input class="form-control" value="Exemplo"  id="cargo" disabled type="text" >
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-7">
                    <h6  style="margin-top:1rem"><i>Adicionar Serviços</i></h6> 
                    <div class="card" style="margin-top:1rem;height:20rem;">
                        <div class="card-head">
                            <div class="row">
                                <div class="col-12">
                                    <div class="input-group ">
                                        <span class="input-group-addon " id="sizing-addon1"><i class="fa fa-search"></i></span>
                                        <input type="text" id="pesquisa" onkeyup="busca_servicos()" class="form-control" placeholder="Pesquisar serviços" maxlength="200" name="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body" style="height:18rem; overflow-y: auto">
                            <div class="row">
                                <div class="col-12" id="adicionar_servicos">
                                    <!--
                                    <div class="input-group" style="margin-top:1rem">
                                        <input type="text" class="form-control" disabled placeholder="Serviço serviço" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-dark" type="button">Adicionar</button>
                                        </div>
                                    </div>
                                    -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-5">
                    <h6  style="margin-top:1rem"><i>Serviços já adicionados</i></h6> 
                    <div class="card" style="margin-top:1rem; height:20rem;">
                        <div class="card-head">
                            <div class="row">
                                <div class="col-12">
                                    <div class="input-group ">
                                        <span class="input-group-addon " id="sizing-addon1"><i class="fa fa-search"></i></span>
                                        <input type="text" id="pesquisa_funcionario" onkeyup="busca_servicos_funcionario()" class="form-control" placeholder="Pesquisar serviços" maxlength="200" name="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body" style="height:18rem; overflow-y: auto">
                            <div class="row">
                                <div class="col-12" id="servicos_funcionarios">
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
    </body>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script type="text/javascript" src="../static/js/popper.js"></script>
    <script type="text/javascript" src="../static/js/bootstrap.js"></script>   
    <script src="../static/js/bootstrap-datepicker.js"></script>
    <script src="../static/js/bootstrap-datepicker.pt-BR.min.js"></script> 

    <script>
        var query = location.search.slice(1);
        var partes = query.split('&');
        var cliente_id;
        var data = {};
        partes.forEach(function (parte) {
            var chaveValor = parte.split('=');
            var chave = chaveValor[0];
            var valor = chaveValor[1];
            data[chave] = valor;
        });

        var funcionario_id = data.codFun;

        busca_funcionario(funcionario_id);

        function busca_funcionario(funcionario_id){
            $('#dados').hide();
            $('#preloader').show();
            var data = {funcao: 'busca_funcionario', funcionario_id : funcionario_id};
            $.ajax({
            url: '../../controller/funcionarioCadastroServico.php',
            method: "post",
            data: data ,
            success: function(data){
                var resultado = $.parseJSON(data);
                if(data){
                    $('#dados').show();
                    $('#nome').val(resultado.nome);
                    $('#cpf').val(resultado.cpf);
                    $('#nascimento').val(resultado.data_nascimento);
                    $('#cargo').val(resultado.cargo);
                    $('#img').html('');
                    var html='<img src="../'+resultado.url_imagem+'" id="img" alt="..." class="img-thumbnail" style="width:13rem; height : 10rem">';
                    $('#img').html(html);
                    busca_servicos();
                    busca_servicos_funcionario();
                    $('#preloader').hide();
                }else{
                    $('#preloader').hide();
                }
            }
            });
        }

        function busca_servicos(){

            var pesquisa = $('#pesquisa').val();
            var data = {funcao: 'busca_servicos', pesquisa : pesquisa , funcionario_id :funcionario_id };
            $.ajax({
            url: '../../controller/funcionarioCadastroServico.php',
            method: "post",
            data: data ,
            success: function(data){
                if(data){
                    var resultado = $.parseJSON(data);
                    if(resultado.length > 0){
                        var html = "";
                        for(var i =0 ; i < resultado.length ; i++ ){
                            html += '<div class="input-group" style="margin-top:0.5rem">'+
                            '<input type="text" class="form-control" disabled placeholder="'+resultado[i].descricao+'" aria-label="Recipients username" aria-describedby="basic-addon2">'+
                            '<div class="input-group-append">'+
                            '<button class="btn btn-dark" onclick="adiciona_servico('+resultado[i].id+')"><i class="fa fa-plus"></i></button>'+
                            '</div>'+
                            '</div>';
                        }
                        $('#adicionar_servicos').html(html);
                    }else{
    
                    }
                }else{
                    $('#adicionar_servicos').html('');
                }
            }
            });
        }

        function busca_servicos_funcionario(){
            var pesquisa = $('#pesquisa_funcionario').val();
            var data = {funcao: 'busca_servicos_funcionario', pesquisa : pesquisa , funcionario_id :funcionario_id };
            $.ajax({
            url: '../../controller/funcionarioCadastroServico.php',
            method: "post",
            data: data ,
            success: function(data){
                if(data){
                    var resultado = $.parseJSON(data);
                    if(resultado.length > 0){
                        var html = "";
                        for(var i =0 ; i < resultado.length ; i++ ){
                            html += '<div class="input-group" style="margin-top:0.5rem">'+
                                            '<input type="text" class="form-control" disabled placeholder="'+resultado[i].descricao+'" aria-label="Recipients username" aria-describedby="basic-addon2">'+
                                            '<div class="input-group-append">'+
                                                '<button class="btn btn-dark" onclick="remove_servico('+resultado[i].id+')"><i class="fa fa-trash"></i></button>'+
                                            '</div>'+
                                        '</div>';
                        }
                        $('#servicos_funcionarios').html(html);
                    }else{
                        
                    }
                }else{
                    $('#servicos_funcionarios').html('');
                }
            }
            });
        }

        function adiciona_servico(servico_id){
            $('#preloader').show();
            var data = {funcao: 'adiciona_servico', servico_id : servico_id , funcionario_id :funcionario_id };
            $.ajax({
            url: '../../controller/funcionarioCadastroServico.php',
            method: "post",
            data: data ,
            success: function(data){
                busca_servicos();
                busca_servicos_funcionario();
                $('#preloader').hide();
            }
            });
        }

        function remove_servico(servico_id){
            $('#preloader').show();
            var data = {funcao: 'exclui_servico', servico_id : servico_id , funcionario_id :funcionario_id };
            $.ajax({
            url: '../../controller/funcionarioCadastroServico.php',
            method: "post",
            data: data ,
            success: function(data){
                busca_servicos();
                busca_servicos_funcionario();
                $('#preloader').hide();
            }
            });
        }

    </script>
    
</html>