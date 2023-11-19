<?php
include_once "conexao.php";
$select="SELECT anim_id as id, tutores_tut_id as idTutor, veterinarios_vet_id as idVet, anim_nome as nome from animais where tutores_tut_id = ". $_SESSION['id']." or veterinarios_vet_id = ".$_SESSION['id'].";";
$preparar = $connect->prepare($select);
try{
    $preparar->execute();
}catch(PDOException $e){
    echo "Erro ao tentar buscar: " . $e;

}
?>