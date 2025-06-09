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
        <td>nazwa</td>
        <td>opis</td>
    </tr>
        <?php

        $db_host = 'localhost';
        $db_user = 'root';
        $db_pass = '';
        $db_name = 'dane2';

        $db = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

        if(mysqli_connect_errno()) {
            exit(mysqli_connect_error());
        } else {
            echo 'You are bonza to go.<br>';

            // $q = "INSERT INTO rodzina VALUES (NULL, 'TEST', NULL)";
            // $query = mysqli_query($db, $q);

            $all = mysqli_query($db, "SELECT * FROM rodzina");
            while($line = mysqli_fetch_assoc($all)) {
                echo "<tr><td>" . $line['id'] . "</td><td>" . $line['nazwa'] . "</td><td>" . $line['opis'];
                if(is_null($line['opis'])) echo "<i>null</i>";
                echo "</td></tr>";
            }

            mysqli_close($db);
        }
        ?>
    </table>
</body>
</html>