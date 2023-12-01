<?php
include_once "conexao.php";
if($_SESSION['vet']){
    $select="SELECT vet_id , vet_nome, vet_email, vet_fone from veterinarios where vet_id=".$_SESSION['id_vet'].";";
}
else if($_SESSION['tut']){
    $select="SELECT tut_id, tut_nome, tut_email, tut_fone from tutores where tut_id=".$_SESSION['id_tut'].";";
}

  
$preparar = $connect->prepare($select);
try{
    $preparar->execute(); 
}catch(PDOException $e){
    echo "Erro ao tentar buscar: " . $e;
}
$array = $preparar->fetchall(PDO::FETCH_ASSOC);
