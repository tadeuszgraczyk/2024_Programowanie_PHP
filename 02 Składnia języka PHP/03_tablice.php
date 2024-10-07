<?php
/* ----------- Tablice ----------- */

/*
  Jeśli potrzebujesz przechowywać wiele wartości, możesz użyć tablic. Tablice zawierają „elementy”
*/

// Pojedyncza tablica liczb
$numbers = [1, 2, 3, 4, 5];

// Pojedyncza tablica wartości tekstowych
$colors = ['red', 'blue', 'green'];

// Używanie funkcji tablicy do tworzenia tablicy liczb
$numbers = [1, 2, 3, 4, 5];

// dodane elementu na końcu tablicy

$numbers[] = 99;

// Wypisywanie wartości z tablicy

echo $numbers[0];
echo '<hr>';
echo $numbers[3] + $numbers[4];
echo '<hr>';
// Możemy użyć print_r lub var_dump, aby zobaczyć zawartość tablicy
var_dump($numbers);
echo '<hr>';
print_r($numbers);
echo '<hr>';
/* ------ Tablica asocjacyjna ----- */

/*
 Tablice asocjacyjne pozwalają nam używać nazwanych kluczy do identyfikowania wartości.
*/

$colors = [
    1 => 'red',
    2 => 'green',
    3 => 'blue',
];

// echo $colors[1];

// łańcuch znaków jako klucz
$hex = [
    'red' => '#f00',
    'green' => '#0f0',
    'blue' => '#00f',
];

echo $hex['red'];
echo '<hr>';
var_dump($hex);
echo '<hr>';

/* ---- Tablice wielowymiarowe ---- */

/*
  Tablice wielowymiarowe są często używane do przechowywania danych w formacie tabeli.
*/

// Pojedyncza osoba
$osoba1 = [
    'imie' => 'Adam',
    'nazwisko' => 'Gruszka',
    'email' => 'adamgrucha@gmail.com',
];

// Tablica uzytkownicy

$uzytkownicy = [
    $osoba1, //   [...$osoba1]
    [
        'imie' => 'Jan',
        'nazwisko' => 'Kowalski',
        'email' => 'jankow@gmail.com',
    ],
    [
        'imie' => 'Jan',
        'nazwisko' => 'Nowak',
        'email' => 'jannowak@gmail.com',
    ],
];
echo '<hr>';
var_dump($uzytkownicy);

echo '<hr>';
// Dostęp do elementów tablicy dwuwymiarowej

echo $uzytkownicy[0]['imie'];
echo '<hr>';
echo $uzytkownicy[2]['email'];

echo '<hr>';
// Kodowanie do formatu JSON
var_dump(json_encode($uzytkownicy));

echo '<hr>';
// Odkodowanie z formatu JSON
$jsonobj = '{"imie":"Adam","nazwisko": "Gruszka","email":"adamgrucha@gmail.com"}';
var_dump(json_decode($jsonobj));
