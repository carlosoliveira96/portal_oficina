<?php
include("conexao.php");


function insere($conexao, $campos , $valores , $tabela ) {
    $query = "insert into {$tabela} ({$campos}) values({$valores}) ";

        //var_dump( $query);
        //die();

    if(mysqli_query($conexao, $query)){
        $id = mysqli_insert_id($conexao);
        return $id;
    }
    else{
        echo mysqli_error($conexao);
        die();
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

function busca_detalhada_varios($conexao, $condicao , $tabela , $campos = null){
    
    $resultados = array();
    if ($campos){
        $query = "select {$campos} FROM {$tabela} where {$condicao} ";
    } else {
        $query = "SELECT * FROM {$tabela} WHERE {$condicao}";
    }
    
    //var_dump($query);
    $result = mysqli_query($conexao, $query);

    if ($result == true) {
        while ($resultado = mysqli_fetch_assoc($result)) {
            array_push($resultados, $resultado);
        }
        return $resultados ;
    }
    
    //return $resultados;
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

function busca_detalhada_um($conexao, $condicao , $tabela , $campos = null){
    $query = "";

    if ($campos){
        $query = "select {$campos}  FROM {$tabela} where {$condicao} ";
    }else{
        $query = "select * FROM {$tabela} where {$condicao} ";
    }

    $result = mysqli_query($conexao, $query);
    $resultado = mysqli_fetch_assoc($result); 

    return $resultado;
}

function altera($conexao, $campos_valores, $condicao = null, $tabela) {

    $query = "";
    
    if ($condicao){
        $query = "UPDATE {$tabela} set {$campos_valores} WHERE {$condicao} ";
    }else{
        $query = "UPDATE {$tabela} set {$campos_valores} ";        
    }

    if(mysqli_query($conexao, $query)){
        $id = mysqli_insert_id($conexao);
        return $id;
    }else{
        echo mysqli_error($conexao);
        die();
    }
}

function deleta($conexao , $tabela , $condicao){
    $query = "DELETE FROM  {$tabela} WHERE {$condicao} ";

    if(mysqli_query($conexao, $query)){
        $id = mysqli_insert_id($conexao);
        return $id;
    }else{
        echo mysqli_error($conexao);
        die();
    }
}

?>