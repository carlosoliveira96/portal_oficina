<?php
include 'menu.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Portal Oficina</title>

	<!-- Arquivos CSS -->
	<link href="static/css/jasny-bootstrap.css" rel="stylesheet">
	<link href="static/css/bootstrap-datepicker.css" rel="stylesheet">
	<link  href="static/css/fontawesome-all.min.css" rel="stylesheet">
	<!-- Arquivos JS -->
	<script type="text/javascript" src="static/js/jasny-bootstrap.js"></script>

</head>
<body  style="background-color: #F8F9FA;" onload="modelo_cadastro()">
	<div class="container" style=" background-color: #fff;">
		<h2>
			<p class="text-center" style="color: #000"><i><b>Cadastro</b></i></p>
		</h2>
		
		<hr>
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
					<input type="text" id="cpf" class="form-control" placeholder="Ex.: 999.999.999-99" data-mask="999.999.999-99" name="">
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
					<input type="text" id="cnpj" class="form-control" placeholder="Ex.: 99.999.999/9999-99" data-mask="99.999.999/9999-99" name="">
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
					<input type="email" id="email" class="form-control" placeholder="Ex.: exemplo@exemplo.com"  name="">
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
						<option value="cliente">Selecione...</option>
					</select>
				</div>
				<div class="text-danger"></div>
			</div>
			<div class="col-6">
				<h6  style="margin-top:1rem"><i>Corretor</i></h6>	
				<div class="input-group ">
					<span class="input-group-addon" id="sizing-addon1"><i class="fa fa-user"></i></span>
					<select class="form-control" id="corretor">
						<option value="fisica">Selecione..</option>
					</select>
				</div>
				<div class="text-danger"></div>
			</div>
		</div>
		<div class="row">
			<div class="col-12">
				<h6  style="margin-top:1rem"><i>Observações</i></h6>	
				<textarea class="form-control" rows="5"></textarea>
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
	<script type="text/javascript" src="static/js/popper.js"></script>	
	<script src="static/js/bootstrap-datepicker.js"></script>
	<script src="static/js/bootstrap-datepicker.pt-BR.min.js"></script>	

	<script type="text/javascript">

	$('#nascimento').datepicker({
    	format: 'dd/mm/yyyy',
    	language : 'pt-BR'
    });

	var controle_cep = true;

	function modelo_cadastro(){
		var tipo_cadastro = $('#tipo_cadastro').val();
		var tipo_pessoa   = $('#tipo_pessoa').val();


		//Exemplo de adicionar e remover erro de imput
		//add_erro_input($('#nome') , "Por favor preencha o campo nome");
		//remove_erro_input($('#nome'));


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


		//mostra campos de aacordo com o tipo de possoa(Fisica/Juridica)
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
			$('#cadastro_fornecedor').show();
			limpa_cadastro();
		}else if(tipo_cadastro == "cliente"){
			$('#cadastro_cliente').show();
			$('#cadastro_fornecedor').hide();
			limpa_cadastro();
		}else{
			$('#cadastro_cliente').hide();
			$('#cadastro_fornecedor').hide();
			limpa_cadastro();
		}
	}

	function salvar(){
		
		var validação_ok = true; 
		var tipo_cadastro = $('#tipo_cadastro').val();
		var tipo_pessoa   = $('#tipo_pessoa').val();
		var tipo_cadastro = $('#tipo_cadastro').val();

		var celular = $('#celular').val();
		var telefone = $('#telefone').val();

		var sem_cep = $('#sem_cep');

		var cep = $('#cep').val();
		var endereco = $('#endereco').val();
		var numero = $('#numero').val();
		var complemento = $('#complemento').val();
		var bairro = $('#bairro').val();
		var cidade = $('#cidade').val();
		var uf = $('#uf').val();

		if(tipo_pessoa == "fisica"){

			var nome = $('#nome').val();
			var email = $('#email').val();
			var cpf = $('#cpf').val();
			var nascimento = $('#nascimento').val();
			

			if(cpf.length == 0 ){
				add_erro_input($('#cpf') , "Por favor preencha o campo CPF");
				validação_ok = false;
			}else{
				remove_erro_input($('#cpf'));
			}

			if(nome.length == 0 ){
				add_erro_input($('#nome') , "Por favor preencha o campo Nome");
				validação_ok = false;
			}else{
				remove_erro_input($('#nome'));
			}

			if(nascimento.length == 0 ){
				add_erro_input($('#nascimento') , "Por favor preencha o campo Nascimento");
				validação_ok = false;
			}else{
				remove_erro_input($('#nascimento'));
			}


			if(email.length == 0 ){
				add_erro_input($('#email') , "Por favor preencha o campo E-mail");
				validação_ok = false;
			}else{
				remove_erro_input($('#email'));
			}


		}else if(tipo_pessoa == "juridica"){

			var cnpj = $('#cnpj').val();
			var nome_fantasia = $('#nome_fantasia').val();

			if(cnpj.length == 0 ){
				add_erro_input($('#cnpj') , "Por favor preencha o campo CNPJ");
				validação_ok = false;
			}else{
				remove_erro_input($('#cnpj'));
			}

			if(nome_fantasia.length == 0 ){
				add_erro_input($('#nome_fantasia') , "Por favor preencha o campo Nome Fantasia");
				validação_ok = false;
			}else{
				remove_erro_input($('#nome_fantasia'));
			}

		}


		if(celular.length == 0 && telefone.length == 0  ){
			add_erro_input($('#telefone') , "Por favor preencha o campo Telefone e/ou o campo Celular");
			add_erro_input($('#celular') , "Por favor preencha o campo Telefone e/ou o campo Celular");
			validação_ok = false;
		}else{
			remove_erro_input($('#telefone'));
			remove_erro_input($('#celular'));
		}

		if(tipo_cadastro == "fornecedor"){

			var fabricante = $('#fabricante').val();

			if(fabricante.length == 0 ){
				add_erro_input($('#fabricante') , "Por favor preencha o campo Fabricante");
				validação_ok = false;
			}else{
				remove_erro_input($('#fabricante'));
			}

		}

		if(sem_cep.is(':checked')){

			if(endereco.length == 0 ){
				add_erro_input($('#endereco') , "Por favor preencha o campo Endereco");
				validação_ok = false;
			}else{
				remove_erro_input($('#endereco'));
			}

			if(numero.length == 0 ){
				add_erro_input($('#numero') , "Por favor preencha o campo Número");
				validação_ok = false;
			}else{
				remove_erro_input($('#numero'));
			}

			if(bairro.length == 0 ){
				add_erro_input($('#bairro') , "Por favor preencha o campo Bairro");
				validação_ok = false;
			}else{
				remove_erro_input($('#bairro'));
			}

			if(cidade.length == 0 ){
				add_erro_input($('#cidade') , "Por favor preencha o campo Cidade");
				validação_ok = false;
			}else{
				remove_erro_input($('#cidade'));
			}

			if(uf.length == 0 ){
				add_erro_input($('#uf') , "Por favor preencha o campo UF");
				validação_ok = false;
			}else{
				remove_erro_input($('#uf'));
			}

			if(complemento.length == 0 ){
				add_erro_input($('#complemento') , "Por favor preencha o campo Complemento");
				validação_ok = false;
			}else{
				remove_erro_input($('#complemento'));
			}

		}else{

			if(cep.length == 0 ){
				add_erro_input($('#cep') , "Por favor preencha o campo CEP");
				validação_ok = false;
			}else if(controle_cep){
				remove_erro_input($('#cep'));

				if(complemento.length == 0 ){
					add_erro_input($('#complemento') , "Por favor preencha o campo Complemento");
					validação_ok = false;
				}else{
					remove_erro_input($('#complemento'));
				}
			}
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
	                url : '../controller/consultar_cep.php', /* URL que será chamada */ 
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
	                    	validação_ok = false;
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
	}

	</script>

</html>
