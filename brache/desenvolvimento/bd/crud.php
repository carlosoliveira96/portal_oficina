<?php
include("conexao.php");


function insere($conexao, $campos , $valores , $tabela ) {
    $query = "insert into {$tabela} ({$campos}) values({$valores}) ";
    if(mysqli_query($conexao, $query)){
        $id = mysqli_insert_id($conexao);
        return $id;
    }
}



function busca_varios($conexao, $condicao , $tabela){
    $resultados = array();
    $query = "select *  FROM {$tabela} where {$condicao} ";
    $result = mysqli_query($conexao, $query);

    if ($result == true) {
        while ($resultado = mysqli_fetch_assoc($result)) {
            array_push($resultados, $resultado);
        }
        return $resultados ;
    }

    return $resultados;
}

function busca_detalhada_varios($conexao, $condicao , $tabela , $campos){
    $resultados = array();
    $query = "select {$campos}  FROM {$tabela} where {$condicao} ";
    $result = mysqli_query($conexao, $query);

    if ($result == true) {
        while ($resultado = mysqli_fetch_assoc($result)) {
            array_push($resultados, $resultado);
        }
        return $resultados ;
    }
    
    return $resultados;
}

function busca_todos($conexao,  $tabela){
    $resultados = array();
    $query = "select * FROM {$tabela} ";
    $result = mysqli_query($conexao, $query);

    if ($result == true) {
        while ($resultado = mysqli_fetch_assoc($result)) {
            array_push($resultados, $resultado);
        }
        return $resultados ;
    }

}

function busca_detalhada_um($conexao, $condicao , $tabela , $campos){
    $query = "select {$campos}  FROM {$tabela} where {$condicao} ";
    $result = mysqli_query($conexao, $query);
    $resultado = mysqli_fetch_assoc($result); 
    return $resultado;
}

function altera_geral($conexao, $campos_valores , $tabela , $condicao = null ) {

    if ($condicao){
        $query = "update {$tabela} set ({$campos_valores}) WHERE {$condicao} ";
    }else{
        $query = "update {$tabela} set ({$campos_valores}) ";        
    }

    if(mysqli_query($conexao, $query)){
        $id = mysqli_insert_id($conexao);
        return $id;
    }
}

?>