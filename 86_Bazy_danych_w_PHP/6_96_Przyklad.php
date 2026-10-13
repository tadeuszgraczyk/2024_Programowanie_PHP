<?php

$do_bazy = mysqli_connect('localhost', 'root', '', 'medica');
if (mysqli_connect_errno()) {
    exit("Błądpołączeniaz serwerem MySQL:" . mysqli_connect_error());
} else {
    echo "Połączono z serwerem baz danych";
    mysqli_close($do_bazy);
}

