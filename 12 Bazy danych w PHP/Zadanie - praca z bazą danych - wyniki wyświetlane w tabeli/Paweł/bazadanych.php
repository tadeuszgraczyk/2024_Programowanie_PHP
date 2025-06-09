<?php
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'dane2';

$conn = mysqli_connect($host, $user, $password, $database);
if(mysqli_connect_errno()){
    exit("Błąd połączenia z serwerem MySQL: ".mysqli_connect_error());
}
$result = $conn -> query("INSERT INTO rodzina VALUES (NULL, 'a', 'b')");
$select = $conn -> query("SELECT * FROM rodzina");
echo "<table><th>id</th><th>nazwa</th>";
while($row = $select->fetch_assoc()){
    echo "<tr><td>" .$row['id']."</td><td>".$row['nazwa']."</td></tr>";
}

mysqli_close($conn);