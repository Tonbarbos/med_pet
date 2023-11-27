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
                    <label for="genero">Gênero: </label>
                    <input type="text" name="genero" id="genero">
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
                        <label for ="selecaotutores">Selecione o tutor</label>
                        <select name="selecaoTutores">
                            <?php
                                include_once "./conexao.php";
                            
                                try {
                                    $connect = new PDO("mysql:host=$server;dbname=" . $dbname, $user, $passwd);
                                    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                
                                  
                                    $consulta = $connect->query("SELECT tut_id, tut_nome FROM tutores");
                                    while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
                                        echo "<option value='" . $linha['tut_id'] . "'>" . $linha['tut_nome'] . "</option>";
                                    }

                                    $connect = null; // Fechar a conexão
                                } catch (PDOException $e) {
                                    die("Erro na conexão: " . $e->getMessage());
                                }
                            ?>
                        </select>
                    </div>
                            
                    <div class="box">
                        <label for = "selecaoVeterinarios">Selecione o veterinário</label>
                        <select name="selecaoVeterinarios">
                            <?php
                                include_once "./conexao.php";
                                try {
                                    

                                    $connect = new PDO("mysql:host=$server;dbname=" . $dbname, $user, $passwd);
                                    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                
                                    $consulta = $connect->query("SELECT vet_id, vet_nome FROM veterinarios");
                                    while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
                                        echo "<option value='" . $linha['vet_id'] . "'>" . $linha['vet_nome'] . "</option>";
                                    }
                                
                                    $connect = null; // Fechar a conexão
                                } catch (PDOException $e) {
                                    die("Erro na conexão: " . $e->getMessage());
                                }
                            ?>
                        </select>
                    </div>

                    <label for="imagem">Selecione a imagem</label>
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
