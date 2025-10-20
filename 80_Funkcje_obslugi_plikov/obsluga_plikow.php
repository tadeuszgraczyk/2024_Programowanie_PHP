<?php

/* ---------- Obsługa Plików --------- */

/*
  Obsługa plików to możliwość odczytywania i zapisywania plików na serwerze.
  PHP posiada wbudowane funkcje do odczytu i zapisu plików.
*/

$file = 'extras/users.txt';

// if(file_exists($file)) {
//   // Zwraca zawartość i liczbę bajtów odczytanych z pliku w przypadku sukcesu, lub FALSE w przypadku błędu.
//   echo readfile('extras/users.txt');
// }

// Otwieranie, odczyt, zapis, zamykanie pliku
if (file_exists($file)) {
    // fopen() daje więcej kontroli nad plikiem.
    // Tryby: r, w, a, x, r+, w+, a+, x+ (szczegóły poniżej)
    $handle = fopen($file, 'r');
    // fread() odczytuje plik i zwraca zawartość jako string w przypadku sukcesu, lub FALSE w przypadku błędu.
    $contents = fread($handle, filesize($file));
    // fclose() zamyka zasób pliku w przypadku sukcesu, lub zwraca FALSE w przypadku błędu.
    fclose($handle);
    echo $contents;
} else {
    // Tworzenie pliku
    $handle = fopen($file, 'w');
    // PHP_EOL to stała reprezentująca znak końca linii.
    $contents = 'Brad' . PHP_EOL . 'Sara' . PHP_EOL . 'Mike' . PHP_EOL . 'John';
    // fwrite() zapisuje zawartość do pliku i zwraca liczbę zapisanych bajtów w przypadku sukcesu, lub FALSE w przypadku błędu.
    fwrite($handle, $contents);
    fclose($handle);
}

/*
r   - Otwiera plik tylko do odczytu. Wskaźnik pliku znajduje się na początku pliku
w   - Otwiera plik tylko do zapisu. Usuwa zawartość pliku lub tworzy nowy plik, jeśli nie istnieje. Wskaźnik pliku znajduje się na początku pliku
a   - Otwiera plik tylko do zapisu. Istniejące dane w pliku są zachowane. Wskaźnik pliku znajduje się na końcu pliku. Tworzy nowy plik, jeśli plik nie istnieje
x   - Tworzy nowy plik tylko do zapisu. Zwraca FALSE i błąd, jeśli plik już istnieje
r+  - Otwiera plik do odczytu/zapisu. Wskaźnik pliku znajduje się na początku pliku
w+  - Otwiera plik do odczytu/zapisu. Usuwa zawartość pliku lub tworzy nowy plik, jeśli nie istnieje. Wskaźnik pliku znajduje się na początku pliku
a+  - Otwiera plik do odczytu/zapisu. Istniejące dane w pliku są zachowane. Wskaźnik pliku znajduje się na końcu pliku. Tworzy nowy plik, jeśli plik nie istnieje
x+  - Tworzy nowy plik do odczytu/zapisu. Zwraca FALSE i błąd, jeśli plik już istnieje
*/
