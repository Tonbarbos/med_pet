<?php
session_start();
include_once "conexao.php";
$email_teste = $_POST['email'];
$senha_teste = $_POST['senha'];
$select="SELECT tut_id as id, tut_email as email, tut_senha as senha from tutores UNION SELECT vet_id as id, vet_email as email, vet_senha as senha from veterinarios;";
$preparar = $connect->prepare($select);
try{
    $preparar->execute();
}catch(PDOException $e){
    echo "Erro ao tentar buscar: " . $e;

}
while($linha = $preparar->fetch(PDO::FETCH_ASSOC)){
    extract($linha);
    if($email_teste == $email && $senha_teste == $senha){
        $_SESSION["id_tut"] = $id;
        $_SESSION["email"] = $email;
?>
    <script>
          window.location.replace("tela_inicial.php");
    </script>
<?php
    }elseif($email_teste == $email && $senha_teste == $senha){
        $_SESSION["id_vet"] = $id;
        $_SESSION["email"] = $email;
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
?>
