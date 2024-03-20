document.addEventListener('DOMContentLoaded', function() {
    // Définir le style display de .nav à none lorsque la page est chargée
    document.querySelector('.nav').style.display = 'none';

    document.querySelector('.burger').addEventListener('click', function() {
        document.querySelector('.nav').style.display = document.querySelector('.nav').style.display === 'none' ? 'block' : 'none';
    });
});

var modal = document.getElementById("myModal");
var btn = document.getElementsByClassName("add")[0];
var span = document.getElementsByClassName("close")[0];
var editButtons = document.getElementsByClassName("edit");

for (var i = 0; i < editButtons.length; i++) {
    editButtons[i].onclick = function() {
        document.getElementById("destination").value = this.getAttribute("data-destination");
        document.getElementById("date").value = this.getAttribute("data-date");
        modal.style.display = "block";
    }
}

btn.onclick = function() {
  modal.style.display = "block";
}

span.onclick = function() {
  modal.style.display = "none";
}

window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}