 //busca plavara no array de palavras
function buscaPalavras(i){

	//verifica se é a ultima palavra
	if( i == 17){
		n = 0;
	//verifica se é a primeira palavra
	}else if(i == -1){
		n = 16;
	
	}else{
		n = i;
	}

    return palavras[n];
}
		
//gera um numero aleatorio
function geraNumero(){
	min = Math.ceil(0);
	max = Math.floor(16);
	return Math.floor(Math.random() * (max - min)) + min;
}

//recebe a letra clicada no alfabeto
function pegaLetra(e){
	var indicador = 0;
	var html;
	//percorrre a variavel de letras acertadas para verificar se  a letra clicada já foi acertada
	for(var i=0 ; i < palavra.length ; i++){
		//vrifica se a letra clicada já foi acertada
		if( e.id == palavra_certa[i] ){
			indcador_letra = 1;
		}
	}
	//verificca se a letra jja foi acertada
	if(indcador_letra != 1){
		//verifica se a palavra contem a letra clicada 
		for(var i=0 ; i < palavra.length ; i++){
			//caso contenha colori a borda da letra de verde e adiciona a letra nos respectivos espaços da palavra
			if(array_palavra[i] == e.id){
				palavra_certa[i] = e.id;
				e.children[0].classList.add('border-success');
				if( i == 0 ){
					//gera html da figura da letra
					html = '<img class="img-fluid img-thumbnail" style="width:100% ;height: 2.8rem  " src="estatico/imagens/alfabeto/'+e.id+'.png">';
					//adiciona html na div
					$('#p0').html(html);
				}else if( i == 1 ){
					//gera html da figura da letra
					html = '<img class="img-fluid img-thumbnail" style="width:100% ;height: 2.8rem  " src="estatico/imagens/alfabeto/'+e.id+'.png">';
					//adiciona html na div
					$('#p1').html(html);
				}else if( i == 2 ){
					//gera html da figura da letra
					html = '<img class="img-fluid img-thumbnail" style="width:100% ;height: 2.8rem  " src="estatico/imagens/alfabeto/'+e.id+'.png">';
					//adiciona html na div
					$('#p2').html(html);
				}else if( i == 3 ){
					//gera html da figura da letra
					html = '<img class="img-fluid img-thumbnail" style="width:100% ;height: 2.8rem  " src="estatico/imagens/alfabeto/'+e.id+'.png">';
					//adiciona html na div
					$('#p3').html(html);
				}else if( i == 4 ){
					//gera html da figura da letra
					html = '<img class="img-fluid img-thumbnail" style="width:100% ;height: 2.8rem  " src="estatico/imagens/alfabeto/'+e.id+'.png">';
					//adiciona html na div
					$('#p4').html(html);
				}else if( i == 5 ){
					//gera html da figura da letra
					html = '<img class="img-fluid img-thumbnail" style="width:100% ;height: 2.8rem  " src="estatico/imagens/alfabeto/'+e.id+'.png">';
					//adiciona html na div
					$('#p5').html(html);
				}else if( i == 6 ){
					//gera html da figura da letra
					html = '<img class="img-fluid img-thumbnail" style="width:100% ;height: 2.8rem  " src="estatico/imagens/alfabeto/'+e.id+'.png">';
					//adiciona html na div
					$('#p6').html(html);
				}else if( i == 7 ){
					//gera html da figura da letra
					html = '<img class="img-fluid img-thumbnail" style="width:100% ;height: 2.8rem  " src="estatico/imagens/alfabeto/'+e.id+'.png">';
					//adiciona html na div
					$('#p7').html(html);
				}else if( i == 8 ){
					//gera html da figura da letra
					html = '<img class="img-fluid img-thumbnail" style="width:100% ;height: 2.8rem  " src="estatico/imagens/alfabeto/'+e.id+'.png">';
					//adiciona html na div
					$('#p8').html(html);
				}else if( i == 9 ){
					//gera html da figura da letra
					html = '<img class="img-fluid img-thumbnail" style="width:100% ;height: 2.8rem  " src="estatico/imagens/alfabeto/'+e.id+'.png">';
					//adiciona html na div
					$('#p9').html(html);
				}else if( i == 10 ){
					//gera html da figura da letra
					html = '<img class="img-fluid img-thumbnail" style="width:100% ;height: 2.8rem  " src="estatico/imagens/alfabeto/'+e.id+'.png">';
					//adiciona html na div
					$('#p10').html(html);
				}else if( i == 11 ){
					//gera html da figura da letra
					html = '<img class="img-fluid img-thumbnail" style="width:100% ;height: 2.8rem  " src="estatico/imagens/alfabeto/'+e.id+'.png">';
					//adiciona html na div
					$('#p11').html(html);
				}

				//incrementa um contador toda vez que acerta a letra
				indicador += 1;
				//incrementa um contador de quantos acertos teve
				indicador_acerto += 1;
				//verifica se a quantidade de acerto corresponde ao tamanho da palavra para dar a mensagem de sucesso
				if(indicador_acerto == palavra.length){
					//gera html da msg de sucesso
					var html_sucesso = '<div class="col-6">'+
								'<div class="alert alert-success" style="width: 100%; margin-top: 0.3rem"><center><strong>Parabéns você acertou! &nbsp;</strong><button class="btn btn-success " onclick="recarregar()">Próxima Imagem</button></center></div>'+
								'</div>';
				//adiciona html na div
				$('#msg1').html(html_sucesso);
				//esconde o alfabeto
				$('#letra1').hide();
				$('#letra2').hide();
				$('#letra3').hide();
			
				}

			}
		}
	}
	//se o indicador for 0 indica que errou a letra
	if (indicador == 0 && indcador_letra != 1){
		//incrementa o indicador de erros
		indicador_erro += 1;
		//remove o atributo onclick da letra para que ela não possa ser clicada novamente 
		e.removeAttribute('onclick');
		//colori a borda da letra de vermelho
		e.children[0].classList.add('border-danger');
		//verifica qual a posição do erro para adicionar a letra errada nas div de letras erradas
		if( indicador_erro == 1){
			//gera html da forca
			html_forca = '<img style="height: 19rem; margin-left: 1rem ; margin-top: 1rem" class="col-12 img-fluid " src="estatico/imagens/forca/forca_'+indicador_erro+'.png">';
			//gera html da figura da letra errada
			html = '<img class="img-fluid img-thumbnail" style="width:100% ;height: 2.8rem  " src="estatico/imagens/alfabeto/'+e.id+'.png">';
			//adiciona html na div
			$('#forca').html(html_forca);
			//adiciona html na div
			$('#erro_1').html(html);
		}else if( indicador_erro == 2){
			//gera html da forca
			html_forca = '<img style="height: 19rem; margin-left: 1rem ; margin-top: 1rem" class="col-12 img-fluid " src="estatico/imagens/forca/forca_'+indicador_erro+'.png">';
			//gera html da figura da letra errada
			html = '<img class="img-fluid img-thumbnail" style="width:100% ;height: 2.8rem  " src="estatico/imagens/alfabeto/'+e.id+'.png">';
			//adiciona html na div
			$('#erro_2').html(html);
			//adiciona html na div
			$('#forca').html(html_forca);
		}else if( indicador_erro == 3){
			//gera html da forca
			html_forca = '<img style="height: 19rem; margin-left: 1rem ; margin-top: 1rem" class="col-12 img-fluid " src="estatico/imagens/forca/forca_'+indicador_erro+'.png">';
			//ger ahtml da figura da letra errada
			html = '<img class="img-fluid img-thumbnail" style="width:100% ;height: 2.8rem  " src="estatico/imagens/alfabeto/'+e.id+'.png">';
			//adiciona html na div
		    $('#forca').html(html_forca);
		    //adiciona html na div	
			$('#erro_3').html(html);
		}else if( indicador_erro == 4){
			//gera html da forca
            html_forca = '<img style="height: 19rem; margin-left: 1rem ; margin-top: 1rem" class="col-12 img-fluid " src="estatico/imagens/forca/forca_'+indicador_erro+'.png">';
            //gera html da figura da letra errada 
			html = '<img class="img-fluid img-thumbnail" style="width:100% ;height: 2.8rem  " src="estatico/imagens/alfabeto/'+e.id+'.png">';
			//adiciona html na div
			$('#forca').html(html_forca);
			//adiciona html na div
			$('#erro_4').html(html);
		}else if( indicador_erro == 5){
			//gera html da forca
			html_forca = '<img style="height: 19rem; margin-left: 1rem ; margin-top: 1rem" class="col-12 img-fluid " src="estatico/imagens/forca/forca_'+indicador_erro+'.png">';
            //gera html da figura da letra errada 
			html = '<img class="img-fluid img-thumbnail" style="width:100% ;height: 2.8rem  " src="estatico/imagens/alfabeto/'+e.id+'.png">';
			//adiciona html na div
			$('#forca').html(html_forca);
			//adiciona html na div
			$('#erro_5').html(html);
			// cria html de erro
			var html_erro = '<div class="col-6">'+
							'<div class="alert alert-danger" style="width: 100%; margin-top: 0.3rem"><center><strong>Ahh você perdeu! &nbsp;</strong><button class="btn btn-danger " onclick="recarregar()">Próxima Imagem</button></center></div>'+
							'</div>';
			//adiciona html de erro na div				
			$('#msg1').html(html_erro);
			
			//esconde alfabeto
			$('#letra1').hide();
			$('#letra2').hide();
			$('#letra3').hide();
		}
		
		
	}

	indcador_letra = 0;
}
//recarrega as divs para a proxima palavra
function recarregar(i){

	//reinicia as variaveis
	palavra_certa = [];
	indcador_letra = 0;

	//gera html da forca
	html_forca = '<img style="height: 19rem; margin-left: 1rem ; margin-top: 1rem" class="col-12 img-fluid " src="estatico/imagens/forca/forca.png">';
	//adiciona html na div
	$('#forca').html(html_forca);
	//recarrega as divs
	$('#rowLetras').load( "jogo.html #rowLetras1" );
	$('#divErro').load( "jogo.html #divErro1" );
	$('#lista_letras').html( " " );
	$('#msg').html(" ");

	//verifica o numero da proxima palavra
	if ( i != undefined){
		palavra = buscaPalavras( n-1 );
	}else{
		palavra = buscaPalavras( n+1 );
	}
	//transforma a palavra em um array de strings
	array_palavra = palavra.split('');
	//zera os indicadores
	indicador_erro = 0;
	indicador_acerto = 0;
	//zera a variavel html
	var html = ""; 
    //gera html da imagem
	var html_imagem = '<img style="height: 17rem; width: 60%; margin-left: 0.2rem ; margin-top: 0.2rem" class="col-12 img-fluid img-thumbnail border-primary" src="estatico/imagens/figuras/'+palavra+'.jpg">';
	//adiciona ahtml na div
	$('#forca').html(html_forca);
	//adiciona html na div
	$('#imagem').html(html_imagem);
	//percorre o array de string para cada letra adiciona o campo na div
	for(var i=0 ; i < palavra.length ; i++){

		//gera html da letra
		html = '<div class="col-1" style=" margin-top:  1rem;">'+
						'<div class="card border-primary" id="p'+i+'" style="height: 3rem" ></div>'+
				'</div>';
		//adiciona html na div
		$('#lista_letras').append(html);
	}
		
}