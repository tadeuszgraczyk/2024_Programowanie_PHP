<?php
/* ------------- Ciasteczka (Cookies) ------------ */

/*
  Ciasteczka są mechanizmem do przechowywania danych w przeglądarce użytkownika,
co umożliwia śledzenie lub identyfikację powracających użytkowników.
Możesz ustawić określone dane do przechowywania w przeglądarce i odzyskać je,
gdy użytkownik ponownie odwiedzi stronę.
*/

// Ponieważ ciasteczka są przechowywane po stronie klienta, nie należy w nich przechowywać danych wrażliwych. Sesje są lepszym wyborem do przechowywania takich danych.

// Ustawienie ciasteczka
setcookie('name', 'Brad', time() + 86400 * 30); // 86400 = 1 dzień

// echo time();

// Pobranie ciasteczka
if (isset($_COOKIE['name'])) {
    echo $_COOKIE['name'];
}

// Usunięcie ciasteczka
setcookie('name', '', time() - 86400);
