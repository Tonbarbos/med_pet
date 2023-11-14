<?php
session_start();
//incluir o conteudo do arquivo conexao.php
include_once "./conexao.php";
//variavel usada para realizar a consulta
$query_eventos = "SELECT evt.evt_id as id, evt.evt_titulo as titulo, evt.evt_desc as descr, evt.evt_inicio as inicio, evt.evt_fim as fim, evt.animais_anim_id as animId, anim.tutores_tut_id as tutId from eventos evt join animais anim on (anim.anim_id = evt.animais_anim_id) WHERE anim.tutores_tut_id = ". $_SESSION['id_tut']; 
//variavel usada para preparar a consulta
$preparar = $connect->prepare($query_eventos);
//executar a consulta
$preparar->execute();
//array para guardar o resultado
$resultado=[];

while($linha = $preparar->fetch(PDO::FETCH_ASSOC)){
    extract($linha);
    echo $titulo;
}                