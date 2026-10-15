<?php
$dbServer = 'localhost';
$dbUser = 'root';
$dbPassword = '';
$dbName = 'medica';

$mysqli = new mysqli($dbServer, $dbUser, $dbPassword, $dbName);
if (mysqli_connect_errno()) {
    echo 'Błąd bazy danych';
}
?>
    // w html
<?php
$result = $mysqli->query("SELECT opis FROM abonamenty order by id");
while ($article = mysqli_fetch_array($result)) {
    print_r($article);
}
?>