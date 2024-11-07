<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOTTO</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    
    <div class="container glass">
        <h1>LOTTO</h1>
        <hr>
    <form action="process.php" method="post"> <!-- formuarz wysylajacy dane metoda post do process.php-->
        <label> <h5><i>wybierz liczby</i></h5> </label><br>
            <?php for ($i = 1; $i <= 6; $i++): ?> <!-- petla powtarzajaca sie 6 razy -->
                <input type="number" name="userNumbers[]" min="1" max="49" required> <!-- pole do wpisania libczb -->
            <?php endfor; ?> <!-- zakonczenie petli -->
            <br>
            <br>
        <input type="submit" value="graj">
    </form>
    <p><a href="results.php"><h6>historia</h6></a></p>
    </div>
</body>
</html>