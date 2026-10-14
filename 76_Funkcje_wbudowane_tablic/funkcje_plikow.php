<?php
// Przykład funkcji wbudowanych do obsługi plików w PHP 8.2
// Wszystkie poniższe funkcje działają w PHP 8.2
// Ścieżki: używaj __DIR__ (katalog bieżącego pliku), nie ślepych ścieżek względnych

echo "=== 1. Sprawdzanie plików i katalogów ===<br>";

$plik = __DIR__ . "/przyklad.txt";

// file_exists() – czy istnieje (plik LUB katalog)
var_dump(file_exists($plik));

// is_file() / is_dir() – rozróżnienie plik i katalog
var_dump(is_file($plik));                                     // true (jeśli istnieje jako plik)
var_dump(is_dir(__DIR__));                                    // true

// is_readable() / is_writable() – uprawnienia
var_dump(is_readable($plik));

// filesize() – rozmiar w bajtach
// filemtime() – czas ostatniej modyfikacji (timestamp)
if (file_exists($plik)) {
    echo "Rozmiar: " . filesize($plik) . " B<br>";
    echo "Modyfikacja: " . date("Y-m-d H:i:s", filemtime($plik)) . "<br>";
}

// basename() / dirname() – elementy ścieżki
echo basename("/var/www/index.php") . "<br>";                  // index.php
echo dirname("/var/www/index.php") . "<br>";                  // /var/www

// pathinfo() – tablica ze składowymi ścieżki
$info = pathinfo("/var/www/index.php");
print_r($info);
// [dirname] => /var/www, [basename] => index.php,
// [extension] => php, [filename] => index

echo "<br>=== 2. Zapisywanie plików ===<br>";

// file_put_contents() – najszybszy zapis całej treści (zapisuje + zamyka)
file_put_contents($plik, "Linia 1\nLinia 2\nLinia 3\n");

// FILE_APPEND – dopisywanie zamiast nadpisywania
file_put_contents(__DIR__ . "/log.txt", "Nowy wpis\n", FILE_APPEND);

// LOCK_EX – blokada na czas zapisu (bezpieczne przy równoległych zapisach)
file_put_contents($plik, "bezpiecznie\n", FILE_APPEND | LOCK_EX);

// fopen() + fwrite() + fclose() – zapis sterowany ręcznie
$uchwyt = fopen(__DIR__ . "/reczny.txt", "w");                 // tryby: r, r+, w (czyści!), a (dopisuje), x (błąd jeśli istnieje)
if ($uchwyt) {
    fwrite($uchwyt, "Zapis przez fopen\n");
    fwrite($uchwyt, "Druga linia\n");
    fclose($uchwyt);                                           // ZAWSZE zamykaj!
}

echo "<br>=== 3. Odczyt plików ===<br>";

// file_get_contents() – cały plik do stringa (najprościej)
$tresc = file_get_contents($plik);
echo nl2br($tresc) . "<br>";

// file() – cały plik do tablicy (po jednym elemencie na linię)
$linie = file($plik, FILE_IGNORE_NEW_LINES);                  // bez \n na końcach
print_r($linie);                                                // ["Linia 1", "Linia 2", ...]

// fopen() + fgets() – odczyt linia po linii (oszczędza pamięć przy dużych plikach!)
$uchwyt = fopen($plik, "r");
if ($uchwyt) {
    while (($linia = fgets($uchwyt)) !== false) {
        echo "Linia: " . htmlspecialchars($linia) . "<br>";
    }
    fclose($uchwyt);
}

// fread() – odczyt konkretnej liczby bajtów
$uchwyt = fopen($plik, "rb");
if ($uchwyt) {
    $kawalek = fread($uchwyt, 8);                              // pierwsze 8 bajtów
    fclose($uchwyt);
    echo "Fragment: $kawalek<br>";
}

// fgetcsv() – odczyt plików CSV linia po linii
file_put_contents(__DIR__ . "/dane.csv", "imie;wiek\nAnna;28\nPiotr;34\n");
$uchwyt = fopen(__DIR__ . "/dane.csv", "r");
if ($uchwyt) {
    while (($rekord = fgetcsv($uchwyt, separator: ";")) !== false) {
        print_r($rekord);                                      // ["imie", "wiek"], potem ["Anna", "28"]...
    }
    fclose($uchwyt);
}

// fread/fgets vs file_get_contents: przy dużych plikach (GB) zawsze strumień!

echo "<br>=== 4. Kopiowanie, przenoszenie, usuwanie ===<br>";

// copy()
copy($plik, __DIR__ . "/kopia.txt");

// rename() – przenoszenie ZMIANA nazwy w obrębie systemu plików
rename(__DIR__ . "/kopia.txt", __DIR__ . "/kopia2.txt");

