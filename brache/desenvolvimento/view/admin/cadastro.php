<?php
include 'menu.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Portal Oficina</title>

	<!-- Arquivos CSS -->
	<link href="../static/css/jasny-bootstrap.css" rel="stylesheet">
	<link href="../static/css/bootstrap-datepicker.css" rel="stylesheet">
	<link  href="../static/css/fontawesome-all.min.css" rel="stylesheet">
	<!-- Arquivos JS -->
	<script type="text/javascript" src="../static/js/jasny-bootstrap.js"></script>

</head>
<body  style="background-color: #F8F9FA;" onload="modelo_cadastro()" id="body">
	<div class="container" style=" background-color: #fff;">
		<h2>
			<p class="text-center" style="color: #000"><i><b>Cadastro</b></i></p>
		</h2>
		<hr>
		<div id="msg">
			
		</div>
		<div class="row justify-content-md-center" >
			<div class="col-6">
				<h6 style="margin-top:1rem"><i>Tipo de Cadastro</i></h6>	
				<div class="input-group ">
					<span class="input-group-addon " id="sizing-addon1"><i class="fa fa-user"></i></span>
					<select class="form-control" id="tipo_cadastro" onchange="modelo_cadastro()">
						<option value="cliente">Cliente</option>
						<option value="fornecedor">Fornecedor</option>
						<option value="seguradora">Seguradora</option>
						<option value="corretor">Corretor</option>
					</select>
				</div>
			</div>
			<div class="col-6">
				<h6  style="margin-top:1rem"><i>Tipo de Pessoa</i></h6>	
				<div class="input-group ">
					<span class="input-group-addon" id="sizing-addon1"><i class="fa fa-user"></i></span>
					<select class="form-control" id="tipo_pessoa" onchange="modelo_cadastro()">
						<option value="fisica">Pessoa Física</option>
						<option value="juridica">Pessoa Juridíca</option>
					</select>
				</div>
			</div>
		</div>
		<hr>
		<div class="row" id="fisica">
			<div class="col-9">
				<h6  style="margin-top:1rem"><i>Nome</i></h6>	
				<div class="input-group ">
					<span class="input-group-addon " id="sizing-addon1"><i class="fa fa-address-book"></i></span>
					<input type="text" id="nome" class="form-control" placeholder="Ex.:  Exemplo exemplo " maxlength="200" name="">
				</div>
				<div class="text-danger"></div>
			</div>
			<div class="col-3">
				<h6  style="margin-top:1rem"><i>Nascimento</i></h6>	
				<div class="input-group ">
					<span class="input-group-addon " id="sizing-addon1"><i class="fa fa-calendar"></i></span>
					<input class="form-control" placeholder="Ex.: 99/99/9999"  id="nascimento" name="event_date" id="event_date" type="text" >
				</div>
				<div class="text-danger"></div>
			</div>
			<div class="col-4">
				<h6  style="margin-top:1rem"><i>CPF</i></h6>	
				<div class="input-group ">
					<span class="input-group-addon" id="sizing-addon1"><i class="fa fa-address-book"></i></span>
					<input type="text" id="cpf" class="form-control" onkeyup="verifica_cpf()" placeholder="Ex.: 999.999.999-99" data-mask="999.999.999-99" name="">
				</div>
				<div class="text-danger"></div>
			</div>
			<div class="col-4">
				<h6  style="margin-top:1rem"><i>RG</i></h6>	
				<div class="input-group ">
					<span class="input-group-addon " id="sizing-addon1"><i class="fa fa-address-book"></i></span>
					<input type="text" id="rg" class="form-control" placeholder="Ex.: 9999999"  name="">
				</div>
				<div class="text-danger"></div>
			</div>
			<div class="col-4">
				<h6  style="margin-top:1rem"><i>Orgão Emissor</i></h6>	
				<div class="input-group ">
					<span class="input-group-addon " id="sizing-addon1"><i class="fa fa-building"></i></span>
					<input type="text" id="orgao_emissor" class="form-control" placeholder="Ex.: SSP-DF" maxlength="50" name="">
				</div>
				<div class="text-danger"></div>
			</div>
		</div>
		<div class="row" id="juridica">
			<div class="col-6">
				<h6  style="margin-top:1rem"><i>CNPJ</i></h6>	
				<div class="input-group ">
					<span class="input-group-addon" id="sizing-addon1"><i class="fa fa-address-book"></i></span>
					<input type="text" id="cnpj" onkeyup="verifica_cnpj()" class="form-control" placeholder="Ex.: 99.999.999/9999-99" data-mask="99.999.999/9999-99" name="">
				</div>
				<div class="text-danger"></div>
			</div>
			<div class="col-6">
				<h6  style="margin-top:1rem"><i>I.E</i></h6>	
				<div class="input-group ">
					<span class="input-group-addon " id="sizing-addon1"><i class="fa fa-address-book"></i></span>
					<input type="text" id="inscricao_estadual" class="form-control" placeholder="Ex.: 99999999999"  name="">
				</div>
				<div class="text-danger"></div>
			</div>
			<div class="col-6">
				<h6  style="margin-top:1rem"><i>Razão social</i></h6>	
				<div class="input-group ">
					<span class="input-group-addon " id="sizing-addon1"><i class="fa fa-address-book"></i></span>
					<input type="text" id="razao_social" class="form-control" placeholder="Ex.:  Exemplo exemplo LTDA" maxlength="200" name="">
				</div>
				<div class="text-danger"></div>
			</div>
			<div class="col-6">
				<h6  style="margin-top:1rem"><i>Nome fantasia</i></h6>	
				<div class="input-group ">
					<span class="input-group-addon " id="sizing-addon1"><i class="fa fa-address-book"></i></span>
					<input type="text" id="nome_fantasia" class="form-control" placeholder="Ex.: Exemplo exemplo" maxlength="200" name="">
				</div>
				<div class="text-danger"></div>
			</div>
		</div>
		<div class="row">
			<div class="col-6">
				<h6  style="margin-top:1rem"><i>E-Mail</i></h6>	
				<div class="input-group ">
					<span class="input-group-addon " id="sizing-addon1"><i class="fa fa-envelope"></i></span>
					<input type="email" id="email" class="form-control" onkeyup="valida_email()" placeholder="Ex.: exemplo@exemplo.com"  name="">
				</div>
				<div class="text-danger"></div>
			</div>
			<div class="col-3">
				<h6  style="margin-top:1rem"><i>Telefone</i></h6>	
				<div class="input-group ">
					<span class="input-group-addon " id="sizing-addon1"><i class="fa fa-phone"></i></span>
					<input type="text" id="telefone" class="form-control" placeholder="Ex.: (99) 9999-9999" data-mask="(99) 9999-9999" name="">
				</div>
				<div class="text-danger"></div>
			</div>
			<div class="col-3">
				<h6  style="margin-top:1rem"><i>Celular</i></h6>	
				<div class="input-group ">
					<span class="input-group-addon " id="sizing-addon1"><i class="fa fa-mobile"></i></span>
					<input type="text" id="celular" class="form-control" placeholder="Ex.: (99) 99999-9999" data-mask="(99) 99999-9999" name="">
				</div>
				<div class="text-danger"></div>
			</div>
		</div>
		<hr>
		<div class="row">
			<div class="col-4">
				<h6  style="margin-top:1rem"><i>CEP</i></h6>	
				<div class="input-group ">
					<span class="input-group-addon " id="sizing-addon1"><i class="fa fa-search"></i></span>
					<input type="text" id="cep" class="form-control" placeholder="Ex.: 99999-999" data-mask="99999-999"  onkeyup="busca_cep()">
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
					<input type="text" id="endereco" class="form-control" placeholder="Ex.: Exemplo exemplo exemplo"  disabled>
				</div>
				<div class="text-danger"></div>
			</div>
			<div class="col-2">
				<h6  style="margin-top:1rem"><i>Número</i></h6>	
				<div class="input-group ">
					<span class="input-group-addon " id="sizing-addon1"><i class="fa fa-home"></i></span>
					<input type="text" id="numero" class="form-control" placeholder="Ex.: 99 "  disabled>
				</div>
				<div class="text-danger"></div>
			</div>
			<div class="col-4">
				<h6  style="margin-top:1rem"><i>Complemento</i></h6>	
				<div class="input-group ">
					<span class="input-group-addon " id="sizing-addon1"><i class="fa fa-home"></i></span>
					<input type="text" id="complemento" class="form-control" placeholder="Ex.: Exemplo Exemplo " maxlength="50" disabled>
				</div>
				<div class="text-danger"></div>
			</div>
			<div class="col-6">
				<h6  style="margin-top:1rem"><i>Bairro</i></h6>	
				<div class="input-group ">
					<span class="input-group-addon " id="sizing-addon1"><i class="fa fa-home"></i></span>
					<input type="text" id="bairro" class="form-control" placeholder="Ex.: Exemplo Exemplo " maxlength="100" disabled>
				</div>
				<div class="text-danger"></div>
			</div>
			<div class="col-4">
				<h6  style="margin-top:1rem"><i>Cidade</i></h6>	
				<div class="input-group ">
					<span class="input-group-addon " id="sizing-addon1"><i class="fa fa-home"></i></span>
					<input type="text" id="cidade" class="form-control" placeholder="Ex.: Exemplo exemplo" maxlength="100" disabled>
				</div>
				<div class="text-danger"></div>
			</div>
			<div class="col-2">
				<h6  style="margin-top:1rem"><i>UF</i></h6>	
				<div class="input-group ">
					<span class="input-group-addon " id="sizing-addon1"><i class="fa fa-home"></i></span>
					<input type="text" id="uf" class="form-control" placeholder="Ex.: DF" maxlength="2" disabled>
				</div>
				<div class="text-danger"></div>
			</div>
		</div>
		<hr>
		<div class="row" id="cadastro_fornecedor">
			<div class="col-6">
				<h6  style="margin-top:1rem"><i>Fabricante</i></h6>	
				<div class="input-group ">
					<span class="input-group-addon " id="sizing-addon1"><i class="fab fa-product-hunt"></i></span>
					<input type="text" id="fabricante" class="form-control" placeholder="Ex.: Exemplo exemplo" maxlength="200" name="">
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
		<div class="row " id="usuario">
			<div class="col-6">
				<h6  style="margin-top:1rem"><i>Nome de Usuário</i></h6>	
				<div class="input-group ">
					<span class="input-group-addon" id="sizing-addon1"><i class="fa fa-user"></i></span>
					<input type="text" class="form-control" id="nome_usuario" onkeyup="verifica_usuario()" placeholder="Ex.: Exemplo" >
				</div>
				<div class="text-danger"></div>
			</div>
		</div>
		<div class="row">
			<div class="col-12">
				<h6  style="margin-top:1rem"><i>Observações</i></h6>	
				<textarea class="form-control" rows="5" id="observacao"></textarea>
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
	<script src="../static/js/bootstrap-datepicker.js"></script>
	<script src="../static/js/bootstrap-datepicker.pt-BR.min.js"></script>	

	<script type="text/javascript">

	$('#nascimento').datepicker({
    	format: 'dd/mm/yyyy',
    	language : 'pt-BR'
    });

	var controle_cep = true;
	var controle_usuario = true;
	var controle_cpf = true;
	var controle_cnpj = true;

	function modelo_cadastro(){
		var tipo_cadastro = $('#tipo_cadastro').val();
		var tipo_pessoa   = $('#tipo_pessoa').val();

		//limpa campos do formulario
		$('#cnpj').val("");
		$('#razao_social').val("");
		$('#nome_fantasia').val("");
		$('#inscricao_estadual').val("");

		$('#nome').val("");
		$('#nascimento').val("");
		$('#cpf').val("");
		$('#rg').val("");
		$('#orgao_emissor').val("");

		$('#fabricante').val("");

		//mostra campos de acordo com o tipo de possoa(Fisica/Juridica)
		if(tipo_pessoa == "fisica"){
			$('#juridica').hide();
			$('#fisica').show();
			limpa_cadastro();
		}else{
			$('#fisica').hide();
			$('#juridica').show();
			limpa_cadastro();
		}

		//adiciona campos extras caso seja fornecedor ou cliene
		if(tipo_cadastro == "fornecedor"){
			$('#cadastro_cliente').hide();
			$('#usuario').hide();
			$('#cadastro_fornecedor').show();
			limpa_cadastro();
		}else if(tipo_cadastro == "cliente"){
			$('#cadastro_cliente').show();
			$('#cadastro_fornecedor').hide();
			$('#usuario').show();
			limpa_cadastro();
		}else if(tipo_cadastro == "corretor"){
			$('#cadastro_cliente').hide();
			$('#usuario').show();
			$('#cadastro_fornecedor').hide();
			limpa_cadastro();
		}else{
			$('#usuario').hide();
			$('#cadastro_cliente').hide();
			$('#cadastro_fornecedor').hide();
			limpa_cadastro();
		}
	}

	function salvar(){

		var corretor = $('#corretor').val();
		var seguradora = $('#seguradora').val();
		
		var validacao_ok = true; 
		var tipo_cadastro = $('#tipo_cadastro').val();
		var tipo_pessoa   = $('#tipo_pessoa').val();
		var tipo_cadastro = $('#tipo_cadastro').val();

		var celular = $('#celular').val();
		var telefone = $('#telefone').val();
		var email = $('#email').val();

		var sem_cep = $('#sem_cep');

		var cep = $('#cep').val();
		var endereco = $('#endereco').val();
		var numero = $('#numero').val();
		var complemento = $('#complemento').val();
		var bairro = $('#bairro').val();
		var cidade = $('#cidade').val();
		var uf = $('#uf').val();

		var nome_usuario = $('#nome_usuario').val();


		if(tipo_pessoa == "fisica"){

			var nome = $('#nome').val();
			var cpf = $('#cpf').val();
			var nascimento = $('#nascimento').val();
			

			if(cpf.length == 0 ){
				add_erro_input($('#cpf') , "Por favor preencha o campo CPF");
				validacao_ok = false;
			}else{
				remove_erro_input($('#cpf'));
			}

			if(nome.length == 0 ){
				add_erro_input($('#nome') , "Por favor preencha o campo Nome");
				validacao_ok = false;
			}else{
				remove_erro_input($('#nome'));
			}

			if(nascimento.length == 0 ){
				add_erro_input($('#nascimento') , "Por favor preencha o campo Nascimento");
				validacao_ok = false;
			}else{
				remove_erro_input($('#nascimento'));
			}

		}else if(tipo_pessoa == "juridica"){

			var cnpj = $('#cnpj').val();
			var nome_fantasia = $('#nome_fantasia').val();

			if(cnpj.length == 0 ){
				add_erro_input($('#cnpj') , "Por favor preencha o campo CNPJ");
				validacao_ok = false;
			}else{
				remove_erro_input($('#cnpj'));
			}

			if(nome_fantasia.length == 0 ){
				add_erro_input($('#nome_fantasia') , "Por favor preencha o campo Nome Fantasia");
				validacao_ok = false;
			}else{
				remove_erro_input($('#nome_fantasia'));
			}

		}

		if(email.length == 0 ){
			add_erro_input($('#email') , "Por favor preencha o campo E-mail");
			validacao_ok = false;
		}else{
			remove_erro_input($('#email'));
		}

		if(celular.length == 0 && telefone.length == 0  ){
			add_erro_input($('#telefone') , "Por favor preencha o campo Telefone e/ou o campo Celular");
			add_erro_input($('#celular') , "Por favor preencha o campo Telefone e/ou o campo Celular");
			validacao_ok = false;
		}else{
			remove_erro_input($('#telefone'));
			remove_erro_input($('#celular'));
		}

		if(tipo_cadastro == "fornecedor"){

			var fabricante = $('#fabricante').val();

			if(fabricante.length == 0 ){
				add_erro_input($('#fabricante') , "Por favor preencha o campo Fabricante");
				validacao_ok = false;
			}else{
				remove_erro_input($('#fabricante'));
			}

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

		if (tipo_cadastro == "corretor" || tipo_cadastro == "cliente"){

			if(nome_usuario.length == 0 ){
				add_erro_input($('#nome_usuario') , "Por favor preencha o campo Nome de usuário");
				validacao_ok = false;
			}else{
				if(controle_usuario){
					remove_erro_input($('#nome_usuario'));
				}else{
					add_erro_input($('#nome_usuario') , "Nome de Usuário invalido");
					validacao_ok = false;
				}
			}
		}


		if(validacao_ok && controle_cep && controle_usuario && controle_cpf && controle_cnpj ){

			var tipo_cadastro = $('#tipo_cadastro').val();
			var nome = $('#nome').val();
			var nascimento = $('#nascimento').val();
			var cpf = $('#cpf').val();
			var rg = $('#rg').val();
			var orgao_emissor = $('#orgao_emissor').val();
			var cnpj = $('#cnpj').val();
			var inscricao_estadual = $('#inscricao_estadual').val();
			var razao_social = $('#razao_social').val();
			var nome_fantasia = $('#nome_fantasia').val();
			var email = $('#email').val();
			var telefone = $('#telefone').val();
			var celular = $('#celular').val();
			var cep = $('#cep').val();
			var endereco = $('#endereco').val();
			var numero = $('#numero').val();
			var complemento = $('#complemento').val();
			var bairro = $('#bairro').val();
			var cidade = $('#cidade').val();
			var uf = $('#uf').val();
			var seguradora = $('#seguradora').val();
			var corretor = $('#corretor').val();
			var fabricante = $('#fabricante').val();
			var nome_usuario = $('#nome_usuario').val();
			var observacao = $('#observacao').val();

			var data = {
				tipo_cadastro : tipo_cadastro,
				nome : nome,
				nascimento : nascimento,
				cpf : cpf,
				rg : rg,
				orgao_emissor : orgao_emissor,
				cnpj : cnpj,
				inscricao_estadual : inscricao_estadual,
				razao_social : razao_social,
				nome_fantasia : nome_fantasia,
				email : email, 
				telefone : telefone,
				celular : celular,
				cep : cep,
				endereco : endereco,
				numero : numero,
				complemento : complemento,
				bairro : bairro,
				cidade : cidade,
				uf : uf,
				seguradora : seguradora,
				corretor : corretor,
				fabricante : fabricante,
				nome_usuario : nome_usuario,
				observacao : observacao ,
				funcao : "salvar"
			};

			$.ajax({
				url: '../../controller/cadastro.php',
				method: "post",
				data: data ,
				success: function(data){
					if(data){
						if(tipo_cadastro == "cliente"){
							window.location.href='clienteCadastroVeiculo.php?codCli='+data;
							window.location.href='#body';
						}else{
							window.location.href='#body';
							monta_msg_sucesso("Cadastro efetuado com sucesso");
						}
						limpa_campos();
					}else{
						window.location.href='#body';
						monta_msg_erro("Ocorreu um erro, por favor tente mais tarde!");
					}
				}
			});
		}
	}
	function busca_cep(){

		var cep =  $('#cep').val();

		if(cep.length == 9 && ($.isNumeric(cep.charAt(0))) &&
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
		}
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

	function limpa_cadastro(){
		remove_erro_input($('#complemento'));
		remove_erro_input($('#cep'));
		remove_erro_input($('#uf'));
		remove_erro_input($('#cidade'));
		remove_erro_input($('#bairro'));
		remove_erro_input($('#numero'));
		remove_erro_input($('#endereco'));
		remove_erro_input($('#fabricante'));
		remove_erro_input($('#telefone'));
		remove_erro_input($('#celular'));
		remove_erro_input($('#nome_fantasia'));
		remove_erro_input($('#cnpj'));
		remove_erro_input($('#email'));
		remove_erro_input($('#nascimento'));
		remove_erro_input($('#nome'));
		remove_erro_input($('#cpf'));
		remove_erro_input($('#nome_usuario'));

		controle_cep = true;
		controel_usuario = true;
		controle_cpf = true;
		controle_cnpj = true;
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

	function verifica_cpf(){
		var cpf = $('#cpf').val();
		if(cpf.length = 14 && ($.isNumeric(cpf.charAt(0))) 
			&& ($.isNumeric(cpf.charAt(1))) && ($.isNumeric(cpf.charAt(2)))
			&& ($.isNumeric(cpf.charAt(4))) && ($.isNumeric(cpf.charAt(5)))
			&& ($.isNumeric(cpf.charAt(6))) && ($.isNumeric(cpf.charAt(8)))
			&& ($.isNumeric(cpf.charAt(9))) && ($.isNumeric(cpf.charAt(10)))
			&& ($.isNumeric(cpf.charAt(12))) && ($.isNumeric(cpf.charAt(13))) ){
		
			var data = {cpf: cpf, funcao: 'verifica_cpf'};
			$.ajax({
				url: '../../controller/cadastro.php',
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
				}
			});
		}
	}

	function verifica_cnpj(){

		var cnpj = $('#cnpj').val();

		if (cnpj.length = 18 && ($.isNumeric(cnpj.charAt(0))) 
			&& ($.isNumeric(cnpj.charAt(1))) && ($.isNumeric(cnpj.charAt(3)))
			&& ($.isNumeric(cnpj.charAt(4))) && ($.isNumeric(cnpj.charAt(5)))
			&& ($.isNumeric(cnpj.charAt(7))) && ($.isNumeric(cnpj.charAt(8)))
			&& ($.isNumeric(cnpj.charAt(9))) && ($.isNumeric(cnpj.charAt(11)))
			&& ($.isNumeric(cnpj.charAt(12))) && ($.isNumeric(cnpj.charAt(13)))
			&& ($.isNumeric(cnpj.charAt(14))) && ($.isNumeric(cnpj.charAt(16))
			&& ($.isNumeric(cnpj.charAt(17)))) ){
				
			var data = {cnpj: cnpj, funcao: 'verifica_cnpj'};
			var html ;
			$.ajax({
				url: '../../controller/cadastro.php',
				method: "post",
				data: data ,
				success: function(data){
					if(data){
						controle_cnpj = false;
						add_erro_input($('#cnpj') , "CNPJ já cadastrado");
					}else{
						controle_cnpj = true;
						remove_erro_input($('#cnpj'));
					}
				}
			});
		}
	}

	function limpa_campos(){

		$('#sem_cep').prop("checked", false);
		$('#nome').val('');
		$('#nascimento').val('');
		$('#cpf').val('');
		$('#rg').val('');
		$('#orgao_emissor').val('');
		$('#cnpj').val('');
		$('#inscricao_estadual').val('');
		$('#razao_social').val('');
		$('#nome_fantasia').val('');
		$('#email').val('');
		$('#telefone').val('');
		$('#celular').val('');
		$('#cep').val('');
		$('#endereco').val('');
		$('#numero').val('');
		$('#complemento').val('');
		$('#bairro').val('');
		$('#cidade').val('');
		$('#uf').val('');
		$('#seguradora').val('');
		$('#corretor').val('');
		$('#fabricante').val('');
		$('#nome_usuario').val('');
		$('#observacao').val('');
	}

	function valida_email(){
		var filter = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
		if(!filter.test($('#email').val())){
			add_erro_input( $('#email') , "E-mail inválido" )
			validacao_ok = false;
		} else {
			validacao_ok = true;
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

	busca_corretores();

	function busca_corretores(){
		var data = {funcao: 'busca_corretores'};
		var html ;
		$.ajax({
			url: '../../controller/cadastro.php',
			method: "post",
			data: data ,
			success: function(data){
				var retorno = $.parseJSON(data);

				html = "";
				for(var i=0; i < retorno.length ; i++ ){
					if(retorno[i].nome != null){
						html += '<option value="'+retorno[i].id+'">'+retorno[i].nome+ '</option>';
					}else{
						html += '<option value="'+retorno[i].id+'">'+retorno[i].nome_fantasia+ '</option>';
					}
				}

				$('#corretor').append(html);
			}
		});
	}

	busca_seguradoras();

	function busca_seguradoras(){
		var data = {funcao: 'busca_seguradoras'};
		var html ;
		$.ajax({
			url: '../../controller/cadastro.php',
			method: "post",
			data: data ,
			success: function(data){
				var retorno = $.parseJSON(data);

				html = "";
				for(var i=0; i < retorno.length ; i++ ){
					if(retorno[i].nome != null){
						html += '<option value="'+retorno[i].id+'">'+retorno[i].nome+ '</option>';
					}else{
						html += '<option value="'+retorno[i].id+'">'+retorno[i].nome_fantasia+ '</option>';
					}
				}

				$('#seguradora').append(html);
			}
		});
	}

	

	</script>

</html>
