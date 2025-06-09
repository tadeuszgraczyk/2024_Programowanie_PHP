<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $serwer = 'localhost';
        $login = 'root';
        $haslo = '';
        $baza = 'dane2';

        $dataBase = mysqli_connect($serwer,$login,$haslo,$baza);

        if(mysqli_connect_errno())
        {
            exit(" Błąd. Nie pomyślnie połączono z bazą danych: ".mysqli_connect_error());
        }
        else
        {
            echo " Pomyślnie połączono z bazą danych <br>";
            
            $ask = "INSERT INTO rodzina VALUES(NULL,'nowaczkowate',NULL)";
            $result = mysqli_query($dataBase, $ask);
            
            $ask="SELECT * FROM `rodzina`";
            $result = mysqli_query($dataBase, $ask);

            while($wiersz = mysqli_fetch_row($result))
            {
                echo $wiersz[0]." ".$wiersz[1]."<br>";    
            }

            mysqli_close($dataBase);
        }

    ?>
</body>
</html>