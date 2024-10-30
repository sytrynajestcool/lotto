<?php
    $userNumbers = $_POST['userNumbers']; // Tablica liczb użytkownika
    $randomNumbers = [];

    // Generowanie 6 unikalnych liczb losowych
    while (count($randomNumbers) < 6) { // dziala do poki nie bedzie wiecej niz 6 liczb
        $number = rand(1, 49); //generuje random liczby
    if (!in_array($number, $randomNumbers)) { // sprawdza czy ta liczba nie jest w tablicy
        $randomNumbers[] = $number;
    }
    }

    echo "Twoje liczby: " . implode(", ", $userNumbers) . "<br>"; // wyswietla liczby uzytkownika
    echo "Wylosowane liczby: " . implode(", ", $randomNumbers) . "<br>"; // wyswietla liczby ygenerowane
    $matches = array_intersect($userNumbers, $randomNumbers); // zapisuje w matches i porownuje liczby
    $numberOfMatches = count($matches); // liczy trafienia

    echo "Trafiłeś " . $numberOfMatches . " liczb(y): " . implode(", ", $matches) . "<br>"; //informuje jakie liczby wylosowano

    if ($numberOfMatches == 6) { //sprawdzanie czy trafilo sie 6 liczb
        echo "Gratulacje! Wygrałeś główną nagrodę!";
    } elseif ($numberOfMatches == 5) { // sprawdzanie czy trafilo sie 5 liczb
        echo "Wygrałeś drugą nagrodę!";
    } elseif ($numberOfMatches >= 3) { // sprawdzanie czy trafilo sie 3 liczb
        echo "Wygrałeś nagrodę pocieszenia!";
    } else {
        echo "Niestety, nie wygrałeś. Spróbuj ponownie.";
    }
?>
