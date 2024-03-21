<?php
require_once '../db/config.php';

// Récupérer l'ID du voyage à supprimer
$data = json_decode(file_get_contents('php://input'), true);
$id = $data['id'];

$db = new Database();
$conn = $db->connect();

// Exécuter la requête SQL pour supprimer le voyage
$sql = "DELETE FROM travel WHERE id_travel = ?";
$stmt = $conn->prepare($sql);
$success = $stmt->execute([$id]);

// Envoyer une réponse JSON
header('Content-Type: application/json');
echo json_encode(['success' => $success]);