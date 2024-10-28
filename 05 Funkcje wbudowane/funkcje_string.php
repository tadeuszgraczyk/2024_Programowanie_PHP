<?php
/* ---------- Funkcje do pracy z łańcuchami znaków -------- */

/*
  Funkcje do pracy z łańcuchami znaków
  https://www.php.net/manual/en/ref.strings.php
*/

$string = 'Hello World';

// Pobierz długość łańcucha
echo strlen($string);
echo '<hr>';

// Znajdź pozycję pierwszego wystąpienia podciągu w łańcuchu
echo strpos($string, 'o');
echo '<hr>';

// Znajdź pozycję ostatniego wystąpienia podciągu w łańcuchu
echo strrpos($string, 'o');
echo '<hr>';

// Odwróć łańcuch
echo strrev($string);
echo '<hr>';

// Zamień wszystkie znaki na małe litery
echo strtolower($string);
echo '<hr>';

// Zamień wszystkie znaki na wielkie litery
echo strtoupper($string);
echo '<hr>';

// Pierwsza litera każdego słowa wielką literą
echo ucwords($string);
echo '<hr>';

// Zamiana fragmentu tekstu
echo str_replace('World', 'Everyone', $string);
echo '<hr>';

// Zwraca fragment łańcucha na podstawie offsetu i długości
echo substr($string, 0, 5);
echo substr($string, 5);
echo '<hr>';

// Sprawdzenie, czy łańcuch zaczyna się od konkretnego podciągu
if (str_starts_with($string, 'Hello')) {
    echo 'TAK';
}
echo '<hr>';

// Sprawdzenie, czy łańcuch kończy się konkretnym podciągiem
if (str_ends_with($string, 'ld')) {
    echo 'TAK';
}
echo '<hr>';

// Kodowanie HTML-a
$string2 = '<h1>Hello World</h1>';
echo htmlentities($string2);
echo '<hr>';

// Łańcuchy sformatowane - przydatne przy wprowadzaniu danych zewnętrznych
// Różne specyfikatory dla różnych typów danych
printf('%s to %s', 'Brad', 'fajny facet');
echo '<hr>';
printf('1 + 1 = %f', 1 + 1); // liczba zmiennoprzecinkowa
?>
