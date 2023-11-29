<?php
session_start();
include_once "./conexao.php";

$titulo = $_POST['titulo'];
$dat_ini = $_POST['dat_ini'];
$dat_fim = $_POST['dat_fim'];
$desc = $_POST['desc'];
$animalSelecionado = $_POST['selecaoAnimal'];
if($_SESSION['vet']){
    $tutorSelecionado = $_POST['selecaoTutores'];
    $query_add="INSERT INTO `eventos` (`evt_titulo`, `evt_desc`, `evt_inicio`, `evt_fim`, `anim_id`, `tut_id`,`vet_id`) 
                VALUES ('$titulo', '$desc', '$dat_ini', '$dat_fim', '$animalSelecionado', '$tutorSelecionado','". $_SESSION['id_vet']."')";
}else if($_SESSION['tut']){
    $veterinarioSelecionado = $_POST['selecaoVeterinarios'];
    $query_add="INSERT INTO `eventos` (`evt_titulo`, `evt_desc`, `evt_inicio`, `evt_fim`, `anim_id`, `tut_id`,`vet_id`) 
                VALUES ('$titulo', '$desc', '$dat_ini', '$dat_fim', '$animalSelecionado', '". $_SESSION['id_tut']."', '$veterinarioSelecionado')";
}



//ainda tenho q trabalhar com a brincadeira de diferenciar o tipo de usuário logado aq nesse select
$query_add="INSERT INTO `eventos` (`evt_titulo`, `evt_desc`, `evt_inicio`, `evt_fim`, `anim_id`, `tut_id`,`vet_id`) 
VALUES ('$titulo', '$desc', '$dat_ini', '$dat_fim', '$animalSelecionado', '$tutorSelecionado', '1')";
echo $query_add;
$preparar = $connect->prepare($query_add);
try{
    $preparar->execute();
}catch(PDOException $e){
    echo "Erro ao tentar adicionar: " . $e;

}
?>