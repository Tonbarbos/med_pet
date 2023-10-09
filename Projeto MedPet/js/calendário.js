function criarEvento(info){
  
}
document.addEventListener('DOMContentLoaded', function() {
  var calendarEl = document.getElementById('calendar');
  var calendar = new FullCalendar.Calendar(calendarEl, {
    selectable : true,
    selectAllow: function(selectInfo){
      selectInfo.start=info.dateStr;
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
    dateClick : function(info){
      var titulo;
      do{
        titulo = prompt('titulo:');
      }while(titulo=='');
      if(titulo!=null){
        calendar.addEvent({
          title: titulo,
          start: info.dateStr
        });
      }
      
    }
  });
  calendar.render();
});
    
