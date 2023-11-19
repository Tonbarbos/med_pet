<?php
var_dump($_POST);
include_once "./conexao.php";
$anim_nome = $_POST['anim_nome'];
$especie = $_POST['especie'];
$genero = $_POST['genero'];
$tipo_sang = $_POST['tipo_sang'];
$peso = $_POST['peso'];
$anim_data = $_POST['anim_data'];
$alergias= $_POST['alergias'];
$descr = $_POST['descr'];
$reg = array("options"=>array("regexp"=>"/^[a-zA-Z] \s /"));
//if(isset($_POST['envia-form'])){

    //if(!filter_var($, FILTER_VALIDATE_REGEXP,$reg)){		  
        //echo "Nome invalido";
    //}
    // adicionar mais sanatizações depois



$query_add = "INSERT INTO `animais` (`anim_nome`, `anim_especie`, `anim_genero`, `anim_tipSang`, `anim_datNasc`, `anim_peso`, `anim_alergias`, `anim_desc`) VALUES ('$anim_nome', '$especie', '$genero', '$tipo_sang', '$anim_data', '$peso', '$alergias', '$descr')";
$preparar = $connect->prepare($query_add);
try{
    $preparar->execute();
}catch(PDOException $e){
    echo "Erro ao tentar adicionar: " . $e;

}
?>
