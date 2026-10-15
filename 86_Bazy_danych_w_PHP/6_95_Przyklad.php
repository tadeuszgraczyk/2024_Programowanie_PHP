<?php

$serwer = 'localhost';
$login = 'root';
$haslo = '';
$baza = 'medica';
$do_bazy = mysqli_connect($serwer, $login, $haslo, $baza);
if (mysqli_connect_errno()) {
    exit("Błąd połączeniaz serwerem MySQL:". mysqli_connect_error());
} else {
    echo"Połączono z serwerem baz danych.<br>";
}