var botaoCalen = document.getElementById("calendario");
botaoCalen.addEventListener("click", function (){
  botaoCalen.classList.toggle("ativo");
  document.getElementById("calendar").classList.toggle("none");

});
document.getElementById("cadastrarAnimal").addEventListener("click", function(){
  window.location.href = "cadastro_bicho.php";
});
var divForm = document.getElementById("evento");
window.onclick = function(event) {
  if (event.target == divForm) {
    divForm.style.display = "none";
  }
}

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
      center: 'eventButton'
    },
    buttonText:{
      today: 'Hoje'
    },
    customButtons:{
      eventButton:{
        text: 'Mudar Formato',
        click: function(){
          if(calendar.view.type=='dayGridMonth'){
            calendar.changeView('listWeek');
          }else{ 
            calendar.changeView('dayGridMonth');
          }
          
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
    dateClick : function(info){
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
  });
  calendar.render();
});
    
