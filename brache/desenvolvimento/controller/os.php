<?php
include('../bd/crud.php');
include('../bd/conexao.php');

if(isset($_POST['funcao'])){
    $funcao = $_POST['funcao'];

    switch ($funcao){
        case 'buscar_funcionario':
            if (empty($_POST['pesquisa'])){
                $funcionarios = busca_varios($conexao, "situacao = 1" , 'funcionario');
            }else {
                $pesquisa = $_POST['pesquisa'];
                $funcionarios = busca_varios($conexao, "situacao = 1 and nome LIKE '%{$pesquisa}%'" , 'funcionario');
            }

            if($funcionarios != null){
                print json_encode($funcionarios);
            }

            break;
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        case 'buscar_os':
            
            $os =  busca_detalhada_um($conexao, "a.cliente_id = 1 AND a.cliente_id = b.id" , 'os a, cadastro b');
=======
=======
>>>>>>> 60488b529cf197cb1930a66e36e0c40dfc8c53fd
=======
>>>>>>> 60488b529cf197cb1930a66e36e0c40dfc8c53fd
        case 'busca_os':

            $pesquisa = $_POST['pesquisa'];
            $corretor = $_POST['corretor'];
            $seguradora = $_POST['seguradora'];
            $data_inicio = $_POST['data_inicio'];
            $data_fim = $_POST['data_fim'];

            $os = busca_detalhada_varios($conexao, "a.cliente_id = c.id AND a.veiculo_placa = b.placa" , "os a , veiculo b , cadastro c " , "a.* , b.* , c.* ");
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 60488b529cf197cb1930a66e36e0c40dfc8c53fd
=======
>>>>>>> 60488b529cf197cb1930a66e36e0c40dfc8c53fd
=======
>>>>>>> 60488b529cf197cb1930a66e36e0c40dfc8c53fd

            if($os != null){
                print json_encode($os);
            }

            break;
        default:
            break;
    }

}

?>