<?php
$dane = array(
    array("nazwisko"=>"Kowalski",
        "imię"=>"Jan",
        "wiek"=>27),
    array("nazwisko"=>"Nowak",
        "imię"=>"Paweł",
        "wiek"=>24),
    array("nazwisko"=>"Górka",
        "imię"=>"Tomasz",
        "wiek"=>29)
);
echo $dane[2]["imię"];

?>