<?php
    require 'db_connect.php';

    // Pobierz wszystkie wyniki z bazy danych
    $sql = "SELECT * FROM results ORDER BY date DESC";
    $stmt = $pdo->query($sql);

    // Wyświetl wyniki w tabeli HTML
        echo "<h2>Historia Gier</h2>";
        echo "<table border='1' cellpadding='5' cellspacing='0'>";
        echo "<tr><th>Data</th><th>Twoje Liczby</th><th>Wylosowane Liczby</th><th>Trafienia</th></tr>";

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>";
        echo "<td>" . $row['date'] . "</td>";
        echo "<td>" . $row['user_numbers'] . "</td>";
        echo "<td>" . $row['random_numbers'] . "</td>";
        echo "<td>" . $row['matches'] . "</td>";
        echo "</tr>";
    }   

        echo "</table>";
?>
