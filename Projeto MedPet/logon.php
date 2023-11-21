<?php
session_start();
include_once "conexao.php";
$email_teste = $_POST['email'];
$senha_teste = $_POST['senha'];
$select="SELECT tut_id as id, tut_nome as nome, tut_email as email, tut_senha as senha from tutores;";
$select2="SELECT vet_id as id, vet_nome as nome, vet_email as email, vet_senha as senha from veterinarios;";
$preparar = $connect->prepare($select);
$preparar2 = $connect->prepare($select2);
try{
    $preparar->execute();
    $array1 = $preparar->fetchall(PDO::FETCH_ASSOC);
    $preparar2->execute();
    $array2 = $preparar2->fetchall(PDO::FETCH_ASSOC);
}catch(PDOException $e){
    echo "Erro ao tentar buscar: " . $e;

}
$counter=0;

//verifica a existencia dos dados em "tutores"
foreach($array1 as $chave => $valor){
    extract($valor);
    if($email_teste == $email && $senha_teste == $senha){
        $_SESSION['id_tut'] = $id;
        $_SESSION['senha_tut']=$senha;
        $_SESSION['nome_tut'] = $nome;        
?>
    <script>
        window.location.replace("tela_inicial.php");
    </script>
<?php
    break;
    }else{
        ++$counter;
    }
}
//verifica a existencia dos dados em "veterinarios"
foreach($array2 as $chave => $valor){
    extract($valor);
    if($email_teste == $email && $senha_teste == $senha){
        $_SESSION['id_vet'] = $id;
        $_SESSION['senha_vet']=$senha;
        $_SESSION['nome_vet'] = $nome;        
?>
    <script>
        window.location.replace("tela_inicial.php");
    </script>
<?php
    break;
    }else{
        ++$counter;
    }
}
if($counter=(count($array1)+count($array2))){
    session_destroy();
?>        
        <script>
          window.location.replace("login.php");
          alert("Credenciais inválidas!");
        </script>
<?php

}

echo $_SESSION['senha'].', '.$_SESSION['nome'].', '.$_SESSION['id'];
?>
