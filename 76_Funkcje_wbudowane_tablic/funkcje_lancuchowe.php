<?php
// Przykład funkcji wbudowanych dla łańcuchów znaków w PHP 8.2
// Wszystkie poniższe funkcje działają w PHP 8.2

echo "=== 1. Podstawowe informacje ===<br>";

$tekst = "Witaj w świecie PHP 8.2";
$imie = "Anna";

// strlen() – długość w bajtach (uwaga: nie w znakach!)
echo "Długość: " . strlen($tekst) . "<br>";                     // 25

// mb_strlen() – długość w znakach (bezpieczne dla UTF-8)
echo "Znaki UTF-8: " . mb_strlen("żółć") . "<br>";              // 4 (strlen zwróciłby 8!)

// strtolower() / strtoupper() – zmiana wielkości liter
echo strtolower("WIELKIE LITERY") . "<br>";                     // wielkie litery
echo strtoupper("małe litery") . "<br>";                        // MAłE LITERY - problem znaków

echo mb_strtolower("małe litery", "UTF-8") . "<br>";
echo mb_strtoupper("zażółć gęślą jaźń", "UTF-8") . "<br>";

// mb_strtolower() / mb_strtoupper() – wersje wielobajtowe
echo mb_strtoupper("żółw") . "<br>";                            // ŻÓŁW

// ucfirst() / lcfirst() / ucwords() – pierwsza litera, pierwsze słowa
echo ucfirst("witaj świecie") . "<br>";                        // Witaj świecie
echo ucwords("jan kowalski") . "<br>";                         // Jan Kowalski

// trim(), ltrim(), rtrim() – usuwanie białych znaków z końców
$zBialymi = "   tekst ze spacjami   ";
echo "[" . trim($zBialymi) . "]<br>";                           // [tekst ze spacjami]
echo "[" . trim("xxtekstxx", "x") . "]<br>";                    // [tekst] – można podać znaki

echo "<br>=== 2. Wyszukiwanie i sprawdzanie ===<br>";

// strpos() – pozycja pierwszego wystąpienia (uwaga: zwraca false gdy brak!)
$pozycja = strpos($tekst, "świecie");
var_dump($pozycja);                                             // int(11)

// KLASYCZNA PUŁAPKA: porównanie z ===, bo 0 == false
var_dump(strpos($tekst, "W") !== false);                        // true
var_dump(strpos($tekst, "X") !== false);                        // false

// str_contains(), str_starts_with(), str_ends_with() – od PHP 8.0
var_dump(str_contains($tekst, "PHP"));                          // true
var_dump(str_starts_with($tekst, "Witaj"));                     // true
var_dump(str_ends_with($tekst, "8.2"));                         // true

// strstr() – zwraca fragment od pierwszego wystąpienia do końca
echo strstr("jan@example.com", "@") . "<br>";                   // @example.com

// substr_count() – liczba wystąpień podłańcucha
echo "Wystąpienia 'a': " . substr_count("banany", "a") . "<br>"; // 2

echo "<br>=== 3. Wycinanie i zamiana ===<br>";

// substr() – wycina fragment (od pozycji, długość; ujemne od końca)
echo substr("Witaj świecie", 0, 5) . "<br>";                    // Witaj
echo substr("Witaj świecie", -6) . "<br>";                      // świecie
echo substr("Witaj świecie", 6, -1) . "<br>";                   // świat (długość -1 = wszystko oprócz ostatniego znaku)

// mb_substr() – wersja wielobajtowa
echo mb_substr("żółw zielony", 0, 4) . "<br>";                  // żółw

// str_replace() / str_ireplace() – zamiana (ireplace = bez wielkości liter)
echo str_replace("PHP", "Perla", $tekst) . "<br>";              // Witaj w świecie Perla 8.2
echo str_ireplace("php", "Python", "Lubię PHP") . "<br>";       // Lubię Python

// str_replace() z tablicami – zamiana wielu wartości naraz
echo str_replace(["a", "b"], ["1", "2"], "abc") . "<br>";       // 12c

// strtr() – translacja znaków / podłańcuchów
echo strtr("abc", ["a" => "1", "b" => "2"]) . "<br>";          // 12c

// substr_replace() – zamiana fragmentu na pozycji
echo substr_replace("1234567890", "AB", 2, 3) . "<br>";         // 12AB67890

// strrev() – odwraca łańcuch (bajtowo, nie UTF-8!)
echo strrev("abcdef") . "<br>";                                 // fedcba

