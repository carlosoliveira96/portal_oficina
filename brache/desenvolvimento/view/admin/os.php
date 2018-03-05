<?php
include 'menu.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
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
        <script type="text/javascript" src="../static/js/jasny-bootstrap.1.js"></script>

    </head>
    <body style="background-color: #F8F9FA;">
       <div class="container" style=" background-color: #fff">
            <h2>
                <p class="text-center" style="color: #000"><i><b>Ordem de Serviço Nº 99999 </b></i></p>
            </h2>
            <hr>
            
        </div>
    </body>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="../static/js/bootstrap-datepicker.js"></script>
    <script src="../static/js/bootstrap-datepicker.pt-BR.min.js"></script> 
    <script>
        atualiza_tamanho();

        function atualiza_tamanho(){
            var tamanho_container = $(window).height();
            tamanho_container -= 66;
            $('.container').css("height", tamanho_container);
        }

        window.addEventListener('resize', function(){
            atualiza_tamanho();
        });

    </script>
</html>
