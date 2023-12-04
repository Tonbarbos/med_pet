<?php
session_start();
include_once "conexao.php";
$select = "SELECT tut_id, tut_nome FROM tutores WHERE tut_id =".$_SESSION['id_tut'].";";
$preparar = $connect->prepare($select);

try {
    $preparar->execute();
    $array = $preparar->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Erro ao tentar buscar: " . $e;
}

foreach ($array as $chave => $valor) {
    extract($valor);
    echo "<option value='" . $tut_id . "' name='tut'>" . $tut_nome . "</option>";
}
?>
