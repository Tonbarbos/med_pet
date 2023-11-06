<?php
//credenciais do banco de dados(nota: deve ser mudado ao usar fora do xampp ou usbwebserver)
    $server="localhost";
    $user="root";
    $passwd="";
    $dbname="med_pet";

    //tenta se conectar ao banco de dados. se der algo errado, pega esse erro e mostra na tela.
    try{
        $connect= new PDO("mysql:host=$server; dbname=" . $dbname, $user, $passwd);
    }catch(PDOException $e){
        die("Erro na conexao:" . $e->getMessage());
    }
    