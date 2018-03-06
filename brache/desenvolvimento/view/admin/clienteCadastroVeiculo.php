<?php
include "menu.php";

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
    <body  style="background-color: #F8F9FA;" id="body">
        <div class="container" id="container" style=" background-color: #fff;">
            <h2>
                <p class="text-center"  id="nome_vinculo"><i><b>Víncular Veículo para Cliente</b></i></p>

            </h2>
            <hr>
            <div id="msg"></div>
            <div id="dados">
                <div class="row" id="fisica">
                    <div class="col-8">
                        <h6  style="margin-top:1rem"><i>Nome</i></h6>	
                        <div class="input-group ">
                            <span class="input-group-addon " id="sizing-addon1"><i class="fa fa-address-book"></i></span>
                            <input type="text" id="nome" disabled  class="form-control" value="Exemplo exemplo " maxlength="200" name="">
                        </div>
                        <div class="text-danger"></div>
                    </div>
                    <div class="col-4">
                        <h6  style="margin-top:1rem"><i>CPF</i></h6>	
                        <div class="input-group ">
                            <span class="input-group-addon" id="sizing-addon1"><i class="fa fa-address-card"></i></span>
                            <input type="text" id="cpf" class="form-control" disabled value="999.999.999-99" data-mask="999.999.999-99" name="">
                        </div>
                        <div class="text-danger"></div>
                    </div>
                </div>
                <div class="row" id="juridica">
                    <div class="col-6">
                        <h6  style="margin-top:1rem"><i>Nome fantasia</i></h6>	
                        <div class="input-group ">
                            <span class="input-group-addon " id="sizing-addon1"><i class="fa fa-address-book"></i></span>
                            <input type="text" id="nome_fantasia" class="form-control" value="Exemplo exemplo" disabled maxlength="200" name="">
                        </div>
                        <div class="text-danger"></div>
                    </div>
                    <div class="col-6">
                        <h6  style="margin-top:1rem"><i>CNPJ</i></h6>	
                        <div class="input-group ">
                            <span class="input-group-addon" id="sizing-addon1"><i class="fa fa-address-book"></i></span>
                            <input type="text" id="cnpj" class="form-control" value="99.999.999/9999-99" disabled name="">
                        </div>
                        <div class="text-danger"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <h6  style="margin-top:1rem"><i>E-mail</i></h6>	
                        <div class="input-group ">
                            <span class="input-group-addon " id="sizing-addon1"><i class="fa fa-envelope"></i></span>
                            <input type="email" id="email" class="form-control" value="exemplo@exemplo.com" disabled  name="">
                        </div>
                        <div class="text-danger"></div>
                    </div>
                    <div class="col-3" id="col_telefone">
                        <h6  style="margin-top:1rem"><i>Telefone</i></h6>	
                        <div class="input-group ">
                            <span class="input-group-addon " id="sizing-addon1"><i class="fa fa-phone"></i></span>
                            <input type="text" id="telefone" class="form-control" value="(99) 9999-9999" disabled  name="">
                        </div>
                        <div class="text-danger"></div>
                    </div>
                    <div class="col-3" id="col_celular">
                        <h6  style="margin-top:1rem"><i>Celular</i></h6>	
                        <div class="input-group ">
                            <span class="input-group-addon " id="sizing-addon1"><i class="fa fa-mobile"></i></span>
                            <input type="text" id="celular" class="form-control"  value="(99) 9999-9999" disabled  name="">
                        </div>
                        <div class="text-danger"></div>
                    </div>
                </div>
                <hr>
            </div>
            <div id="dados_veiculo">
                <div class="row">
                    <div class="col-4">
                        <h6  style="margin-top:1rem"><i>Placa</i></h6>	
                        <div class="input-group ">
                            <span class="input-group-addon " id="sizing-addon1"><i class="fa fa-search"></i></span>
                            <input type="text" id="placa" onkeyup="busca_placa()" class="form-control" placeholder="Ex.: AAA-9999"  data-mask="aaa-9999"  name="">
                        </div>
                        <div class="text-danger"></div>
                    </div>
                    <div class="col-8">
                        <h6  style="margin-top:1rem"><i>Modelo</i></h6>	
                        <div class="input-group ">
                            <span class="input-group-addon " id="sizing-addon1"><i class="fa fa-car"></i></span>
                            <input type="text" id="modelo" class="form-control" disabled placeholder="Ex.: Exemplo Exemplo"  maxlength="100" name="">
                        </div>
                        <div class="text-danger"></div>
                    </div>
                    <div class="col-3">
                        <h6  style="margin-top:1rem"><i>Ano Modelo</i></h6>	
                        <div class="input-group ">
                            <span class="input-group-addon " id="sizing-addon1"><i class="fa fa-calendar"></i></span>
                            <input type="text" id="ano_modelo" class="form-control" disabled placeholder="Ex.: Exemplo Exemplo"  data-mask="9999" maxlength="100" name="">
                        </div>
                        <div class="text-danger"></div>
                    </div>
                    <div class="col-3">
                        <h6  style="margin-top:1rem"><i>Ano Fabricação</i></h6>	
                        <div class="input-group ">
                            <span class="input-group-addon " id="sizing-addon1"><i class="fa fa-calendar"></i></span>
                            <input type="text" id="ano_fabricacao" class="form-control" disabled placeholder="Ex.: Exemplo Exemplo"  data-mask="9999" maxlength="100" name="">
                        </div>
                        <div class="text-danger"></div>
                    </div>
                    <div class="col-6">
                        <h6  style="margin-top:1rem"><i>Fabricante</i></h6>	
                        <div class="input-group ">
                            <span class="input-group-addon " id="sizing-addon1"><i class="fa fa-calendar"></i></span>
                            <select name="" id="fabricante" disabled  class="form-control">
                                <option value="0">Selecione...</option>
                                <option value="Agrale">Agrale </option>
                                <option value="Aston Martin">Aston Martin </option>
                                <option value="Audi">Audi </option>
                                <option value="Bentley">Bentley </option>
                                <option value="BMW">BMW </option>
                                <option value="Changan">Changan </option>
                                <option value="Chery">Chery </option>
                                <option value="Chrysler">Chrysler </option>
                                <option value="Citroën">Citroën </option>
                                <option value="Dodge">Dodge </option>
                                <option value="Effa">Effa </option>
                                <option value="Ferrari">Ferrari </option>
                                <option value="Fiat">Fiat </option>
                                <option value="Ford">Ford </option>
                                <option value="Geely">Geely </option>
                                <option value="GM/Chevrolet">GM/Chevrolet </option>
                                <option value="Hafei">Hafei </option>
                                <option value="Honda">Honda </option>
                                <option value="Hyundai">Hyundai </option>
                                <option value="Iveco">Iveco </option>
                                <option value="Jac Motors">Jac Motors </option>
                                <option value="Jaguar">Jaguar </option>
                                <option value="Jeep">Jeep </option>
                                <option value="Jinbei">Jinbei </option>
                                <option value="Kia">Kia </option>
                                <option value="Lamborghini">Lamborghini </option>
                                <option value="Land Rover">Land Rover </option>
                                <option value="Lexus">Lexus </option>
                                <option value="Lifan">Lifan </option>
                                <option value="Mahindra">Mahindra </option>
                                <option value="Maserati">Maserati </option>
                                <option value="Mercedes-Benz">Mercedes-Benz </option>
                                <option value="MG Motors">MG Motors </option>
                                <option value="Mini">Mini </option>
                                <option value="Mitsubishi">Mitsubishi </option>
                                <option value="Nissan">Nissan </option>
                                <option value="Peugeot">Peugeot </option>
                                <option value="Porsche">Porsche </option>
                                <option value="Ram">Ram </option>
                                <option value="Renault">Renault </option>
                                <option value="Smart">Smart </option>
                                <option value="Ssangyong">Ssangyong </option>
                                <option value="Subaru">Subaru </option>
                                <option value="Suzuki">Suzuki </option>
                                <option value="Tesla">Tesla </option>
                                <option value="Toyota">Toyota </option>
                                <option value="Troller">Troller </option>
                                <option value="Volkswagen">Volkswagen </option>
                                <option value="Volvo">Volvo </option>
                            </select>
                        </div>
                        <div class="text-danger"></div>
                    </div>
                    <div class="col-4">
                        <h6  style="margin-top:1rem"><i>Cor</i></h6>	
                        <div class="input-group ">
                            <span class="input-group-addon " id="sizing-addon1"><i class="fa fa-paint-brush"></i></span>
                            <input type="text" id="cor" class="form-control" disabled  placeholder="Ex.: Exemplo "   maxlength="50" name="">
                        </div>
                        <div class="text-danger"></div>
                    </div>
                    <div class="col-8">
                        <h6  style="margin-top:1rem"><i>Chassi</i></h6>	
                        <div class="input-group ">
                            <span class="input-group-addon " id="sizing-addon1"><i class="fa fa-car"></i></span>
                            <input type="text" id="chassi" disabled  class="form-control" placeholder="Ex.: Exemplo "   maxlength="50" name="">
                        </div>
                        <div class="text-danger"></div>
                    </div>  
                    <div class="col-12">
                        <button style="margin-top: 1rem" class="btn btn-dark btn-lg btn-block" onclick="salvar()">
                            <i class="fa fa-check float-left" style="margin-top: 0.3rem;"></i> Salvar
                        </button>
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

        $('#dt_entrada').datepicker({
            format: 'dd/mm/yyyy',
            language : 'pt-BR'
        });

        $('#dados').hide();
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

        cliente_id = data.codCli;

        if (cliente_id == undefined){

            $('#dados_veiculo').hide();
            window.location.href='#body';
            monta_msg_erro_permanente(" Ocorreu um erro, por favor tente novamente mais tarde!");
           
        }else{

            busca_cliente(cliente_id);
        
        }


        function busca_cliente(id_cliente){

            var dados = {id_cliente : id_cliente , funcao : "busca_cliente"} ;
            $.ajax({
                url: '../../controller/clienteCadastroVeiculo.php',
                method: "post",
                data: dados ,
                success: function(data){
                    if(data){
                        var retorno = $.parseJSON(data);
                        if(retorno.cpf == null){
                            $('#fisica').hide();
                            $('#juridica').show();

                            $('#cnpj').val(retorno.cnpj);
                            $('#nome_fantasia').val(retorno.nome_fantasia);

                        }else{
                            $('#juridica').hide();
                            $('#fisica').show();

                            $('#nome').val(retorno.nome);
                            $('#cpf').val(retorno.cpf);
                        }

                        $('#email').val(retorno.email);
                        
                        if(retorno.telefone == null){
                            $('#col_telefone').hide();
                        }else{
                            $('#telefone').val(retorno.telefone);                            
                        }
                        
                        if(retorno.celular == null){
                            $('#col_celular').hide();
                        }else{
                            $('#celular').val(retorno.celular);                            
                        }

                        $('#dados').show();
                    }else{

                        $('#dados_veiculo').hide();
                        window.location.href='#body';
                        monta_msg_erro_permanente(" Cliente não localizado, por favor tente novamente mais tarde!");
                    }
                }
            });
        }

        function salvar(){
            $('#preloader').show();
            var placa = $('#placa').val();
            var modelo = $('#modelo').val();
            var ano_modelo = $('#ano_modelo').val();
            var ano_fabricacao = $('#ano_fabricacao').val();
            var fabricante = $('#fabricante').val();
            var cor = $('#cor').val();
            var chassi = $('#chassi').val();
            var validacao_ok = true;

            if (placa.length == 0){
                validacao_ok = false;
                add_erro_input($('#placa'), "Por favor preencha o campo Placa");
            }else{
                remove_erro_input($('#placa'));
            }

            if (modelo.length == 0){
                validacao_ok = false;
                add_erro_input($('#modelo'), "Por favor preencha o campo Modelo");
            }else{
                remove_erro_input($('#modelo'));
            }

            if (ano_modelo.length == 0){
                validacao_ok = false;
                add_erro_input($('#ano_modelo'), "Por favor preencha o campo Ano Modelo");
            }else{
                remove_erro_input($('#ano_modelo'));
            }

            if (ano_fabricacao.length == 0){
                validacao_ok = false;
                add_erro_input($('#ano_fabricacao'), "Por favor preencha o campo Ano Fabricação");
            }else{
                remove_erro_input($('#ano_fabricacao'));
            }

            if (fabricante == "0"){
                validacao_ok = false;
                add_erro_input($('#fabricante'), "Por favor selecione um Fabricante");
            }else{
                remove_erro_input($('#fabricante'));
            }

            if (cor.length == 0){
                validacao_ok = false;
                add_erro_input($('#cor'), "Por favor preencha o campo Cor");
            }else{
                remove_erro_input($('#cor'));
            }

            if(validacao_ok){

                var data = { 
                    placa : placa ,
                    modelo: modelo , 
                    ano_modelo : ano_modelo , 
                    ano_fabricacao : ano_fabricacao , 
                    fabricante : fabricante ,
                    cor : cor ,
                    chassi : chassi ,
                    cliente_id : cliente_id, 
                    funcao : "salvar" };

                $.ajax({
                    url: '../../controller/clienteCadastroVeiculo.php',
                    method: "post",
                    data: data ,
                    success: function(data){ 
                        if(data){
                            if(data == 1){
                                window.location.href='#body';
                                monta_msg_erro(" Cliente já vinculado a este veículo!");
                            }else{

                                $('#placa').val("");
                                $('#modelo').val("");
                                $('#ano_modelo').val("");
                                $('#ano_fabricacao').val("");
                                $('#fabricante').val("0");
                                $('#cor').val("");
                                $('#chassi').val("");
    
                                $('#modelo').attr('disabled' , true);
                                $('#ano_modelo').attr('disabled' , true);
                                $('#ano_fabricacao').attr('disabled' , true);
                                $('#fabricante').attr('disabled' , true);
                                $('#cor').attr('disabled' , true);
                                $('#chassi').attr('disabled' , true);
    
                                window.location.href='#body';
                                monta_msg_sucesso(" Cadastro efetuado com sucesso");
                            }
                        }else{
                            window.location.href='#body';
                            monta_msg_erro(" Ocorreu um erro, por favor tente novamente mais tarde!");
                        }

                        $('#preloader').hide();
                    }
                });
            }
        
        }

        function busca_placa(){ 

            var placa = $('#placa').val();

            if (  placa.length >= 7 && (isNaN(placa.charAt(0))) &&
            (isNaN(placa.charAt(1))) && (isNaN(placa.charAt(2))) &&
            ($.isNumeric(placa.charAt(4))) && ($.isNumeric(placa.charAt(5))) &&
            ($.isNumeric(placa.charAt(6))) && ($.isNumeric(placa.charAt(7))) ){
                $('#preloader').show();
                var data = {placa : placa , funcao : "busca_placa"};
                $.ajax({
                    url: '../../controller/clienteCadastroVeiculo.php',
                    method: "post",
                    data: data ,
                    success: function(data){
                        
                        if(data){
                            var retorno = $.parseJSON(data);

                            $('#modelo').val(retorno.modelo);
                            $('#ano_modelo').val(retorno.ano_modelo);
                            $('#ano_fabricacao').val(retorno.ano_fabricacao);
                            $('#fabricante').val(retorno.fabricante);
                            $('#cor').val(retorno.cor);
                            $('#chassi').val(retorno.chassi);

                        }else{
                            $('#placa').val(placa);
                            $('#modelo').val("");
                            $('#ano_modelo').val("");
                            $('#ano_fabricacao').val("");
                            $('#fabricante').val("0");
                            $('#cor').val("");
                            $('#chassi').val("");

                            $('#modelo').removeAttr('disabled');
                            $('#ano_modelo').removeAttr('disabled');
                            $('#ano_fabricacao').removeAttr('disabled');
                            $('#fabricante').removeAttr('disabled');
                            $('#cor').removeAttr('disabled');
                            $('#chassi').removeAttr('disabled');
                        }
                        $('#preloader').hide();
                    }
                });
            }else{
                $('#modelo').val("");
                $('#ano_modelo').val("");
                $('#ano_fabricacao').val("");
                $('#fabricante').val("0");
                $('#cor').val("");
                $('#chassi').val("");

                $('#modelo').attr('disabled' , true);
                $('#ano_modelo').attr('disabled' , true);
                $('#ano_fabricacao').attr('disabled' , true);
                $('#fabricante').attr('disabled' , true);
                $('#cor').attr('disabled' , true);
                $('#chassi').attr('disabled' , true);
            }
        }

        function limpa_campos(){
            remove_erro_input($('#dt_entrada'));
            remove_erro_input($('#hr_entrada'));
            remove_erro_input($('#obs'));
            remove_erro_input($('#placa'));
            remove_erro_input($('#modelo'));
            remove_erro_input($('#ano_modelo'));
            remove_erro_input($('#ano_fabricacao'));
            remove_erro_input($('#fabricante'));
            remove_erro_input($('#cor'));
            $('#placa').val("");
            $('#modelo').val("");
            $('#ano_modelo').val("");
            $('#ano_fabricacao').val("");
            $('#fabricante').val("0");
            $('#cor').val("");
            $('#chassi').val("");

            $('#modelo').attr('disabled' , true);
            $('#ano_modelo').attr('disabled' , true);
            $('#ano_fabricacao').attr('disabled' , true);
            $('#fabricante').attr('disabled' , true);
            $('#cor').attr('disabled' , true);
            $('#chassi').attr('disabled' , true);
        }

        function add_erro_input(input , msg){
            input.addClass("is-invalid");
            input.parent().next().html(msg);
        }

        function remove_erro_input(input){
            input.removeClass("is-invalid");
            input.parent().next().html("");
        }

        function monta_msg_erro(msg){
            html = '<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i><strong>  '+ msg +'</strong></div>';
            $('#msg').html(html);
            window.setInterval(function(){
                remove_msg();
            },10000);
        }

        function monta_msg_sucesso(msg){
            html = '<div class="alert alert-success"><i class="fa fa-check"></i><strong>'+ msg +'</strong></div>';
            $('#msg').html(html);
            window.setInterval(function(){
                remove_msg();
            },10000);
        }

        function monta_msg_erro_permanente(msg){
            html = '<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i><strong>  '+ msg +'</strong></div>';
            $('#msg').html(html);
        }

        function remove_msg(){
            $('#msg').html('');
        }

        atualiza_tamanho();

        function atualiza_tamanho(){
            var tamanho_container = $(window).height();
            var tamanho_row = $(window).height();
            var tamanho_body_modal = $(window).height();
            tamanho_container -= 66;
            $('#container').css("height", tamanho_container);

        }

        window.addEventListener('resize', function(){
            atualiza_tamanho();
        });

    </script>
</html>