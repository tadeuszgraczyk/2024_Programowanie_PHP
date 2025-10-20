<!--Użycie składni heredoc 6.12-->
<!---------------------------------------------->

<?php
$napis="napis z wykorzystaniem składni heredoc";
$tekst=<<<TX
Tutaj rozpoczyna się napis $napis
i coś jeszcze<br>
TX;
echo $tekst."<hr>";
?>

<!--Przykład 6.13-->
<!DOCTYPE HTML>
<html lang="pl">
<head>
    <title>Skrypt PHP</title>
    <meta charset="UTF-8">
</head>
<body>
<?php
$imie = "Anna";
$jezyk1 = "PHP";
$jezyk2 = "JavaScript";
$tekst = <<<TX
  Mam na imię $imie.
  Uczę się programować w języku $jezyk1.
  Umiem już programować w $jezyk2.
TX;
echo $tekst;
?>
</body>
</html>