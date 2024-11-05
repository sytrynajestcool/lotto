<?php
class Lotto {
    private $min;
    private $max;
    private $quantity;

    public function __construct($min = 1, $max = 49, $quantity = 6) {
        $this->min = $min;
        $this->max = $max;
        $this->quantity = $quantity;
    }

    public function generateNumbers() {
        $numbers = [];
        while (count($numbers) < $this->quantity) {
            $number = rand($this->min, $this->max);
            if (!in_array($number, $numbers)) {
                $numbers[] = $number;
            }
        }
        return $numbers;
    }

    public function checkMatches($userNumbers, $randomNumbers) {
        return array_intersect($userNumbers, $randomNumbers);
    }

    public function calculatePrize($numberOfMatches) {
        switch ($numberOfMatches) {
            case 6:
                return "1 000 000 zł";
            case 5:
                return "50 000 zł";
            case 4:
                return "5 000 zł";
            case 3:
                return "500 zł";
            default:
                return "0 zł";
        }
    }
}

// Tworzenie obiektu Lotto
$lotto = new Lotto();

// Tablica liczb użytkownika (przykładowe dane, powinny być wprowadzone przez użytkownika)
$userNumbers = [1, 2, 3, 4, 5, 6]; // Przykładowe liczby użytkownika

// Generowanie losowych liczb
$randomNumbers = $lotto->generateNumbers();

// Sprawdzanie trafień
$matches = $lotto->checkMatches($userNumbers, $randomNumbers);
$numberOfMatches = count($matches);

// Obliczanie nagrody
$prize = $lotto->calculatePrize($numberOfMatches);

// Wyświetlanie wyników
echo "Wylosowane liczby: " . implode(", ", $randomNumbers) . "<br>";
echo "Twoje liczby: " . implode(", ", $userNumbers) . "<br>";
echo "Trafiłeś " . $numberOfMatches . " liczb(y).<br>";
echo "Twoja wygrana: " . $prize;
?>
