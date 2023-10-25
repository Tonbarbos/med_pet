<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela Inicial</title>
    <link rel="stylesheet" href="css/estilo_geral.css">
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.9/index.global.min.js'></script>
    <script src="js/calendario.js" defer></script>
    <script src="js/auth.js" defer></script>

</head>

<body class="bgcolor">
    <header>
        <div class="navbar mainscr">
            <div>
                <a href="tela_inicial.php"><img src="css/imagens/logona sem nome.jpeg" alt="logo.png"></a>
            </div>    
            <button id="calendario">Calendário</button>
            <button id="animais">Animais</button>
            <button id="cadastrarAnimal">Cadastrar Animal</button>  
        </div>
    </header> 
<div class="linha">
    <div class="coluna meio">
            <?php
                if(isset($_POST['envia-form'])){
                    $titulo = $_POST['titulo'];    
                    $reg = array("options"=>array("regexp"=>"/^[a-zA-Z]/"));
                    if($titulo!==null && !filter_var($titulo, FILTER_VALIDATE_REGEXP,$reg)){		  
                        echo "Entrada Inválida";
                    }
                }
            ?>
            <div id="evento" class="modal">
            <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST" id="form">
                <fieldset>
                    <label for="titulo">Titulo: </label>
                    <input type="text" name="titulo" id="titulo">
                    <label for="data">Data: </label>
                    <input type="date" name="data" id="data">
                    <label for="descr">Detalhes: </label>
                    <textarea name="descr" id="descr"></textarea>
                </fieldset>
                <button type="submit" id="botao" name="envia-form">Adicionar</button>
            </form>
            </div>
            
        <div id="calendar"></div>
        </div>

    <div class="coluna canto">
        <div>
            <img src="" alt="pfp.img">
            <div class="menu">
                <a href="#">Perfil</a>      
                <a href="sobre.php">Sobre</a>
                <a href="login.php">Logout</a>   
            </div>
        </div>
        
    </div>
    
</div>

        
 <footer>
    <div class="navbar rodape">      
        <a href="sobre.php">Sobre</a>
        <a href="#">Quem Somos</a>
        <a href="#">Fale Conosco</a>  
    </div>
 </footer>   
    
    
</body>
</html>
