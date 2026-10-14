<?php
// Przykład funkcji wbudowanych do wyrażeń regularnych w PHP 8.2
// PHP używa biblioteki PCRE2 – składnia preg_*, NIE ereg (usunięte dawno temu)

echo "=== 1. preg_match() – pierwsze dopasowanie ===<br>";

// preg_match() zwraca 1 (dopasowano), 0 (brak dopasowania), false (błąd)
$tekst = "Kontakt: jan.kowalski@example.com, tel. 600-100-200";

// Wyszukanie adresu e-mail (uproszczony wzorzec)
$ok = preg_match('/[\w.]+@[\w.]+\.[a-z]{2,}/', $tekst, $dopasowania);
var_dump($ok);                                                 // 1
print_r($dopasowania);                                          // ["jan.kowalski@example.com"]

// Grupy przechwytyjące (nawiasy) – element [0] to całość, [1+] to grupy
$ok = preg_match('/(\d{3})-(\d{3})-(\d{3})/', $tekst, $dopasowania);
print_r($dopasowania);                                          // ["600-100-200", "600", "100", "200"]
echo "Numer kierunkowy: $dopasowania[1]<br>";                  // 600

// Nazwane grupy – czytelniejsze niż indeksy (?<nazwa>...)
$ok = preg_match('/(?<rok>\d{4})-(?<miesiac>\d{2})-(?<dzien>\d{2})/', "2026-10-14", $d);
echo "Rok: {$d['rok']}, miesiąc: {$d['miesiac']}<br>";         // 2026, 10

// Kotwice: ^ początek, $ koniec, \b granica słowa
var_dump(preg_match('/^abc/', "abcdef"));                     // 1 – zaczyna się od abc
var_dump(preg_match('/^abc$/', "abcdef"));                    // 0 – nie jest DOKŁADNIE "abc"
var_dump(preg_match('/\bkot\b/', "kotek i kot"));              // 1 – "kot" jako osobne słowo

// modyfikatory po wzorcu:
// i – ignoruj wielkość liter   | u – tryb UTF-8 (WAŻNE dla polskich znaków!)
// m – ^ i $ per linia          | s – kropka łapie też nowe linie
// x – ignoruj białe znaki we wzorcu (czytelne regekspy)

