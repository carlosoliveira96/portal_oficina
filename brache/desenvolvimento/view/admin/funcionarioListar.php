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

    </head>

    <body style="background-color: #F8F9FA;" onload="busca_funcionario()">
       <div class="container" id="container" style=" background-color: #fff;">
            <h2>
                <p class="text-center" style="color: #000"><i><b>Lista de funcionários</b></i></p>
            </h2>
            <hr>
            <table class="table table-secondary table-bordered table-striped table-hover" id="funcionario">
                <thead>
                    <tr>
                        <th class="col-12" style="width: 70%; font-weight: normal">
                            <input type="text" id="input_pesquisa" class="form-control" placeholder="&#xF002; Funcionário" style="font-family: FontAwesome; font-size: 1.05rem;" onkeyup="busca_funcionario()">
                            <div>                            
                        </th>
                        <th class="col-12" style="width: 30%; font-weight: normal">
                            <input type="text" id="input_pesquisa_cargo" class="form-control" placeholder="&#xF002; Cargo" style="font-family: FontAwesome; font-size: 1.05rem;" onkeyup="busca_funcionario()">
                            <div>                            
                        </th>
                    </tr>
                </thead>
                <tbody data-link="row" id="tbody_funcionario" class="rowlink">
                </tbody>
            </table>
            <nav>
                <ul class="pager" id="paginacao">
                    
                </ul>
            </nav>
            <!--Modal funcionarios -->
            <div class="modal fade" id="modal_funcionario" tabindex="-1" role="dialog" aria-labelledby="funcionario" aria-hidden="true">
            <div class="modal-dialog modal-lg" id="modal" role="document" style="max-width: 800px; margin-top: 7%;">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Incluir peças</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" id="inclusao_pecas" style="overflow-y: auto">
                        <table class="table table-secondary table-striped table-bordered table-hover" id="peças_table">
                            <thead >
                                <tr>
                                    <th scope="col" class="text-center">
                                        <input type="text" id="nome_peca" class="form-control" style="font-family: FontAwesome; font-size: 1.05rem" placeholder="&#xF002; Pesquise pelo nome da peça"> 
                                    </th>
                                    <th scope="col" class="text-center">
                                    <input type="text" id="descvricao_veiculo" class="form-control" style="font-family: FontAwesome; font-size: 1.05rem" placeholder="&#xF002; Pesquise pelo nome do veículo">
                                    </th>
                                    <th scope="col" class="text-center">Ação</th>
                                </tr>
                            </thead>
                            <tbody data-link="row">
                                <tr>
                                    <th scope="col">Peça Peça Peça</th>
                                    <th scope="col">Gol</th>
                                    <th scope="col" class="text-center">
                                        <a href="#" class="btn btn-dark btn-sm">
                                            <i class="fas fa-plus"></i> Adicionar
                                        </a>
                                    </th>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                    </div>
                </div>
            </div>
        </div>
       </div>
    </body>

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script type="text/javascript" src="../static/js/popper.js"></script>
    <script type="text/javascript" src="../static/js/bootstrap.js"></script>
    <script>

        var nr_pag = 1;
        var lista_registros ;

        function atualiza_nr_pag(numero){
            nr_pag = numero;
            monta_lista(lista_registros);
        }

        //Função para buscar funcionários
        function busca_funcionario(){
            $('#paginacao').html("")
            $('#tbody_funcionario').html("");
            //Mostra a div de loading no carregamento da pagina
            $('#preloader').show();
            var desc_funcionario = $('#input_pesquisa').val();
            var desc_funcionario_cargo = $('#input_pesquisa_cargo').val();
            var data = {
                desc_funcionario: desc_funcionario,
                desc_funcionario_cargo: desc_funcionario_cargo,
                funcao: "consulta"
            };
            $.ajax({
                url: '../../controller/funcionarioListar.php',
                method: "post",
                data: data ,
                success: function(data){
                    if (data == "0"){
                        $('#preloader').hide();
                        monta_msg_alerta(" Você não possui funcionarios cadastros.")
                    }else {
                        var lista = $.parseJSON(data);
                        lista_registros = lista;
                        monta_lista(lista_registros);          
                    }
                }
            });
        }

        function monta_lista(lista){
            $('#paginacao').html("")
            $('#tbody_funcionario').html("");
            var qtd_pag = lista.length / 6 ;
            qtd_pag = parseInt(qtd_pag);
            var ultima_pag = lista.length % 6;
            if(ultima_pag != 0){
                qtd_pag += 1 ;
            }
            //Paginação começa aqui
            var active = "";
            if (nr_pag == 1){
                active = 'disabled';
            }
            var html2 = '<li class="'+active+'">'
                            +'<a href="#" onclick="atualiza_nr_pag(1)">Primeira</a>'
                        +'</li>'
                        +'<li class="'+active+'">'
                            +'<a href="#" onclick="atualiza_nr_pag('+(nr_pag-1)+')"><</a>'
                        +'</li>';
            $('#paginacao').append(html2);
            var inicio = 0;
            inicio = (nr_pag * 6) - 6  ;
            for(var i = 1 ; i <= qtd_pag ; i++){
                var active = "";
                if (nr_pag == i){
                    active = 'active';
                }
                var html = '<li class="' +active+'"><a href="#" onclick="atualiza_nr_pag('+i+')">'+i+'</a></li>';
            $('#paginacao').append(html);
            }
            var active = "";
            if (qtd_pag == nr_pag){
                active = 'disabled';
            }
            var html2 = '<li class="'+active+'">'
                            +'<a href="#" onclick="atualiza_nr_pag('+(nr_pag + 1)+')">></a>'
                        +'</li>'
                        +'<li class="'+active+'">'
                            +'<a href="#" onclick="atualiza_nr_pag('+qtd_pag+')">Última</a>'
                        +'</li>';
            $('#paginacao').append(html2);
            //Paginação termina aqui
            var html = "";
            $('#preloader').hide();
            if(nr_pag == qtd_pag && ultima_pag != 0 ){
                for(var i = 0; i < ultima_pag ; i++){
                    html += '<tr onclick="teste('+lista[inicio].id+')">'
                                +'<td>'+lista[inicio].nome+'</td>'
                                +'<td>'+lista[inicio].cargo+'</td>'
                            +'</tr>';
                    inicio += 1 ;
                }
                $('#tbody_funcionario').append(html);
            }else{
                for(var i = 0; i < 6 ; i++){
                    html += '<tr onclick="teste('+lista[inicio].id+')">'
                                +'<td>'+lista[inicio].nome+'</td>'
                                +'<td>'+lista[inicio].cargo+'</td>'
                            +'</tr>';
                    inicio += 1 ;
                }
                    $('#tbody_funcionario').append(html);
            }
        }

        function teste(id, nome, cpf, rg, orgao_emissor, data_nascimento, telefone, celular, cargo, cep, endereco, numero, complemento, bairro, cidade, uf, url_imagem, email){
            alert(id);
            //$('#modal_funcionario').modal('show'); 
        }

        //Função para atualizar tamanho do container
        atualiza_tamanho();
        function atualiza_tamanho(){
            var tamanho_container = $(window).height();
            tamanho_container -= 66;
            $('#container').css("height", tamanho_container);
        }
        
        window.addEventListener('resize', function(){
            atualiza_tamanho();
        });
    </script> 
    
</html>