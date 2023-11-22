<?php
//incluir o conteudo do arquivo conexao.php
include_once "./conexao.php";
//variaveis usada para realizar a consulta, o valor alterna de acordo com o tipo de usuario logado
if($_SESSION['tut']){
    $query_eventos = "SELECT anim.tutores_tut_id as id_tut, anim.veterinarios_vet_id as id_vet, anim.anim_id, evt.evt_titulo, evt.evt_desc, evt.evt_inicio, evt.evt_fim, evt.animais_anim_id from eventos evt join animais anim on (evt.animais_anim_id=anim.anim_id) where anim.veterinarios_vet_id=".$_SESSION['id_vet']; //
}else if($_SESSION['vet']){
    $query_eventos = "SELECT anim.tutores_tut_id as id_tut, anim.veterinarios_vet_id as id_vet, anim.anim_id, evt.evt_titulo, evt.evt_desc, evt.evt_inicio, evt.evt_fim, evt.animais_anim_id from eventos evt join animais anim on (evt.animais_anim_id=anim.anim_id) where anim.tutores_tut_id=".$_SESSION['id_tut'];
}
//variavel usada para preparar a consulta
$preparar = $connect->prepare($query_eventos);
//executar a consulta
$preparar->execute();
//extrair o resultado da query como uma array
$array = $preparar->fetchall(PDO::FETCH_ASSOC);
//uma outra array para guardar o que vai ser passado pro calendario no javascript
$evt_calendar=[];

foreach($array as $chave => $valor){
    extract($valor);
    $evt_calendar[] = [
        //descricao do formato abaixo: diretriz do fullcalendar => nome da coluna no DB
        'title' => $evt_titulo,
        'start' => $evt_inicio,
        'end' => $evt_fim,
    ];

}
echo json_encode($resultado);                