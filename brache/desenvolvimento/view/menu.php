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
        <link rel="stylesheet" href="static/css/menu-custom.css">
        <link rel="stylesheet" href="static/css/customScrollbar.css">
        <!-- Arquivos JS -->
        <script src="static/js/jquery.js"></script>
        <script src="static/js/customScrollbat.js"></script>
        <script src="static/js/fontawesome-all.js"></script>
    </head>
    <body>
    	<div class="overlay"></div>
        <div class="wrapper">
            <nav id="sidebar">
                <div id="dismiss">
                    <i class="fas fa-chevron-circle-left"></i>
                </div>
                <div class="sidebar-header">
                    <img src="static/img/user.png" class="rounded-circle" height="156" width="156">
                    <p>Usuário logado</p>
                    <p>Cargo</p>
                </div>
				<hr style="border-color: #5E636B">
                <ul class="list-unstyled components">
                    <li class="active">
                        <a href="inicio.php">Início</a>
                    </li>
                    <li>
                        <a href="cadastro.php">Cadastro</a>
                    </li>
                    <li>
                        <a href="osCadastro.php">Cadastro de O.S</a>
                    </li>
                    <li>
                        <a href="funcionarioCadastro.php">Cadastro de Funcionários</a>
                    </li>
                </ul>
            </nav>

            <!-- Pagina do navbar -->
            <div class="navbar navbar-dark">
            	<div class="float-left">
                    <button type="button" id="sidebarCollapse" class="btn btn-dark navbar-btn">
                        <i class="fas fa-bars"></i>
                        <span>Menu</span>
                    </button>
                </div>
                <div class="float-right">
            		<button type="" id="sidebarCollapse" class="btn btn-dark navbar-btn">
                        <i class="fas fa-sign-out-alt"></i>
                        <span>Sair</span>
                    </button>
              	</div>
            </div>
        </div>
    </body>
    <script type="text/javascript" src="static/js/popper.js"></script>
    <script type="text/javascript" src="static/js/bootstrap.js"></script> 
    <script>
    $(document).ready(function () {
		$("#sidebar").mCustomScrollbar({
			theme: "minimal"
	    });

	    // Abrir o sidebar
	    $('#sidebarCollapse').on('click', function () {
	        // open sidebar
	        $('#sidebar').addClass('active');
	        // fade in the overlay
	        $('.overlay').fadeIn();
	        $('.collapse.in').toggleClass('in');
	        $('a[aria-expanded=true]').attr('aria-expanded', 'false');
	    });

	    // Click para abrir e fechar
	    $('#dismiss, .overlay').on('click', function () {
	      // hide the sidebar
	      $('#sidebar').removeClass('active');
	      // fade out the overlay
	      $('.overlay').fadeOut();
	    });
	});
    </script>
</html>