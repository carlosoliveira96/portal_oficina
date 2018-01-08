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
        <link rel="stylesheet" href="static/css/style4.css">
        <link rel="stylesheet" href="static/css/customScrollbar.css">
        <!-- Arquivos JS -->
        <script src="static/js/jquery.js"></script>
        <script src="static/js/bootstrap.js"></script>
        <script src="static/js/customScrollbat.js"></script>
        <script src="static/js/fontawesome-all.js"></script>
    </head>
    <body>
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
                        <a href="#">Início</a>
                    </li>
                    <li>
                        <a href="#">Manter Cadastros</a>
                    </li>
                    <li>
                        <a href="#">Visualizar</a>
                    </li>
                    <li>
                        <a href="#">Ordem de Serviço</a>
                    </li>
                </ul>
            </nav>

            <!-- Page Content Holder -->
            
                <div style="width: 100%; background: #343A40; height: 3.4rem; overflow-x: hidden;">
                	<div class="row">
                		<div class="col-1">
		                    <button type="button" id="sidebarCollapse" class="btn btn-dark navbar-btn" style="margin-top: 0.5rem">
		                        <i class="fas fa-bars"></i>
		                        <span>Menu</span>
		                    </button>
	                	</div>
	                	<div class="col-10"></div>
	                	<div class="col-1">
	                		<button type="" id="sidebarCollapse" class="btn btn-dark navbar-btn" style="margin-top: 0.5rem">
		                        <i class="fas fa-sign-out-alt"></i>
		                        <span>Sair</span>
		                    </button>
	                	</div>
                	</div>
				</div>                    
           
        </div>
        <div class="overlay"></div>
    </body>
    <script>
    	$(document).ready(function () {

    $("#sidebar").mCustomScrollbar({
        theme: "minimal"
    });

    // when opening the sidebar
    $('#sidebarCollapse').on('click', function () {
        // open sidebar
        $('#sidebar').addClass('active');
        // fade in the overlay
        $('.overlay').fadeIn();
        $('.collapse.in').toggleClass('in');
        $('a[aria-expanded=true]').attr('aria-expanded', 'false');
    });

   
    // if dismiss or overlay was clicked
    $('#dismiss, .overlay').on('click', function () {
      // hide the sidebar
      $('#sidebar').removeClass('active');
      // fade out the overlay
      $('.overlay').fadeOut();
    });
});
    </script>

</html>