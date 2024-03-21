<?php

require_once '../db/config.php';

$db = new Database();
// Inclure le fichier de configuration
$conn = $db->connect();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les détails du voyage à partir du formulaire
    $title = $_POST['title'];
    $description = $_POST['description'];
    $date = $_POST['date'];
    $category_id = $_POST['category_id'];
    $formula_id = $_POST['formula_id'];

    // Préparer la requête SQL
    $stmt = $conn->prepare("INSERT INTO travel (destination, date, category_id, formula_id) VALUES (:title, :date, :category_id, :formula_id)");

    // Lier les paramètres
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':date', $date);
    $stmt->bindParam(':category_id', $category_id);
    $stmt->bindParam(':formula_id', $formula_id);

    // Exécuter la requête
    $stmt->execute();

    // Rediriger l'utilisateur vers la page des voyages
    header("Location: ../../voyage.php");
    exit;
}