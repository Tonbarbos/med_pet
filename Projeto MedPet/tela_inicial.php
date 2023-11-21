<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela Inicial</title>
    <link rel="stylesheet" href="css/estilo_geral.css">
    <script src="js/fullcalendar-6.1.9/packages/core/index.global.min.js" defer></script>
    <script src="js/fullcalendar-6.1.9/packages/daygrid/index.global.min.js" defer></script>
    <script src="js/fullcalendar-6.1.9/packages/timegrid/index.global.min.js" defer></script>
    <script src="js/fullcalendar-6.1.9/packages/list/index.global.min.js" defer></script>
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
            <button id="logout">Logout</button>  
        </div>
    </header> 
<div class="linha">
    <div class="coluna meio">
            
            <div id="evento" class="modal">
            <form action="criar_evento.php" method="POST" id="form">
                <fieldset>
                    <legend>Cadastrar Evento</legend>
                    <label for="titulo">Titulo: </label>
                    <input type="text" name="titulo" id="titulo">
                    <label for="data">Data de Inicio: </label>
                    <input type="date" name="dat_ini" id="data">
                    <label for="data">Data de Fim: </label>
                    <input type="date" name="dat_fim" id="data">
                    <label for="desc">Detalhes: </label>
                    <textarea name="desc" id="desc"></textarea>
                </fieldset>
                <button type="submit" id="botao" name="envia-form">Adicionar</button>
            </form>
            </div>
          
        <div id="calendar"></div>
        </div>

    <div class="coluna canto">   
    <?php echo $_SESSION['nome_tut'];//if(is_null($_SESSION['nome_vet'])){echo "Bem Vindo, ".$_SESSION['nome_tut'];}else if(is_null($_SESSION['nome_tut'])){echo "Bem Vindo, ".$_SESSION['nome_vet'];}?>

        <table border="1" width="100%">
            <?php
            include_once "listar_animais.php";
            while($linha = $preparar->fetch(PDO::FETCH_ASSOC)){
                extract($linha);
            ?>
        <tr><td>Animal:</td>
        <td><?php echo $nome;}?></td></tr> 
        </table>
    
    
        <div>
            
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