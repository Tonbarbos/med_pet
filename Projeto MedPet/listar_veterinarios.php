<?php
include_once "conexao.php";
$select = "SELECT vet_id, vet_nome FROM veterinarios";  
$preparar = $connect->prepare($select);
try{
    $preparar->execute(); 
}catch(PDOException $e){
    echo "Erro ao tentar buscar: " . $e;
}
$array = $preparar->fetchall(PDO::FETCH_ASSOC);
foreach($array as $chave => $valor) {
    extract($valor);
    echo "<option value='" . $vet_id. "'name='vet'>" . $vet_nome . "</option>";
}
?>