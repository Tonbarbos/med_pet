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
    
    //$i=rand();
    //o 1 que corresponde ao id tem q ser uma variavel 
    //q tenha o valor correspondente ao numero de linhas para q possamos somar +1, 
    //e o ultimo id corresponde ao relacionamento a um dado na tabela de animais
    //deve mudar a depender do animal selecionado pelo usuario(que tambem deve ter um id, por sinal)

    //if(!filter_var($, FILTER_VALIDATE_REGEXP,$reg)){		  
        //echo "Nome invalido";
    //}
    // adicionar mais sanatizações depois



$query_add = "INSERT INTO `animais` (`anim_nome`, `anim_especie`, `anim_genero`, `anim_tipSang`, `anim_datNasc`, `anim_peso`, `anim_alergias`, `anim_desc`) VALUES ('$anim_nome', '$especie', '$genero', '$tipo_sang', '$anim_data', '$peso', '$alergias', '$descr')";
executar_query($query_add, $connect);
?>
