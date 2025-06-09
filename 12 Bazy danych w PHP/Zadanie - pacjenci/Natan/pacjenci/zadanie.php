<?php

$db_host = 'localhost';
$db_user = 'root';
$db_pass = '';
$db_name = '3pir_2_pacjenci';

$db = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
$data = fopen("dane.txt", 'r');

$data_array = array();
while($line = fgets($data)) {
    array_push($data_array, explode(" ", $line));
}

foreach($data_array as $array) {
    $q = 'INSERT INTO tabela_1 VALUES (NULL,"' . trim(implode('","', $array)) . '")';
    $query = mysqli_query($db, $q);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
table {
  border-collapse: collapse;
}
td {
    border: 1px solid black;
    padding: 3px;
}
</style>
<body>
<table>
    <tr>
        <td>id</td>
        <td>imie</td>
        <td>nazwisko</td>
        <td>email</td>
    </tr>
    <?php

        $all = mysqli_query($db, "SELECT * FROM tabela_1");
        while($line = mysqli_fetch_assoc($all)) {
            echo "<tr><td>" . $line['id'] . "</td><td>" . $line['imie'] . "</td><td>" . $line['nazwisko'] . "</td><td>" . $line['email'] . "</td></tr>";
            echo "</td></tr>";
        }

        mysqli_close($db);

    ?>
</table>
</body>
</html>