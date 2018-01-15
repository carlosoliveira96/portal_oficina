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
        <script type="text/javascript" src="static/js/jasny-bootstrap.js"></script>
    </head>
    <body style="background-color: #F8F9FA;" >
        <div class="container" style=" background-color: #fff;">
            <h2>
                <p class="text-center" style="color: #000"><i><b>Serviços</b></i></p>
            </h2>
            <hr>
            <div class="row">
                <div class="col-10">
                    <h6  style="margin-top:1rem"><i>Pesquisa </i></h6>	
                    <div class="input-group ">
                        <span class="input-group-addon" id="sizing-addon1"><i class="fa fa-search"></i></span>
                        <input type="text" id="pesquisa" class="form-control" placeholder="Serviço " name="">
                    </div>
                    <div class="text-danger"></div>
                </div>
                <div class="col-2">
                    <button class="btn btn-dark col-12" style="margin-top:2.4rem"><i class="fa fa-search"></i> Buscar</button>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-6">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" value="Serviço serviço" disabled aria-label="" aria-describedby="basic-addon1">
                        <div class="input-group-append">
                            <button class="btn btn-dark" type="button"><i class="fa fa-edit"></i></button>
                            <button class="btn btn-dark" type="button"><i class="fa fa-trash"></i></button>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" value="Serviço serviço" disabled aria-label="" aria-describedby="basic-addon1">
                        <div class="input-group-append">
                            <button class="btn btn-dark" type="button"><i class="fa fa-edit"></i></button>
                            <button class="btn btn-dark" type="button"><i class="fa fa-trash"></i></button>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" value="Serviço serviço" disabled aria-label="" aria-describedby="basic-addon1">
                        <div class="input-group-append">
                            <button class="btn btn-dark" type="button"><i class="fa fa-edit"></i></button>
                            <button class="btn btn-dark" type="button"><i class="fa fa-trash"></i></button>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" value="Serviço serviço" disabled aria-label="" aria-describedby="basic-addon1">
                        <div class="input-group-append">
                            <button class="btn btn-dark" type="button"><i class="fa fa-edit"></i></button>
                            <button class="btn btn-dark" type="button"><i class="fa fa-trash"></i></button>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" value="Serviço serviço" disabled aria-label="" aria-describedby="basic-addon1">
                        <div class="input-group-append">
                            <button class="btn btn-dark" type="button"><i class="fa fa-edit"></i></button>
                            <button class="btn btn-dark" type="button"><i class="fa fa-trash"></i></button>
                        </div>
                    </div>
                </div>
                
            </div>
       </div>
    </body>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script type="text/javascript" src="../static/js/popper.js"></script>
    <script type="text/javascript" src="../static/js/bootstrap.js"></script>   
    <script src="../static/js/bootstrap-datepicker.js"></script>
    <script src="../static/js/bootstrap-datepicker.pt-BR.min.js"></script> 
    
</html>