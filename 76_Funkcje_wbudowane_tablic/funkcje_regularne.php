
<?php
// Przykład funkcji wbudowanych do wyrażeń regularnych w PHP 8.2.
// PHP używa biblioteki PCRE2 i funkcji preg_* (nie ereg, usuniętego dawno temu).

echo "=== 1. preg_match() – pierwsze dopasowanie ===<br>";

// preg_match() zwraca 1 (dopasowano), 0 (brak dopasowania) lub false (błąd).
$tekst = "Kontakt: jan.kowalski@example.com, tel. 600-100-200";

// Wyszukanie adresu e-mail (uproszczony wzorzec).
$ok = preg_match('/[\w.]+@[\w.]+\.[a-z]{2,}/i', $tekst, $dopasowania);
var_dump($ok);
print_r($dopasowania);

// Grupy przechwytujące: [0] to całość, [1+] to kolejne grupy.
$ok = preg_match('/(\d{3})-(\d{3})-(\d{3})/', $tekst, $dopasowania);
print_r($dopasowania);
echo "Numer kierunkowy: {$dopasowania[1]}<br>";

// Nazwane grupy: (?<nazwa>...).
$ok = preg_match(
    '/(?<rok>\d{4})-(?<miesiac>\d{2})-(?<dzien>\d{2})/',
    "2026-10-14",
    $d
);
echo "Rok: {$d['rok']}, miesiąc: {$d['miesiac']}<br>";

// Kotwice: ^ początek, $ koniec, \b granica słowa.
var_dump(preg_match('/^abc/', "abcdef"));          // 1
var_dump(preg_match('/^abc$/', "abcdef"));         // 0
var_dump(preg_match('/\bkot\b/', "kotek i kot"));  // 1

// Modyfikatory:
// i – ignoruj wielkość liter; u – tryb UTF-8
// m – ^ i $ dla poszczególnych linii; s – kropka obejmuje nowe linie
// x – ignoruj białe znaki we wzorcu.

var_dump(preg_match('/^[a-ząćęłńóśźż]+$/iu', "żółć")); // 1
var_dump(preg_match('/^[a-z]+$/i', "żółć"));           // 0

echo "<br>=== 2. Walidacja – najczęstsze zastosowanie ===<br>";

function walidujKodPocztowy(string $wartosc): void
{
    if (preg_match('/^\d{2}-\d{3}$/', $wartosc) !== 1) {
        throw new InvalidArgumentException(
            "Niepoprawny format kodu pocztowego"
        );
    }
}

$wzorce = [
    "kod pocztowy" => '/^\d{2}-\d{3}$/',
    "telefon PL"   => '/^\d{9}$/',
    "kolor hex"    => '/^#[0-9a-fA-F]{6}$/',
    "login"        => '/^[a-zA-Z0-9_]{3,16}$/',
    "data ISO"     => '/^\d{4}-\d{2}-\d{2}$/',
    "URL"          => '~^https?://[\w.-]+(?:/.*)?$~i',
];

$testy = [
    "kod pocztowy" => "00-950",
    "telefon PL"   => "123456789",
    "kolor hex"    => "#FF00AA",
    "login"        => "anna_k",
    "data ISO"     => "2026-10-14",
    "URL"          => "https://example.com",
];

