<?php
var_dump($_FILES)['arquivo']; 
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
$msg = false;
if(isset($_POST['btn'])){ 
    $arquivo = $_FILES['imagem']; 
    $extensao = strtolower(pathinfo($arquivo['name'], PATHINFO_EXTENSION));
    $novo_nome = md5(time()) . '.' . $extensao;
    $diretorio = "imagens/";  //define o diretorio para onde vai os arquivo
    echo "Caminho1 " . $_FILES['arquivo']['tmp_name'];
    echo "Caminho2: " . $diretorio . $novo_nome;
    move_uploaded_file($arquivo['tmp_name'], $diretorio . $novo_nome); //efetua o upload
    $data=date("Y-m-d"); 
    $sql_code = "INSERT INTO arquivo (arquivo, data) VALUES( '$novo_nome', '$data')";
    echo $sql_code;
    $preparar = $connect->prepare($sql_code);
    try{
        $preparar->execute();
    }catch(PDOException $e){
        echo "Erro ao tentar adicionar: " . $e;
    
    }
}

// if ((!empty($novo_nome)) and (file_exists("teste/$novo_nome"))) {
//     echo "<img src='teste/$novo_nome' width='150'>";
// }
        


$query_add = "INSERT INTO `animais` (`anim_nome`, `anim_especie`, `anim_genero`, `anim_tipSang`, `anim_datNasc`, `anim_peso`, `anim_alergias`, `anim_desc`, `tutores_tut_id`, `veterinarios_vet_id` ) VALUES ('$anim_nome', '$especie', '$genero', '$tipo_sang', '$anim_data', '$peso', '$alergias', '$descr', '$tutorSelecionado', '$veterinarioSelecionado')";
$preparar = $connect->prepare($query_add);
try{
    $preparar->execute();
}catch(PDOException $e){
    echo "Erro ao tentar adicionar: " . $e;

}
?>
