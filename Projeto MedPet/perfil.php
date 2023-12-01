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
    <script src="js/calendario.js" defer></script>

</head>

<body class="bgcolor">
    <header>
        <div class="navbar mainscr">
            <div>
                <a href="tela_inicial.php"><img src="css/imagens/logona sem nome.jpeg" alt="logo.png"></a>
            </div>
            <button id="calendario_btn">Calendário</button>
            <button id="perfil_btn">Perfil</button>
            <?php if($_SESSION['tut']){?>
                <button id="cadastrarAnimal">Cadastrar Animal</button>
            <?php }else{?>
                <button id="evento_btn">Cadastrar Evento</button>
            <?php }?>
            <button id="logoff">Logout</button>          
        </div>
    </header> 

<div id="perfil" class="linha"> 
    <div class="coluna meio">
        <h2>Perfil</h2> 

        <div>
            <?php
            include_once "listar_info_perfil.php";
            foreach($array as $chave => $valor) {
                extract($valor);
                ?><p> <?php echo $tut_nome; ?> </p>
                <p><?php echo $tut_email;?></p>
                <p><?php echo $tut_fone;?></p>
                
            <?php 
            }?>
            
        </div>
    <div class="coluna canto">   
    <table border="1" width="100%">
        <?php
        include_once "listar_animais.php";
        foreach ($array as $item) {
            ?>
            <tr>
                <td> <img height='125' src="<?php echo 'imagens/' . $item['arquivo']; ?>"></td>
                <td id="perfil_anim"><?php echo $item['nome']; ?></td>
            </tr>
            <?php
        }
        ?>
    </table>
        
    </div>
            
    </div>
</div>
</body>
</html>
