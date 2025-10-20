<?php #  mysqli_connect.php

// Plik zawiera informacje potrzebne  do uzyskania dostępu do bazy danych. 
// Tworzy połączenie z serwerem MySQL, wybiera bazę danych
// i ustawia kodowanie.

// Tworzymy stałe z informacjami potrzebnymi do nawiązania połączenia z bazą.
define ('DB_USER', 'root');
define ('DB_PASSWORD','');
define ('DB_HOST', 'localhost');
define ('DB_NAME', 'baza');

// nawiązujemy połączenie
$dbc = @mysqli_connect (DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) OR die ('Brak połączenia z serwerem MySQL: ' . mysqli_connect_error() );

// określamy kodowanie
mysqli_set_charset($dbc, 'utf8');