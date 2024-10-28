<?php
/* ---------- Superglobalne zmienne ---------- */
// Wbudowane zmienne, które są zawsze dostępne w każdym zasięgu

/*
  $GLOBALS - Superglobalna zmienna, która przechowuje informacje o każdej zmiennej w zasięgu globalnym.
  $_GET - Zawiera informacje o zmiennych przekazanych przez URL lub formularz.
  $_POST - Zawiera informacje o zmiennych przekazanych przez formularz.
  $_COOKIE - Zawiera informacje o zmiennych przekazanych przez ciasteczko.
  $_SESSION - Zawiera informacje o zmiennych przechowywanych w sesji.
  $_SERVER - Zawiera informacje o środowisku serwera.
  $_ENV - Zawiera informacje o zmiennych środowiskowych.
  $_FILES - Zawiera informacje o plikach przesłanych do skryptu.
  $_REQUEST - Zawiera informacje o zmiennych przekazanych przez formularz lub URL.
*/

// var_dump($GLOBALS);
// var_dump($_GET);
// var_dump($_REQUEST);
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<ul>
    <li>Host: <?php echo $_SERVER['HTTP_HOST']; ?></li>
    <li>Katalog główny dokumentu: <?php echo $_SERVER['DOCUMENT_ROOT']; ?></li>
    <li>System Root: <?php echo $_SERVER['SystemRoot']; ?></li>
    <li>Nazwa serwera: <?php echo $_SERVER['SERVER_NAME']; ?></li>
    <li>Port serwera: <?php echo $_SERVER['SERVER_PORT']; ?></li>
    <li>Katalog bieżącego pliku: <?php echo $_SERVER['PHP_SELF']; ?></li>
    <li>URI żądania: <?php echo $_SERVER['REQUEST_URI']; ?></li>
    <li>Oprogramowanie serwera: <?php echo $_SERVER['SERVER_SOFTWARE']; ?></li>
    <li>Informacje o kliencie: <?php echo $_SERVER['HTTP_USER_AGENT']; ?></li>
    <li>Adres zdalny: <?php echo $_SERVER['REMOTE_ADDR']; ?></li>
    <li>Zdalny port: <?php echo $_SERVER['REMOTE_PORT']; ?></li>
</ul>
</body>
</html>
