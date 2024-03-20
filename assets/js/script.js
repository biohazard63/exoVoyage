document.addEventListener('DOMContentLoaded', function() {
    // Définir le style display de .nav à none lorsque la page est chargée
    document.querySelector('.nav').style.display = 'none';

    document.querySelector('.burger').addEventListener('click', function() {
        document.querySelector('.nav').style.display = document.querySelector('.nav').style.display === 'none' ? 'block' : 'none';
    });
});