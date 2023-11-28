<?php
include_once "conexao.php";
if($_SESSION['tut']){
    $select="SELECT anim_id as id, tutores_tut_id as idTutor, veterinarios_vet_id as idVet, anim_nome as nome from animais 
    where tutores_tut_id = ". $_SESSION['id_tut'];
}else if($_SESSION['vet']){
    $select="SELECT anim_id as id, tutores_tut_id as idTutor, veterinarios_vet_id as idVet, anim_nome as nome from animais 
    where veterinarios_vet_id = ". $_SESSION['id_vet'];
}

$preparar = $connect->prepare($select);
try{
    $preparar->execute();
    $array = $preparar->fetchall(PDO::FETCH_ASSOC);
}catch(PDOException $e){
    echo "Erro ao tentar buscar: " . $e;

}

?>