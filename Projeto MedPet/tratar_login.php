<?php
session_start();
include_once "conexao.php";
$email = $_POST['email'];
$senha = $_POST['senha'];
$select="SELECT `tut_email`, `tut_senha` from tutores UNION SELECT `vet_email`, `vet_senha` from veterinarios";
$retorno = executar_query($select, $connect);
$linha = $retorno->fetch(PDO::FETCH_ASSOC);
    extract($linha);
    if($email == $tut_email && $senha == $tut_senha){
        $_SESSION["id_tut"] = $tut_id;
        $_SESSION["email"] = $tut_email;
    }elseif($email == $vet_email && $senha == $vet_senha){
        $_SESSION["id_vet"] = $tut_id;
        $_SESSION["email"] = $tut_email;
    }else{
        session_destroy();
    }
?>