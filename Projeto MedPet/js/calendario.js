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
                document.getElementById("evento").style.display="block";  
              }
            }
          },
          eventClick: function(info) {
            var tooltip = new Tooltip(info.el, {
              title: info.event.extendedProps.description,
              placement: 'top',
              trigger: 'hover',
              container: 'body'
            });
          },          
          events:'listar_eventos.php'

        });
        calendar.render();
      });

document.getElementById("calendario").addEventListener("click", function (){
  document.getElementById("calendar").classList.toggle("none");

});
document.getElementById("cadastrarAnimal").addEventListener("click", function(){
  window.location.href="cadastro_animal.php";
});
document.getElementById("logout").addEventListener("click", function(){
  window.location.replace("logoff.php");
});
var divForm = document.getElementById("evento");
window.onclick = function(event) {
  if (event.target == divForm) {
    divForm.style.display = "none";
  }
}

    
