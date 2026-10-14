<?php
// Przykład funkcji wbudowanych dla daty i czasu w PHP 8.2
// Wszystkie poniższe funkcje działają w PHP 8.2
// Wymaga ustawienia strefy czasowej (najlepiej raz, na początku aplikacji):
date_default_timezone_set("Europe/Warsaw");

echo "=== 1. Aktualny czas – podstawy ===<br>";

// time() – aktualny uniksowy timestamp (sekundy od 1.01.1970)
$teraz = time();
echo "Timestamp: $teraz<br>";                                  // np. 1760428800

// microtime() – z mikrosekundami (do pomiaru czasu wykonania)
echo microtime(true) . "<br>";                                 // np. 1760428800.123456

// date() – formatuje timestamp (domyślnie aktualny) jako string
echo date("Y-m-d") . "<br>";                                   // np. 2026-10-14
echo date("d.m.Y H:i:s") . "<br>";                             // np. 14.10.2026 15:30:00
echo date("l, j F Y", $teraz) . "<br>";                        // Wednesday, 14 October 2026
echo date("N") . "<br>";                                       // 3 (ISO: 1=poniedziałek ... 7=niedziela)

// gmdate() – jak date(), ale w UTC (bez wpływu strefy czasowej)
echo gmdate("H:i") . "<br>";                                   // czas UTC

// Najważniejsze znaki formatu:
// Y – rok 4 cyfry | y – 2 cyfry | m – miesiąc 01-12 | n – miesiąc bez zer
// d – dzień 01-31 | j – bez zer | H – godzina 00-23 | i – minuty | s – sekundy
// w – dzień tygodnia 0(niedz)-6 | N – ISO 1(pon)-7 | z – dzień roku

echo "<br>=== 2. Tworzenie timestampów ===<br>";

// mktime() – timestamp z konkretnych składowych (godzina, min, sek, miesiąc, dzień, rok)
$timestamp = mktime(15, 30, 0, 10, 14, 2026);
echo date("Y-m-d H:i:s", $timestamp) . "<br>";                  // 2026-10-14 15:30:00

// strtotime() – zamiana tekstu na timestamp (bardzo potężne!)
echo strtotime("2026-10-14") . "<br>";                          // timestamp tego dnia
echo strtotime("next Monday") . "<br>";                         // poniedziałek najbliższy
echo strtotime("+2 days") . "<br>";                            // za 2 dni od teraz
echo strtotime("-1 week") . "<br>";                            // tydzień temu
echo date("Y-m-d", strtotime("first day of next month")) . "<br>"; // 1. dnia następnego miesiąca

// UWAGA: strtotime() zwraca false przy nieparsowalnym tekście (PHP 8: false)
var_dump(strtotime("bzdura") === false);                        // true

// checkdate() – walidacja daty (przestępne lata uwzględnia!)
var_dump(checkdate(2, 29, 2024));                               // true (2024 przestępny)
var_dump(checkdate(2, 29, 2025));                               // false

echo "<br>=== 3. Formatowanie i parsowanie ===<br>";

// date() – formatowanie ze znanym już formatem
echo date("d/m/Y", strtotime("2026-12-24")) . "<br>";          // 24/12/2026

// strftime() – UWAGA: DEPREKOWANE od PHP 8.1, usunięte w 8.2! (nie używać)
// zamiast tego IntlDateFormatter z rozszerzenia intl (lokalizacja dat):
// $fmt = new IntlDateFormatter("pl_PL", ...);

// idate() – pojedyncza składowa daty jako int
echo idate("Y") . "<br>";                                      // 2026

// getdate() – tablica ze składowymi daty
$skladowe = getdate();
print_r($skladowe);
// Array ( [seconds] => ..., [minutes] => ..., [hours] => ...,
//         [mday] => 14, [wday] => 3, [mon] => 10, [year] => 2026, ... )

// localtime() – jak getdate(), ale styl C
// (rzadko używane, pomijamy szczegóły)

