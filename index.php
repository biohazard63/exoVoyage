<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Rediriger l'utilisateur vers le tableau de bord
    header("Location: assets/php/template/dashboard.php");
    exit;
}
?>

<!DOCTYPE html >
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JCP Voyage</title>
    <link rel="stylesheet" type="text/css" href="./assets/css/style.css">
</head>
<body>
<!--formulaire de connexion (user,password)-->
<form method="post">
    <div class="container">
        <h1>Connexion</h1>
        <hr>
        <label for="email"><b>Email</b></label>
        <input type="text" placeholder="Entrer le nom d'utilisateur" name="email" required>
        <label for="psw"><b>Mot de passe</b></label>
        <input type="password" placeholder="Entrer le mot de passe" name="psw" required>
        <hr>
        <button type="submit" class="registerbtn">Connexion</button>
    </div>
</form>
</body>
</html>