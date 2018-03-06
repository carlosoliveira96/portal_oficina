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

function remove_msg(){
    $('#msg').html('');
}