echo "<br>=== 4. Klasa DateTime – nowoczesne podejście ===<br>";

// new DateTime – obiekt zamiast proceduralnych funkcji
$data = new DateTime("2026-10-14");
echo $data->format("d.m.Y") . "<br>";                           // 14.10.2026

// modify() – przesuwanie daty
$data->modify("+1 month");
echo $data->format("d.m.Y") . "<br>";                           // 14.11.2026

// add() / sub() – z obiektem DateInterval
$urodziny = new DateTime("2000-05-20");
$interval = new DateInterval("P10Y5M3D");                      // Period: 10 lat 5 mies. 3 dni
$urodziny->add($interval);
echo $urodziny->format("Y-m-d") . "<br>";                       // 2010-10-23

// diff() – różnica między datami (DateInterval)
$d1 = new DateTime("2000-01-01");
$d2 = new DateTime("2026-10-14");
$roznica = $d1->diff($d2);
echo "Różnica: " . $roznica->y . " lat, " . $roznica->days . " dni<br>"; // 26 lat, ... dni

// DateTimeImmutable – bezpieczniejszy wariant (modify() NIE zmienia oryginału!)
$d = new DateTimeImmutable("2026-10-14");
$nowa = $d->modify("+1 day");
echo $d->format("d.m") . " / " . $nowa->format("d.m") . "<br>"; // 14.10 / 15.10 (oryginał nietknięty)

// DateTimeZone – praca ze strefami
$utc = new DateTime("now", new DateTimeZone("UTC"));
echo $utc->format("H:i") . "<br>";                              // czas w UTC

echo "<br>=== 5. Porównywanie dat ===<br>";

$a = new DateTime("2026-10-14");
$b = new DateTime("2026-12-24");

// Obiekty DateTime porównujemy operatorami (działa poprawnie!)
var_dump($a < $b);                                              // true
var_dump($a == $b);                                             // false

// W proceduralnym stylu – porównanie timestampów
var_dump(strtotime("2026-10-14") < strtotime("2026-12-24"));    // true

echo "<br>=== 6. Pomiar czasu wykonania ===<br>";

// microtime() – klasyczny sposób (przed i po)
$start = microtime(true);
$suma = 0;
for ($i = 0; $i < 100000; $i++) { $suma += $i; }
$koniec = microtime(true);
printf("Pętla trwała: %.4f s<br>", $koniec - $start);

// hrtime() – monotonyczny zegar wysokiej rozdzielczości (od PHP 7.3, bardziej niezawodny)
$startHR = hrtime(true);
$suma = 0;
for ($i = 0; $i < 100000; $i++) { $suma += $i; }
$koniecHR = hrtime(true);
printf("hrtime: %.4f ms<br>", ($koniecHR - $startHR) / 1e6);

echo "<br>=== 7. Inne przydatne funkcje ===<br>";

// uniqid() – identyfikator na bazie czasu (nie do bezpieczeństwa!)
echo uniqid() . "<br>";                                         // np. 67703a2b4d5ef

// sleep() / usleep() – wstrzymanie wykonania (sekundy / mikrosekundy)
// sleep(2);   // pauza 2 sekundy – ostrożnie, blokuje proces!
// usleep(500000); // 0,5 s

// date_default_timezone_set() / date_default_timezone_get()
echo date_default_timezone_get() . "<br>";                      // Europe/Warsaw

// timezones – lista stref czasowych
$strefy = DateTimeZone::listIdentifiers();
echo "Liczba stref: " . count($strefy) . "<br>";                 // ~400

// last day of month – częsty trik z strtotime
echo date("Y-m-t") . "<br>";                                    // ostatni dzień bieżącego miesiąca (t = dni w miesiącu)
echo date("Y-m-t", strtotime("2026-02-01")) . "<br>";           // 2026-02-28 (2026 nieprzestępny)

echo "<br>=== Koniec przykładu ===<br>";