// unlink() – usuwanie pliku
unlink(__DIR__ . "/kopia2.txt");

// UWAGA na realpath() – normalizuje ścieżkę (usuwa ../ itp., przydatne przy walidacji)
echo realpath($plik) . "<br>";

echo "<br>=== 5. Praca z katalogami ===<br>";

// mkdir() – tworzenie katalogu (recursive pozwala na ścieżki wielopoziomowe)
mkdir(__DIR__ . "/nowy/podkatalog", recursive: true);          // oba poziomy naraz

// rmdir() – usuwanie (tylko puste katalogi!)
// rmdir(__DIR__ . "/nowy/podkatalog");

// scandir() – lista plików katalogu jako tablica
$elementy = scandir(__DIR__);
$pliki = array_diff($elementy, [".", ".."]);                   // odfiltruj . i ..
print_r($pliki);

// opendir() + readdir() – iteracja po katalogu (strumieniowo)
$uchwyt = opendir(__DIR__);
if ($uchwyt) {
    while (($element = readdir($uchwyt)) !== false) {
        if ($element !== "." && $element !== "..") {
            echo "Element: $element<br>";
        }
    }
    closedir($uchwyt);
}

// glob() – wyszukiwanie po wzorcu (bardzo wygodne!)
$plikiTxt = glob(__DIR__ . "/*.txt");
print_r($plikiTxt);                                             // wszystkie .txt w katalogu
echo "Znaleziono: " . count($plikiTxt) . " plików .txt<br>";

// rmdir() po uprzątnięciu – katalog musi być pusty
// array_map('unlink', glob(__DIR__ . "/nowy/*"));  // usuń zawartość...

echo "<br>=== 6. Upload plików ($_FILES) ===<br>";

// Formularz HTML: <form method="post" enctype="multipart/form-data">
// <input type="file" name="zdjecie">

// W PHP dane trafiają do $_FILES:
// $plik = $_FILES["zdjecie"];
// $plik["name"] – oryginalna nazwa
// $plik["tmp_name"] – ścieżka tymczasowa na serwerze
// $plik["size"] – rozmiar w bajtach
// $plik["error"] – UPLOAD_ERR_OK (0) = sukces

// KLUCZOWE BEZPIECZEŃSTWO: nie ufaj $plik["name"]!
// NIGDY: move_uploaded_file($plik["tmp_name"], "/uploads/" . $plik["name"]);  // RCE przez ../ i .php!

// Poprawnie: własna nazwa + białe rozszerzenie:
// $rozszerzenie = strtolower(pathinfo($plik["name"], PATHINFO_EXTENSION));
// $dozwolone = ["jpg", "png", "gif"];
// if (in_array($rozszerzenie, $dozwolone, true)) {
//     $nowaNazwa = bin2hex(random_bytes(16)) . "." . $rozszerzenie;
//     move_uploaded_file($plik["tmp_name"], "/uploads/" . $nowaNazwa);
// }

echo "Zobacz komentarze – upload pokazany jako wzorzec bezpieczny<br>";

echo "<br>=== 7. Inne przydatne funkcje ===<br>";

// tempnam() – bezpieczny plik tymczasowy o unikalnej nazwie
$tymczasowy = tempnam(sys_get_temp_dir(), "prefiks");
echo "Plik tymczasowy: $tymczasowy<br>";

// filemtime() / filectime() / fileatime() – modyfikacja / zmiana inode / dostęp
// stat() / fstat() – pełne informacje o pliku jako tablica
$stat = stat($plik);
echo "Rozmiar przez stat: " . $stat["size"] . " B<br>";

// disk_free_space() / disk_total_space()
echo "Wolne miejsce: " . round(disk_free_space("/") / 1024 / 1024 / 1024, 2) . " GB<br>";

// is_uploaded_file() – czy plik został faktycznie wgrany przez HTTP POST
// move_uploaded_file() – jedyny poprawny sposób przenoszenia uploadów

// file() z FILE_SKIP_EMPTY_LINES – pomijanie pustych linii
// readfile() – wypisuje plik bezpośrednio do output (idealne do pobierań!)
// header("Content-Type: application/octet-stream");
// header("Content-Disposition: attachment; filename=\"raport.pdf\"");
// readfile("/sciezka/raport.pdf");

echo "<br>=== Sprzątanie (opcjonalne) ===<br>";

// Usuwanie plików testowych – odkomentuj, jeśli chcesz wyczyścić:
// array_map("unlink", glob(__DIR__ . "/*.txt"));
// array_map("unlink", glob(__DIR__ . "/dane.csv"));
// rmdir(__DIR__ . "/nowy/podkatalog"); rmdir(__DIR__ . "/nowy");

echo "=== Koniec przykładu ===<br>";