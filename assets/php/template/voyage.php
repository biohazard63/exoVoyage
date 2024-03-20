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

    <div class="tableauTravel">
        <table>
            <tr>
                <th>Id</th>
                <th>Destination</th>
                <th>Date</th>
                <th>Action</th>
            </tr>
            <?php
            // Pour l'instant, je vais utiliser un tableau de données fictives.
            $voyages = [
                ['id' => 1, 'destination' => 'Paris', 'date' => '2022-01-01'],
                ['id' => 2, 'destination' => 'Londres', 'date' => '2022-02-01'],
                ['id' => 3, 'destination' => 'Madrid', 'date' => '2022-03-01'],
                ['id' => 4, 'destination' => 'Rome', 'date' => '2022-04-01'],
                ['id' => 5, 'destination' => 'Berlin', 'date' => '2022-05-01'],
                ['id' => 6, 'destination' => 'Amsterdam', 'date' => '2022-06-01'],
                ['id' => 7, 'destination' => 'Lisbonne', 'date' => '2022-07-01'],
                ['id' => 8, 'destination' => 'Bruxelles', 'date' => '2022-08-01'],
                ['id' => 9, 'destination' => 'Prague', 'date' => '2022-09-01'],
                ['id' => 10, 'destination' => 'Vienne', 'date' => '2022-10-01'],
                ['id' => 11, 'destination' => 'Athènes', 'date' => '2022-11-01'],
                ['id' => 12, 'destination' => 'Budapest', 'date' => '2022-12-01'],
                ['id' => 13, 'destination' => 'Varsovie', 'date' => '2023-01-01'],
                ['id' => 14, 'destination' => 'Stockholm', 'date' => '2023-02-01'],
                ['id' => 15, 'destination' => 'Copenhague', 'date' => '2023-03-01'],
                ['id' => 16, 'destination' => 'Oslo', 'date' => '2023-04-01'],
                ['id' => 17, 'destination' => 'Helsinki', 'date' => '2023-05-01'],
                ['id' => 18, 'destination' => 'Dublin', 'date' => '2023-06-01'],
                ['id' => 19, 'destination' => 'Bucarest', 'date' => '2023-07-01'],
                ['id' => 20, 'destination' => 'Sofia', 'date' => '2023-08-01'],
                ['id' => 21, 'destination' => 'Nicosie', 'date' => '2023-09-01'],
                ['id' => 22, 'destination' => 'Tallinn', 'date' => '2023-10-01'],
                ['id' => 23, 'destination' => 'Riga', 'date' => '2023-11-01'],
                ['id' => 24, 'destination' => 'Vilnius', 'date' => '2023-12-01'],
                ['id' => 25, 'destination' => 'Luxembourg', 'date' => '2024-01-01'],
                ['id' => 26, 'destination' => 'Malte', 'date' => '2024-02-01'],
                ['id' => 27, 'destination' => 'La Valette', 'date' => '2024-03-01'],
                ['id' => 28, 'destination' => 'Nicosie', 'date' => '2024-04-01'],
                ['id' => 29, 'destination' => 'Bratislava', 'date' => '2024-05-01'],
                ['id' => 30, 'destination' => 'hells', 'date' => '2026-06-6'],


            ];

           foreach ($voyages as $voyage) {
    echo '<tr>';
    echo '<td>' . $voyage['id'] . '</td>';
    echo '<td>' . $voyage['destination'] . '</td>';
    echo '<td>' . $voyage['date'] . '</td>';
    echo '<td><a href="edit.php?id=' . $voyage['id'] . '">Edit</a> | <a href="delete.php?id=' . $voyage['id'] . '">Delete</a></td>';
    echo '</tr>';
}
            ?>
        </table>
    </div>
</div>
</body>
</html>