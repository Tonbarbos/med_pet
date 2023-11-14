
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
            <?php
                if(isset($_POST['envia-form'])){
                    $nome = $_POST['nome'];
                    $especie = $_POST['especie'];
                    $genero = $_POST['genero'];
                    $tipo_sang = $_POST['tipo_sang'];   
                    $reg = array("options"=>array("regexp"=>"/^[a-zA-Z] \s /"));
                    
                    if(!filter_var($nome, FILTER_VALIDATE_REGEXP,$reg)){		  
                        echo "Nome invalido";
                    }
                }
                if(isset($_FILES["imagem"]) && !empty($_FILES["imagem"])){
                    move_uploaded_file($_FILES["imagem"]["tmp_name"], "./imagens".$_FILES["imagem"]["name"]);
                    echo"imagem enviada com sucesso";
                }
            ?>


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
                    
                    <div>Para incluir as fotos TESTE</div>
                    <form action="./cadastro_animal.php" method="post" enctype="multipart/form-data">
                        <label>Selecione a imagem</label>
                        <input type="file" name="imagem" accept="image/*" class="form-control"/>
                        <button type="submit" class="btn btn-success">
                            Enviar imagem
                        </button>    
                    </form>
                    </div>    
                    <div class="login-button">        
                        <button type="submit"><a href="">Cadastrar</a></button>
                </div>
            </div>
            </form>
        </div>
    </div>
    
