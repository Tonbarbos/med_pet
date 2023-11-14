<?php
include_once "./conexao.php";
$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['passwd'];
$fone = $_POST['fone'];
$confirm = $_POST['confpasswd'];
$tipo = $_POST['tipo'];  
$reg = array("options" => array("regexp" => "/^[a-zA-Z]\s/"));


if ($tipo == 'veterinario'){
    $query_add="INSERT INTO `veterinarios` (`vet_nome`, `vet_fone`, `vet_email`, `vet_senha`) VALUES ('$nome', '$fone', '$email', '$senha')";
   
}elseif ($tipo == 'tutor'){
    $query_add="INSERT INTO `tutores` (`tut_nome`, `tut_fone`, `tut_email`, `tut_senha`) VALUES ('$nome', '$fone', '$email', '$senha')";   
}
executar_query($query_add, $connect);
?>

