<?php
include "../bd/conexao.php";
include "../bd/crud.php";

date_default_timezone_set('America/Sao_Paulo');
$data_atual = date('d/m/Y');

//Pega a função passada do javascript
$funcao = $_POST["funcao"];

session_start();

//Verifica a função passada
/* Onde:
   cadastrar = Cadastro
   consultar = Consultar todos os registro ou de acordo com digitado no campo de busca
   consulta_unico = Consultar para realizar operações de alterar e excluir
   excluir = Excluir/Inativar registro
   altera = Alterar registro
*/
switch ($funcao){
    case 'cadastrar':
        //Pega o valor da entrada no input passado pelo javascript
        $titulo = $_POST["titulo"];
        $descricao = $_POST["descricao"];
        $data_cadastro = $data_atual;

        if (strlen($_POST["observacoes"]) <= 0){
            $observacoes = 'NULL';
        }else{
            $observacoes = "'".$_POST['observacoes']."'";
        }

        //Passa informações de inclusão na variável utilizada
        $campos = "titulo, conteudo, data_criacao, observacao";
        $valores= "'$titulo', '$descricao', '$data_cadastro', $observacoes";
        
        $expediente = insere($conexao, $campos, $valores, "expediente");

        if (strlen($expediente['id']) <= 0 ) {
			print json_encode($expediente);
        }
    break;
    case 'consultar':
        $expediente = busca_todos($conexao,  'expediente');

        if($expediente != null){
            print json_encode($expediente);
        }
    break;
    case 'excluir':
        //Pega o valor do ID para montar a condição
        $id = $_POST['id_expediente'];
        $condicao = "id = $id";
        $expediente = deleta($conexao , 'expediente' , $condicao);

        if (strlen($expediente['id']) <= 0 ) {
            print json_encode($expediente);
        }
        break;
    case 'alterar':
        //Pega o valor da entrada no input passado pelo javascript
        $id = $_POST["id"];
        $titulo = $_POST["titulo"];
        $descricao = $_POST["descricao"];

        if (strlen($_POST["observacoes"]) <= 0){
            $observacoes = 'NULL';
        }else{
            $observacoes = "'".$_POST['observacoes']."'";
        }

        $campos_valores = "titulo = '$titulo', conteudo = '$descricao', 
        observacao = $observacoes";
        $condicao = "id = $id";
        
        $expediente = altera($conexao, $campos_valores, $condicao, "expediente");

        if (strlen($expediente['id']) <= 0 ) {
            print json_encode($expediente);
        }
    }