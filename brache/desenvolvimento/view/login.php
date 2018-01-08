<!DOCTYPE html>
<html lang="pt-br" style="min-height:100%; position: relative;">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Portal da Oficina</title>
        <link rel="shortcut icon" href="static/img/favicon.ico" type="image/x-icon">
        <!-- Arquivos CSS -->
        <link rel="stylesheet" href="static/css/bootstrap.css">
        <!-- Arquivos JS -->
        <script src="static/js/jquery-3.2.1.js"></script>
        <script src="static/js/bootstrap.js"></script>
        <script defer src="static/js/fontawesome-all.js"></script>
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
        <form>
            <div class="container col-6" style="margin-top: 5%;">
                <div class="card" style="border: 1px solid rgba(0, 0, 0, 0.5)">
                    <div class="card-header text-center" style="border-bottom: 1px solid rgba(0, 0, 0, 0.5)">
                        <b><i class="fas fa-sign-in-alt"></i> Login</b>
                    </div>
                    <div class="card-body">
                        <div class="col-12">
                            <div class="input-group mb-3">
                                <div class="input-group">
                                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-user-circle"></i></span>
                                    <input type="text" id="usuario" class="form-control" placeholder="Usuário" aria-label="Username" aria-describedby="basic-addon1">
                                </div>
                                <div class="text-danger"></div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="input-group mb-3">
                                <div class="input-group">
                                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-unlock-alt"></i></span>
                                    <input type="password" id="senha" class="form-control" placeholder="Senha" aria-label="Username" aria-describedby="basic-addon1">
                                </div>
                                <div class="text-danger"></div>
                            </div>
                        </div>
                        <div class="help-block text-right">
                            <a href="recuperaSenha.php">
                                Esqueci minha senha!
                            </a>
                        </div>
                        <div class="input-group mb-3">
                            <button type="button" class="btn btn-dark btn-lg btn-block" onclick="salvar()">
                                Entrar 
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <footer>
            <div style="position: fixed; left: -100px; top: 74%; height: 10%; bottom">
                <img src="static/img/carro-login.png" width="769" height="254" class="rounded float-left" alt="Responsive image">
            </div>
        </footer>
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