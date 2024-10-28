<?php

/* ---- Warunki i operatory ---- */

/* ------------ Operatory ----------- */

/*
   < Mniej niż
   > Większe niż
   <= Mniejszy lub równy
   >= Większe lub równe
   == Równy z
   === Identyczne z
   != Nie równa się
   !== Nie są identyczne z
*/

/* ---------- Instrukcja if --------- */

/*
** Składnia instrukcji if
if (warunek) {
  // kod do wykonania, gdy warunek = true (prawda)
}
*/

$wiek = 20;

if ($wiek >= 18) {
    echo 'Masz wystarczającą ilość lat, aby głosować!<br>';
} else {
    echo 'Niestety. Jeszcze nie możesz głosować.<br>';
}

// Daty
// $today = date("F j, Y, g:i a");

$t = date('H');

if ($t < 12) {
    echo 'Miłego przedpołudnia!<br>';
} elseif ($t < 17) {
    echo 'Miłego popołudnia!<br>';
} else {
    echo 'Miłego wieczoru!<br>';
}

// Sprawdź, czy tablica jest pusta
// Funkcja isset() wygeneruje ostrzeżenie lub powiadomienie, gdy zmienna nie istnieje.
// Funkcja empty() nie wygeneruje żadnego ostrzeżenia ani powiadomienia, jeśli zmienna nie istnieje.
$posts = [];

if (!empty($posts[0])) {
    echo $posts[0];
} else {
    echo 'Obecnie brak wiadomości<br>';
}

/* -------- Operator warunkowy -------- */
/*
  Operator trójargumentowy jest skrótem dla instrukcji if.
  Składnia operatora trójargumentowego:
    warunek ? true : false;
*/

// Echo w zależności od warunku (Tak samo jak powyżej)
echo !empty($posts[0]) ? $posts[0] : 'Brak wiadomości';

// Przypisz wartość do zmiennej na podstawie warunku
$firstPost = !empty($posts[0]) ? $posts[0] : 'Brak wiadomości';

$firstPost = !empty($posts[0]) ? $posts[0] : null;

// Operator złączenia null ?? (PHP 7.4)
// Zwróci null, jeśli $posts jest pusty
// Zawsze zwraca pierwszy parametr, chyba że pierwszy parametr to NULL
$firstPost = $posts[0] ?? null;

var_dump($firstPost);

/* -------- Instrukcja switch ------- */

$favcolor = 'red';

switch ($favcolor) {
    case 'red':
        echo 'Twój ulubiony kolor to czerwony!';
        break;
    case 'blue':
        echo 'Twój ulubiony kolor to niebieski!';
        break;
    case 'green':
        echo 'Twój ulubiony kolor to zielony!';
        break;
    default:
        echo 'Twój ulubiony kolor nie jest czerwony, niebieski ani zielony!';
}
?>
