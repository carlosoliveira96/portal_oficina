<?php
include "../bd/conexao.php";
include "../bd/crud.php";

$funcao = $_POST["funcao"];
//$funcao = "busca_corretores";
//$nome_usuario = "teste";
//$tipo_cadastro = "corretor";
session_start();
switch ($funcao) {
    case 'verifica_cpf':
        $cpf = $_POST['cpf'];
        
        $cliente = busca_detalhada_um($conexao, " cpf = '{$cpf}' " , "cadastro" );

        if (strlen($cliente['id']) > 0 ) {
			print json_encode($cliente);
        }
 
        break;
    case 'verifica_cnpj':

        $cnpj = $_POST['cnpj'];
        
        $cliente = busca_detalhada_um($conexao, "cnpj = '{$cnpj}'" , "cadastro" );

        if (strlen($cliente['id']) > 0 ) {
			print json_encode($cliente);
        }

        break;
    case 'verifica_usuario':

        $usuario = $_POST['usuario'];
        
        $login = busca_detalhada_um($conexao, "login = '{$usuario}'" , "login" );

        if ($login['login']) {
			print json_encode($login);
        }

        break;
    case 'salvar':
        $tipo_cadastro = $_POST['tipo_cadastro'];
        $tipo_cadastro = "'".$tipo_cadastro."'";

        $nome = $_POST['nome'];

        if (strlen($nome) <= 0){
            $nome = 'NULL';
        }else{
            $nome = "'".$nome."'";
        }

        $nascimento = $_POST['nascimento'];

        if (strlen($nascimento) <= 0){
            $nascimento = 'NULL';
        }else{
            $nascimento = "'".$nascimento."'";
        }

        $cpf = $_POST['cpf'];

        if (strlen($cpf) <= 0){
            $cpf = 'NULL';
        }else{
            $cpf = "'".$cpf."'";
        }

        $rg = $_POST['rg'];

        if (strlen($rg) <= 0){
            $rg = 'NULL';
        }else{
            $rg = "'".$rg."'";
        }

        $orgao_emissor = $_POST['orgao_emissor'];

        if (strlen($orgao_emissor) <= 0){
            $orgao_emissor = 'NULL';
        }else{
            $orgao_emissor = "'".$orgao_emissor."'";
        }

        $cnpj = $_POST['cnpj'];

        if (strlen($cnpj) <= 0){
            $cnpj = 'NULL';
        }else{
            $cnpj = "'".$cnpj."'";
        }

        $inscricao_estadual = $_POST['inscricao_estadual'];

        if (strlen($inscricao_estadual) <= 0){
            $inscricao_estadual = 'NULL';
        }else{
            $inscricao_estadual = "'".$inscricao_estadual."'";
        }

        $razao_social = $_POST['razao_social'];

        if (strlen($razao_social) <= 0){
            $razao_social = 'NULL';
        }else{
            $razao_social = "'".$razao_social."'";
        }

        $nome_fantasia = $_POST['nome_fantasia'];

        if (strlen($nome_fantasia) <= 0){
            $nome_fantasia = 'NULL';
        }else{
            $nome_fantasia = "'".$nome_fantasia."'";
        }

        $email = $_POST['email'];
        $email = "'".$email."'";

        $telefone = $_POST['telefone'];

        if (strlen($telefone) <= 0){
            $telefone = 'NULL';
        }else{
            $telefone = "'".$telefone."'";
        }

        $celular = $_POST['celular'];

        if (strlen($celular) <= 0){
            $celular = 'NULL';
        }else{
            $celular = "'".$celular."'";
        }

        $cep = $_POST['cep'];

        if (strlen($cep) <= 0){
            $cep = 'NULL';
        }else{
            $cep = "'".$cep."'";
        }

        $endereco = $_POST['endereco'];
        $endereco = "'".$endereco."'";

        $numero = $_POST['numero'];
        $numero = "'".$numero."'";

        $complemento = $_POST['complemento'];

        if (strlen($complemento) <= 0){
            $complemento = 'NULL';
        }else{
            $complemento = "'".$complemento."'";
        }

        $bairro = $_POST['bairro'];
        $bairro = "'".$bairro."'";

        $cidade = $_POST['cidade'];
        $cidade = "'".$cidade."'";

        $uf = $_POST['uf'];
        $uf = "'".$uf."'";

        $fabricante = $_POST['fabricante'];

        if (strlen($fabricante) <= 0){
            $fabricante = 'NULL';
        }else{
            $fabricante = "'".$fabricante."'";
        }

        $nome_usuario = $_POST['nome_usuario'];

        if (strlen($nome_usuario) <= 0){
            $nome_usuario = 'NULL';
        }else{
            $nome_usuario = "'".$nome_usuario."'";
        }

        $observacao = $_POST['observacao'];

        if (strlen($observacao) <= 0){
           $observacao = 'NULL';
        }else{
            $observacao = "'".$observacao."'";
        }


        $perfil = 0;
        $campos = "" ;
        $valores = "";

        if($tipo_cadastro == "'cliente'"){

            $perfil = 4;

        }else if($tipo_cadastro == "'corretor'"){

            $perfil = 5;

        }

        if($perfil != 0){

            $condicao = "login=$nome_usuario";
            $campos = "login";
            $busca_login = busca_detalhada_um($conexao, $condicao, "login");

            if ($busca_login == null){
                $senhaMd5 = md5('123456'); 
                $campos_login =  "login , senha , perfil_id , primeiro_acesso";
                $valores_login =  " {$nome_usuario} ,'{$senhaMd5}' ,'{$perfil}' , '1' ";
                $login = insere($conexao, $campos_login , $valores_login , "login" ); 

                if(strlen($login) <= 0){
                    die();
                }
            }
        }

        if($tipo_cadastro == "'cliente'" || $tipo_cadastro == "'corretor'" ){

            $campos = " tipo , nome , cpf , rg, orgao_emissor , data_nascimento , cnpj, inscricao_estadual ,telefone , celular , razao_social, nome_fantasia, observacao , email , fabricante , cep , endereco , numero , complemento , bairro , cidade, uf , situacao  , login_login ";
            $valores= "{$tipo_cadastro} , {$nome} , {$cpf} , {$rg} , {$orgao_emissor} , {$nascimento} , {$cnpj}, {$inscricao_estadual} , {$telefone} , {$celular} , {$razao_social} , {$nome_fantasia}, {$observacao} , {$email} , {$fabricante} , {$cep} , {$endereco} , {$numero} , {$complemento} , {$bairro} , {$cidade} , {$uf} , 1 , {$nome_usuario}";


        }else {

            $campos = " tipo , nome , cpf , rg, orgao_emissor , data_nascimento , cnpj, inscricao_estadual ,telefone , celular , razao_social, nome_fantasia, observacao , email , fabricante , cep , endereco , numero , complemento , bairro , cidade, uf , situacao   ";
            $valores= "{$tipo_cadastro} , {$nome} , {$cpf} , {$rg} , {$orgao_emissor} , {$nascimento} , {$cnpj}, {$inscricao_estadual} , {$telefone} , {$celular} , {$razao_social} , {$nome_fantasia}, {$observacao} , {$email} , {$fabricante} , {$cep} , {$endereco} , {$numero} , {$complemento} , {$bairro} , {$cidade} , {$uf} , 1 ";


        }

        
        $usuario = insere($conexao, $campos , $valores , "cadastro"); 

        if (strlen($usuario['id']) <= 0 ) {
			print json_encode($usuario);
        }

        break;
    case 'busca_corretores':
        
        $corretores = busca_detalhada_varios($conexao, "tipo = 'corretor' " , "cadastro" , 'nome_fantasia , id , nome');

        if ($corretores != null){
            print json_encode($corretores);
        }

       break;
    case 'busca_seguradoras':

        $seguradoras = busca_detalhada_varios($conexao, "tipo = 'seguradora' " , "cadastro" , 'nome_fantasia , id , nome');

        if ($seguradoras != null){
            print json_encode($seguradoras);
        }

        break;
    case 'consultar':
        $tipo = $_POST['tipo'];

        $condicao = "tipo = '$tipo'";

        $cadastro = busca_detalhada_varios($conexao, $condicao, 'cadastro', '*');

        if ($cadastro != null){
            print json_encode($cadastro);
        }
    break;
    default:
		break;
}
?>