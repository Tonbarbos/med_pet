<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel="stylesheet" href="css/registro.css">
    <script src="js/auth.js" defer></script>
</head>
<body class="bgcolor">

   
    <div class="form">
    <?php
                if(isset($_POST['envia-form'])){
                    $nome = $_POST['nome'];
                    $email = $_POST['email'];
                    $senha = $_POST['senha'];
                    $confirm = $_POST['confpasswd'];   
                    $reg = array("options"=>array("regexp"=>"/^[a-zA-Z] \s /"));
                    
                    if(!filter_var($nome, FILTER_VALIDATE_REGEXP,$reg)){		  
                        echo "Nome invalido";
                    }
                    if(!filter_input(INPUT_POST,'email',FILTER_VALIDATE_EMAIL)){		  
                        echo "email invalido";
                    }
                }
            ?>
        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
            <div class="title">
                <h1>Cadastro</h1>
            </div>
            <div class="input-radio">
                <fieldset>
                <h3>Tipo de conta:</h3>
                    <div><label for="vet">Veterinário</label>
                        <input type="radio" name="tipo" id="vet" value="veterinário">
                    </div>
                    <div>
                        <label for="tut">Tutor</label>
                        <input type="radio" name="tipo" id="tut" value="tutor">
                    </div>    
                </div> 

                </fieldset>
                    
                <div class="input-group">
                    <div class="input-box">
                        <label for="nome">Nome: </label>
                        <input type="text" name="nome" id="nome" placeholder="Nome" required>
                        <label for="data">Data de Nascimento: </label>
                        <input type="date" name="data" id="data">
                        <label for="email">E-mail: </label>
                        <input type="email" name="email" id="email" placeholder="Email">
                        <label for="passwd">Senha: </label>
                        <input type="password" name="passwd" id="passwd">
                        <label for="confpasswd">Confirmar Senha: </label>
                        <input type="password" name="confpasswd" id="confpasswd">
                    </div>

                 
                <div class="login-button">        
                    <button type="submit"><a href="">Cadastrar</a></button>
            </div>
        </form>  
    </div>


    
</body>
</html>