echo "<br>=== 4. dzielenie i łączenie ===<br>";

// explode() – dzieli łańcuch na tablicę
$csv = "jabłko,banan,kiwi";
$owoce = explode(",", $csv);
print_r($owoce);                                                // ["jabłko", "banan", "kiwi"]

// explode() z limitem
print_r(explode(",", "a,b,c,d", 2));                            // ["a", "b,c,d"]

// implode() / join() – łączy tablicę w łańcuch
echo implode(" | ", $owoce) . "<br>";                           // jabłko | banan | kiwi

// str_split() – dzieli na kawałki o stałej długości
print_r(str_split("abcdef", 2));                                // ["ab", "cd", "ef"]

// mb_str_split() – od PHP 7.4, wersja wielobajtowa
print_r(mb_str_split("żółć", 2));                               // ["żó", "łć"]

// wordwrap() – zawija tekst do zadanej szerokości
echo wordwrap("bardzo długi tekst do zawinięcia", 10, "\n", true);

echo "<br>=== 5. Formatowanie ===<br>";

// sprintf() – formatowanie (używane m.in. do zer wiodących, liczb)
echo sprintf("Cześć, %s! Masz %d lat.", $imie, 28) . "<br>";    // Cześć, Anna! Masz 28 lat.
echo sprintf("%05d", 42) . "<br>";                               // 00042
echo sprintf("%.2f", 3.14159) . "<br>";                         // 3.14
echo sprintf("%s ma %03d pomidory", "Ola", 7) . "<br>";          // Ola ma 007 pomidory

// number_format() – formatowanie liczb (separator tysięcy i dziesiętny)
echo number_format(1234567.891, 2, ",", " ") . "<br>";          // 1 234 567,89 (format PL)

// printf() – sprintf + od razu wypisuje
printf("Hex: %X, bin: %b", 255, 10);                            // Hex: FF, bin: 1010

echo "<br>=== 6. Porównywanie ===<br>";

// strcmp() – binarne porównanie (wrażliwe na wielkość liter)
echo strcmp("abc", "abd") . "<br>";                             // wartość ujemna (abc < abd)

// strcasecmp() – bez wielkości liter
var_dump(strcasecmp("ABC", "abc"));                             // 0 – równe

// strnatcmp() – porównanie "naturalne" (jak człowiek: obraz2 < obraz10)
echo strnatcmp("obraz2", "obraz10") . "<br>";                   // ujemne – poprawnie
echo strcmp("obraz2", "obraz10") . "<br>";                      // dodatnie – "błędnie" leksykograficznie

// simila_text() – procent podobieństwa
similar_text("PHP 8", "PHP 8.2", $procent);
echo "Podobieństwo: $procent%<br>";

// soundex() / metaphone() – porównanie brzmienia (fuzzy)
echo soundex("graczyk") . " vs " . soundex("graczyk") . "<br>"; // ten sam kod

echo "<br>=== 7. Inne przydatne funkcje ===<br>";

// nl2br() – zamienia znaki nowej linii na <br> (przy HTML!)
echo nl2br("linia1\nlinia2") . "<br>";

// htmlspecialchars() – ESCAPING do HTML (bezpieczeństwo! zawsze przy wypisywaniu danych od użytkownika)
echo htmlspecialchars('<script>alert("XSS")</script>') . "<br>"; // &lt;script&gt;...

// strip_tags() – usuwa tagi HTML
echo strip_tags("<p>Tekst <b>bold</b></p>") . "<br>";           // Tekst bold

// str_pad() – uzupełnia do zadanej długości
echo "[" . str_pad("abc", 10, "*", STR_PAD_BOTH) . "]<br>";     // [***abc****]
echo "[" . str_pad("7", 3, "0", STR_PAD_LEFT) . "]<br>";        // [007]

// str_repeat() – powtarza łańcuch
echo str_repeat("=", 20) . "<br>";                              // ====================

// lcfirst() / ucfirst() – wielkość pierwszej litery
echo lcfirst("Warszawa") . "<br>";                              // warszawa

// md5() / sha1() / hash() – skróty (do haseł używaj password_*!)
echo hash("sha256", "haslo") . "<br>";                          // skrót SHA-256
// UWAGA: do haseł NIGDY md5/sha1 – używaj password_hash() / password_verify()

//quoted_printable_encode() / inne – pomijamy, rzadkie

echo "<br>=== Koniec przykładu ===<br>";