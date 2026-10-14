<?php
// Przykład funkcji wbudowanych do obsługi JSON w PHP 8.2
// Wszystkie poniższe funkcje działają w PHP 8.2

echo "=== 1. json_encode() – PHP → JSON ===<br>";

$osoba = [
    "imie" => "Anna",
    "wiek" => 28,
    "miasto" => "Warszawa",
    "aktywna" => true,
    "hobby" => ["czytanie", "wspinaczka"],
    "adres" => null,
];

// Podstawowe użycie – tablica/string PHP → tekst JSON
$json = json_encode($osoba);
echo $json . "<br>";
// {"imie":"Anna","wiek":28,"miasto":"Warszawa","aktywna":true,"hobby":["czytanie","wspinaczka"],"adres":null}

// KLASYCZNA PUŁAPKA: polskie znaki są escapowane do \uXXXX!
echo json_encode("żółć") . "<br>";                             // "\u017c\u00f3\u0142\u0107"
// Rozwiązanie: JSON_UNESCAPED_UNICODE
echo json_encode("żółć", JSON_UNESCAPED_UNICODE) . "<br>";     // "żółć"

// JSON_PRETTY_PRINT – czytelne wcięcia (do debugowania, nie do produkcji)
echo json_encode($osoba, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) . "<br>";

// JSON_UNESCAPED_SLASHES – bez \/
echo json_encode("https://example.com/") . "<br>";            // "https:\/\/example.com\/"
echo json_encode("https://example.com/", JSON_UNESCAPED_SLASHES) . "<br>"; // "https://example.com/"

// Inne przydatne flagi:
// JSON_NUMERIC_CHECK – konwertuje liczbowe stringi na liczby
// JSON_FORCE_OBJECT – wymusza obiekt {} zamiast tablicy []
// JSON_THROW_ON_ERROR – patrz sekcja 4 (najważniejsza!)
// JSON_PARTIAL_OUTPUT_ON_ERROR – zapisuje co się da zamiast kończyć błędem

echo "<br>=== 2. Różnice typów: co wypada z PHP ===<br>";

// Tablica sekwencyjna → tablica JSON
echo json_encode([1, 2, 3]) . "<br>";                           // [1,2,3]

// Tablica asocjacyjna → obiekt JSON
echo json_encode(["a" => 1, "b" => 2]) . "<br>";                // {"a":1,"b":2}

// Pusta tablica → [] (tablica JSON), NIE {} – częsta niespodzianka!
echo json_encode([]) . "<br>";                                  // []
echo json_encode([], JSON_FORCE_OBJECT) . "<br>";               // {} – wymuszenie obiektu

// stdClass → obiekt JSON
$obj = new stdClass();
$obj->x = 10;
echo json_encode($obj) . "<br>";                                 // {"x":10}

// UWAGA na tablice z dziurami (po array_filter!) – klucze nie od zera = obiekt
$parzyste = array_filter([1, 2, 3, 4], fn($n) => $n % 2 === 0);
echo json_encode($parzyste) . "<br>";                            // {"1":2,"3":4} – klucze jako stringi!
echo json_encode(array_values($parzyste)) . "<br>";             // [2,4] – naprawione

// Floaty: precyzja serializacji
echo json_encode(0.1 + 0.2) . "<br>";                            // 0.30000000000000004
// JSON_PRESERVE_ZERO_FRACTION – zachowuje 3.0 jako 3.0 (a nie 3)
echo json_encode(3.0, JSON_PRESERVE_ZERO_FRACTION) . "<br>";    // 3.0

echo "<br>=== 3. json_decode() – JSON → PHP ===<br>";

$jsonTekst = '{"imie":"Anna","wiek":28,"hobby":["czytanie","wspinaczka"]}';

// Domyślnie: obiekty JSON → stdClass
$obj = json_decode($jsonTekst);
echo $obj->imie . "<br>";                                        // Anna (UWAGA: ->, nie [])

// assoc = true: obiekty JSON → tablice asocjacyjne (najczęściej wygodniejsze)
$tab = json_decode($jsonTekst, true);
echo $tab["imie"] . "<br>";                                      // Anna
print_r($tab);
// ["imie" => "Anna", "wiek" => 28, "hobby" => ["czytanie", "wspinaczka"]]

// Zagnieżdżone dane – działają naturalnie
echo $tab["hobby"][0] . "<br>";                                  // czytanie

// Skalary: string JSON → string, liczba JSON → int/float
var_dump(json_decode('"tekst"', true));                          // string(5) "tekst"
var_dump(json_decode('42', true));                               // int(42)
var_dump(json_decode('null', true));                             // NULL
var_dump(json_decode('[]', true));                               // array(0) {}

// depth – domyślnie 512 poziomów zagnieżdżenia (podwyższaj tylko świadomie)
$glebokie = json_decode('{"a":{"b":{"c":1}}}', true);
echo $glebokie["a"]["b"]["c"] . "<br>";                          // 1

