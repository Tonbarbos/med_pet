<?php
include_once "./conexao.php";

$titulo = $_POST['titulo'];
$dat_ini = $_POST['dat_ini'];
$dat_fim = $_POST['dat_fim'];
$desc = $_POST['desc'];
$i=rand();
//o 1 que corresponde ao id tem q ser uma variavel 
//q tenha o valor correspondente ao numero de linhas para q possamos somar +1, 
//e o ultimo id corresponde ao relacionamento a um dado na tabela de animais
//deve mudar a depender do animal selecionado pelo usuario(que tambem deve ter um id, por sinal)

$query_add="INSERT INTO `eventos` (`evt_titulo`, `evt_desc`, `evt_inicio`, `evt_fim`, `animais_anim_id`) VALUES ('$titulo', '$desc', '$dat_ini', '$dat_fim', '1')";
echo $query_add;
executar_query($query_add, $connect);
?>