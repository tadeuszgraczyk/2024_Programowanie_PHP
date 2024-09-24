<!--Użycie składni nowdoc 6.14
----------------------------------------------->
<?php
$napis="napis z wykorzystaniem składni nowdoc<hr>";
$tekst=<<<'PC'
Tutaj rozpoczyna się napis $napis
i coś jeszcze
PC;

echo $napis;
echo "<br>teraz ---> $tekst <br>";

