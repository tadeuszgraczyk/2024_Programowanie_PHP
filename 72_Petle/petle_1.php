<?php

/* -------- Pętle & iteracje ------- */

/* ------------ Pętla For ------------ */

/*
** Składnia pętli For
  for (inicjalizacja; warunek; inkrementacja) {
  // kod do wykonania
  }
*/

for ($x = 0; $x <= 10; $x++) {
    echo "Liczba: $x <br>";
}

/* ------------ Pętla While ------------ */

/*
** Składnia pętli While
  while (warunek) {
  // kod do wykonania
  }
*/
echo "<hr>";
$x = 1;

while ($x <= 5) {
    echo "Liczba: $x <br>";
    $x++;
}

/* ---------- Pętla Do While --------- */

/*
** Składnia pętli Do While
  do {
  // kod do wykonania
  } while (warunek);

Pętla do...while zawsze wykona blok kodu co najmniej raz, nawet jeśli warunek jest fałszywy.
*/
echo "<hr>";
do {
    echo "Liczba: $x <br>";
    $x++;
} while ($x <= 5);

/* ---------- Pętla Foreach ---------- */

/*
** Składnia pętli Foreach
  foreach ($tablica as $wartość) {
  // kod do wykonania
  }
*/

// Iteracja po tablicy
echo "<hr>";
$numbers = [1, 2, 3, 4, 5];

foreach ($numbers as $x) {
    echo "Liczba: $x <br>";
}

// Użycie indeksów w pętli
echo "<hr>";
$posts = ['Post Jeden', 'Post Dwa', 'Post Trzy'];

foreach ($posts as $index => $post) {
    echo "$index - $post <br>";
}

// Użycie kluczy w pętli dla tablicy asocjacyjnej
echo "<hr>";
$person = [
    'first_name' => 'Brad',
    'last_name' => 'Traversy',
    'email' => 'brad@gmail.com',
];

// Pobieranie kluczy
foreach ($person as $key => $val) {
    echo "${key} - ${val} <br>";
}
?>
