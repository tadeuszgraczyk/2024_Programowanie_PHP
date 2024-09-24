<?php

/* ----- Zmienne i typy zmiennych ----- */

/* --------- Typy zmiennych w PHP --------- */
/*
- String - znaków
- Integer - Liczba całkowita
- Float - Liczba rzeczywista
- Boolean - Typ logiczny - prawda lub fałsz
- Array - Tablica - pozwalająca przechowywać wiele wartości
- Object - Zmienna obiektowa
- NULL - Pusta wartość
- Resource - Specjalna zmienna przechowująca zasób
*/

/* --------- Zasady nazywania zmiennych --------- */
/*
- Nazwa musi zaczynać się od $
- Nazwy zmiennej muszą zaczynać się od litery lub znaku podkreślenia
- Zmienna nie zaczyna się od liczby
- Zmienne mogą zawierać tylko znaki alfanumeryczne i podkreślenia (A-z, 0-9 i _ )
- Zmienne rozróżniają wielkość liter ($name i $NAME to dwie różne zmienne)
*/

$nazwa = 'Mechanik'; // String // Może być w apostrofach lub cudzysłowach
$wiek = 40; // Integer
$obecny = true; // Boolean
$kwotaPodatku = 10.5; //Float

var_dump($kwotaPodatku);
echo "<hr>";
/* --- Dodawanie zmiennej do łańcucha -- */

// Double quotes can be used to add variables to strings
echo "$nazwa ma $wiek szczęśliwych lat przed sobą.<br>";

// Jeszcze lepiej zrobić to tak (szczególnie jeśli używałeś takiego zapisu w JS)
echo "${nazwa} ma ${wiek} szczęśliwych lat przed sobą.<br>";

// łączenie łańcuchów znaków

$imie = 'Ala';
$wiek = 18;

echo '<h3>' . $imie . ' ma ' . $wiek . ' lat</h3>';

// Przykłady zmiennych z podręcznika

$x = 1;
$nazwa_1 = "tekst";
$liczba7 = 345;
$ilosc = 4;
echo "Wynik wynosi $x <br>";
echo "To jest $nazwa_1 <br>";
echo "$liczba7 <br>";
echo "Bieżąca wartość to $ilosc<br>";
/*
Zmienne predefiniowane
---------------------------*/
   echo $_SERVER['SERVER_NAME']."<br>";
   echo $_SERVER['PHP_SELF']."<br>";

// Stałe - nie mogą zostać zmienione
define('HOST', 'localhost');
define('USER', 'root');
echo '<hr>';
var_dump(HOST);

const login = true;
echo "<hr>";

var_dump(login);

