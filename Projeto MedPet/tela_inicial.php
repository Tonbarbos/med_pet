<?php session_start();
include_once "./conexao.php";
?>
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
            <div><button id="calendario">Calendário</button></div>
            <?php if($_SESSION['tut']){?><div><button id="cadastrarAnimal">Cadastrar Animal</button></div><?php }else{?><div><button id="alguma_coisa">botao alter</button></div><?php }?>
            <div><button id="logout">Logout</button></div>
                
            
            
              
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
                <input type="date" name="dat_ini" id="datetime-local">
                <label for="data">Data de Fim: </label>
                <input type="date" name="dat_fim" id="datetime-local">
                <label for="desc">Detalhes: </label>
                <textarea name="desc" id="desc"></textarea>
                <?php if($_SESSION['tut']){?>
                    <div class="box">
                        <label for = "selecaoVeterinarios">Selecione o veterinário</label>
                        <select name="selecaoVeterinarios">
                            <?php
                                include_once "listar_vet_opcoes.php";
                                
                            ?>
                        </select>
                    </div>
                    <?php }else if($_SESSION['vet']){?>
                        <div class="box">
                        <label for = "selecaoTutores">Selecione o Tutor</label>
                        <select name="selecaoTutores">
                            <?php
                                include_once "listar_tut_opcoes.php";
                                
                            ?>
                        </select>
                    </div>
                        
                        <?php }?>
                <div class="box">
                <label for = "selecaoAnimal">Selecione o Animal</label>
                <select name="selecaoAnimal">
                    <?php
                        include_once "listar_anim_opcoes.php";
                        
                    ?>
                </select>
                </div>
            </fieldset>
            <button type="submit" id="botao" name="envia-form">Adicionar</button>
        </form>
        </div>
        
        <div id="calendar"></div>
        </div>
        

    <div class="coluna canto">   
    <?php if($_SESSION['vet']){echo "Bem Vindo(a), ".$_SESSION['nome_vet'];}else if($_SESSION['tut']){echo "Bem Vindo(a), ".$_SESSION['nome_tut'];}?>

        <table border="1" width="100%">
            <?php
            include_once "listar_animais.php";
            foreach($array as $chave => $valor){
                extract($valor);
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