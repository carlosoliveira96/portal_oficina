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
    <body style="background-color: #F8F9FA;" id="body" >
        <div class="container" style=" background-color: #fff" id="container">
            <h2>
                <p class="text-center" style="color: #000"><i><b>Cadastro de funcionários</b></i></p>
            </h2>
            <hr>
            <div id="msg"></div>
            <div class="row" id="dados">
                <div class="col-4">
                    <div class="fileinput fileinput-new " data-provides="fileinput" style="margin-left: 1rem">
                        <div class="fileinput-preview thumbnail img-thumbnail" data-trigger="fileinput" style="width: 20rem;  height: 17.5rem"></div>
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
                <div class="col-8">
                    <div class="row">
                        <div class="col-12">
                            <h6  style="margin-top:1rem"><i>Nome</i></h6>   
                            <div class="input-group ">
                                <span class="input-group-addon " id="sizing-addon1"><i class="fa fa-address-book"></i></span>
                                <input type="text" id="nome" class="form-control" placeholder="Ex.:  Exemplo exemplo " maxlength="200" >
                            </div>
                            <div class="text-danger"></div>
                        </div>
                        <div class="col-6">
                            <h6  style="margin-top:1rem"><i>CPF</i></h6>    
                            <div class="input-group ">
                                <span class="input-group-addon" id="sizing-addon1"><i class="fa fa-address-book"></i></span>
                                <input type="text" id="cpf"  onkeyup="verifica_cpf()" class="form-control" placeholder="Ex.: 999.999.999-99" data-mask="999.999.999-99" >
                            </div>
                            <div class="text-danger"></div>
                        </div>
                        <div class="col-6">
                            <h6  style="margin-top:1rem"><i>Nascimento</i></h6> 
                            <div class="input-group ">
                                <span class="input-group-addon " id="sizing-addon1"><i class="fa fa-calendar"></i></span>
                                <input class="form-control" placeholder="Ex.: 99/99/9999" data-mask="99/99/9999" id="nascimento"   type="text" >
                            </div>
                            <div class="text-danger"></div>
                        </div>
                        <div class="col-6">
                            <h6  style="margin-top:1rem"><i>RG</i></h6> 
                            <div class="input-group ">
                                <span class="input-group-addon " id="sizing-addon1"><i class="fa fa-address-book"></i></span>
                                <input type="text" id="rg" class="form-control" placeholder="Ex.: 9999999" >
                            </div>
                            <div class="text-danger"></div>
                        </div>
                        <div class="col-6">
                            <h6  style="margin-top:1rem"><i>Orgão Emissor</i></h6>  
                            <div class="input-group ">
                                <span class="input-group-addon " id="sizing-addon1"><i class="fa fa-building"></i></span>
                                <input type="text" id="orgao_emissor" class="form-control" placeholder="Ex.: SSP-DF" maxlength="50" >
                            </div>
                            <div class="text-danger"></div>
                        </div>
                        <div class="col-12">
                            <h6  style="margin-top:1rem"><i>E-Mail</i></h6> 
                            <div class="input-group ">
                                <span class="input-group-addon " id="sizing-addon1"><i class="fa fa-envelope"></i></span>
                                <input type="email" id="email" onkeyup="valida_email()" class="form-control" placeholder="Ex.: exemplo@exemplo.com"  >
                            </div>
                            <div class="text-danger"></div>
                        </div>
                        <div class="col-6">
                            <h6  style="margin-top:1rem"><i>Telefone</i></h6>   
                            <div class="input-group ">
                                <span class="input-group-addon " id="sizing-addon1"><i class="fa fa-phone"></i></span>
                                <input type="text" id="telefone" class="form-control" placeholder="Ex.: (99) 9999-9999" data-mask="(99) 9999-9999" >
                            </div>
                            <div class="text-danger"></div>
                        </div>
                        <div class="col-6">
                            <h6  style="margin-top:1rem"><i>Celular</i></h6>    
                            <div class="input-group ">
                                <span class="input-group-addon " id="sizing-addon1"><i class="fa fa-mobile"></i></span>
                                <input type="text" id="celular" class="form-control" placeholder="Ex.: (99) 99999-9999" data-mask="(99) 99999-9999" >
                            </div>
                            <div class="text-danger"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <h6  style="margin-top:1rem"><i>Nome de Usuário</i></h6>    
                    <div class="input-group ">
                        <span class="input-group-addon " id="sizing-addon1"><i class="fa fa-user"></i></span>
                        <input type="text" id="nome_usuario" class="form-control" onkeyup="verifica_usuario()" placeholder="Ex.: Exemplo exemplo" >
                    </div>
                    <div class="text-danger"></div>
                </div>
                <div class="col-6">
                    <h6  style="margin-top:1rem"><i>Cargo</i></h6>    
                    <div class="input-group ">
                        <span class="input-group-addon " id="sizing-addon1"><i class="fa fa-address-book"></i></span>
                        <select class="form-control" id="cargo" >
                            <option value="0">Selecione...</option>
                            <option value="Lanterneiro">Lanterneiro</option>
                            <option value="Mecânico">Mecânico</option>
                            <option value="Polidor">Polidor</option>
                            <option value="Montador">Montador</option>
                            <option value="Financeiro">Financeiro</option>
                        </select>
                    </div>
                    <div class="text-danger"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-4">
                    <h6  style="margin-top:1rem"><i>CEP</i></h6>    
                    <div class="input-group" >
                        <span class="input-group-addon " id="sizing-addon1"><i class="fa fa-search"></i></span>
                        <input type="text"  id="cep" class="form-control" placeholder="Ex.: 99999-999" data-mask="99999-999"  onkeyup="busca_cep()">
                    </div>
                    <div class="text-danger"></div>
                </div>
                <div class="col-2">
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
                        <input type="text" id="endereco"  class="form-control" placeholder="Ex.: Exemplo exemplo exemplo"  disabled>
                    </div>
                    <div class="text-danger"></div>
                </div>
                <div class="col-2">
                    <h6  style="margin-top:1rem"><i>Número</i></h6> 
                    <div class="input-group ">
                        <span class="input-group-addon " id="sizing-addon1"><i class="fa fa-home"></i></span>
                        <input type="text" id="numero"  class="form-control" placeholder="Ex.: 99 "  disabled>
                    </div>
                    <div class="text-danger"></div>
                </div>
                <div class="col-4">
                    <h6  style="margin-top:1rem"><i>Complemento</i></h6>    
                    <div class="input-group ">
                        <span class="input-group-addon " id="sizing-addon1"><i class="fa fa-home"></i></span>
                        <input type="text" id="complemento"  class="form-control" placeholder="Ex.: Exemplo Exemplo " maxlength="50" disabled>
                    </div>
                    <div class="text-danger"></div>
                </div>
                <div class="col-6">
                    <h6  style="margin-top:1rem"><i>Bairro</i></h6> 
                    <div class="input-group ">
                        <span class="input-group-addon " id="sizing-addon1"><i class="fa fa-home"></i></span>
                        <input type="text" id="bairro"  class="form-control" placeholder="Ex.: Exemplo Exemplo " maxlength="100" disabled>
                    </div>
                    <div class="text-danger"></div>
                </div>
                <div class="col-4">
                    <h6  style="margin-top:1rem"><i>Cidade</i></h6> 
                    <div class="input-group ">
                        <span class="input-group-addon " id="sizing-addon1"><i class="fa fa-home"></i></span>
                        <input type="text" id="cidade"  class="form-control" placeholder="Ex.: Exemplo exemplo" maxlength="100" disabled>
                    </div>
                    <div class="text-danger"></div>
                </div>
                <div class="col-2">
                    <h6  style="margin-top:1rem"><i>UF</i></h6> 
                    <div class="input-group ">
                        <span class="input-group-addon " id="sizing-addon1"><i class="fa fa-home"></i></span>
                        <input type="text" id="uf"   class="form-control" placeholder="Ex.: DF" maxlength="2" disabled>
                    </div>
                    <div class="text-danger"></div>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-12">
                    <button style="margin-top: 1rem;margin-bottom: 2rem" class="btn btn-dark btn-lg btn-block" onclick="salvar()">
                        <i class="fa fa-check float-left" style="margin-top: 0.3rem;"></i> Salvar
                    </button>
                </div>
            </div>
        </div>
    </body>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script type="text/javascript" src="../static/js/popper.js"></script>
    <script type="text/javascript" src="../static/js/bootstrap.js"></script>
    <script>

    //Função datepicker
    $( function() {
        $('#nascimento').datepicker();
    });

    var controle_cep = true;
    var controle_usuario = true;
    var controle_cpf = true ; 
    var controle_email = true;
    var validacao_ok = true;

    function salvar(){

        validacao_ok = true;

        var sem_cep = $('#sem_cep');

        var nome = $('#nome').val();  
        var cpf = $('#cpf').val();  
        var nascimento = $('#nascimento').val();  
        var email = $('#email').val();  
        var telefone = $('#telefone').val();  
        var celular = $('#celular').val();  
        var nome_usuario = $('#nome_usuario').val();  
        var cargo = $('#cargo').val();  
        var rg = $('#rg').val();  
        var orgao_emissor = $('#orgao_emissor').val();  

		var cep = $('#cep').val();
		var endereco = $('#endereco').val();
		var numero = $('#numero').val();
		var complemento = $('#complemento').val();
		var bairro = $('#bairro').val();
		var cidade = $('#cidade').val();
		var uf = $('#uf').val();

        if(nome.length == 0 ){
            add_erro_input($('#nome') , "Por favor preencha o campo Nome");
            validacao_ok = false;
        }else{
            remove_erro_input($('#nome'));
        }  

        if(cpf.length == 0 ){
            add_erro_input($('#cpf') , "Por favor preencha o campo CPF");
            validacao_ok = false;
        }else{
            remove_erro_input($('#cpf'));
        }

        if(nascimento.length == 0 ){
            add_erro_input($('#nascimento') , "Por favor preencha o campo Nascimento");
            validacao_ok = false;
        }else{
            remove_erro_input($('#nascimento'));
        }

        if(email.length == 0 ){
            add_erro_input($('#email') , "Por favor preencha o campo E-mail");
            validacao_ok = false;
        }else{
            remove_erro_input($('#email'));
        }

        if(nome_usuario.length == 0 ){
            add_erro_input($('#nome_usuario') , "Por favor preencha o campo Nome de Usuário");
            validacao_ok = false;
        }else{
            remove_erro_input($('#nome_usuario'));
        }

        if(cargo == 0 ){
            add_erro_input($('#cargo') , "Por favor selecione um Cargo");
            validacao_ok = false;
        }else{
            remove_erro_input($('#cargo'));
        }

        if(celular.length == 0 && telefone.length == 0  ){
			add_erro_input($('#telefone') , "Por favor preencha o campo Telefone e/ou o campo Celular");
			add_erro_input($('#celular') , "Por favor preencha o campo Telefone e/ou o campo Celular");
            validacao_ok = false;
		}else{
			remove_erro_input($('#telefone'));
			remove_erro_input($('#celular'));
		}

        if(sem_cep.is(':checked')){

			if(endereco.length == 0 ){
				add_erro_input($('#endereco') , "Por favor preencha o campo Endereco");
				validacao_ok = false;
			}else{
				remove_erro_input($('#endereco'));
			}

			if(numero.length == 0 ){
				add_erro_input($('#numero') , "Por favor preencha o campo Número");
				validacao_ok = false;
			}else{
				remove_erro_input($('#numero'));
			}

			if(bairro.length == 0 ){
				add_erro_input($('#bairro') , "Por favor preencha o campo Bairro");
				validacao_ok = false;
			}else{
				remove_erro_input($('#bairro'));
			}

			if(cidade.length == 0 ){
				add_erro_input($('#cidade') , "Por favor preencha o campo Cidade");
				validacao_ok = false;
			}else{
				remove_erro_input($('#cidade'));
			}

			if(uf.length == 0 ){
				add_erro_input($('#uf') , "Por favor preencha o campo UF");
				validacao_ok = false;
			}else{
				remove_erro_input($('#uf'));
			}

			if(complemento.length == 0 ){
				add_erro_input($('#complemento') , "Por favor preencha o campo Complemento");
				validacao_ok = false;
			}else{
				remove_erro_input($('#complemento'));
			}

		}else{

			if(cep.length == 0 ){
				add_erro_input($('#cep') , "Por favor preencha o campo CEP");
				validacao_ok = false;
			}else if(controle_cep){
				remove_erro_input($('#cep'));

				if(numero.length == 0 ){
					add_erro_input($('#numero') , "Por favor preencha o campo Número");
					validacao_ok = false;
				}else{
					remove_erro_input($('#numero'));
				}
			}
		}

        if(controle_cep && validacao_ok && controle_usuario && controle_email){ 
 			
           var data = new FormData();
           data.append('arquivo',$('#arquivo').prop('files')[0]);
           data.append('funcao',"cadastro");
           data.append('nome',nome);
           data.append('email',email);
           data.append('cpf',cpf);
           data.append('nascimento',nascimento);
           data.append('telefone',telefone);
           data.append('celular',celular);
           data.append('nome_usuario',nome_usuario);
           data.append('cargo',cargo);
           data.append('rg',rg);
           data.append('orgao_emissor',orgao_emissor);
           data.append('cep',cep);
           data.append('endereco',endereco);
           data.append('numero',numero);
           data.append('complemento',complemento);  
           data.append('bairro',bairro);
           data.append('bairro',bairro);
           data.append('cidade',cidade);
           data.append('uf',uf);
           $('#preloader').show();
            $.ajax({
				url: '../../controller/funcionarioCadastro.php',
				method: "post",
				data: data ,
                dataType: 'script',
                cache: false,
                contentType: false,
                processData: false,
				success: function(data){
					if(data){
                        $('#dados').load( "funcionarioCadastro.php #dados" );
                        html = '<div class="alert alert-success"><i class="fa fa-check"></i><strong> Cadastro efetuado com secesso</strong></div>';
                        $('#msg').html(html);
                        window.location.href='#body';
                        window.setInterval(function(){
                            window.location.href='funcionarioCadastroServico.php?codFun='+data;
                        },3000);

					}else{
						window.location.href='#body';
						monta_msg_erro("Ocorreu um erro, por favor tente mais tarde!");
					}
                    $('#preloader').hide();
				}
			});
        }
    }

    function verifica_cpf(){
		var cpf = $('#cpf').val();
		if(cpf.length = 14 && ($.isNumeric(cpf.charAt(0))) 
			&& ($.isNumeric(cpf.charAt(1))) && ($.isNumeric(cpf.charAt(2)))
			&& ($.isNumeric(cpf.charAt(4))) && ($.isNumeric(cpf.charAt(5)))
			&& ($.isNumeric(cpf.charAt(6))) && ($.isNumeric(cpf.charAt(8)))
			&& ($.isNumeric(cpf.charAt(9))) && ($.isNumeric(cpf.charAt(10)))
			&& ($.isNumeric(cpf.charAt(12))) && ($.isNumeric(cpf.charAt(13))) ){
            $('#preloader').show();
			var data = {cpf: cpf, funcao: 'verifica_cpf'};
			$.ajax({
				url: '../../controller/funcionarioCadastro.php',
				method: "post",
				data: data ,
				success: function(data){
					if(data){
						controle_cpf = false;
						add_erro_input($('#cpf') , "CPF já cadastrado");
					}else{
						controle_cpf = true;
						remove_erro_input($('#cpf'));
					}
                    $('#preloader').hide();
				}
			});
		}
	}

    function verifica_usuario(){
		var nome_usuario = $('#nome_usuario').val();

		if (nome_usuario.length <= 3 ){
			add_erro_input($('#nome_usuario') , "Nome de usuário deve conter 4 caracteres no mínimo");
			controle_usuario = false;
		}else{
			var data = {usuario: nome_usuario, funcao: 'verifica_usuario'};
			$.ajax({
				url: '../../controller/cadastro.php',
				method: "post",
				data: data ,
				success: function(data){
					if(data){
						controle_usuario = false;
						add_erro_input($('#nome_usuario') , "Nome de Usuário já cadastrado");
					}else{
						remove_erro_input($('#nome_usuario'));
						controle_usuario = true;
					}
				}
			});
		}
	}



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

    function valida_email(){
		var filter = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
		if(!filter.test($('#email').val())){
			add_erro_input( $('#email') , "E-mail inválido" )
			controle_email = false;
		} else {
			controle_email = true;
			remove_erro_input($('#email'));
		}
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

	function remove_msg(){
		$('#msg').html('');
	}

    function nao_sei_cep(){

        var sem_cep = $('#sem_cep');

        var cep = $('#cep');
        var endereco = $('#endereco');
        var numero = $('#numero');
        var complemento = $('#complemento');
        var bairro = $('#bairro');
        var cidade = $('#cidade');
        var uf = $('#uf');

        if(sem_cep.is(':checked')){

            cep.val("");
            cep.attr("disabled" , "true");
            remove_erro_input($('#cep'));

            endereco.val("");
            endereco.removeAttr("disabled" , "true");
            remove_erro_input($('#endereco'));

            numero.val("");
            numero.removeAttr("disabled" , "true");
            remove_erro_input($('#numero'));
            
            complemento.val("");
            complemento.removeAttr("disabled" , "true");
            remove_erro_input($('#complemento'));
            
            bairro.val("");
            bairro.removeAttr("disabled" , "true");
            remove_erro_input($('#bairro'));
            
            cidade.val("");
            cidade.removeAttr("disabled" , "true");
            remove_erro_input($('#cidade'));
            
            uf.val("");
            uf.removeAttr("disabled" , "true");
            remove_erro_input($('#uf'));
            

        }else{

            cep.removeAttr("disabled");
            remove_erro_input($('#cep'));

            endereco.val("");
            endereco.attr("disabled" , "true");
            remove_erro_input($('#endereco'));

            numero.val("");
            numero.attr("disabled" , "true");
            remove_erro_input($('#numero'));
            
            complemento.val("");
            complemento.attr("disabled" , "true");
            remove_erro_input($('#complemento'));
            
            bairro.val("");
            bairro.attr("disabled" , "true");
            remove_erro_input($('#bairro'));
            
            cidade.val("");
            cidade.attr("disabled" , "true");
            remove_erro_input($('#cidade'));
            
            uf.val("");
            uf.attr("disabled" , "true");
            remove_erro_input($('#uf'));
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