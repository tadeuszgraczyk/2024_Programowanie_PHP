<?php
/* ------------ Funkcje ----------- */

/*
** Składnia funkcji
  function nazwaFunkcji($arg1, $arg2, ...) {
    // kod do wykonania
  }

  - Funkcje mają własny zasięg lokalny w przeciwieństwie do zasięgu globalnego
*/

function registerUser()
{
    echo 'Użytkownik został zarejestrowany!<br>';
}

// Uruchamianie funkcji
registerUser();

// Dodawanie parametrów
function registerUser2($username)
{
    echo "Użytkownik ${username} został zarejestrowany!<br>";
}

// Przekazywanie argumentu
registerUser2('Brad');

// Zwracanie wartości
function add($num1, $num2)
{
    return $num1 + $num2;
}

$sum = add(5, 5);
echo $sum.'<br>';

// Dodawanie wartości domyślnych
function subtract($num1 = 10, $num2 = 5)
{
    return $num1 - $num2;
}

echo subtract().'<br>';

// Przypisywanie funkcji anonimowych do zmiennych. Często używane w zamknięciach i funkcjach zwrotnych
$add = function ($num1, $num2) {
    return $num1 + $num2;
};

echo $add(5, 5).'<br>';

// Funkcje strzałkowe
$multiply = fn($num1, $num2) => $num1 * $num2;

echo $multiply(5, 5);
?>
