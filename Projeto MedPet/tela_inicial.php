<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela Inicial</title>
    <link rel="stylesheet" href="css/estilo_geral.css">
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.9/index.global.min.js'></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, { 
          initialView: 'timeGridDay',
          selectable : true,
          dayMaxEvents: true,
          dayMaxEventRows: true,
          locale: 'pt-br',
          views: {
            dayGridMonth:{
              dayMaxEvents: 3,
              dayMaxEventRows:3
            }

          },
          headerToolbar:{
            center: 'eventButton1 eventButton2' 
          },
          buttonText:{
            today: 'Hoje'
          },
          customButtons:{
            eventButton1:{
              text: 'Mudar Formato',
              click: function(){
                if(calendar.view.type =='dayGridMonth'){
                  calendar.changeView('listWeek');
                }else if(calendar.view.type =='listWeek'){ 
                  calendar.changeView('timeGridDay');
                }else if(calendar.view.type =='timeGridDay'){
                  calendar.changeView('dayGridMonth');
                }
              }
            },
            eventButton2:{
              text: 'Agendar Evento',
              click: function(){
                let divForm = document.getElementById("evento");
                let titulo = document.getElementById("titulo");
                let data = document.getElementById("data");
                let botao = document.getElementById("botao");
                divForm.style.display="block";
                botao.addEventListener("click", function(){
                  titulo = titulo.value;
                  data = data.value;
                  if(titulo!=null && data!=null){
                    calendar.addEvent({
                      title: titulo,
                      start: data
                    });
                  }
                });  
              }
            }
          },
          events: [

          {
            title:'Evento1',
            start:'2023-10-26T12:30:00',
            end:'2023-10-26T15:30:00'

          }, 
          {
            title:'Evento2',
            start:'2023-10-26T09:30:00',
            end:'2023-10-26T11:30:00'

          },
          {
            title:'Evento3',
            start:'2023-10-26',
            end:'2023-10-26'

          },
          {
            title:'Evento4',
            start:'2023-10-26T16:00:00',
            end:'2023-10-26T18:30:00'

          },
          {
            title:'Evento5',
            start:'2023-10-26',
            end:'2023-10-26'

          },
      
        ],
        });
        calendar.render();
        });
    </script>
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
            <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST" id="form">
                <fieldset>
                    <legend>Cadastrar Evento</legend>
                    <label for="titulo">Titulo: </label>
                    <input type="text" name="titulo" id="titulo">
                    <label for="data">Data de Inicio: </label>
                    <input type="date" name="data" id="data">
                    <label for="data">Data de Fim: </label>
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
            <p>Ideia: Colocar uma lista de animais aqui. Claro que o que for mostrado, tem que estar de acordo com suas respectivas relações a nivel de DB. Cada animal tem sua própria "agenda", com os horários e td mais. Ao clicar em cada animal, os eventos no calendário tem que mudar de acordo.</p>
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