// PUŁAPKA UTF-8: bez modyfikatora u polskie znaki łamią dopasowanie
var_dump(preg_match('/^[a-zą-ż]+$/u', "żółć'));                 // 1
var_dump(preg_match('/^[a-z]+$/', "żółć"));                    // 0 (brak u!)

echo "<br>=== 2. Sprawdzanie walidacji – najczęstsze użycie ===<br>";

function waliduj(string $wartosc): void
{
    // Kod pocztowy: \d{2}-\d{3}
    if (!preg_match('/^\d{2}-\d{3}$/', $wartosc)) {
        throw new InvalidArgumentException("Niepoprawny format");
    }
}

// Przykłady walidacji:
$wzorce = [
    "kod pocztowy"    => '/^\d{2}-\d{3}$/',
    "telefon PL"      => '/^\d{9}$/',
    "hex kolor"       => '/^#[0-9a-fA-F]{6}$/',
    "login (3-16 zn)" => '/^[a-zA-Z0-9_]{3,16}$/',
    "data ISO"        => '/^\d{4}-\d{2}-\d{2}$/',
    "URL"             => '/^https?:\/\/[\w.-]+/',
];

$testy = ["00-950", "123456789", "#FF00AA", "anna_k", "2026-10-14", "https://example.com"];
foreach ($testy as $i => $test) {
    $klucz = array_keys($wzorce)[$i];
    $ok = preg_match($wzorce[$klucz], $test) === 1;
    var_dump($ok);                                              // true, true, true, true, true, true
}

echo "<br>=== 3. preg_match_all() – wszystkie dopasowania ===<br>";

$tekst = "Ceny: jabłko 3,20 zł, banan 4,50 zł, kiwi 6,99 zł";

// Wszystkie liczby (ceny)
$ile = preg_match_all('/\d+,\d{2}/', $tekst, $ceny);
print_r($ceny[0]);                                              // ["3,20", "4,50", "6,99"]
echo "Znaleziono: $ile<br>";                                    // 3

// PATTERN_SET_ORDER – wyniki pogrupowane po wzorcu a nie po dopasowaniu
$ile = preg_match_all('/(\d+),(\d{2})/', $tekst, $ceny, PREG_SET_ORDER);
print_r($ceny);
// [["3,20","3","20"], ["4,50","4","50"], ["6,99","6","99"]]

// Zamiana na format z kropką – przydatne do obliczeń
$liczby = preg_replace('/(\d+),(\d{2})/', '$1.$2', $tekst);
echo $liczby . "<br>";                                         // Ceny: jabłko 3.20 zł, banan 4.50 zł...

echo "<br>=== 4. preg_replace() – zamiana przez wzorzec ===<br>";

// Usuwanie zbędnych spacji
echo preg_replace('/\s+/', " ", "za   dużo    spacji") . "<br>"; // za dużo spacji

// Zamiana daty z ISO na polski format (grupy w kolejności)
echo preg_replace('/(\d{4})-(\d{2})-(\d{2})/', '$3.$2.$1', "2026-10-14") . "<br>"; // 14.10.2026

// Nazwane grupy w zamianie: ${nazwa}
echo preg_replace('/(?<r>\d{4})-(?<m>\d{2})-(?<d>\d{2})/', '${d}.${m}.${r}', "2026-10-14") . "<br>";

// preg_replace_callback() – zamiana z logiką PHP (np. modyfikacja wartości)
$wynik = preg_replace_callback('/\d+/', fn($m) => $m[0] * 2, "Ceny: 10 i 20 zł");
echo $wynik . "<br>";                                          // Ceny: 20 i 40 zł

// Usuwanie tagów HTML (poza dozwolonymi)
$html = "<p>Tekst <b>bold</b> <script>x</script></p>";
echo preg_replace('/<\/?(?!p|b)[^>]*>/', "", $html) . "<br>";  // <p>Tekst <b>bold</b> x</p>

echo "<br>=== 5. preg_split() i preg_grep() – tablice ===<br>";

// preg_split() – dzieli po wzorcu (a nie po stałym stringu jak explode)
$czesci = preg_split('/[\s,]+/', "jabłko, banan  kiwi,    pomarańcza");
print_r($czesci);                                               // ["jabłko", "banan", "kiwi", "pomarańcza"]

// Podział po przecinku, ale z zachowaniem pustych elementów (różnica od explode)
print_r(preg_split('/,/', "a,,b"));                             // ["a", "", "b"]
print_r(explode(",", "a,,b"));                                 // ["a", "", "b"] – tu identycznie

// preg_grep() – filtruje TABLICĘ zostawiając elementy pasujące do wzorca
$pliki = ["raport.pdf", "zdjecie.jpg", "logo.png", "notatka.txt", "skan.jpeg"];
$obrazy = preg_grep('/\.(jpe?g|png)$/i', $pliki);
print_r($obrazy);                                               // [1 => "zdjecie.jpg", 2 => "logo.png", 4 => "skan.jpeg"]
// UWAGA: klucze zachowane! array_values() jeśli chcesz listę 0,1,2...

echo "<br>=== 6. preg_quote() – BHP przy wzorcach ===<br>";

// Skoro wzorzec to string – tekst od użytkownika może zawierać znaki specjalne regexa!
// NIGDY nie wstawiaj danych użytkownika do wzorca bez preg_quote()
$szukaneFrazy = ["C++", "PHP 8", "$var", "a.b"];

foreach ($szukaneFrazy as $frazy) {
    // ŹLE: znaki specjalne regexa zostaną zinterpretowane jako składnia!
    // DOBRZE: preg_quote() escape'uje wszystkie metaznaki
    $wzorzec = '/' . preg_quote($frazy, '/') . '/';            // '/' też trzeba escape'ować (delimiter!)
    var_dump(preg_match($wzorzec, "Uczę się C++ od PHP 8, \$var i a.b"));
}

echo "<br>=== 7. Obsługa błędów i wydajność ===<br>";

// KLUCZOWA ZMIANA PHP 8: nieprawidłowy wzorzec rzuca ValueError (NIE zwraca false)!
// Operator @ NIE tłumi wyjątków – dlatego błędne wzorce muszą być w try/catch:
$zlyWzorzec = '/[nie domknięty/';
try {
    $wynik = @preg_match($zlyWzorzec, "tekst");               // @ nie pomoże!
    var_dump($wynik);
} catch (ValueError $e) {
    echo "Wyjątek: " . $e->getMessage() . "<br>";            // Internal error: ...
}

echo preg_last_error_msg() . "<br>";                            // komunikat ostatniego błędu PCRE

// To samo w wersji krótszej:
try {
    preg_match('/[/', "tekst");
} catch (ValueError $e) {
    echo "Wyjątek: " . $e->getMessage() . "<br>";              // Invalid regular expression...
}

// Wydajność:
// - preg_match zatrzymuje się na PIERWSZYM dopasowaniu (szybkie)
// - preg_match_all skanuje cały tekst
// - dla prostych operacji (strpos, str_replace) NIE używaj regexów – są wolniejsze
// - wzorce skompilowane i tak są cache'owane per wzorzec

echo "=== Koniec przykładu ===<br>";