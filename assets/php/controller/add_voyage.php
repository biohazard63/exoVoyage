<?php
session_start();
ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once '../db/config.php';

$db = new Database();
$conn = $db->connect();

var_dump($conn); // Affiche l'état de la connexion à la base de données

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les détails du voyage à partir du formulaire
    $titel = $_POST['titel'];
    $image_url = $_POST['image_url'];
    $description = $_POST['description'];
    $date_start = $_POST['date_start'];
    $date_end = $_POST['date_end'];
    $price = $_POST['price'];
    $category_id = $_POST['category_id'];
    $formula_id = $_POST['formula_id'];

    // Préparer la requête SQL
    $stmt = $conn->prepare("INSERT INTO travel (titel, image_url, description, date_start, date_end, price, category_id, formula_id) VALUES (:titel, :image_url, :description, :date_start, :date_end, :price, :category_id, :formula_id)");

    // Lier les paramètres
    $stmt->bindParam(':titel', $titel);
    $stmt->bindParam(':image_url', $image_url);
    $stmt->bindParam(':description', $description);
    $stmt->bindParam(':date_start', $date_start);
    $stmt->bindParam(':date_end', $date_end);
    $stmt->bindParam(':price', $price);
    $stmt->bindParam(':category_id', $category_id);
    $stmt->bindParam(':formula_id', $formula_id);

    // Exécuter la requête
    $stmt->execute();
// Définir le message de notification
    $_SESSION['notification'] = "Voyage ajouté avec succès !";
    // Rediriger l'utilisateur vers la page des voyages
    header("Location: ../template/voyage.php");
    exit;
}