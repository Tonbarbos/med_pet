var botaoCalen = document.getElementById("calendario");
var botaoAnim = document.getElementById("animais");
botaoCalen.addEventListener("click", function (){
  document.getElementById("calendar").classList.toggle("none");

});
document.getElementById("cadastrarAnimal").addEventListener("click", function(){
  window.location.href = "cadastro_animal.php";
});
document.getElementById("logout").addEventListener("click", function(){
  window.location.href = "login.php";
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
    
