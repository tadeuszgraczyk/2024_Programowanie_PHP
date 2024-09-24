<?php // To jest tag php. Jeśli pod php nie ma html lub innej zawartości, nie musimy zamykać tagu php.

/* ------- Wyprowadzanie treści ------- */

// Echo - Wyjściowe ciągi, liczby, html itp.
echo 'Hello';
echo 123;
echo '<h1>Hello</h1>';

// print - Podobny do echa, ale nieco wolniejszy
print 'Hello';
echo '<hr>';

// print_r - Daje trochę więcej informacji. Może być używany do drukowania tablic
print_r('Hello');
echo '<hr>';
print_r([1, 2, 3]);
echo '<hr>';
// var_dump - Jeszcze więcej informacji, takich jak typ danych i długość
var_dump('Hello');
echo '<hr>';
var_dump([1, 2, 3]);
echo '<hr>';
// Wprowadzanie znaków z odwrotnym ukośnikiem
echo "Tytuł ulubionej książki to: \"Pan Tadeusz\"";

echo '<hr>';
// apostrofy i cudzysłowia
$haslo = 'toster_elektryczny';

echo 'tutaj pojawi się łańcuch znaków: $haslo<br>';
echo "tutaj pojawi się wartość zmiennej: $haslo<br>";


/* ------------ Komentarze ------------ */

// Komentarz liniowy

/*
      * Komentarz blokowy
      *
      * Może składać się e z wielu linii.
      */

// Jeśli po PHP jest więcej treści, na przykład ten plik, potrzebujesz znacznika końcowego. W przeciwnym razie nie.
?>

<!-- Możesz wyprowadzić dowolny kod HTML, który chcesz w pliku .php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Moja strona PHP<?php echo " - to jest coś co wzbudza podziw." ?></title>
</head>
<body>
<!-- Można umieszczać kod php wewnątrz znaczników HTML -->
<h1>Witaj <?php echo 'Roman'; ?>!!!</h1>
<!-- Możesz pominąć średnik po instrukcji tylko wtedy, gdy bezpośrednio po niej następuje zamykający tag PHP ?>. -->
<h1>Witaj <?= 'Marek' ?></h1>
</body>
</html>
