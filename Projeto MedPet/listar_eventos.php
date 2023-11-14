<?php
//incluir o conteudo do arquivo conexao.php
include_once "./conexao.php";
//variavel usada para realizar a consulta
$query_eventos = "SELECT evt_id, evt_titulo, evt_desc, evt_inicio, evt_fim, animais_anim_id from eventos";
$retorno=executar_query($query_eventos, $connect);
//array para guardar o resultado
$resultado=[];

while($linha = $retorno->fetch(PDO::FETCH_ASSOC)){
    extract($linha);

    $resultado[] = [
        //descricao do formato abaixo: diretriz do fullcalendar => nome da coluna no DB
        'title' => $evt_titulo,
        'start' => $evt_inicio,
        'end' => $evt_fim,
    ];

}
echo json_encode($resultado);                