<?php
    $host = "localhost";
    $user = "root";
    $password = "";
    $database = "3pir_2_pacjenci";

    $conn = mysqli_connect($host, $user, $password, $database);
    $plik = file("dane.txt");
    $tab;
    foreach($plik as $line){
        $tab = explode(" ", $line);
        $result = $conn -> query("INSERT INTO tabela_1 VALUES ('".$tab[0]."', '".$tab[1]."', '".$tab[2]."', '".$tab[3]."');");
    }
    echo "Wpisane dane";
?>