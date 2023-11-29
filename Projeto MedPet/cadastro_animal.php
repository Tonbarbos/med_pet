<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro do Animal</title>
    <link rel="stylesheet" href="css/registro.css">
    <script src="js/auth.js" defer></script>
</head>
<body>
        <div class="form">
            <div class="title">
                <h1>Cadastrar Animal</h1>
            </div>
              <form action="criar_animal.php" method="post" enctype="multipart/form-data">
                <div class="input-group">

                    
                    <div class= "input-box">
                    <label for="anim_nome">Nome: </label>
                    <input type="text" name="anim_nome" id="anim_nome">
                    <label for="especie">Espécie: </label>
                    <input type="text" name="especie" id="especie">
                    <label for="genero">Gênero:</label>
                    <label for="macho">Macho</label>
                    <input type="radio" name="genero" id="macho" value="Macho">
                    

                    <label for="femea">Fêmea</label>
                    <input type="radio" name="genero" id="femea" value="Fêmea">
                    

                    <label for="tipo">Tipo Sanguíneo: </label>
                    <input type="text" name="tipo_sang" id="tipo">
                    <label for="peso">Peso: </label>
                    <input type="text" name="peso" id="peso">
                    <label for="anim_data">Data de Nascimento: </label>
                    <input type="date" name="anim_data" id="anim_data">
                    <label for="alergias">Alergias: </label>
                    <input type="text" name="alergias" id="alergias">
                    <label for="descr">Motivos do Tratamento: </label>
                    <textarea name="descr" id="descr"></textarea>                 
                    <div class="box">
                        <label for = "selecaoVeterinarios">Selecione o veterinário</label>
                        <select name="selecaoVeterinarios">
                            <?php
                                include_once "listar_vet_opcoes.php";
                            ?>
                        </select>
                    </div>
                    <div class="box">
                        <label for = "selecaoTutores">Selecione o tutor</label>
                        <select name="selecaoTutores">
                            <?php
                                include_once "listar_tut_opcoes.php";
                            ?>
                        </select>
                    </div>
                    <label for="imagem">Selecione a imagem de perfil do animal:</label>
                    <input type="file" name="imagem" accept="image/*" class="form-control" required/>
                    <div class="login-button">        
                        <button type="submit" value="Salvar" name="btn">Cadastrar</button>

                    </div>
                </div>
            </div>
        </form>
    </div>
</body>
</html>
</body>
