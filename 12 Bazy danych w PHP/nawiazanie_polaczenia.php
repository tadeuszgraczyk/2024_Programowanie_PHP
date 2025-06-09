<?php
// Nawiązanie połączenia z serwerm
$do_bazy = new mysqli('localhost','root','','biblioteka');
// Utworzenie zapytania
$zapytanie = 'INSERT INTO autorzy(IDAutor,imie,nazwisko) VALUES (3,"Adam","Asnyk")';
// Przesłanie zapytania
$wynik = $do_bazy->query($zapytanie);
//Przetwarzanie wyników fetch_object() wynik w postaci obiektu
while($row = $wynik->fetch_object())
{
	$IDAutor = $row->IDAutor;
	$imie = $row->imie;
	$nazwisko=$row->nazwisko;
	printf("(%s): %s %s <br>",$IDAutor,$imie,$nazwisko);
}
//Okreslenie liczby zwróconych wierszy
	printf("W tej chwili iloć autorów: %s <br>", $wynik->num_rows);
// Zwolnienie pamięci
$wynik->free();
// Tu można zadać kolejne zapytanie
$do_bazy->close();
?>