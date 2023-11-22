<?php
session_start();
include_once "conexao.php";
$email_teste = $_POST['email'];
$senha_teste = $_POST['senha'];
$select="SELECT tut_id, tut_nome, tut_email, tut_senha from tutores;";
$select2="SELECT vet_id , vet_nome, vet_email, vet_senha from veterinarios;";
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
echo $counter."<br>";
$_SESSION['tut']= false;
$_SESSION['vet']= false;
//verifica a existencia dos dados em "tutores"
foreach($array1 as $chave => $valor){
    extract($valor);
    if($email_teste == $tut_email && $senha_teste == $tut_senha){
        $_SESSION['id_tut'] = $tut_id;
        $_SESSION['senha_tut']=$tut_senha;
        $_SESSION['nome_tut'] = $tut_nome;
        $_SESSION['tut']= true;
        echo "tut";     
?>
    <script>
        window.location.replace("tela_inicial.php");
    </script>
<?php
    break;
    }else{
        $counter=$counter+1;
        echo "contadortut";
    }
}
echo $counter."<br>";
//verifica a existencia dos dados em "veterinarios"
foreach($array2 as $chave => $valor){
    extract($valor);
    if($email_teste == $vet_email && $senha_teste == $vet_senha){
        $_SESSION['id_vet'] = $vet_id;
        $_SESSION['senha_vet']=$vet_senha;
        $_SESSION['nome_vet'] = $vet_nome;
        $_SESSION['vet']= true;
        echo "vet ";        
?>
    <script>
        window.location.replace("tela_inicial.php");
    </script>
<?php
    break;
    }else{
        $counter=$counter+1;
        echo "contadorvet ";
    }
}
echo $counter."<br>";
if($counter==(count($array1)+count($array2))){
    session_destroy();
    echo "sessao destruida"
?>        
        <script>
          window.location.replace("login.php");
          alert("Credenciais inválidas!");
        </script>
<?php

}     
echo $counter;

?>
