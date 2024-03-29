<?php
session_start();

require_once '../db/config.php';

$db = new Database();
$conn = $db->connect();

// Exécuter la requête SQL pour sélectionner tous les voyages
$sql = "SELECT * FROM travel";
$stmt = $conn->prepare($sql);
$stmt->execute();

// Récupérer tous les voyages
$voyages = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Vérifier si un voyage a été supprimé
if (isset($_GET['deleted']) && $_GET['deleted'] == 'true') {
    $_SESSION['notification'] = "Voyage supprimé avec succès !";
}
// Vérifier si un voyage a été mis à jour
if (isset($_GET['updated']) && $_GET['updated'] == 'true') {
    $_SESSION['notification'] = "Voyage mis à jour avec succès !";
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>JCP Voyage</title>
    <link rel="stylesheet" type="text/css" href="../../css/style.css">
</head>
<body>
<?php
include 'nav.php';
?>
<div class="content">
    <?php echo '<h2> liste des voyage </h2>'; ?>

    <?php
    // Afficher le message de notification s'il existe
    if (isset($_SESSION['notification'])) {
        echo '<div class="notification">' . $_SESSION['notification'] . '</div>';

        // Supprimer le message de notification
        unset($_SESSION['notification']);
    }
    ?>

    <button class="add"> Ajouter un voyage + </button>


    <div class="tableauTravel">
        <table>
            <tr>
                <th>Id</th>
                <th>Destination</th>
                <th>description</th>
                <th>image</th>
                <th>Date</th>
                <th>Price</th>
                <th>category</th>
                <th>formule</th>
                <th>Action</th>
            </tr>
           <?php
// Parcourir tous les voyages et les afficher dans le tableau
foreach ($voyages as $voyage) {
    echo '<tr>';
    echo '<td>' . $voyage['id_travel'] . '</td>';
    echo '<td>' . $voyage['titel'] . '</td>';
    echo '<td>' . $voyage['description'] . '</td>';
    // Utiliser le chemin de l'image comme source de l'élément img
    echo '<td><img src="' . $voyage['image_url'] . '" alt="' . $voyage['titel'] . '"></td>';
    echo '<td>' . $voyage['date_start'] . ' - ' . $voyage['date_end'] . '</td>';
    echo '<td>' . $voyage['price'] . ' €</td>';
    echo '<td>' . $voyage['category_id'] . '</td>';
    echo '<td>' . $voyage['formula_id'] . '</td>';
    echo '<td><button class="add edit" data-id="' . $voyage['id_travel'] . '" data-destination="' . $voyage['titel'] . '" data-image_url="' . $voyage['image_url'] . '" data-description="' . $voyage['description'] . '" data-date="' . $voyage['date_start'] . ' - ' . $voyage['date_end'] . '" data-price="' . $voyage['price'] . '" data-category_id="' . $voyage['category_id'] . '" data-formula_id="' . $voyage['formula_id'] . '">Modifier</button>  <button class="add delete" data-id="' . $voyage['id_travel'] . '">Supprimer</button></td>';
    echo '</tr>';
}
?>
        </table>
    </div>
    <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
<!--            @TODO: au lieux j'ajouter une url a img faire en sorte d'enregistrais une une img(jpg, png)-->
            <form method="post" action="../controller/add_voyage.php" enctype="multipart/form-data">
                <input type="hidden" id="id" name="id">
                <label for="titel">Titre du voyage:</label><br>
                <input type="text" id="titel" name="titel" required><br>
                <label for="image">Image du voyage:</label><br>
                <input type="file" id="image" name="image" required><br>
                <label for="description">Description:</label><br>
                <textarea id="description" name="description" required></textarea><br>
                <label for="date_start">Date de début du voyage :</label><br>
                <input type="date" id="date_start" name="date_start" required><br>
                <label for="date_end">Date de fin du voyage:</label><br>
                <input type="date" id="date_end" name="date_end" required><br>
                <label for="price">Prix :</label><br>
                <input type="number" step="0.01" id="price" name="price" required><br>
                <label for="category_id">Catégorie:</label><br>
                <select id="category_id" name="category_id" required></select>
                <label for="formula_id">Formule:</label><br>
                <select id="formula_id" name="formula_id" required></select><br>
                <input type="submit" value="Ajouter">
            </form>
        </div>
    </div>
</div>
<script src="../../js/script.js"></script>
<script src="../../js/fetch_categories_and_formulas.js"></script>
</body>
</html>