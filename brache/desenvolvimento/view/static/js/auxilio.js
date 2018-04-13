function add_erro_input(input , msg){
    input.addClass("is-invalid");
    input.parent().next().html(msg);
}

function remove_erro_input(input){
    input.removeClass("is-invalid");
    input.parent().next().html("");
}

function monta_msg_erro(msg){
    html = '<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i><strong>  '+ msg +'</strong></div>';
    $('#msg').html(html);
    window.setInterval(function(){
        remove_msg();
    },10000);
}

function monta_msg_sucesso(msg){
    html = '<div class="alert alert-success"><i class="fa fa-check"></i><strong>'+ msg +'</strong></div>';
    $('#msg').html(html);
    window.setInterval(function(){
        remove_msg();
    },10000);
}

function monta_msg_sucesso_modal(msg){
    html = '<div class="alert alert-success"><i class="fa fa-check"></i><strong>'+ msg +'</strong></div>';
    $('#msg_sucesso').html(html);
    window.setInterval(function(){
        $('#msg_sucesso').html('');
    },10000);
}

function monta_msg_registro(msg){
    html = '<div class="alert alert-success"><i class="fa fa-check"></i><strong>'+ msg +'</strong></div>';
    $('#msg_registro').html(html);
    window.setInterval(function(){
        remove_msg_registro();
    },10000);
}

function remove_msg_registro(){
    $('#msg_registro').html('');
}

function remove_msg(){
    $('#msg').html('');
}

//Monta mensagem de confirmação
function monta_msg_confirma(msg){
    html = '<div class="alert alert-dark"><i class="fas fa-exclamation-triangle"></i><strong>'+ msg +'</strong></div>';
    $('#msg').html(html);
}

//Monta mensagem de quando não existem registros
function monta_msg_alerta_permanente(msg){
    html = '<div class="alert alert-warning"><i class="fas fa-exclamation-triangle"></i><strong>'+ msg +'</strong></div>';
    $('#msg_expediente').html(html);
}

function remove_msg_expediente(){
    $('#msg_expediente').html('');
}