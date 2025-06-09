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

    $q = "INSERT INTO rodzina VALUES (NULL, 'TEST', NULL)";
    $query = mysqli_query($db, $q);

    $all = mysqli_query($db, "SELECT * FROM rodzina");
    while($line = mysqli_fetch_assoc($all)) {
        echo "<br>" . $line['id'] . " | " . $line['nazwa'] . " | " . $line['opis'];
        if(is_null($line['opis'])) echo "<i>null</i>";
    }

    mysqli_close($db);
}