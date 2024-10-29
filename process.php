<?php
    
    $userNumber = $_POST['userNumber'];
    $randomNumber = rand(1, 49);
    
    echo "twoja liczba: " . $userNumber . "<br>";
    echo "wylosowana liczba: " . $randomNumber . "<br>";

    if ($userNumber == $randomNumber) {
        echo "To twoj szczesliwy dzien!";
    } else {
        echo "Niestety, to twoj pechowy dzien!";
    }

?>