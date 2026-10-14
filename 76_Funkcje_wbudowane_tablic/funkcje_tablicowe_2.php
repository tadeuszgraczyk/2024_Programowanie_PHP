<?php
// Przykład funkcji wbudowanych do tablic w PHP 8.2
// Wszystkie poniższe funkcje działają w PHP 8.2

echo "=== 1. Tworzenie i podstawowe informacje ===<br>";

// Tworzenie tablic (składnia krótka [] dostępna od PHP 5.4)
$owoce = ["jabłko", "banan", "pomarańcza", "jabłko", "kiwi"];
$osoba = [
    "imie" => "Anna",
    "wiek" => 28,
    "miasto" => "Warszawa"
];

// count() / sizeof() – liczba elementów
echo "Liczba owoców: " . count($owoce) . "<br>";                 // 5
echo "Liczba pól osoby: " . count($osoba) . "<br>";               // 3

// is_array()
var_dump(is_array($owoce));                                    // true

// array_key_exists() vs isset()
var_dump(array_key_exists("wiek", $osoba));                    // true
var_dump(isset($osoba["email"]));                              // false

echo "<br>=== 2. Dodawanie i usuwanie elementów ===<br>";

$lista = ["a", "b"];

// Dodawanie na koniec
array_push($lista, "c", "d");                                  // ["a", "b", "c", "d"]
$lista[] = "e";                                                // skrót do array_push jednego elementu

// Dodawanie na początek
array_unshift($lista, "start");                                // ["start", "a", "b", "c", "d", "e"]

// Usuwanie z końca
$ostatni = array_pop($lista);                                  // "e"

// Usuwanie z początku
$pierwszy = array_shift($lista);                               // "start"

print_r($lista);                                               // ["a", "b", "c", "d"]

echo "<br>=== 3. Wyszukiwanie ===<br>";

// in_array() – czy wartość istnieje
var_dump(in_array("banan", $owoce));                           // true
var_dump(in_array("banan", $owoce, true));                     // true (strict)

// array_search() – zwraca klucz (lub false)
$klucz = array_search("pomarańcza", $owoce);
echo "Klucz 'pomarańcza': $klucz<br>";                           // 2

// array_key_first() i array_key_last() (od PHP 7.3)
echo "Pierwszy klucz: " . array_key_first($osoba) . "<br>";      // imie
echo "Ostatni klucz: " . array_key_last($osoba) . "<br>";        // miasto

echo "<br>=== 4. Filtrowanie, mapowanie, redukcja ===<br>";

$liczby = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];

// array_filter() – filtruje elementy
$parzyste = array_filter($liczby, fn($n) => $n % 2 === 0);
print_r(array_values($parzyste));                              // [2, 4, 6, 8, 10]

// array_map() – przekształca każdy element
$kwadraty = array_map(fn($n) => $n ** 2, $liczby);
print_r($kwadraty);                                            // [1, 4, 9, 16, 25, ...]

// array_reduce() – redukuje do jednej wartości
$suma = array_reduce($liczby, fn($carry, $n) => $carry + $n, 0);
echo "Suma: $suma<br>";                                          // 55

echo "<br>=== 5. Sortowanie ===<br>";

$doSortowania = [3, 1, 4, 1, 5, 9, 2, 6];
$asocjacyjna = ["c" => 3, "a" => 1, "b" => 2];

// sort() – sortuje wartości, resetuje klucze
sort($doSortowania);
print_r($doSortowania);                                        // [1, 1, 2, 3, 4, 5, 6, 9]

// asort() – sortuje wartości, zachowuje klucze
asort($asocjacyjna);
print_r($asocjacyjna);                                         // a=>1, b=>2, c=>3

// ksort() – sortuje według kluczy
ksort($asocjacyjna);

// rsort(), arsort(), krsort() – wersje malejące

echo "<br>=== 6. Łączenie, wycinanie, różnice ===<br>";

$a = [1, 2, 3];
$b = [3, 4, 5];

// array_merge()
$polaczone = array_merge($a, $b);
print_r($polaczone);                                           // [1, 2, 3, 3, 4, 5]

// operator ... (array unpacking) – od PHP 7.4 (lepsze z kluczami string od 8.1)
$polaczone2 = [...$a, ...$b];
print_r($polaczone2);

// array_slice() – wycina część tablicy (nie modyfikuje oryginału)
$wycinek = array_slice($liczby, 2, 4);                         // od indeksu 2, 4 elementy
print_r($wycinek);                                             // [3, 4, 5, 6]

// array_diff() – elementy z pierwszej tablicy, których nie ma w pozostałych
$roznica = array_diff($a, $b);
print_r($roznica);                                             // [1, 2]

// array_intersect() – część wspólna
$wspolne = array_intersect($a, $b);
print_r($wspolne);                                             // [3]

echo "<br>=== 7. Inne przydatne funkcje ===<br>";

// array_unique() – usuwa duplikaty
$unikalne = array_unique($owoce);
print_r($unikalne);

// array_keys() i array_values()
print_r(array_keys($osoba));                                   // ["imie", "wiek", "miasto"]
print_r(array_values($osoba));                                 // ["Anna", 28, "Warszawa"]

// array_column() – wyciąga kolumnę z tablicy tablic (bardzo przydatne!)
$uzytkownicy = [
    ["id" => 1, "nazwa" => "Anna", "wiek" => 28],
    ["id" => 2, "nazwa" => "Piotr", "wiek" => 34],
    ["id" => 3, "nazwa" => "Kasia", "wiek" => 22],
];
$nazwy = array_column($uzytkownicy, "nazwa");
print_r($nazwy);                                               // ["Anna", "Piotr", "Kasia"]

// array_combine() – łączy klucze z wartościami
$klucze = ["a", "b", "c"];
$wartosci = [1, 2, 3];
$polaczona = array_combine($klucze, $wartosci);
print_r($polaczona);                                           // a=>1, b=>2, c=>3

// array_fill() i range()
$wypelniona = array_fill(0, 5, "x");                           // ["x", "x", "x", "x", "x"]
$zakres = range(1, 10, 2);                                     // [1, 3, 5, 7, 9]

// array_is_list() – sprawdza czy tablica jest listą (od PHP 8.1)
var_dump(array_is_list([1, 2, 3]));                            // true
var_dump(array_is_list(["a" => 1, "b" => 2]));                 // false
var_dump(array_is_list([1 => "a", 0 => "b"]));                 // false (klucze nie od 0 sekwencyjnie)

echo "<br>=== Koniec przykładu ===<br>";
