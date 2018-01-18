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
    <body  style="background-color: #F8F9FA;" onload="busca_cliente()">
        <div class="container" style=" background-color: #fff;">
            <h2>
                <p class="text-center" style="color: #000"><i><b>Víncular Veículo para Cliente</b></i></p>
            </h2>
            <hr>
            <div class="msg"></div>
            <div class="row" id="fisica">
                <div class="col-9">
                    <h6  style="margin-top:1rem"><i>Nome</i></h6>	
                    <div class="input-group ">
                        <span class="input-group-addon " id="sizing-addon1"><i class="fa fa-address-book"></i></span>
                        <input type="text" id="nome" disabled  class="form-control" value="Exemplo exemplo " maxlength="200" name="">
                    </div>
                    <div class="text-danger"></div>
                </div>
                <div class="col-3">
                    <h6  style="margin-top:1rem"><i>Nascimento</i></h6>	
                    <div class="input-group ">
                        <span class="input-group-addon " id="sizing-addon1"><i class="fa fa-calendar"></i></span>
                        <input class="form-control" value="99/99/9999" disabled id="nascimento" name="event_date" id="event_date" type="text" >
                    </div>
                    <div class="text-danger"></div>
                </div>
                <div class="col-6">
                    <h6  style="margin-top:1rem"><i>CPF</i></h6>	
                    <div class="input-group ">
                        <span class="input-group-addon" id="sizing-addon1"><i class="fa fa-address-card"></i></span>
                        <input type="text" id="cpf" class="form-control" disabled value="999.999.999-99" data-mask="999.999.999-99" name="">
                    </div>
                    <div class="text-danger"></div>
                </div>
                <div class="col-6">
                    <h6  style="margin-top:1rem"><i>E-mail</i></h6>	
                    <div class="input-group ">
                        <span class="input-group-addon " id="sizing-addon1"><i class="fa fa-envelope"></i></span>
                        <input type="email" id="email" class="form-control" value="exemplo@exemplo.com" disabled  name="">
                    </div>
                    <div class="text-danger"></div>
                </div>
            </div>
            <hr>
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
                        <input type="text" id="modelo" class="form-control" placeholder="Ex.: Exemplo Exemplo"  data-mask="AAA-9999" maxlength="100" name="">
                    </div>
                    <div class="text-danger"></div>
                </div>
                <div class="col-3">
                    <h6  style="margin-top:1rem"><i>Ano Modelo</i></h6>	
                    <div class="input-group ">
                        <span class="input-group-addon " id="sizing-addon1"><i class="fa fa-calendar"></i></span>
                        <input type="text" id="ano_modelo" class="form-control" placeholder="Ex.: Exemplo Exemplo"  data-mask="9999" maxlength="100" name="">
                    </div>
                    <div class="text-danger"></div>
                </div>
                <div class="col-3">
                    <h6  style="margin-top:1rem"><i>Ano Fabricação</i></h6>	
                    <div class="input-group ">
                        <span class="input-group-addon " id="sizing-addon1"><i class="fa fa-calendar"></i></span>
                        <input type="text" id="ano_fabricacao" class="form-control" placeholder="Ex.: Exemplo Exemplo"  data-mask="9999" maxlength="100" name="">
                    </div>
                    <div class="text-danger"></div>
                </div>
                <div class="col-6">
                    <h6  style="margin-top:1rem"><i>Fabricante</i></h6>	
                    <div class="input-group ">
                        <span class="input-group-addon " id="sizing-addon1"><i class="fa fa-calendar"></i></span>
                        <select name="" id="fabricante" class="form-control">
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
                        <input type="text" id="cor" class="form-control" placeholder="Ex.: Exemplo "   maxlength="50" name="">
                    </div>
                    <div class="text-danger"></div>
                </div>
                <div class="col-8">
                    <h6  style="margin-top:1rem"><i>Chassi</i></h6>	
                    <div class="input-group ">
                        <span class="input-group-addon " id="sizing-addon1"><i class="fa fa-car"></i></span>
                        <input type="text" id="chassi" class="form-control" placeholder="Ex.: Exemplo "   maxlength="50" name="">
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
    </body>

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script type="text/javascript" src="../static/js/popper.js"></script>
    <script type="text/javascript" src="../static/js/bootstrap.js"></script>   
    <script src="../static/js/bootstrap-datepicker.js"></script>
    <script src="../static/js/bootstrap-datepicker.pt-BR.min.js"></script> 
    <script>

        function salvar(){

            var placa = $('#placa').val();
            var modelo = $('#modelo').val();
            var ano_modelo = $('#ano_modelo').val();
            var ano_fabricacao = $('#ano_fabricacao').val();
            var fabricante = $('#fabricante').val();
            var cor = $('#cor').val();
            var validacao_ok = true;

            if (placa.length == 0){
                add_erro_input($('#placa'), "Por favor preencha o campo Placa");
            }else{
                remove_erro_input($('#placa'));
            }

            if (modelo.length == 0){
                add_erro_input($('#modelo'), "Por favor preencha o campo Modelo");
            }else{
                remove_erro_input($('#modelo'));
            }

            if (ano_modelo.length == 0){
                add_erro_input($('#ano_modelo'), "Por favor preencha o campo Ano Modelo");
            }else{
                remove_erro_input($('#ano_modelo'));
            }

            if (ano_fabricacao.length == 0){
                add_erro_input($('#ano_fabricacao'), "Por favor preencha o campo Ano Fabricação");
            }else{
                remove_erro_input($('#ano_fabricacao'));
            }

            if (fabricante == "0"){
                add_erro_input($('#fabricante'), "Por favor preencha o campo Fabricante");
            }else{
                remove_erro_input($('#fabricante'));
            }

            if (cor.length == 0){
                add_erro_input($('#cor'), "Por favor preencha o campo Cor");
            }else{
                remove_erro_input($('#cor'));
            }
        
        }

        function busca_placa(){ 

            var placa = $('#placa').val();
            //alert(isNaN(placa.charAt(0)));

            if (  placa.length == 8 && (isNaN(placa.charAt(0))) &&
            (isNaN(placa.charAt(1))) && (isNaN(placa.charAt(2))) &&
            ($.isNumeric(placa.charAt(4))) && ($.isNumeric(placa.charAt(5))) &&
            ($.isNumeric(placa.charAt(6))) && ($.isNumeric(placa.charAt(7))) ){
                alert();
            }
        }

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