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

          
          events:'listar_eventos.php'

        });
        calendar.render();
      });
var botaoCalen = document.getElementById("calendario");
var botaoAnim = document.getElementById("animais");
botaoCalen.addEventListener("click", function (){
  document.getElementById("calendar").classList.toggle("none");

});
document.getElementById("cadastrarAnimal").addEventListener("click", function(){
  window.location.replace("cadastro_animal.php");
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

// <?phpif(isset($_POST['envia-form'])){
//   $titulo = $_POST['titulo'];    
//   $reg = array("options"=>array("regexp"=>"/[(a-zA-Z])(\s)]/")); 
//   if($titulo!==null && !filter_var($titulo, FILTER_VALIDATE_REGEXP,$reg)){ echo "Entrada Inválida";}}?>
    
