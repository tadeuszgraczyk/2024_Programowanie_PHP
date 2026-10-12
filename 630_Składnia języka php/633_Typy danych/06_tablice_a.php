<!--Typ array
---------------------------------------------------->
<?php
$tab=array("t1","t2","t3","t4");
echo $tab[0];
echo "<hr>";

$ks=array("Dżuma","Potop","Obcy","Wiedźmin");
echo $ks[1];

echo "<hr>";

$im[0]="Jan";
$im[1]="Paweł";
$im[2]="Michał";
$im[3]="Tomek";
echo $im[1];

echo "<hr>";

$im[0]="Jan";
$im[1]="Paweł";
$im[2]="Michał";
$im[3]="Tomek";
echo $im[1]."<br>";
$im[]="Maciek";
echo $im[4];

echo "<hr>";

$tab[]=1;
$tab[]=2;
$tab[]=3;
$tab[]=4;
$tab[]=5;
echo $tab[2];

echo "<hr>";

//Tablica asocjacyjna 6.18 z dodatkiem

$tab_asoc = array(
    "hasło1"=>"toster",
    "hasło2"=>"kapiszon",
    "hasło3"=>"naleśnik Witolda"
);
echo $tab_asoc["hasło3"]."<br>";

$osoba = array("nazwisko"=>"Kowalski", "imie"=>"Jan", "wiek"=>17);
echo "zjadł ".$osoba["nazwisko"];

echo "<hr>";

$osoba["nazwisko"]="Kowalski";
$osoba["imie"]="Jan";
$osoba["wiek"]=17;
echo $osoba["wiek"]+1;

echo "<hr>";

/*Tablica wielowymiarowa 6.20
----------------------------------*/
$dane = array(
    array("nazwisko"=>"Kowalski",
        "imie"=>"Jan",
        "wiek"=>27),
    array("nazwisko"=>"Nowak",
        "imie"=>"Paweł",
        "wiek"=>24),
    array("nazwisko"=>"Górka",
        "imie"=>"Tomasz",
        "wiek"=>29)
);
echo $dane[2]["imie"];

echo "<hr>";