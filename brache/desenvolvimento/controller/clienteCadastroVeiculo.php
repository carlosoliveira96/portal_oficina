<?php
include '../bd/conexao.php';
include '../bd/crud.php';

if(isset($_POST['funcao'])){

    $funcao  = $_POST['funcao'];

    switch ($funcao){
        case 'busca_cliente':
            
            $id_cliente = $_POST['id_cliente'];

            $cliente = busca_detalhada_um($conexao, "id = '{$id_cliente}'" , "cadastro" , $campos = null);

            if(strlen($cliente['id']) > 0 ){
                print json_encode($cliente);
            }

            break;
        case 'busca_placa':
            
            $placa = $_POST['placa'];
           
            $veiculo = busca_detalhada_um($conexao, "placa = '{$placa}'" , "veiculo" , $campos = null);

            if(strlen($veiculo['placa']) > 0 ){
                print json_encode($veiculo);
            }

            break;
        case 'salvar':

            
            if (isset($_POST['cliente_id'])){
                $cliente_id = $_POST['cliente_id'];
            } 

            $placa = $_POST['placa'];
            $placa = "'".$placa."'";

            $modelo = $_POST['modelo'];
            $modelo = "'".$modelo."'";

            $ano_modelo = $_POST['ano_modelo'];
            $ano_modelo = "'".$ano_modelo."'";

            $ano_fabricacao = $_POST['ano_fabricacao'];
            $ano_fabricacao = "'".$ano_fabricacao."'";

            $fabricante = $_POST['fabricante'];
            $fabricante = "'".$fabricante."'";

            $cor = $_POST['cor'];
            $cor = "'".$cor."'";

            $chassi = $_POST['chassi'];

            if (strlen($chassi) <= 0){
                $chassi = 'NULL';
            }else{
                $chassi = "'".$chassi."'";
            }


            $busca_veiculo = busca_detalhada_um($conexao, "placa = {$placa}" , "veiculo" , $campos = null);

            if(strlen($busca_veiculo['placa']) == 0 ){

              
                $campos = " placa , fabricante , modelo , ano_fabricacao , ano_modelo , cor , chassi , situacao ";
                $valores  = " {$placa} , {$fabricante} , {$modelo} , {$ano_fabricacao} , {$ano_modelo} , {$cor} , {$chassi} , 1 ";

                $veiculo = insere($conexao, $campos , $valores, "veiculo" ); 

                if(strlen($veiculo) <= 0){
                    die();
                }else if (!isset($_POST['cliente_id'])){
                    print json_encode($veiculo); 
                }

            }

            if (isset($_POST['cliente_id'])){

                $busca_vinculo = busca_detalhada_um($conexao, "veiculo_placa = {$placa} and cliente_id = {$cliente_id}" , "cliente_veiculo" , $campos = null);
                
                if(strlen($busca_vinculo['cliente_id']) <= 0 ){
                    $cliente_veiculo = insere($conexao, "cliente_id , veiculo_placa" , "{$cliente_id} , {$placa}" , "cliente_veiculo" );
                
                    if(strlen($cliente_veiculo) <= 0){
                        die();
                    }else{
                        print json_encode($cliente_veiculo);
                    }
                }else{
                    print '0';
                }
           
            }
            
            break;
        case 'salvar_veiculo':
            $placa = $_POST['placa'];
            $placa = "'".$placa."'";

            $modelo = $_POST['modelo'];
            $modelo = "'".$modelo."'";

            $ano_modelo = $_POST['ano_modelo'];
            $ano_modelo = "'".$ano_modelo."'";

            $ano_fabricacao = $_POST['ano_fabricacao'];
            $ano_fabricacao = "'".$ano_fabricacao."'";

            $fabricante = $_POST['fabricante'];
            $fabricante = "'".$fabricante."'";

            $cor = $_POST['cor'];
            $cor = "'".$cor."'";

            $chassi = $_POST['chassi'];

            if (strlen($chassi) <= 0){
                $chassi = 'NULL';
            }else{
                $chassi = "'".$chassi."'";
            }


            $busca_veiculo = busca_detalhada_um($conexao, "placa = {$placa}" , "veiculo" , $campos = null);

            if(strlen($busca_veiculo['placa']) == 0 ){

            
                $campos = " placa , fabricante , modelo , ano_fabricacao , ano_modelo , cor , chassi , situacao ";
                $valores  = " {$placa} , {$fabricante} , {$modelo} , {$ano_fabricacao} , {$ano_modelo} , {$cor} , {$chassi} , 1 ";

                $veiculo = insere($conexao, $campos , $valores, "veiculo" ); 

                if(strlen($veiculo) <= 0){
                    die();
                }else if (!isset($_POST['cliente_id'])){
                    print json_encode($veiculo); 
                }

            }

            break;
        case 'salvar_veiculo_desconhecido':

            $data = $_POST['dt_entrada'];
            $hora = $_POST['hr_entrada'];
            $observacoes = $_POST['obs'];

            $veiculo_desconhecido = insere($conexao, 'data_entrada, hora_entrada , observacoes ' , " '{$data}' , '{$hora}' , '{$observacoes}' " , "veiculo_desconhecido" ); 

            if($veiculo_desconhecido <= 0){
                die();
            }else{
                print json_encode($veiculo_desconhecido); 
            }
            
            break;
        default:
            break;       
    }

}

?>