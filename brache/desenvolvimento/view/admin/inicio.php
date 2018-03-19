<?php
include 'menu.php';
?>
<!DOCTYPE html>
<html lang="pt-br" >
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Portal da Oficina</title>

        <!-- Arquivos CSS -->
        <link href="../static/css/jasny-bootstrap.css" rel="stylesheet">
        <link  href="../static/css/fontawesome-all.min.css" rel="stylesheet">
        <!-- Arquivos JS -->
        <script type="text/javascript" src="../static/js/jasny-bootstrap.js"></script>
    </head>
    <body  id="body" style="background-color: #F8F9FA">
        <div class="container" style="background-color: #fff;">
            <h2>
                <p class="text-center" style="color: #000"><i><b>Consulta de Veículos</b></i></p>
            </h2>
            <hr>
            <div class="row">
                <div class="col-4">
                    <h6 ><i>Placa/Sinistro</i></h6>
                    <div class="input-group">
                        <input type="text" id="usuario" class="form-control" placeholder="Placa/Sinistro" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                </div>
                <div class="col-4">
                    <h6 ><i>Corretor</i></h6>
                    <div class="input-group">
                        <input type="text" id="usuario" class="form-control" placeholder="Placa/Sinistro" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                </div>
                <div class="col-4">
                    <h6 ><i>Seguradora</i></h6>
                    <div class="input-group">
                        <input type="text" id="usuario" class="form-control" placeholder="Placa/Sinistro" aria-label="Username" aria-describedby="basic-addon1">
                        <div class="input-group-append">
                            <button class="btn btn-dark" id="buscar_veiculo" type="button">
                                <i class="fas fa-search float-left" style="margin-top: 0.1rem;"></i> Buscar
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="div-veiculos" id="container" style="width: 100%; overflow-x: auto; background-color: #fff;">
                <div class="row" id="row" style="overflow: auto;  width: 141rem;">
                    <div class="" style="padding-right: 0; padding-left: 15px;">
                    <table class="table table-dark table-bordered table-striped table-hover" id="desmontagem">
                            <thead>
                                <tr>
                                    <th scope="col" class="text-center">Registro</th>
                                </tr>
                            </thead>
                            <tbody data-link="row" class="rowlink">
                                <tr>
                                    <td scope="row" class="text-center"><b><a href="#" data-toggle="modal" data-target="#verificaCarro">ABC-1234</a></b></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="" style="padding-right: 0; padding-left: 0;">
                        <table class="table table-dark table-bordered table-striped table-hover" id="lanternagem">
                            <thead>
                                <tr>
                                    <th scope="col" class="text-center">Autorizado com cliente</th>
                                </tr>
                            </thead>
                            <tbody data-link="row" class="rowlink">
                                <tr>
                                    <td scope="row" class="text-center"><a href="#"><b>ABC-1234</b></a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="" style="padding-right: 0; padding-left: 0;">
                        <table class="table table-dark table-bordered table-striped table-hover" id="pintura">
                            <thead>
                                <tr>
                                    <th scope="col" class="text-center">Autorizado na oficina</th>
                                </tr>
                            </thead>
                            <tbody data-link="row" class="rowlink">
                                <tr>
                                    <td scope="row" class="text-center"><a href="#"><b>ABC-1234</b></a></td>
                                </tr>
                                <tr>
                                    <td scope="row" class="text-center"><a href="#"><b>ABC-1234</b></a></td>
                                </tr>
                                <tr>
                                    <td scope="row" class="text-center"><a href="#"><b>ABC-1234</b></a></td>
                                </tr>
                                <tr>
                                    <td scope="row" class="text-center"><a href="#"><b>ABC-1234</b></a></td>
                                </tr>
                                <tr>
                                    <td scope="row" class="text-center"><a href="#"><b>ABC-1234</b></a></td>
                                </tr>
                                <tr>
                                    <td scope="row" class="text-center"><a href="#"><b>ABC-1234</b></a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="" style="padding-right: 0; padding-left: 0;">
                        <table class="table table-dark table-bordered table-striped table-hover" id="finalizacao">
                            <thead>
                                <tr>
                                    <th scope="col" class="text-center">Pendência peças</th>
                                </tr>
                            </thead>
                            <tbody data-link="row" class="rowlink">
                                <tr>
                                    <td scope="row" class="text-center"><a href="#"><b>ABC-1234</b></a></td>
                                </tr>
                                <tr>
                                    <td scope="row" class="text-center"><a href="#"><b>ABC-1234</b></a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="" style="padding-right: 0; padding-left: 0;">
                        <table class="table table-dark table-bordered table-striped table-hover" id="entregue">
                            <thead>
                                <tr>
                                    <th scope="col" class="text-center">Agendamento</th>
                                </tr>
                            </thead>
                            <tbody data-link="row" class="rowlink">
                                <tr>
                                    <td scope="row" class="text-center"><a href="#"><b>ABC-1234</b></a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="" style="padding-right: 0; padding-left: 0;">
                        <table class="table table-dark table-bordered table-striped table-hover" id="entregue">
                            <thead>
                                <tr>
                                    <th scope="col" class="text-center">Entrada</th>
                                </tr>
                            </thead>
                            <tbody data-link="row" class="rowlink">
                                <tr>
                                    <td scope="row" class="text-center"><a href="#"><b>ABC-1234</b></a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="" style="padding-right: 0; padding-left: 0;">
                        <table class="table table-dark table-bordered table-striped table-hover" id="entregue">
                            <thead>
                                <tr>
                                    <th scope="col" class="text-center">Fazer OS</th>
                                </tr>
                            </thead>
                            <tbody data-link="row" class="rowlink">
                                <tr>
                                    <td scope="row" class="text-center"><a href="#"><b>ABC-1234</b></a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="" style="padding-right: 0; padding-left: 0;">
                        <table class="table table-dark table-bordered table-striped table-hover" id="entregue">
                            <thead>
                                <tr>
                                    <th scope="col" class="text-center">Triagem</th>
                                </tr>
                            </thead>
                            <tbody data-link="row" class="rowlink">
                                <tr>
                                    <td scope="row" class="text-center"><a href="#"><b>ABC-1234</b></a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="" style="padding-right: 0; padding-left: 0;">
                        <table class="table table-dark table-bordered table-striped table-hover" id="entregue">
                            <thead>
                                <tr>
                                    <th scope="col" class="text-center">Particular</th>
                                </tr>
                            </thead>
                            <tbody data-link="row" class="rowlink">
                                <tr>
                                    <td scope="row" class="text-center"><a href="#"><b>ABC-1234</b></a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="" style="padding-right: 0; padding-left: 0;">
                        <table class="table table-dark table-bordered table-striped table-hover" id="entregue">
                            <thead>
                                <tr>
                                    <th scope="col" class="text-center">Serviço</th>
                                </tr>
                            </thead>
                            <tbody data-link="row" class="rowlink">
                                <tr>
                                    <td scope="row" class="text-center"><a href="#"><b>ABC-1234</b></a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="" style="padding-right: 0; padding-left: 0;">
                        <table class="table table-dark table-bordered table-striped table-hover" id="entregue">
                            <thead>
                                <tr>
                                    <th scope="col" class="text-center">Pendência Interna</th>
                                </tr>
                            </thead>
                            <tbody data-link="row" class="rowlink">
                                <tr>
                                    <td scope="row" class="text-center"><a href="#"><b>ABC-1234</b></a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="" style="padding-right: 0; padding-left: 0;">
                        <table class="table table-dark table-bordered table-striped table-hover" id="entregue">
                            <thead>
                                <tr>
                                    <th scope="col" class="text-center">Previsão entrega</th>
                                </tr>
                            </thead>
                            <tbody data-link="row" class="rowlink">
                                <tr>
                                    <td scope="row" class="text-center"><a href="#"><b>ABC-1234</b></a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="" style="padding-right: 0; padding-left: 0;">
                        <table class="table table-dark table-bordered table-striped table-hover" id="entregue">
                            <thead>
                                <tr>
                                    <th scope="col" class="text-center">Saída</th>
                                </tr>
                            </thead>
                            <tbody data-link="row" class="rowlink">
                                <tr>
                                    <td scope="row" class="text-center"><a href="#"><b>ABC-1234</b></a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="" style="padding-right: 0; padding-left: 0;">
                        <table class="table table-dark table-bordered table-striped table-hover" id="entregue">
                            <thead>
                                <tr>
                                    <th scope="col" class="text-center">T.C</th>
                                </tr>
                            </thead>
                            <tbody data-link="row" class="rowlink">
                                <tr>
                                    <td scope="row" class="text-center"><a href="#"><b>ABC-1234</b></a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="" style="padding-right: 0; padding-left: 0;">
                        <table class="table table-dark table-bordered table-striped table-hover" id="entregue">
                            <thead>
                                <tr>
                                    <th scope="col" class="text-center">I.I</th>
                                </tr>
                            </thead>
                            <tbody data-link="row" class="rowlink">
                                <tr>
                                    <td scope="row" class="text-center"><a href="#"><b>ABC-1234</b></a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="" style="padding-right: 0; padding-left: 0;">
                        <table class="table table-dark table-bordered table-striped table-hover" id="entregue">
                            <thead>
                                <tr>
                                    <th scope="col" class="text-center">Retorno</th>
                                </tr>
                            </thead>
                            <tbody data-link="row" class="rowlink">
                                <tr>
                                    <td scope="row" class="text-center"><a href="#"><b>ABC-1234</b></a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="" style="padding-right: 0; padding-left: 0;">
                        <table class="table table-dark table-bordered table-striped table-hover" id="entregue">
                            <thead>
                                <tr>
                                    <th scope="col" class="text-center">Conferência</th>
                                </tr>
                            </thead>
                            <tbody data-link="row" class="rowlink">
                                <tr>
                                    <td scope="row" class="text-center"><a href="#"><b>ABC-1234</b></a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal ver mais -->
        <div class="modal fade" id="verificaCarro" tabindex="-1" role="dialog" aria-labelledby="adicionaServicos" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Informações do veículo</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" id="verificaCarro-body" style="overflow-y: auto">
                        <div class="row">
                            <div class="col-8">
                                <h6  style="margin-top:1rem"><i>Veículo</i></h6>
                                <div class="input-group ">
                                    <span class="input-group-addon" id="sizing-addon1"><i class="fas fa-car"></i></span>
                                    <input type="text" id="veiculo" class="form-control" disabled  placeholder="Honda Civic - Preto" name="">
                                </div>
                            </div>
                            <div class="col-4">
                                <h6  style="margin-top:1rem"><i>Data de liberação</i></h6>
                                <div class="input-group ">
                                    <span class="input-group-addon" id="sizing-addon1"><i class="fas fa-calendar"></i></span>
                                    <input type="text" id="data_liberacao" class="form-control" disabled  placeholder="10/01/2018" name="">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-5">
                                <h6  style="margin-top:1rem"><i>Placa</i></h6>
                                <div class="input-group ">
                                    <span class="input-group-addon" id="sizing-addon1"><i class="fas fa-car"></i></span>
                                    <input type="text" id="placa" class="form-control" disabled  placeholder="ABC-1234" name="">
                                </div>
                            </div>
                            <div class="col-7">
                                <h6  style="margin-top:1rem"><i>Sinistro</i></h6>
                                <div class="input-group ">
                                    <span class="input-group-addon" id="sizing-addon1"><i class="fas fa-info-circle"></i></span>
                                    <input type="text" id="sinistro" class="form-control" disabled  placeholder="123456" name="">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <h6  style="margin-top:1rem"><i>Nome</i></h6>
                                <div class="input-group ">
                                    <span class="input-group-addon" id="sizing-addon1"><i class="fas fa-user"></i></span>
                                    <input type="text" id="nome" class="form-control" disabled  placeholder="Nome do cliente" name="">
                                </div>
                            </div>
                            <div class="col-6">
                                <h6  style="margin-top:1rem"><i>Telefone</i></h6>
                                <div class="input-group ">
                                    <span class="input-group-addon" id="sizing-addon1"><i class="fas fa-phone"></i></span>
                                    <input type="text" id="telefone" class="form-control" disabled  placeholder="(61) 99999-9999" name="">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <h6  style="margin-top:1rem"><i>E-mail</i></h6>
                                <div class="input-group ">
                                    <span class="input-group-addon" id="sizing-addon1"><i class="fas fa-envelope"></i></span>
                                    <input type="text" id="email" class="form-control" disabled  placeholder="email@email.com" name="">
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-12">
                                <table class="table table-dark table-bordered" id="entregue">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Serviço</th>
                                            <th scope="col" class="text-center">Data Inicio</th>
                                            <th scope="col" class="text-center">Executante</th>
                                            <th scope="col" class="text-center">Data Fim</th>
                                        </tr>
                                    </thead>
                                    <tbody data-link="row">
                                        <tr>
                                            <td scope="row" class="text-center">Desmontagem</td>
                                            <td scope="row" class="text-center">10/01/2018</td>
                                            <td scope="row" class="text-center">Nome Nome Nome</td>
                                            <td scope="row" class="text-center">11/01/2018</td>
                                        </tr>
                                        <tr>
                                            <td scope="row" class="text-center">Desmontagem</td>
                                            <td scope="row" class="text-center">10/01/2018</td>
                                            <td scope="row" class="text-center">Nome Nome Nome</td>
                                            <td scope="row" class="text-center">11/01/2018</td>
                                        </tr>
                                        <tr>
                                            <td scope="row" class="text-center">Desmontagem</td>
                                            <td scope="row" class="text-center">10/01/2018</td>
                                            <td scope="row" class="text-center">Nome Nome Nome</td>
                                            <td scope="row" class="text-center">11/01/2018</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="os.php" class="btn btn-dark btn-block">Ver ordem de servoço completa</a>
                    </div>
                </div>
            </div>
        </div>
    </body>
    <script>
        atualiza_tamanho();

        function atualiza_tamanho(){
            var tamanho_container = $(window).height();
            var tamanho_row = $(window).height();
            var tamanho_body_modal = $(window).height();
            tamanho_container -= 255;
            tamanho_row -= 275;
            tamanho_body_modal -= 200;
            $('#container').css("height", tamanho_container);
            $('#row').css("height", tamanho_row);
            $('#verificaCarro-body').css("height", tamanho_body_modal);
        }
        
        window.addEventListener('resize', function(){
            atualiza_tamanho();
        });

    </script>
</html>