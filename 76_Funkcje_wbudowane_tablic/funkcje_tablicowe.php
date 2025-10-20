<?php
/* --------- Funkcje do pracy z tablicami -------- */

/*
  Funkcje do pracy z tablicami
  https://www.php.net/manual/en/ref.array.php
*/
echo '<pre>';
$fruits = ['apple', 'banana', 'orange'];

// Pobieranie długości tablicy
echo count($fruits);
echo "<hr>";

// Wyszukiwanie w tablicy
echo in_array('banana', $fruits);
echo "<hr>";

// Dodawanie do tablicy
$fruits[] = 'grape';
array_push($fruits, 'mango', 'raspberry');
array_unshift($fruits, 'kiwi'); // Dodaje na początek

// Usuwanie z tablicy
array_pop($fruits); // Usuwa ostatni element
array_shift($fruits); // Usuwa pierwszy element
// Usuwanie konkretnego elementu
unset($fruits[2]);

// Podział na części po 2 elementy
$chunkedArray = array_chunk($fruits, 2);
var_dump($chunkedArray);
echo "<hr>";

// Łączenie tablic
$arr1 = [1, 2, 3];
$arr2 = [4, 5, 6];
$arr3 = array_merge($arr1, $arr2);
var_dump($arr3);
echo "<hr>";
$arr4 = [...$arr1, ...$arr2]; // Użycie operatora Spread
var_dump($arr4);
echo "<hr>";

// Łączenie tablic (klucze i wartości)
$a = ['green', 'red', 'yellow'];
$b = ['avocado', 'apple', 'banana'];
$c = array_combine($a, $b);

// Tablica kluczy
$keys = array_keys($c);

// Zamiana kluczy z wartościami
$flipped = array_flip($c);
var_dump($flipped);
echo "<hr>";

// Tworzenie tablicy liczb za pomocą range()
$numbers = range(1, 20);

// Mapowanie po tablicy i tworzenie nowej
$newNumbers = array_map(function ($number) {
    return "Liczba ${number}";
}, $numbers);

// Filtrowanie tablicy
$lessThan10 = array_filter($numbers, fn($number) => $number < 10);

// Redukcja tablicy
// "carry" przechowuje wartość zwracaną z poprzedniej iteracji
$sum = array_reduce($numbers, fn($carry, $number) => $carry + $number);
var_dump($sum);
echo '</pre>';
?>
