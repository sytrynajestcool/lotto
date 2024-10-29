<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOTTO</title>
</head>
<body>

    <h1>Witaj w symulatorze lotto!</h1><br>
    <form action="process.php" method="post">
    <label>wybierz swoja liczbe</label><br>
    <input type="number" name="userNumber" min="1" max="49" required>
    <input type="submit" value="zagraj">


</body>
</html>