<?php
session_start();
if (isset($_SESSION["usuarioLogado"])){
    if($_SESSION["perfilUsuario"] != "1"){
        header("Location:../login.php");
    }
}else{
    header("Location:../login.php");
}
?>