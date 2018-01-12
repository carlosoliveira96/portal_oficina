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
        <link href="static/css/jasny-bootstrap.css" rel="stylesheet">
        <link  href="static/css/fontawesome-all.min.css" rel="stylesheet">
        <!-- Arquivos JS -->
        <script type="text/javascript" src="static/js/jasny-bootstrap.js"></script>
    </head>
    <body style="background-color: #F8F9F1;">
        <div class="container" style=" background-color: #fff;">
            <h2>
                <p class="text-center" style="color: #000"><i><b>Consulta de Veículos</b></i></p>
            </h2>
            <hr>
            <div class="row">
                <div class="col-3">
                    <h6 ><i>Pesquisar OS</i></h6>
                    <div class="input-group">
                        <span class="input-group-addon" id="sizing-addon1"><i class="fas fa-search"></i></span>
                        <input type="text" id="usuario" class="form-control" placeholder="Placa/Sinistro" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                    <div class="text-danger"></div>
                </div>
                <div class="col-3">
                    <div class="input-group">
                        <button type="button" class="btn btn-dark" onclick="salvar()" style="margin-top: 1.3rem">
                            <i class="fas fa-search float-left" style="margin-top: 0.1rem; margin-right: 0.5rem"></i> Buscar
                        </button>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row" style="overflow: auto; width: 100%; height: 25rem; max-height: 200rem;">
                <div class="col-2" style="padding-right: 0; padding-left: 15px;">
                    <table class="table table-dark table-bordered table-striped table-hover" id="pendente_autorizacao">
                        <thead>
                            <tr>
                                <th scope="col" class="text-center">Pendente de aut.</th>
                            </tr>
                        </thead>
                        <tbody data-link="row" class="rowlink">
                            <tr>
                                <td scope="row" class="text-center"><a href="#"><b>ABC-1234</b></a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-2" style="padding-right: 0; padding-left: 0;">
                    <table class="table table-dark table-bordered table-striped table-hover" id="desmontagem">
                        <thead>
                            <tr>
                                <th scope="col" class="text-center">Desmontagem</th>
                            </tr>
                        </thead>
                        <tbody data-link="row" class="rowlink">
                            <tr>
                                <td scope="row" class="text-center"><a href="#"><b>ABC-1234</b></a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-2" style="padding-right: 0; padding-left: 0;">
                    <table class="table table-dark table-bordered table-striped table-hover" id="lanternagem">
                        <thead>
                            <tr>
                                <th scope="col" class="text-center">Lanternagem</th>
                            </tr>
                        </thead>
                        <tbody data-link="row" class="rowlink">
                            <tr>
                                <td scope="row" class="text-center"><a href="#"><b>ABC-1234</b></a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-2" style="padding-right: 0; padding-left: 0;">
                    <table class="table table-dark table-bordered table-striped table-hover" id="pintura">
                        <thead>
                            <tr>
                                <th scope="col" class="text-center">Pintura</th>
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
                        </tbody>
                    </table>
                </div>
                <div class="col-2" style="padding-right: 0; padding-left: 0;">
                    <table class="table table-dark table-bordered table-striped table-hover" id="finalizacao">
                        <thead>
                            <tr>
                                <th scope="col" class="text-center">Finalizações</th>
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
                <div class="col-2" style="padding-right: 0; padding-left: 0;">
                    <table class="table table-dark table-bordered table-striped table-hover" id="entregue">
                        <thead>
                            <tr>
                                <th scope="col" class="text-center">Entregue</th>
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
    </body>
</html>