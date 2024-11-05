<?php
require 'db_connect.php';
require 'Lotto.php';

// Tablica liczb użytkownika
$userNumbers = $_POST['userNumbers']; 
$randomNumbers = [];

    // Utwórz obiekt Lotto
$lotto = new Lotto();

// Wygeneruj losowe liczby
$randomNumbers = $lotto->generateNumbers();

// Sprawdź trafienia
$matches = $lotto->checkMatches($userNumbers, $randomNumbers);
$numberOfMatches = count($matches);

// Sprawdź, czy liczby są unikalne
if (count($userNumbers) !== count(array_unique($userNumbers))) {
    echo "Liczby muszą być unikalne!";
    exit();
}


// Generowanie 6 unikalnych liczb losowych
while (count($randomNumbers) < 6) { // działa do póki nie będzie więcej niż 6 liczb
    $number = rand(1, 49); // generuje random liczby
    if (!in_array($number, $randomNumbers)) { // sprawdza czy ta liczba nie jest w tablicy
        $randomNumbers[] = $number;
    }
}

// Wyświetlanie wyników
echo "Twoje liczby: " . implode(", ", $userNumbers) . "<br>"; // wyświetla liczby użytkownika
echo "Wylosowane liczby: " . implode(", ", $randomNumbers) . "<br>"; // wyświetla liczby generowane

$matches = array_intersect($userNumbers, $randomNumbers); // zapisuje w matches i porównuje liczby
$numberOfMatches = count($matches); // liczy trafienia

echo "Trafiłeś " . $numberOfMatches . " liczb(y): " . implode(", ", $matches) . "<br>"; // informuje jakie liczby wylosowano

if ($numberOfMatches == 6) { // sprawdzanie czy trafiło się 6 liczb
    echo "Gratulacje! Wygrałeś główną nagrodę!";
} elseif ($numberOfMatches == 5) { // sprawdzanie czy trafiło się 5 liczb
    echo "Wygrałeś drugą nagrodę!";
} elseif ($numberOfMatches >= 3) { // sprawdzanie czy trafiło się 3 liczby
    echo "Wygrałeś nagrodę pocieszenia!";
} else {
    echo "Niestety, nie wygrałeś. Spróbuj ponownie.";
}

// Konwertuj tablice liczb na ciągi znaków
$userNumbersStr = implode(",", $userNumbers);
$randomNumbersStr = implode(",", $randomNumbers);
$matchesCount = $numberOfMatches;

// Przygotuj zapytanie SQL
$sql = "INSERT INTO results (user_numbers, random_numbers, matches) VALUES (:user_numbers, :random_numbers, :matches)";

// Przygotuj zapytanie do wykonania
$stmt = $pdo->prepare($sql);

// Powiąż parametry
$stmt->bindParam(':user_numbers', $userNumbersStr);
$stmt->bindParam(':random_numbers', $randomNumbersStr);
$stmt->bindParam(':matches', $matchesCount);

// Wykonaj zapytanie
$stmt->execute();
?>

