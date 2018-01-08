<!DOCTYPE html>
<html lang="pt-br" style="min-height:100%; position: relative;">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Portal da Oficina</title>

        <!-- Arquivos CSS -->
        <link href="static/css/bootstrap.css" rel="stylesheet">
        <link  href="static/css/fontawesome-all.min.css" rel="stylesheet">
        <!-- Arquivos JS -->
        <script type="text/javascript" src="static/js/jquery.js"></script>
        <script type="text/javascript" src="static/js/jasny-bootstrap.js"></script>
    </head>
    <body>
        <div style="background-color: #343A40">
            <p class="text-center">
                <b>
                    <font class="text-center" size="12" color="white">
                        Portal da oficina
                    </font>
                </b>
            </p>
        </div>
        <hr style="border: 1px solid rgba(0, 0, 0, 0.5)">
        <form onkeyup="salvar()">
            <div class="container col-6" style="margin-top: 5%;">
                <div class="card" style="border: 1px solid rgba(0, 0, 0, 0.5)">
                    <div class="card-header text-center" style="border-bottom: 1px solid rgba(0, 0, 0, 0.5)">
                        <b><i class="fas fa-sign-in-alt"></i> Login</b>
                    </div>
                    <div class="card-body">
                        <div class="row" style="margin-top: 2rem">
                            <div class="col-12">
                                <div class="input-group">
                                    <span class="input-group-addon" id="sizing-addon1"><i class="fas fa-user-circle"></i></span>
                                    <input type="text" id="usuario" class="form-control" placeholder="Usuário" aria-label="Username" aria-describedby="basic-addon1">
                                </div>
                                <div class="text-danger"></div>
                            </div>
                        </div>
                        <div class="row"  style="margin-top: 2rem">
                            <div class="col-12">
                                <div class="input-group">
                                    <span class="input-group-addon" id="sizing-addon1"><i class="fas fa-unlock-alt"></i></span>
                                    <input type="password" id="senha" class="form-control" placeholder="Senha" aria-label="Username" aria-describedby="basic-addon1">
                                </div>
                                <div class="text-danger"></div>
                            </div>
                        </div>
                        <div class="help-block text-right">
                            <a href="recuperaSenha.php" style="margin-top: 1rem">
                                Esqueci minha senha!
                            </a>
                        </div>
                        <div class="input-group mb-3">
                            <button type="button" class="btn btn-dark btn-lg btn-block" onclick="salvar()" style="margin-top: 1rem">
                                Entrar 
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script type="text/javascript" src="static/js/popper.js"></script>
    <script type="text/javascript" src="static/js/bootstrap.js"></script>   
    </body>

    <script>
    function salvar(){
        var nomeUsuario = $('#usuario').val();
        var senhaUsuario = $('#senha').val();
        if (nomeUsuario.length == 0){ 
            add_erro_input($('#usuario') , "Usuário inválido ou não informado");
        } else {
            remove_erro_input($('#usuario'));
        }

        if (senhaUsuario.length == 0){ 
            add_erro_input($('#senha') , "Senha inválida ou não informada");
        } else {
            remove_erro_input($('#senha'));
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
    </script>
</html>