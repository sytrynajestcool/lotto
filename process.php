<?php
    $userNumbers = $_POST['userNumbers']; // Tablica liczb użytkownika
    $randomNumbers = [];

    // Generowanie 6 unikalnych liczb losowych
    while (count($randomNumbers) < 6) {
        $number = rand(1, 49);
    if (!in_array($number, $randomNumbers)) {
        $randomNumbers[] = $number;
    }
    }

    echo "Twoje liczby: " . implode(", ", $userNumbers) . "<br>";
    echo "Wylosowane liczby: " . implode(", ", $randomNumbers) . "<br>";
    $matches = array_intersect($userNumbers, $randomNumbers);
    $numberOfMatches = count($matches);

    echo "Trafiłeś " . $numberOfMatches . " liczb(y): " . implode(", ", $matches) . "<br>";

    if ($numberOfMatches == 6) {
        echo "Gratulacje! Wygrałeś główną nagrodę!";
    } elseif ($numberOfMatches == 5) {
        echo "Wygrałeś drugą nagrodę!";
    } elseif ($numberOfMatches >= 3) {
        echo "Wygrałeś nagrodę pocieszenia!";
    } else {
        echo "Niestety, nie wygrałeś. Spróbuj ponownie.";
    }
?>
