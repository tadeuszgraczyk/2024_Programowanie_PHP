<?php
// Nawiązanie połączenia z serwerm
$do_bazy = new mysqli('localhost','root','','biblioteka');
// Utworzenie zapytania
$zapytanie = 'SELECT id, imie, nazwisko FROM autorzy ORDER by nazwisko';
// Przesłanie zapytania
$wynik = $do_bazy->query($zapytanie);
//Przetwarzanie wyników fetch_object() wynik w postaci obiektu
while($row = $wynik->fetch_object())
{
    $IDAutor = $row->id;
    $imie = $row->imie;
    $nazwisko=$row->nazwisko;
    printf("(%s): %s %s <br>",$IDAutor,$imie,$nazwisko);
}
// Zwolnienie pamięci
$wynik->free();
// Tu można zadać kolejne zapytanie
$do_bazy->close();
?>