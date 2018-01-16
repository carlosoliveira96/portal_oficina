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
        <!-- Arquivos JS -->
        <script type="text/javascript" src="../static/js/jasny-bootstrap.js"></script>
    </head>
    <body style="background-color: #F8F9FA;" >
        <div class="container" style=" background-color: #fff;">
            <h2>
                <p class="text-center" style="color: #000"><i><b>Serviços</b></i></p>
            </h2>
            <hr>
            <table class="table table-secondary table-bordered table-striped table-hover" id="servico">
                <thead>
                    <tr>
                        <th class="col-12">
                            <input type="text" class="form-control" placeholder="&#xF002; Pesquise pelo nome da serviço" style="font-family: FontAwesome; font-size: 1.05rem">
                        </th>
                        <th class="col-3">
                            <a href="#" class="btn btn-dark col-12">
                                <i class="fas fa-plus " style="margin-top: 0.1rem; margin-right: 0.5rem"></i> Cadastrar serviço
                            </a>
                        </th>
                    </tr>
                </thead>
                <tbody data-link="row">
                    <tr>
                        <td scope="row">Serviço Serviço Serviço</td>
                        <td scope="row" class="text-center">
                        <a href="#" class="btn btn-dark btn-sm" title="Alterar serviço">
                            <i class="fas fa-edit "></i>
                        </a>
                        <a href="#" class="btn btn-dark btn-sm" title="Remover serviço">
                            <i class="fas fa-trash "></i>
                        </a>
                        </td>
                    </tr>
                    <tr>
                        <td scope="row">Serviço Serviço Serviço</td>
                        <td scope="row" class="text-center">
                        <a href="#" class="btn btn-dark btn-sm" title="Alterar serviço">
                            <i class="fas fa-edit "></i>
                        </a>
                        <a href="#" class="btn btn-dark btn-sm" title="Remover serviço">
                            <i class="fas fa-trash "></i>
                        </a>
                        </td>
                    </tr>
                    <tr>
                        <td scope="row">Serviço Serviço Serviço</td>
                        <td scope="row" class="text-center">
                        <a href="#" class="btn btn-dark btn-sm" title="Alterar serviço">
                            <i class="fas fa-edit "></i>
                        </a>
                        <a href="#" class="btn btn-dark btn-sm" title="Remover serviço">
                            <i class="fas fa-trash "></i>
                        </a>
                        </td>
                    </tr>
                </tbody>
            </table>
       </div>
    </body>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script type="text/javascript" src="../static/js/popper.js"></script>
    <script type="text/javascript" src="../static/js/bootstrap.js"></script>
    
</html>