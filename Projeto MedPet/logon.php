<?php
session_start();
include_once "conexao.php";
$email_teste = $_POST['email'];
$senha_teste = $_POST['senha'];
$select="SELECT tut_id as id, tut_nome as nome, tut_email as email, tut_senha as senha from tutores UNION SELECT vet_id as id, vet_nome as nome, vet_email as email, vet_senha as senha from veterinarios;";
$preparar = $connect->prepare($select);
try{
    $preparar->execute();
}catch(PDOException $e){
    echo "Erro ao tentar buscar: " . $e;

}

$_SESSION['id']="";
$_SESSION['senha']="";
$_SESSION['nome']="";
while($linha = $preparar->fetch(PDO::FETCH_ASSOC)){
    extract($linha);
    if($email_teste == $email && $senha_teste == $senha){
        $_SESSION['id'] = $id;
        $_SESSION['senha']=$senha;
        $_SESSION['nome'] = $nome;
        break;
        
?>
    <script>
        window.location.replace("tela_inicial.php");
    </script>
<?php
    }else{
        session_destroy();
?>        
        <script>
          window.location.replace("login.php");
          alert("Credenciais inválidas!");
        </script>
<?php
    }
}
echo $_SESSION['senha'].', '.$_SESSION['nome'].', '.$_SESSION['id'];
?>
