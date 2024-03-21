<?php

require_once '../db/config.php';
// Démarrer la session
session_start();

$db = new Database();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer le nom d'utilisateur et le mot de passe du formulaire
    $username = $_POST['username']; // Change 'username' to 'email'
    $password = $_POST['psw'];

    try {
        // Connexion à la base de données
        $conn = $db->connect();

        // Sélectionner l'utilisateur et le nom du groupe de la base de données
        $sql = "SELECT user.*, `group`.name AS group_name FROM user INNER JOIN `group` ON user.group_id = `group`.id WHERE username = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$username]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // Vérifier si l'utilisateur existe et si le mot de passe est correct
        if ($user && $password == $user['password']) {
            // Stocker l'ID de l'utilisateur, son rôle, son nom d'utilisateur et le nom du groupe dans la session
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['group_id'] = $user['group_id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['group_name'] = $user['group_name']; // Ajout du nom du groupe à la session

            // Vérifier si l'utilisateur a les droits d'accès au tableau de bord
            if ($user['group_id'] == 2 || $user['group_id'] == 3) {
                // Rediriger l'utilisateur vers le tableau de bord
                header("Location: ../template/dashboard.php");
                exit;
            } else {
                // Afficher un message d'erreur
                echo "Vous n'avez pas les droits d'accès au tableau de bord.";
            }
        } else {
            // Afficher un message d'erreur
            echo "Nom d'utilisateur ou mot de passe incorrect.";
        }
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
}