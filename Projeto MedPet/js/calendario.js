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
    
