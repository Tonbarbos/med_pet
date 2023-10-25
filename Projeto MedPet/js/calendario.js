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
      let form = document.querySelector("#form");
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
    
