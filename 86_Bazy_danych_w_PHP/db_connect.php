<?php
$dbServer = 'localhost';
$dbUser = 'root';
$dbPassword = '';
$dbName = 'kurs_php7';

$mysqli = new mysqli($dbServer,$dbUser,$dbPassword,$dbName);
if(mysqli_connect_errno()){
	echo 'Błąd bazy danych';
}
?>
// w html
<?php include('db_connect.php'); 
$result = $mysqli->query("SELECT * FROM articles order by id");
while($article = mysqli_fetch_array($result) ){
print_r($article);
}
?>