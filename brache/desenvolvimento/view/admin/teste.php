<!DOCTYPE html>
<html lang="pt-br" style="min-height:100%; position: relative;">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Portal da Oficina</title>

        <!-- Arquivos CSS -->
        <link href="../static/css/bootstrap.css" rel="stylesheet">
        <link href="../static/css/jasny-bootstrap.css" rel="stylesheet">
        <link href="../static/css/bootstrap-datepicker.css" rel="stylesheet">
        <link  href="../static/css/fontawesome-all.min.css" rel="stylesheet">
        <!-- Arquivos JS -->
        <script type="text/javascript" src="../static/js/jquery.js"></script>
        <script type="text/javascript" src="../static/js/jasny-bootstrap.js"></script>

    </head>

    <body>
       <div class="container">
       <form id="formulario" method="post" enctype="multipart/form-data">
    <input type="text" name="campo1" value="hello" />
    <input type="text" name="campo2" value="world" />
    <input name="arquivo" type="file" />
    <button>Enviar</button>
</form>
       </div>
    </body>

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script type="text/javascript" src="../static/js/popper.js"></script>
    <script type="text/javascript" src="../static/js/bootstrap.js"></script>   
    <script src="../static/js/bootstrap-datepicker.js"></script>
    <script src="../static/js/bootstrap-datepicker.pt-BR.min.js"></script> 
    <script>

$("#formulario").submit(function (e) {

    var myForm = document.getElementById('formulario');
    var formData = new FormData(myForm);

    $.ajax({
        url:'../../controller/upload.php' ,
        type: 'POST',
        data: formData,
        success: function (data) {
            alert(data)
        },
        cache: false,
        contentType: false,
        processData: false,
        xhr: function() {  // Custom XMLHttpRequest
            var myXhr = $.ajaxSettings.xhr();
            if (myXhr.upload) { // Avalia se tem suporte a propriedade upload
                myXhr.upload.addEventListener('progress', function () {
                    /* faz alguma coisa durante o progresso do upload */
                }, false);
            }
        return myXhr;
        }
    });
    e.preventDefault();
});
    </script>
</html>