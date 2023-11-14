<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/login.css">
    <script src="js/auth.js" defer></script>
</head>
<body>
    <div class="container">
        <div class="form">
        <?php
                if(isset($_POST['envia-form'])){
                    $email = $_POST['email'];
                    $senha = $_POST['senha'];    
                    $reg = array("options"=>array("regexp"=>"/^[a-zA-Z]/"));
                    // if($email!==emailNoBanco){		  
                    //     tratar entrada
                    // }
                    // if($senha!==senhaNoBanco){
                    //     tratar entrada
                    // }
                }
            ?>
            <legend><img src="css\imagens\logona.png" alt="logona.png"></legend>
            <div class="form-header">
                    <div class="title">
                        <n>Login</n>
                    </div>
            </div>
            <form action="logon.php" method="post">
                <div class="input-group">
                    <div class="input-box"> 
                        <label for="email"></label>
                        <input type="email" name="email" id="email" placeholder="Email" required>
                        <label for="passwd"></label>
                        <input type="password" name="senha" id="passwd" placeholder="Senha" required> 
                    </div>
                </div>   
                    <a class="a" href="cadastro.php">Não é cadastrado? Cadastre-se!</a>
                <div class="login-button">        
                    <button type="submit" name="envia-form">Login</button>
                </div>
            </form>
        </div>
    </div>
    
</body>
</html>
