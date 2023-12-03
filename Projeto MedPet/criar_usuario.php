<?php
include_once "./conexao.php";
$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['passwd'];
$fone = $_POST['fone'];
$confirm = $_POST['confpasswd'];
$tipo = $_POST['tipo'];  

// Validar senha
if (strlen($senha) < 8) {
    echo "A senha deve ter pelo menos 8 caracteres.";
    exit();
}

// Confirmar senha
if ($senha !== $confirm) {
    echo "As senhas não coincidem.";
    exit();
}else{
    $senha = password_hash($_POST['passwd'], PASSWORD_DEFAULT);
}

$email = filter_var($email, FILTER_SANITIZE_EMAIL);

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Formato de e-mail inválido.";
    exit();
}

if ($tipo == 'veterinario'){
    $query_add="INSERT INTO `veterinarios` (`vet_nome`, `vet_fone`, `vet_email`, `vet_senha`) VALUES ('$nome', '$fone', '$email', '$senha')";
   
}elseif ($tipo == 'tutor'){
    $query_add="INSERT INTO `tutores` (`tut_nome`, `tut_fone`, `tut_email`, `tut_senha`) VALUES ('$nome', '$fone', '$email', '$senha')";   
}
$preparar = $connect->prepare($query_add);
try{
    $preparar->execute();
    include 'enviado.php';
}catch(PDOException $e){
    echo "Erro ao tentar adicionar: " . $e;

}
?>
