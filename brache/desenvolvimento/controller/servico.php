<?php
include "../bd/conexao.php";
include "../bd/crud.php";

//Pega a função passada do javascript
$funcao = $_POST["funcao"];

session_start();

//Verifica a função passada
/* Onde:
   salvar = Cadastro
   consulta = Consultar todos os registro ou de acordo com digitado no campo de busca
   consulta_unico = Consultar para realizar operações de alterar e excluir
   excluir = Excluir/Inativar registro
   altera = Alterar registro
*/
switch ($funcao){
    case 'salvar':
        //Pega o valor da entrada no input passado pelo javascript
        $desc_servico = $_POST["desc_servico"];
        $check = $_POST["check"];

        //Passa informações de inclusão na variável utilizada
        $campos = "descricao, situacao, tipo_pagamento";
        $valores= "'{$desc_servico}', '1', '{$check}'";
        
        $servico = insere($conexao, $campos, $valores, "servico");

        if (strlen($servico['id']) <= 0 ) {
			print json_encode($servico);
        }
    break;
    case 'consulta':
        //Pega o valor entrada no input passado pelo javascript
        $desc_servico = $_POST["desc_servico"];
    
        if (strlen($desc_servico) > 0){
            $condicao = "situacao=1 AND descricao LIKE '%$desc_servico%'";
                        
            $servico = busca_detalhada_varios($conexao, $condicao, "servico");

            if ($servico != null ) {
                print json_encode($servico);
            } else {
                print 0;
            }

        }else {
            $condicao = "situacao=1";
                        
            $servico = busca_detalhada_varios($conexao, $condicao, "servico");

            if ($servico != null ) {
                print json_encode($servico);
            } else {
                print 0;
            }
        }
    break;
    case 'consulta_unico':
        //Pega o valor do ID passado pelo javascript
        $id_servico = $_POST['id_servico'];

        $condicao = "id='$id_servico'";

        $servico = busca_detalhada_um($conexao, $condicao, "servico");

        if ($servico != null) {
            print json_encode($servico);
        }else {
            print 0;
        }
    break;
    case 'excluir':
        //Pega o valor do ID passado pelo javascript
        $id_servico = $_POST['id_servico'];

        $campos_valores = "situacao=0";
        $condicao = "id='{$id_servico}'";

        $servico = altera($conexao, $campos_valores, $condicao, "servico");
        var_dump($servico);
        die();
    break;
    case 'altera':
        //Pega o valor entrada no input passado pelo javascript
        $desc_servico = $_POST["desc_servico"];
        $id_servico = $_POST['id_servico'];

        $campos_valores = "descricao='$desc_servico'";
        $condicao = "id='{$id_servico}'";

        $servico = altera($conexao, $campos_valores, $condicao, "servico");
        
        if (strlen($servico['id']) == 0 ) {
			print json_encode($servico);
        }
    break;
}

?>