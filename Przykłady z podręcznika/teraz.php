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