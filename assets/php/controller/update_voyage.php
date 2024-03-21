<?php
session_start();

require_once '../db/config.php';

$db = new Database();
$conn = $db->connect();

// Récupérer les informations du voyage à partir des données du formulaire
$id = $_POST['id'];
var_dump($id);
$titel = $_POST['titel'];
var_dump($titel);
$image_url = $_POST['image_url'];
var_dump($image_url);
$description = $_POST['description'];
var_dump($description);
$date_start = $_POST['date_start'];
var_dump($date_start);
$date_end = $_POST['date_end'];
var_dump($date_end);
$price = $_POST['price'];
var_dump($price);
$category_id = $_POST['category_id'];
var_dump($category_id);
$formula_id = $_POST['formula_id'];
var_dump($formula_id);

// Exécuter la requête SQL pour mettre à jour le voyage
$sql = "UPDATE travel SET titel = ?, image_url = ?, description = ?, date_start = ?, date_end = ?, price = ?, category_id = ?, formula_id = ? WHERE id_travel = ?";
$stmt = $conn->prepare($sql);
$stmt->execute([$titel, $image_url, $description, $date_start, $date_end, $price, $category_id, $formula_id, $id]);

// Rediriger vers la page des voyages avec une notification de mise à jour
header('Location: ../template/voyage.php?updated=true');
?>