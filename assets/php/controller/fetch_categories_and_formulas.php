<?php
// Inclure le fichier de configuration
$conn = new PDO('mysql:host=localhost;dbname=exo_voyage;charset=utf8', 'root', '');


// Récupérer les catégories
$stmt = $conn->prepare("SELECT * FROM category");
$stmt->execute();
$categories = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Récupérer les formules
$stmt = $conn->prepare("SELECT * FROM formula");
$stmt->execute();
$formulas = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Envoyer les catégories et les formules en JSON
header('Content-Type: application/json');
echo json_encode(['categories' => $categories, 'formulas' => $formulas]);
