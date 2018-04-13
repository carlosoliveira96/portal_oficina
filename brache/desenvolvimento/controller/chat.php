<?php
include "../bd/conexao.php";
include "../bd/crud.php";

//Pega a função passada do javascript
$funcao = $_POST["funcao"];
session_start();

switch ($funcao){
    case 'busca_mensagem':

        $login = $_POST['login'];
        $funcionario_id1 = $_POST['funcionario'];
        $grupo = $_POST['id_grupo'];

        $mensagens = "";
        if(strlen($grupo) == 0){
            $funcionario = busca_detalhada_um($conexao, "login_login = '{$login}' " , 'funcionario' );
    
            $id_funcionario = $funcionario['id'];
    
            $mensagens = busca_detalhada_varios($conexao, "( funcionario_id = {$funcionario_id1} and funcionario_id1 = {$id_funcionario} ) or (funcionario_id = {$id_funcionario} and funcionario_id1 = {$funcionario_id1})" , 'comunicador' );
        }else{ 
            $mensagens = busca_detalhada_varios($conexao, "a.grupo_id = '{$grupo}' AND b.id = a.funcionario_id ORDER BY a.id ASC" , 'mensagem_grupo a , funcionario b' , "a.* , b.nome" );  
        }

        if($mensagens != null){
            print json_encode($mensagens);
        }

        break;
    case 'salva_mensagem':

        $login = $_POST['login'];
        $funcionario_id1 = $_POST['funcionario_id1'];
        $data = $_POST['data'];
        $hora = $_POST['hora'];
        $grupo = $_POST['id_grupo'];
        $msg = $_POST['mensagem'];

        $mensagem ="";

        if(strlen($grupo) == 0){

            $funcionario = busca_detalhada_um($conexao, "login_login = '{$login}' " , 'funcionario' );
    
            $id_funcionario = $funcionario['id'];
    
            $campos = "funcionario_id , funcionario_id1 , data , hora , mensagem ";
            $valores = " '{$id_funcionario}' , '{$funcionario_id1}', '{$data}' , '{$hora}' , '{$msg}' ";
    
            $mensagem = insere($conexao, $campos , $valores , 'comunicador' );
        }else{

            $campos = "mensagem  , data_envio  , hora_envio , grupo_id , funcionario_id ";
            $valores = " '{$msg}' , '{$data}' , '{$hora}'  , '{$grupo}' , '{$funcionario_id1}'";
    
            $mensagem = insere($conexao, $campos , $valores , 'mensagem_grupo' );

        }


        if(strlen($mensagem) > 0){
            print '1';
        }

        break;
    case 'busca_meu_id':

        $login = $_POST['login'];


        $funcionario = busca_detalhada_um($conexao, "login_login = '{$login}' " , 'funcionario' );

        $id_funcionario = $funcionario['id'];

        if($id_funcionario > 0){
            print $id_funcionario;
        }

        break;
    case 'busca_conversas':
        $pesquisa = $_POST['pesquisa'];
        $meu_id = $_POST['meu_id'];

        $funcionarios = busca_detalhada_varios($conexao, "a.funcionario_id = '{$meu_id}' and a.funcionario_id1 = b.id  and b.nome LIKE '%$pesquisa%' group by  a.funcionario_id1 " , "comunicador a , funcionario b ", "b.id , b.nome , b.url_imagem");
        $funcionarios1 = busca_detalhada_varios($conexao, "a.funcionario_id1 = '{$meu_id}' and a.funcionario_id = b.id  and b.nome LIKE '%$pesquisa%' group by  a.funcionario_id " , "comunicador a , funcionario b ", "b.id , b.nome , b.url_imagem");


        $result = array_merge($funcionarios , $funcionarios1);
    
        if($result != null ){
            print json_encode($result);
        }
        break;
    case 'salva_grupo':
        $nome = $_POST['nome'];
        $id_funcionario = $_POST['id'];

        $grupo = insere($conexao, 'nome', "'{$nome}'" , 'grupo' );

        if($grupo > 0){

            $grupo_funcionario = insere($conexao, 'grupo_id , funcionario_id', "'{$grupo}' , '{$id_funcionario}' " , 'grupo_funcionario' );
            if(strlen($grupo_funcionario) > 0 ){
                print $grupo;
            }
        }
        
        break;
    case 'salva_participantes':

        $id_grupo = $_POST['id_grupo'];
        $id_funcionario = $_POST['id_funcionario'];

        $grupo_funcionario = insere($conexao, 'grupo_id , funcionario_id', "'{$id_grupo}' , '{$id_funcionario}' " , 'grupo_funcionario' );
        
        if(strlen($grupo_funcionario) > 0 ){
            print $grupo_funcionario;
        }
        break;
    case 'busca_grupos':

        $id = $_POST['id'];
        $pesquisa = $_POST['pesquisa'];

        $grupos = busca_detalhada_varios($conexao, "b.funcionario_id = {$id} AND b.grupo_id = a.id AND a.nome LIKE '%{$pesquisa}%'" , "grupo a , grupo_funcionario b ", "a.id , a.nome");
        
        if($grupos != null ){
            print json_encode($grupos);
        }
        break;
    default:
        break;
}