<?php
include_once "conexao.php";
$select = "SELECT tut_id, tut_nome FROM tutores";  
$preparar = $connect->prepare($select);
try{
    $preparar->execute(); 
}catch(PDOException $e){
    echo "Erro ao tentar buscar: " . $e;
}
$array = $preparar->fetchall(PDO::FETCH_ASSOC);
foreach($array as $chave => $valor) {
    extract($valor);
    echo "<option value='" . $tut_id. "''name='tut'>" . $tut_nome . "</option>";
}
?>