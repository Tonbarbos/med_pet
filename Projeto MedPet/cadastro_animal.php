<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro do Animal</title>
    <link rel="stylesheet" href="css/registro.css">
    <script src="js/auth.js" defer></script>
</head>
<body class="bgcolor">
        <div class="form">
            <div class="title">
                <h1>Cadastro do Animal</h1>
            </div>
            <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
                <div class="input-group">

                    
                    <div class= "input-box">
                    <label for="nome">Nome: </label>
                    <input type="text" name="nome" id="nome">
                    <label for="especie">Espécie: </label>
                    <input type="text" name="especie" id="especie">
                    <label for="genero">Gênero: </label>
                    <input type="text" name="genero" id="genero">
                    <label for="tipo">Tipo Sanguíneo: </label>
                    <input type="text" name="tipo_sang" id="tipo">
                    <label for="peso">Peso: </label>
                    <input type="text" name="peso" id="peso">
                    <label for="data">Data de Nascimento: </label>
                    <input type="date" name="data" id="data">
                    <label for="alergias">Alergias: </label>
                    <input type="text" name="alergias" id="alergias">
                    <label for="motivo">Motivos do Tratamento: </label>
                    <textarea name="descr" id="motivo"></textarea>  
                    </div>    
                    <div class="login-button">        
                        <button type="submit"><a href="">Cadastrar</a></button>
                </div>
            </div>
            </form>
        </div>
    </div>
    
