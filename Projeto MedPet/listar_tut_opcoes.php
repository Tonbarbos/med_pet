<?php
include_once "conexao.php";

$id_tut_sessao = $_SESSION['id_tut'];

$select = "SELECT tut_id, tut_nome FROM tutores WHERE tut_id = :id_tut_sessao";
$preparar = $connect->prepare($select);

try {
    $preparar->execute(array(':id_tut_sessao' => $id_tut_sessao));
    $array = $preparar->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Erro ao tentar buscar: " . $e;
}

foreach ($array as $chave => $valor) {
    extract($valor);
    echo "<option value='" . $tut_id . "' name='tut'>" . $tut_nome . "</option>";
}
?>
