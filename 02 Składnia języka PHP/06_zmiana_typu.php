<!--Zmiana typu zmiennej - rzutowanie 6.22
------------------------------------------->
<?php
$x = 23.75;
$y = (integer)$x;
echo "x = $x <br>";
var_dump($x);
echo "<br>";
echo "y = $y<br>";
var_dump("$y");
echo "<hr>";
?>

<!--Zmiana typu - trwała 6.23
-------------------------------->
<?php
$x = 97.234;
echo "Wartość zmiennej \$x: $x <br>";
var_dump($x);

echo "<br>";
settype($x, 'string');
echo "Wartość zmiennej \$x: $x <br>";
var_dump($x);

echo "<br>";
settype($x, 'integer');
echo "Wartość zmiennej \$x: $x <br>";
var_dump($x);
?>

<!--Konwersja typu string na liczbę-->
<?php
$przyklad1 = "123 króliczki";
settype($przyklad1,'integer');
$liczba_kroliczkow = $przyklad1;
echo "<br> Co wiemy o liczbie króliczków: $liczba_kroliczkow <br>";
echo "<br>";
var_dump($liczba_kroliczkow);

echo "<br>";

$przyklad1 = "Króliczków 123";
settype($przyklad1,'integer');
$liczba_kroliczkow = $przyklad1;
echo "<br> Co wiemy o liczbie króliczków: $liczba_kroliczkow <br>";
echo "<br>";
var_dump($liczba_kroliczkow);

