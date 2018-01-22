<?php
include "../bd/conexao.php";
include "../bd/crud.php";

//Pega a função passada do javascript
$funcao = $_POST["funcao"];

session_start();

//Verifica a função passada
switch ($funcao){
    case 'salvar':
        //Pega o valor entrada no input passado pelo javascript
        $desc_servico = $_POST["desc_servico"];

        //Passa informações de inclusão na variável utilizada
        $campos = "descricao, situacao";
        $valores= "'{$desc_servico}', '1'";
        
        $servico = insere($conexao, $campos, $valores, "servico");

        if (strlen($servico['id']) <= 0 ) {
			print json_encode($servico);
        }
    break;
    case 'consulta':
        //Pega o valor entrada no input passado pelo javascript
        $desc_servico = $_POST["desc_servico"];
    
        if (strlen($desc_servico) > 0){

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
    case 'excluir':
        //Pega o valor do ID passado pelo javascript
        $id_servico = $_POST['id_servico'];

        $campos_valores = "situacao=0";
        $condicao = "id='{$id_servico}'";

        $servico = altera($conexao, $campos_valores, $condicao, "servico");
        var_dump($servico);
        die();
    break;
}

?>