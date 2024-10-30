<!DOCTYPE html>  
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOTTO</title>
</head>
<body>

    <form action="process.php" method="post"> <!-- formuarz wysylajacy dane metoda post do process.php-->
        <label> Wybierz 6 liczb </label><br>
            <?php for ($i = 1; $i <= 6; $i++): ?> <!-- petla powtarzajaca sie 6 razy -->
                <input type="number" name="userNumbers[]" min="1" max="49" required><br> <!-- pole do wpisania libcz -->
            <?php endfor; ?> <!-- zakonczenie petli -->
        <input type="submit" value="graj">
    </form>
    
</body>
</html>