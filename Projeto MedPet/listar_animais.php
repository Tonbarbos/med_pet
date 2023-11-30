<?php
include_once "conexao.php";
if($_SESSION['tut']){
    $select = "SELECT anim_id as id, tutores_tut_id as idTutor, veterinarios_vet_id as idVet, anim_nome as nome, arquivo.arquivo as arquivo FROM animais
    LEFT JOIN arquivo ON animais.anim_id = arquivo.animais_anim_id
    WHERE tutores_tut_id = " . $_SESSION['id_tut'];
}else if($_SESSION['vet']){
    $select = "SELECT animais.anim_id as id, animais.tutores_tut_id as idTutor,animais.veterinarios_vet_id as idVet,animais.anim_nome as nome, arquivo.arquivo as arquivo FROM animais 
    LEFT JOIN arquivo ON animais.anim_id = arquivo.animais_anim_id 
    WHERE animais.veterinarios_vet_id = " . $_SESSION['id_vet'];
}
}

$preparar = $connect->prepare($select);
try{
    $preparar->execute();
    $array = $preparar->fetchall(PDO::FETCH_ASSOC);
}catch(PDOException $e){
    echo "Erro ao tentar buscar: " . $e;

}

?>
