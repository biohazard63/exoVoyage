<?php
session_start(); // Démarrez la session

?>

<div class="sidebar">
    <img id="avatar" src="../../img/thumb2-scary-skull-4k-minimal-creative-artwork.jpg" alt="avatar">
    <?php
    // Vérifiez si l'utilisateur est connecté
    if (isset($_SESSION['username']) && isset($_SESSION['group_name'])) {
echo "<p>Connecté : " . $_SESSION['username'] . " (" . $_SESSION['group_name'] . ")</p>";//
//        echo "<p>Role : " . $_SESSION['group_name'] . "</p>";
    }
    ?>
    <hr>
    <ul class="nav">
        <li><a href="dashboard.php">Dashboard</a></li>
        <li><a href="voyage.php">Listes des Voyage</a></li>
        <li><a href="../controller/logout.php">Deconnexion</a></li>
    </ul>
</div>