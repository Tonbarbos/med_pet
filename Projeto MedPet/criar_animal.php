<?php
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
$tutorSelecionado = $_POST['selecaoTutores'];
$veterinarioSelecionado = $_POST['selecaoVeterinarios'];
//if(isset($_POST['envia-form'])){

    //if(!filter_var($, FILTER_VALIDATE_REGEXP,$reg)){		  
        //echo "Nome invalido";
    //}
    // adicionar mais sanatizações depois
//imagem 
 //var_dump($_FILES['arquivo']);


// if ((!empty($novo_nome)) and (file_exists("teste/$novo_nome"))) {
//     echo "<img src='teste/$novo_nome' width='150'>";
// }
        


$query_add = "INSERT INTO animais (anim_nome, anim_especie, anim_genero, anim_tipSang, anim_datNasc, anim_peso, anim_alergias, anim_desc, tutores_tut_id, veterinarios_vet_id ) VALUES ('$anim_nome', '$especie', '$genero', '$tipo_sang', '$anim_data', '$peso', '$alergias', '$descr', '$tutorSelecionado', '$veterinarioSelecionado')";
$preparar = $connect->prepare($query_add);
// echo "dados do aniamal " . $query_add;
try{
    $preparar->execute();
    
}catch(PDOException $e){
    echo "Erro ao tentar adicionar-0: " . $e;
}

$cons = "SELECT anim_id FROM animais ORDER BY anim_id DESC LIMIT 1";

// Prepara a consulta
$prepararid = $connect->prepare($cons);

// Executa a consulta
$prepararid->execute();

// Obtém o resultado da consulta
$resultado = $prepararid->fetch(PDO::FETCH_ASSOC);

// Verifica se há algum resultado
if ($resultado) {
    // O valor de anim_id
    $anim_id = $resultado['anim_id'];

}
// echo "O último anim_id é: " . $anim_id;
if(isset($_POST['btn'])){ 
    $arquivo = $_FILES['imagem']; 
    $extensao = strtolower(pathinfo($arquivo['name'], PATHINFO_EXTENSION));
    $novo_nome = md5(time()) . '.' . $extensao;
    $diretorio = "imagens/";  //define o diretorio para onde vai os arquivo
    move_uploaded_file($arquivo['tmp_name'], $diretorio . $novo_nome); //efetua o upload
    $data=date("Y-m-d"); 
    $sql_code = "INSERT INTO arquivo (arquivo, data, animais_anim_id) VALUES( '$novo_nome', '$data', '$anim_id')";
    // echo $sql_code;
    $prepararimg = $connect->prepare($sql_code);
    try{
        $prepararimg->execute();
        include 'enviado.php';
    }catch(PDOException $e){
        echo "Erro ao tentar adicionar-1: " . $e;
    
    }

}
