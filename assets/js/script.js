document.addEventListener('DOMContentLoaded', function () {

    var modal = document.getElementById("myModal");
    var btn = document.getElementsByClassName("add")[0];
    var span = document.getElementsByClassName("close")[0];
    var editButtons = document.getElementsByClassName("edit");

    for (var i = 0; i < editButtons.length; i++) {
        editButtons[i].onclick = function () {
            document.getElementById("destination").value = this.getAttribute("data-destination");
            document.getElementById("date").value = this.getAttribute("data-date");
            modal.style.display = "block";
        }
    }

    btn.onclick = function () {
        modal.style.display = "block";
    }

    span.onclick = function () {
        modal.style.display = "none";
    }

    window.onclick = function (event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }


    document.querySelectorAll('.delete').forEach(function (button) {
        button.addEventListener('click', function (e) {
            e.preventDefault();

            // Afficher une boîte de dialogue de confirmation
            if (confirm('Êtes-vous sûr de vouloir supprimer ce voyage ?')) {
                // Envoyer une requête AJAX pour supprimer le voyage
                fetch('../controller/delete_voyage.php', {
                    method: 'POST',
                    body: JSON.stringify({
                        id: this.dataset.id
                    }),
                    headers: {
                        'Content-Type': 'application/json'
                    }
                })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            // Supprimer la ligne du tableau
                            this.parentElement.parentElement.remove();

                            // Rediriger vers la page des voyages avec une notification de suppression
                            setTimeout(function () {
                                window.location.href = '../template/voyage.php?deleted=true';
                            }, 1000); // Attendre 1 seconde avant la redirection
                        } else {
                            alert('Une erreur est survenue lors de la suppression du voyage.');
                        }
                    });
            }
        });
    });

   document.querySelectorAll('.edit').forEach(function (button) {
    button.addEventListener('click', function (e) {
        e.preventDefault();

        // Récupérer les informations du voyage
        var id = this.dataset.id;
        var destination = this.dataset.destination;
        var image_url = this.dataset.image_url;
        var description = this.dataset.description;
        var date = this.dataset.date.split(' - ');
        var price = this.dataset.price;
        var category_id = this.dataset.category_id;
        var formula_id = this.dataset.formula_id;

        // Remplir le formulaire avec les informations du voyage
        document.getElementById('id').value = id;
        document.getElementById('titel').value = destination;
        // Ne pas définir la valeur de l'élément "image" car il s'agit d'un input de type file
        document.getElementById('description').value = description;
        document.getElementById('date_start').value = date[0];
        document.getElementById('date_end').value = date[1];
        document.getElementById('price').value = price;
        document.getElementById('category_id').value = category_id;
        document.getElementById('formula_id').value = formula_id;

        // Modifier l'action du formulaire
        document.querySelector('form').action = '../controller/update_voyage.php';

        // Afficher le formulaire
        modal.style.display = "block";
    });
});

});