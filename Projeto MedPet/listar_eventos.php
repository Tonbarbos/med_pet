<?php
//incluir o conteudo do arquivo conexao.php
include_once "./conexao.php";
//variavel usada para realizar a consulta
$query_eventos = "SELECT anim.tutores_tut_id as id_tut, anim.veterinarios_vet_id as id_vet, anim.anim_id, evt.evt_titulo, evt.evt_desc, evt.evt_inicio, evt.evt_fim, evt.animais_anim_id from eventos evt join animais anim on (anim.anim_id=evt.animais_anim_id) where anim.veterinarios_vet_id=".$_SESSION['id_vet']; //
$query_eventos = "SELECT anim.tutores_tut_id as id_tut, anim.veterinarios_vet_id as id_vet, anim.anim_id, evt.evt_titulo, evt.evt_desc, evt.evt_inicio, evt.evt_fim, evt.animais_anim_id from eventos evt join animais anim on (anim.anim_id=evt.animais_anim_id) where anim.tutores_tut_id=".$_SESSION['id_tut'];
//variavel usada para preparar a consulta
$preparar = $connect->prepare($query_eventos);
//executar a consulta
$preparar->execute();
$array = $preparar->fetchall(PDO::FETCH_ASSOC);
//array para guardar o resultado
$resultado=[];

foreach($array as $chave => $valor){
    extract($valor);

    $resultado[] = [
        //descricao do formato abaixo: diretriz do fullcalendar => nome da coluna no DB
        'title' => $evt_titulo,
        'start' => $evt_inicio,
        'end' => $evt_fim,
    ];

}
echo json_encode($resultado);                