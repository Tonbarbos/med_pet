document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, { 
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
            center: 'eventButton1' 
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
            }
          },
          eventClick: function(info) {
            document.getElementById("detalhes").style.display="block";
          },          
          events:'listar_eventos.php'

        });
        calendar.render();
      });

document.getElementById("logoff").addEventListener("click", function(){
  window.location.href="logoff.php";
});
document.getElementById("evento_btn").addEventListener("click", function(){
  document.getElementById("evento").style.display="block";  
});
if(!document.getElementById("cadastrarAnimal") == null){
  document.getElementById("cadastrarAnimal").addEventListener("click", function(){
    window.location.href="cadastro_animal.php";});
}

//clicar fora do form para fechar as janelas modais
window.onclick = function(event) {
  if (event.target == document.getElementById("evento")) {
    document.getElementById("evento").style.display = "none";
  }else if (event.target == document.getElementById("detalhes")) {
    document.getElementById("detalhes").style.display = "none";
}
}
    