foreach ($wzorce as $nazwa => $wzorzec) {
    $test = $testy[$nazwa];
    $ok = preg_match($wzorzec, $test) === 1;

    echo htmlspecialchars($nazwa, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8')
        . ": " . ($ok ? "poprawny" : "niepoprawny") . "<br>";
}

// Powyższy wzorzec daty sprawdza format, a nie poprawność kalendarzową.

echo "<br>=== 3. preg_match_all() – wszystkie dopasowania ===<br>";

$tekst = "Ceny: jabłko 3,20 zł, banan 4,50 zł, kiwi 6,99 zł";

$ile = preg_match_all('/\d+,\d{2}/', $tekst, $ceny);
print_r($ceny[0]);
echo "Znaleziono: {$ile}<br>";

// PREG_SET_ORDER – wyniki pogrupowane według dopasowania.
$ile = preg_match_all(
    '/(\d+),(\d{2})/',
    $tekst,
    $ceny,
    PREG_SET_ORDER
);
print_r($ceny);

// Zamiana przecinka na kropkę w kwotach.
$liczby = preg_replace('/(\d+),(\d{2})/', '$1.$2', $tekst);
echo $liczby . "<br>";

// Nazwane grupy w zamianie.
$data = preg_replace(
    '/(?<rok>\d{4})-(?<miesiac>\d{2})-(?<dzien>\d{2})/',
    '${dzien}.${miesiac}.${rok}',
    "2026-10-14"
);
echo $data . "<br>"; // 14.10.2026

echo "<br>=== 4. preg_replace() – zamiana według wzorca ===<br>";

echo preg_replace('/\s+/', " ", "za   dużo    spacji") . "<br>";

echo preg_replace(
        '/(\d{4})-(\d{2})-(\d{2})/',
        '$3.$2.$1',
        "2026-10-14"
    ) . "<br>";

// preg_replace_callback() – zamiana z logiką PHP.
$wynik = preg_replace_callback(
    '/\d+/',
    fn(array $m): string => (string) ((int) $m[0] * 2),
    "Ceny: 10 i 20 zł"
);
echo $wynik . "<br>"; // Ceny: 20 i 40 zł

// Przykład demonstracyjny, nie metoda bezpiecznego oczyszczania HTML.
$html = '<p>Tekst <b>bold</b> <script>x</script></p>';
echo preg_replace('~</?(?!p\b|b\b)[^>]*>~i', '', $html) . "<br>";

// Do oczyszczania niezaufanego HTML użyj odpowiedniej biblioteki.

echo "<br>=== 5. preg_split() i preg_grep() – tablice ===<br>";

$czesci = preg_split('/[\s,]+/', "jabłko, banan  kiwi,    pomarańcza");
print_r($czesci);

print_r(preg_split('/,/', "a,,b"));
print_r(explode(",", "a,,b"));

// preg_grep() zachowuje oryginalne klucze tablicy.
$pliki = [
    "raport.pdf",
    "zdjecie.jpg",
    "logo.png",
    "notatka.txt",
    "skan.jpeg"
];

$obrazy = preg_grep('/\.(jpe?g|png)$/i', $pliki);
print_r($obrazy);

// array_values($obrazy) przywróci indeksy 0, 1, 2.

echo "<br>=== 6. preg_quote() – bezpieczeństwo wzorców ===<br>";

$szukaneFrazy = ["C++", "PHP 8", '$var', "a.b"];
$tekstDoPrzeszukania = 'Uczę się C++ od PHP 8, $var i a.b';

foreach ($szukaneFrazy as $fraza) {
    $wzorzec = '/' . preg_quote($fraza, '/') . '/u';
    var_dump(preg_match($wzorzec, $tekstDoPrzeszukania));
}

echo "<br>=== 7. Obsługa błędów i wydajność ===<br>";

// Niepoprawny wzorzec może spowodować ValueError w PHP 8.x.
// Operator @ nie przechwytuje wyjątków.
/*$zlyWzorzec = '/[nie domknięty/';

try {
    $wynik = preg_match($zlyWzorzec, "tekst");
    var_dump($wynik);
} catch (ValueError $e) {
    echo "Wyjątek: "
        . htmlspecialchars($e->getMessage(), ENT_QUOTES, 'UTF-8')
        . "<br>";
}
*/

// Poprawny wzorzec: dopasowanie jednej lub większej liczby cyfr.
$wzorzec = '/[0-9]+/';

try {
    $wynik = preg_match($wzorzec, "123 abc");
    var_dump($wynik); // int(1)
} catch (ValueError $e) {
    echo "Błąd wzorca: " . $e->getMessage();
}

echo htmlspecialchars(preg_last_error_msg(), ENT_QUOTES, 'UTF-8') . "<br>";

/*try {
    preg_match('/[/', "tekst");
} catch (ValueError $e) {
    echo "Wyjątek: "
        . htmlspecialchars($e->getMessage(), ENT_QUOTES, 'UTF-8')
        . "<br>";
}
*/
// Wydajność:
// - preg_match() sprawdza, czy istnieje dopasowanie.
// - preg_match_all() wyszukuje wszystkie dopasowania.
// - Do prostych operacji używaj strpos() lub str_replace(), gdy wystarczą.
// - PHP/PCRE2 buforuje skompilowane wzorce.

echo "=== Koniec przykładu ===<br>";