// JSON_BIGINT_AS_STRING – duże liczby (> PHP_INT_MAX) bez utraty precyzji
var_dump(json_decode('{"id": 9223372036854775808}', true));         // id jako float 9.2233720368548E+18
var_dump(json_decode('{"id": 9223372036854775808}', true, 512, JSON_BIGINT_AS_STRING)); // id jako string

echo "<br>=== 4. Obsługa błędów – NAJWAŻNIEJSZA CZĘŚĆ! ===<br>";

// STARY, ZŁY styl (przed PHP 8): sprawdzać json_last_error()
$zly = json_decode('{"imie": "Anna",}');                      // przecinek na końcu = błąd
if (json_last_error() !== JSON_ERROR_NONE) {
    echo "Błąd: " . json_last_error_msg() . "<br>";            // Syntax error
}

// NOWY styl od PHP 8.0: JSON_THROW_ON_ERROR – wyjątek zamiast null + kod błędu
try {
    json_decode('{"imie": "Anna",}', true, 512, JSON_THROW_ON_ERROR);
} catch (JsonException $e) {
    echo "Wyjątek: " . $e->getMessage() . "<br>";              // Syntax error
}

// To samo działa przy kodowaniu:
try {
    json_encode("\xB1\x31", JSON_THROW_ON_ERROR);              // nieprawidłowe UTF-8
} catch (JsonException $e) {
    echo "Błąd kodowania: " . $e->getMessage() . "<br>";       // Malformed UTF-8 characters
}

// UWAGA: bez flagi JSON_THROW_ON_ERROR json_decode zwraca null przy błędzie,
// a "null" to też poprawny JSON – dlatego null z json_decode jest NIEJEDNOZNACZNY!
// W PHP 8 zawsze używaj JSON_THROW_ON_ERROR.

echo "<br>=== 5. Praktyczne wzorce ===<br>";

// Zapis do pliku JSON
$dane = ["status" => "ok", "items" => [1, 2, 3]];
file_put_contents(__DIR__ . "/dane.json",
    json_encode($dane, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

// Odczyt z pliku JSON
$wczytane = json_decode(file_get_contents(__DIR__ . "/dane.json"), true);
print_r($wczytane);                                              // ["status" => "ok", "items" => [1,2,3]]

// API: odbieranie JSON z request body (np. POST)
// $input = json_decode(file_get_contents("php://input"), true, 512, JSON_THROW_ON_ERROR);

// API: wysyłanie odpowiedzi JSON
// header("Content-Type: application/json; charset=utf-8");
// echo json_encode($dane, JSON_UNESCAPED_UNICODE | JSON_THROW_ON_ERROR);

// Walidacja "czy to poprawny JSON?"
function jestJson(string $tekst): bool {
    try {
        json_decode($tekst, true, 512, JSON_THROW_ON_ERROR);
        return true;
    } catch (JsonException) {
        return false;
    }
}
var_dump(jestJson('{"a":1}'));                                    // true
var_dump(jestJson('bzdura'));                                    // false

echo "<br>=== 6. JsonSerializable – własne obiekty ===<br>";

// Klasa może kontrolować, jak wygląda jej reprezentacja JSON
class Uzytkownik implements JsonSerializable {
    public function __construct(
        private string $imie,
        private string $email,
        private string $hasloHash,                              // NIGDY do JSON!
    ) {}

    public function jsonSerialize(): mixed {
        return [
            "imie" => $this->imie,
            "email" => $this->email,
            // hasloHash celowo POMINIĘTE – bezpieczeństwo!
        ];
    }
}

$uzytkownik = new Uzytkownik("Anna", "anna@example.com", "tajnyHash");
echo json_encode($uzytkownik, JSON_THROW_ON_ERROR) . "<br>";    // {"imie":"Anna","email":"anna@example.com"}
// UWAGA: publiczne właściwości klas NIEimplementujących JsonSerializable
// trafiłyby do JSON automatycznie (i mogłyby wyciec poufne dane)!

echo "<br>=== 7. Inne przydatne funkcje ===<br>";

// json_last_error() / json_last_error_msg() – patrz sekcja 4 (bez JSON_THROW_ON_ERROR)
echo json_last_error() . "<br>";                                // 0 (JSON_ERROR_NONE)

// json_validate() – NOWOŚĆ PHP 8.3 (w 8.2 używaj json_decode + try/catch)
// var_dump(json_validate('{"a":1}'));                         // true – szybsze niż pełny decode

//serialize/unserialize – NIE to samo co JSON! (format PHP, przechowuje typy/obiekty,
// ale nie jest przenośny między językami i bywa niebezpieczny)
echo serialize(["a" => 1, "b" => [1, 2]]) . "<br>";             // a:2:{s:1:"a";i:1;s:1:"b";a:2:{i:0;i:1;i:1;i:2;}}
var_dump(unserialize('a:1:{s:1:"a";i:1;}'));                    // ["a" => 1]

echo "<br>=== Sprzątanie ===<br>";
// unlink(__DIR__ . "/dane.json");  // odkomentuj, jeśli chcesz usunąć plik testowy

echo "=== Koniec przykładu ===<br>";