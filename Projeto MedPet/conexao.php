<?php
//credenciais do banco de dados(nota: os dados devem ser mudados de acordo com os dados de login do sgbd usado)
$server="localhost";
$user="root";
$passwd="usbw";
$dbname="med_pet";

    //tenta se conectar ao banco de dados. se der algo errado, pega esse erro e mostra na tela.
try{
    $connect= new PDO("mysql:host=$server; dbname=" . $dbname, $user, $passwd);
}catch(PDOException $e){
    die("Erro na conexao:" . $e->getMessage());
}
