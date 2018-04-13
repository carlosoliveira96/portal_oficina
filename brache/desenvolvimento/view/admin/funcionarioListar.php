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
            <div id="msg_funcionario"></div>
            <table class="table table-secondary table-bordered table-striped table-hover" id="funcionario">
                <thead>
                    <tr>
                        <th class="col-12" style="width: 70%; font-weight: normal">
                            <input type="text" id="input_pesquisa" class="form-control" placeholder="&#xF002; Funcionário" style="font-family: FontAwesome; font-size: 1.05rem;" onkeyup="busca_funcionario()">
                            <div>                            
                        </th>
                        <th class="col-12" style="width: 30%; font-weight: normal">
                            <select class="form-control" id="input_pesquisa_cargo" onchange="busca_funcionario()" >
                                <option value="">Todos os Cargos</option>
                                <option value="Lanterneiro">Lanterneiro</option>
                                <option value="Mecânico">Mecânico</option>
                                <option value="Polidor">Polidor</option>
                                <option value="Montador">Montador</option>
                                <option value="Financeiro">Financeiro</option>
                            </select>
                            <!--
                                <input type="text" id="input_pesquisa_cargo" class="form-control" placeholder="&#xF002; Cargo" style="font-family: FontAwesome; font-size: 1.05rem;" onkeyup="busca_funcionario()">
                            -->
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
       </div>
        <div class="modal fade" data-backdrop="static" id="modal_funcionario" tabindex="-1" role="dialog" aria-labelledby="modal_funcionario" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="" id="titulo_funcionario">Modal title</h5>
                        <div class="row" style="margin-right: 15%;">
                            <div class="col-6" id="cancelar" hidden>
                                <button class="btn btn-dark btn-sm btn-block" onclick="cancela_alteracao()">
                                    <i class="fa fa-times float-left" style="margin-top: 0.2rem; margin-right: 0.3rem"></i> Cancelar
                                </button>
                            </div>
                            <div class="col-6" id="alterar">
                                <button class="btn btn-dark btn-sm btn-block" onclick="alterar()">
                                    <i class="fa fa-edit float-left" style="margin-top: 0.2rem; margin-right: 0.3rem"></i> Alterar
                                </button>
                            </div>
                            <div class="col-6" id="deletar">
                                <button class="btn btn-dark btn-sm btn-block" onclick="alterar()">
                                    <i class="fa fa-trash float-left" style="margin-top: 0.2rem; margin-right: 0.3rem"></i> Deletar
                                </button>
                            </div>
                        </div>
                        <button type="button" onclick="cancela_alteracao()" class="close" data-dismiss="modal">
                                <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row justify-content-md-center" id="dados">
                            <div class="col-6" id="img_funconario">

                            </div>
                        </div>
                        <div class="col-12">
                            <div class="row">
                                <div class="col-12">
                                    <h6  style="margin-top:1rem"><i>Nome</i></h6>   
                                    <div class="input-group ">
                                        <span class="input-group-addon " id="sizing-addon1"><i class="fa fa-address-book"></i></span>
                                        <input type="text" id="nome" class="form-control" disabled placeholder="Ex.:  Exemplo exemplo " maxlength="200" >
                                    </div>
                                    <div class="text-danger"></div>
                                </div>
                                <div class="col-6">
                                    <h6  style="margin-top:1rem"><i>CPF</i></h6>    
                                    <div class="input-group ">
                                        <span class="input-group-addon" id="sizing-addon1"><i class="fa fa-address-book"></i></span>
                                        <input type="text" id="cpf"  onkeyup="verifica_cpf()" disabled class="form-control" placeholder="Ex.: 999.999.999-99" data-mask="999.999.999-99" >
                                    </div>
                                    <div class="text-danger"></div>
                                </div>
                                <div class="col-6">
                                    <h6  style="margin-top:1rem"><i>Nascimento</i></h6> 
                                    <div class="input-group ">
                                        <span class="input-group-addon " id="sizing-addon1"><i class="fa fa-calendar"></i></span>
                                        <input class="form-control" placeholder="Ex.: 99/99/9999" disabled  id="nascimento"   type="text" >
                                    </div>
                                    <div class="text-danger"></div>
                                </div>
                                <div class="col-6">
                                    <h6  style="margin-top:1rem"><i>RG</i></h6> 
                                    <div class="input-group ">
                                        <span class="input-group-addon " id="sizing-addon1"><i class="fa fa-address-book"></i></span>
                                        <input type="text" id="rg" class="form-control" disabled placeholder="Ex.: 9999999" >
                                    </div>
                                    <div class="text-danger"></div>
                                </div>
                                <div class="col-6">
                                    <h6  style="margin-top:1rem"><i>Orgão Emissor</i></h6>  
                                    <div class="input-group ">
                                        <span class="input-group-addon " id="sizing-addon1"><i class="fa fa-building"></i></span>
                                        <input type="text" id="orgao_emissor" class="form-control" disabled placeholder="Ex.: SSP-DF" maxlength="50" >
                                    </div>
                                    <div class="text-danger"></div>
                                </div>
                                <div class="col-12">
                                    <h6  style="margin-top:1rem"><i>E-Mail</i></h6> 
                                    <div class="input-group ">
                                        <span class="input-group-addon " id="sizing-addon1"><i class="fa fa-envelope"></i></span>
                                        <input type="email" id="email" onkeyup="valida_email()" disabled class="form-control" placeholder="Ex.: exemplo@exemplo.com"  >
                                    </div>
                                    <div class="text-danger"></div>
                                </div>
                                <div class="col-6">
                                    <h6  style="margin-top:1rem"><i>Telefone</i></h6>   
                                    <div class="input-group ">
                                        <span class="input-group-addon " id="sizing-addon1"><i class="fa fa-phone"></i></span>
                                        <input type="text" id="telefone" class="form-control" disabled placeholder="Ex.: (99) 9999-9999" data-mask="(99) 9999-9999" >
                                    </div>
                                    <div class="text-danger"></div>
                                </div>
                                <div class="col-6">
                                    <h6  style="margin-top:1rem"><i>Celular</i></h6>    
                                    <div class="input-group ">
                                        <span class="input-group-addon " id="sizing-addon1"><i class="fa fa-mobile"></i></span>
                                        <input type="text" id="celular" class="form-control" disabled placeholder="Ex.: (99) 99999-9999" data-mask="(99) 99999-9999" >
                                    </div>
                                    <div class="text-danger"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <h6  style="margin-top:1rem"><i>Cargo</i></h6>    
                                <div class="input-group ">
                                    <span class="input-group-addon " id="sizing-addon1"><i class="fa fa-address-book"></i></span>
                                    <select class="form-control" disabled  id="cargo" >
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
                        <hr>
                        <div class="row">
                            <div class="col-4">
                                <h6  style="margin-top:1rem"><i>CEP</i></h6>    
                                <div class="input-group" >
                                    <span class="input-group-addon " id="sizing-addon1"><i class="fa fa-search"></i></span>
                                    <input type="text"  id="cep" disabled class="form-control" placeholder="Ex.: 99999-999" data-mask="99999-999"  onkeyup="busca_cep()">
                                </div>
                                <div class="text-danger"></div>
                            </div>
                            <div class="col-3">
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
                                    <input type="text" id="endereco" disabled class="form-control" placeholder="Ex.: Exemplo exemplo exemplo"  disabled>
                                </div>
                                <div class="text-danger"></div>
                            </div>
                            <div class="col-2">
                                <h6  style="margin-top:1rem"><i>Número</i></h6> 
                                <div class="input-group ">
                                    <span class="input-group-addon " id="sizing-addon1"><i class="fa fa-home"></i></span>
                                    <input type="text" id="numero" disabled class="form-control" placeholder="Ex.: 99 "  disabled>
                                </div>
                                <div class="text-danger"></div>
                            </div>
                            <div class="col-4">
                                <h6  style="margin-top:1rem"><i>Complemento</i></h6>    
                                <div class="input-group ">
                                    <span class="input-group-addon " id="sizing-addon1"><i class="fa fa-home"></i></span>
                                    <input type="text" id="complemento" disabled class="form-control" placeholder="Ex.: Exemplo Exemplo " maxlength="50" disabled>
                                </div>
                                <div class="text-danger"></div>
                            </div>
                            <div class="col-6">
                                <h6  style="margin-top:1rem"><i>Bairro</i></h6> 
                                <div class="input-group ">
                                    <span class="input-group-addon " id="sizing-addon1"><i class="fa fa-home"></i></span>
                                    <input type="text" id="bairro" disabled class="form-control" placeholder="Ex.: Exemplo Exemplo " maxlength="100" disabled>
                                </div>
                                <div class="text-danger"></div>
                            </div>
                            <div class="col-4">
                                <h6  style="margin-top:1rem"><i>Cidade</i></h6> 
                                <div class="input-group ">
                                    <span class="input-group-addon " id="sizing-addon1"><i class="fa fa-home"></i></span>
                                    <input type="text" id="cidade" disabled class="form-control" placeholder="Ex.: Exemplo exemplo" maxlength="100" disabled>
                                </div>
                                <div class="text-danger"></div>
                            </div>
                            <div class="col-2">
                                <h6  style="margin-top:1rem"><i>UF</i></h6> 
                                <div class="input-group ">
                                    <span class="input-group-addon " id="sizing-addon1"><i class="fa fa-home"></i></span>
                                    <input type="text" id="uf" disabled  class="form-control" placeholder="Ex.: DF" maxlength="2" disabled>
                                </div>
                                <div class="text-danger"></div>
                            </div>
                        </div>
                        <div id="botao_salvar" hidden>
                            <hr>
                            <div class="row">
                                <div class="col-12">
                                    <button type="button" class="btn btn-dark col-12">
                                        <i class="fa fa-check float-left" style="margin-top: 0.3rem;"></i> Salvar alterações
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
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
                    if (!data){
                        $('#preloader').hide();
                        monta_msg_alerta_permanente("Você não possui funcionarios cadastros.")
                    }else {
                        var lista = $.parseJSON(data);
                        lista_registros = lista;
                        monta_lista(lista_registros);          
                        remove_msg_alerta_permanente();
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
                    html += '<tr onclick="funcionario('+inicio+')">'
                                +'<td>'+lista[inicio].nome+'</td>'
                                +'<td>'+lista[inicio].cargo+'</td>'
                            +'</tr>';
                    inicio += 1 ;
                }
                $('#tbody_funcionario').append(html);
            }else{
                for(var i = 0; i < 6 ; i++){
                    html += '<tr onclick="funcionario('+inicio+')">'
                                +'<td>'+lista[inicio].nome+'</td>'
                                +'<td>'+lista[inicio].cargo+'</td>'
                            +'</tr>';
                    inicio += 1 ;
                }
                    $('#tbody_funcionario').append(html);
            }
        }

        function funcionario(posicao){

            var sem_cep = $('#sem_cep');

            $('#nome').val(lista_registros[posicao].nome);  
            $('#cpf').val(lista_registros[posicao].cpf);  
            $('#nascimento').val(lista_registros[posicao].nascimento);  
            $('#email').val(lista_registros[posicao].email);  
            $('#telefone').val(lista_registros[posicao].telefone);  
            $('#celular').val(lista_registros[posicao].celular);  
            $('#cargo').val(lista_registros[posicao].cargo);  
            $('#rg').val(lista_registros[posicao].rg);  
            $('#orgao_emissor').val(lista_registros[posicao].orgao_emissor);  

            $('#cep').val(lista_registros[posicao].cep);
            $('#endereco').val(lista_registros[posicao].endereco);
            $('#numero').val(lista_registros[posicao].numero);
            $('#complemento').val(lista_registros[posicao].complemento);
            $('#bairro').val(lista_registros[posicao].bairro);
            $('#cidade').val(lista_registros[posicao].cidade);
            $('#uf').val(lista_registros[posicao].uf);

            $('#titulo_funcionario').html(lista_registros[posicao].nome);
            var html = "";
            if (lista_registros[posicao].url_imagem == null){
                html = '<img class="img-thumbnail" src="../static/img/user.png" style="width: 21rem;  height: 17.5rem">'+
                        '<span class="btn btn-dark btn-file col-11" id="botao_altera_img" hidden>'+
                        '<span class="fileinput-exists" data-dismiss="fileinput">Alterar imagem</span>'+
                        '<input type="file" id="arquivo" name="arquivo" accept="image/*">'+
                        '</span>';
            }else{
                html =  '<img class="img-thumbnail" src="../'+lista_registros[posicao].url_imagem+'" style="width: 21rem;  height: 17.5rem">'+
                        '<span class="btn btn-dark btn-file col-11" id="botao_altera_img" hidden>'+
                        '<span class="fileinput-exists" data-dismiss="fileinput">Alterar imagem</span>'+
                        '<input type="file" id="arquivo" name="arquivo" accept="image/*">'+
                        '</span>';
            }
            $('#img_funconario').html(html);

            $('#modal_funcionario').modal('show'); 
        }

        //Função para habilitar os campos e realizar a alteraçãoo
        function alterar(){
            $('#botao_salvar').removeAttr("hidden");
            $('#cancelar').removeAttr("hidden");
            $('#botao_altera_img').removeAttr("hidden");
            $('#alterar').attr("hidden", true);
            $('#nome').removeAttr("disabled");  
            $('#cpf').removeAttr("disabled");   
            $('#nascimento').removeAttr("disabled");   
            $('#email').removeAttr("disabled");   
            $('#telefone').removeAttr("disabled");   
            $('#celular').removeAttr("disabled");   
            $('#cargo').removeAttr("disabled");  
            $('#rg').removeAttr("disabled");   
            $('#orgao_emissor').removeAttr("disabled");
            $('#cep').removeAttr("disabled");  
            $('#endereco').removeAttr("disabled");  
            $('#numero').removeAttr("disabled");  
            $('#complemento').removeAttr("disabled");  
            $('#bairro').removeAttr("disabled");  
            $('#cidade').removeAttr("disabled");  
            $('#uf').removeAttr("disabled");  

        }
        
        //Função que cancela ao clicar em alterar e retorna para campos bloqueados
        function cancela_alteracao(){
            $('#botao_salvar').attr("hidden", true);
            $('#cancelar').attr("hidden", true);
            $('#botao_altera_img').attr("hidden", true);
            $('#alterar').removeAttr("hidden");
            $('#nome').attr("disabled", true);  
            $('#cpf').attr("disabled", true);   
            $('#nascimento').attr("disabled", true);   
            $('#email').attr("disabled", true);   
            $('#telefone').attr("disabled", true);   
            $('#celular').attr("disabled", true);   
            $('#cargo').attr("disabled", true);  
            $('#rg').attr("disabled", true);   
            $('#orgao_emissor').attr("disabled", true);
            $('#cep').attr("disabled", true);  
            $('#endereco').attr("disabled", true);  
            $('#numero').attr("disabled", true);  
            $('#complemento').attr("disabled", true);  
            $('#bairro').attr("disabled", true);  
            $('#cidade').attr("disabled", true);  
            $('#uf').attr("disabled", true); 
        }

        function monta_msg_alerta_permanente(msg){
            html = '<div class="alert alert-warning"><i class="fas fa-exclamation-triangle"></i><strong>'+ msg +'</strong></div>';
            $('#msg_funcionario').html(html);
        }

        function remove_msg_alerta_permanente(){
            $('#msg_funcionario').html('');
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