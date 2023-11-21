<?php
include_once "conexao.php";
$select="SELECT anim_id as id, tutores_tut_id as idTutor, veterinarios_vet_id as idVet, anim_nome as nome from animais where tutores_tut_id = ". $_SESSION['id_tut'];
$select2="SELECT anim_id as id, tutores_tut_id as idTutor, veterinarios_vet_id as idVet, anim_nome as nome from animais where veterinarios_vet_id = ". $_SESSION['id'];

$preparar = $connect->prepare($select2);
try{
    $preparar->execute();
}catch(PDOException $e){
    echo "Erro ao tentar buscar: " . $e;

}
?>