<!--
======================
6.1 Wprowadzenie str. 171
======================
6.1.1 Opis języka.
6.1.2 PHP w HTML.

==================================
6.2 Struktura języka PHP str. 180
==================================
6.2.1 Blok instrukcji PHP
-----------------------------------
Przykład 6.1
<?
echo "Mój pierwszy skrypt PHP";
?>

Przykład 6.2
<?php
echo "Mój pierwszy skrypt PHP";
?>

Przykład 6.3
<?php
echo("Mój pierwszy skrypt PHP");
?>

Przykład 6.4
<?php
print("Mój pierwszy skrypt PHP");
?>
6.2.2 Blok PHP w kodzie HTML
-----------------------------------


Przykład 6.5
-->
<!DOCTYPE HTML>
<html>
<head>
<title>Skrypt PHP</title>
<meta charset="UTF-8">
</head>
<body>
<p>
<?php
echo "Mój pierwszy skrypt PHP";
?>
</p>
</body>
</html>
<!--
=====================
6.3 Składnia języka PHP str. 175
=====================
6.3.1 Komentarze.
6.3.2 Zmienne.
6.3.3 Typy danych.


Zmienne 6.6
-----------------------------------
-->
<?php
   $x=1;
   $nazwa_1="tekst";
   $liczba7=345;
   $ilosc=4;
   echo "Wynik wynosi $x <br>";
   echo "To jest $nazwa_1 <br>";
   echo "$liczba7 <br>";
   echo "Bieżąca wartość to $ilosc";
?>

Zmienne predefiniowane
---------------------------
<?php
   echo $_SERVER['SERVER_NAME']."<br>";
   echo $_SERVER['PHP_SELF']."<br>";
?>

Użycie znaków apostrofu 6.9
----------------------------------------
<?php
    echo 'To jest symbol \' użyty w kodzie PHP';
?>

Użycie znaków apostrofu 6.10
-----------------------------------------
<?php
    $z='to jest tekst';
   echo $z;
?>

Użycie znaków cudzysłowu 6.11
------------------------------------------
<?php
     $z="to jest tekst";
     echo "$z";
?>

Użycie składni heredoc 6.12
------------------------------------------
<?php
$napis="napis z wykorzystaniem składni heredoc";
$tekst=<<<TX
Tutaj rozpoczyna się napis $napis
i coś jeszcze
TX;
echo $tekst;
?>
Przykład 6.13
<!DOCTYPE HTML>
<html>
<head>
<title>Skrypt PHP</title>
<meta charset="UTF-8">
</head>
<body>
<?php
$imie = "Anna";
$jezyk1 = "PHP";
$jezyk2 = "JavaScript";
$tekst = <<<TX
  Mam na imię $imie.
  Uczę się programować w języku $jezyk1.
  Umiem już programować w $jezyk2.
TX;
echo $tekst;
?>
</body>
</html>

 Użycie składni nowdoc 6.14
---------------------------------------------
<?php
$napis="napis z wykorzystaniem składni nowdoc";
$tekst=<<<'PC'
Tutaj rozpoczyna się napis $napis
i coś jeszcze
PC;
echo $tekst;
echo "<br/>teraz $tekst <br/>";
?>

Typ array
 --------------------------------------------------
<?php
$tab=array("t1","t2","t3","t4");
echo $tab[0];

echo "<pre>";
print_r($tab);

var_dump($tab);
echo "</pre>";
?>
Typ array 6.15
--------------------------------------------------
<?php
    $ks=array("Dżuma","Potop","Obcy","Wiedźmin");
    echo $ks[1];
?>

Typ array 6.16
   ----------------------------------------------------

<?php
    $im[0]="Jan";
    $im[1]="Paweł";
    $im[2]="Michał";
    $im[3]="Tomek";
    echo $im[1];
?>

Typ array - dopisanie elementu
   ---------------------------------------------------

<?php
    $im[0]="Jan";
    $im[1]="Paweł";
    $im[2]="Michał";
    $im[3]="Tomek";
    echo $im[1]."<br>";
    $im[]="Maciek";
    echo $im[4];
?>

Tablica 6.17
   -------------------------

<?php
    $tab[]=1;
    $tab[]=2;
    $tab[]=3;
    $tab[]=4;
    $tab[]=5;
    echo $tab[2];
?>


Tablica asocjacyjna 6.18 z dodatkiem
--------------------------

<?php
    $tab_asoc = array(
        "hasło1"=>"toster",
        "hasło2"=>"kapiszon",
        "hasło3"=>"naleśnik Witolda"
    );
    echo $tab_asoc["hasło3"]."<br>";
    $osoba = array("nazwisko"=>"Kowalski", "imię"=>"Jan", "wiek"=>17);
    echo "zjadł ".$osoba["nazwisko"];
?>

Tablica 6.19
-----------------------------------------------------------------------------

<?php
   $osoba["nazwisko"]="Kowalski";
   $osoba["imię"]="Jan";
   $osoba["wiek"]=17;
    echo $osoba["wiek"]+1;
?>

Tablica wielowymiarowa 6.20
----------------------------------
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

Zmiana typu zmiennej - rzutowanie 6.22
-----------------------------------------
<?php
 $x=23.75;
 $y=(integer)$x;
    echo "$x <br>";
    echo "$y";
?>

Zmiana typu - trwała 6.23
------------------------------
<?php
    $x=97.234;
    echo "Wartość zmiennej \$x: $x <br>";
    settype($x, 'string');
    echo "Wartość zmiennej \$x: $x <br>";
    settype($x,'integer');
    echo "Wartość zmiennej \$x: $x <br>";
?>
Stałe 6.24
------------------------------------
<?php
    define("WIEK","21");
    echo "Mamy wiek ".WIEK;
?>



Operator konkatenacji 6.26
----------------------------------
<?php
    $osoba["nazwisko"]="Kowalski";
    $osoba["imię"]="Jan";
    $osoba["wiek"]=27;
    echo $osoba["nazwisko"]." ".$osoba["imię"]." ma ".
        $osoba["wiek"]. " lat.";
?>

Operatory inkrementacji i dekrementacji 6.27
---------------------------------------------
<?php
    $x=7;
    echo $x++; echo "<br>";
    echo ++$x; echo "<br>";
    $v=$x;
    $t=$x++;
    $z=$x;
    $y=++$x;
    echo "Wartość zamiennej \$v = $v <br>";
    echo "Wartość zamiennej \$t = $t <br>";
    echo "Wartość zamiennej \$z = $z <br>";
    echo "Wartość zamiennej \$y = $y <br>";
?>


Instrukcja warunkowa 6.29
------------------------------
<?php
    $x=11;
    $y=7;
    if ($y>$x)
        echo "Wartość zmiennej y jest większa od wartości zmiennej x.";
    if ($y<$x)
        echo "Wartość zmiennej x jest większa od wartości zmiennej y.";
?>

Instrukcja warunkowa 6.30
-------------------------------------
<?php
    $x=11;
    $y=7;
    if ($y>$x)
        echo "Wartość zmiennej y jest większa od wartości x.";
    else
        echo "Wartość x jest większa lub rówana wartości y";
?>

Instrukcja warunkowa
------------------------------------------------------
<?php
    $x=11;
    $y=7;
    $z=$x+$y;
    if ($z<0)
        echo "Wartość z jest ujemna.";
?>

Grupowanie warunków
-----------------------------------------------------------
<?php

$a = 6;
$b = 5;
$c = 7;
$d = 6;
$e = 6;

if( ($a > $b || $a > $c) &&  $d == $e )
   echo 'Zmienna $a jest większa od $b a zmienna $d jest równa $e, '.
      'więc ten tekst pokaże się.';   // Taka konstrukcja jest dozwolona

?>

Instrukcja elseif 6.31
-----------------------------------------------------------
<?php
	$x = 130;
    $y = 90;
	$z = $x - $y;
	echo "Tak działa instrukcja zagnieżdżona <br>";
	echo "x=$x <br>";
	echo "y=$y <br>";
	echo "z=$z <br>";
    if ($z < 0)
	  echo "Wartość z jest ujemna .<br>";
	   elseif ($z < 10)
	    echo "Wartość z jest zawarta w przedziale od 0 do 10.<br>";
	     elseif ($z < 20)
	      echo "Wartość z jest zawarta w przedziale od 10 do 20.<br>";
		   elseif ($z <30)
	           echo "Wartość z jest zawarta w przedziale od 20 do 30.<br>";
			 else
			   echo "Wartość z jest większa od 30.<br>";
  ?>

Instrukcja switch 6.32
--------------------------------------------------------------
  <?php
	$kolor = "red";
	echo "Tak działa instrukcja  <b>switch</b> <br/>";
	switch ($kolor)
	 {
	   case "red"   : echo "Dominuje czerwień"; break;
	   case "blue"  : echo "Dominuje niebieski"; break;
	   case "green" : echo "Dominuje zieleń"; break;
	  default :
	   echo "Brak dominującego koloru";
	 }
  ?>

Operator warunkowy 6.33
-----------------------------------------------------------
  <?php
	echo "Tak działa  <b>operator warunkowy</b> <br/>";
	$x = -12;
	$wynik = ($x < 0) ? "ujemna" : "dodatnia";
	echo "Wartość zmiennej x jest $wynik.";
  ?>

Pętla for 6.34
-------------------------------------------------------------
<?php
 for($i=1; $i<=5; $i++)
     echo "Pętla wykonana $i raz/y <br/>";
?>

Pętla while 6.34
-------------------------------------------------
<?php
 $i=0;
 while ($i++ <5)
 {
     echo "Pętla wykonana $i raz/y <br/>";
 }
?>

Pętla do...while 6.36
------------------------------------------------
<?php
    $i=1;
    do
    {
        echo "Pętla wykonana $i raz/y <br/>";
    }
    while ($i++<5);
?>

Pętla foreach 6.37 i 6.38
------------------------------------------------
<?php
    $tab = array(
        1=>'biały',
        2=>'czarny',
        3=>'niebieski',
        4=>'zielony',
    );
    foreach($tab as $x)
    {
        echo "$x <br/>";
    }
    echo "------------------<br/>";
    foreach($tab as $k1 =>$x)
    {
        echo "tab[$k1]=$x <br/>";
    }
?>

Instrukcja break 6.39
-------------------------------------
<?php
    $i=0;
    while(true)
    {
        echo ("Wypisz $i <br/>");
        if ($i>=20) break;
        $i++;
    }
?>

Instrukcja continue 6.40
-----------------------------------
<?php
    for($i=0; $i<=30 ; $i++)
    {
         if (($i%3)!=0)
        continue;
        echo "$i;";
    }
?>

Naprzemienne bloki kodu PHP i HTML 6.41
------------------------------------------
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Bloki PHP</title>
</head>
<body bgcolor="#dfdfdf">
    <?php
    $tx=true;
    if ($tx)
    {
        ?>
        <table align="left" border="1" width="400" hspace="40" vspace="20" cell-spacing="4">
         <tr><td>Nazwisko</td><td>Imię</td><td>Telefon</td></tr>
         <tr><td>Nowak</td><td>Adam</td><td>600334488</td></tr>
         <tr><td>Kowalski</td><td>Jan</td><td>6003445499</td></tr>
         <tr><td>Górniak</td><td>Mateusz</td><td>6003454549</td></tr>
         <tr><td>Zielonka</td><td>Patryk</td><td>60033445443</td></tr>
        </table>
		<?php
    }
    ?>
</body>
</html>

Definiowanie funkcji 6.42
-----------------------------------------------------------------
<?php
        function napis()
        {
            echo "<h2>Programuj w PHP</h2>";
        }
        napis();
?>

Definiowanie funkcji 6.43
-------------------------------------------------------------
<?php
        function dodaj($a,$b)
        {
            $c=$a+$b;
            echo "Wynik dodawania $a i $b to ".$c;
        }
        dodaj(63,37);
?>

Zwracanie wartości przez funkcję 6.44
-------------------------------------------------------
<?php
        function dodaj($a,$b)
        {
            $c=$a+$b;
            return $c;
        }
        $suma=dodaj(2.5,7.5);
        echo "Wynik dodawania to $suma";
?>

Zmienne globalne 6.45
-------------------------------------------------------
<?php
        $zm=1;
        function pokaz()
        {
            echo "Wartość zmiennej \$zm wynosi $zm. <br/> ";
        }
        pokaz();
?>

Instrukcja global 6.46
---------------------------------------------------------
<?php
        $zm=1;
        function pokaz()
        {
            global $zm;
            echo "Wartość zmiennej \$zm wynosi $zm<br/>";
        }
        pokaz();
?>

Tablica $GLOBALS 6.47
------------------------------------------------------------
<?php
        $zm=7;
        function pokaz()
        {
            echo "Wartość zmiennej \$zm wynosi ";
            echo $GLOBALS['zm'];
            echo ".<br/>";
        }
        pokaz();
?>

Zmienna lokalna 6.48
----------------------------------------------------
<?php
        function tekst()
        {
            $tx="Tekst1";
        }
        echo "Tekst zapisany w zmiennej to: $tx .<br/>";
?>

Zmienne statyczne 6.49
---------------------------
<?php
        function funk()
        {
            $i=1;
            echo "Funkcja wywołana $i raz(y) <br/>";
            $i++;
        }
        funk();
        funk();
        funk();
        funk();
?>

Zmienna statyczna 6.50
---------------------------
<?php
        function funk()
        {
            static $i=1;
            echo "Funkcja wywołana $i raz(y) <br/>";
            $i++;
        }
        funk();
        funk();
        funk();
        funk();


?>

Argumenty przekazywane przez wartość 6.51
------------------------------------------
<?php
        function wart($liczba)
        {
            $liczba+=3;
        }
        $liczba=2;
        echo "Wartość zmiennej \$liczba przed wywołaniem funkcji: $liczba <br/>";
        wart($liczba);
        echo "Wrtość zmiennej \$liczba po wywołaniu funkcji: $liczba <br/>";
?>

Argumenty przekazywane za pomocą referencji 6.52
---------------------------------------------------
<?php
    function wart(&$liczba)
    {
        $liczba+=3;
    }
    $liczba=2;
    echo "Wartość zmiennej \$liczba przed wywołaniem funkcji: $liczba <br/>";
    wart($liczba);
    echo "Wartość zmiennej \$liczba po wywołaniu funkcji: $liczba <br/>";
?>


Domyślne argumenty funkcji 6.53
-----------------------------------------------------
<?php
    function progr($jezyk="PHP")
    {
        return "Język programowania $jezyk";
    }
    echo progr();
    echo "<br />";
    echo progr(null);
    echo "<br />";
    echo progr("JAVA");

?>

Przykład 6.54
------------------------
<?php
    function styl($tekst, $kolor="red")
    {
        echo "<p style=\"color: $kolor\">".$tekst."<p/>";
    }
    styl("Tytuł <br/>","blue");
    styl("Rozdział 1 <br/>","green");
    styl("Treść <br/>");
?>

6.8 Funkcje wbudowane /215
Funkcje tablic 6.55
------------------------------------
1. count().
2. sizeof().
<?php
    $tab = array("e1","e2","e3","e4","e5");
    $dl=count($tab);
    for ($i=0 ; $i<$dl ; $i++)
    {
        echo $tab[$i], " ";
    }
?>

Funkcje sortowania /216
Przykład 6.56
-----------------------------------------

<?php
    $tab = array(3, 2, 5, 7, 9, 0, 1, 4);
    echo "Zawartość tablicy przed sortowaniem: <br/>";
    foreach($tab as $x)
    {
        echo "$x ";
    }
    sort($tab);
    echo "<br/>Zawartość tablicy po sortowaniu: <br/>";
    foreach($tab as $x)
    {
        echo "$x ";
    }
?>

Przykład sortowania tablic - kurs PHP.
----------------------------------------
<?php

$owoce = array ("d"=>"mango", "a"=>"papaja", "b"=>"banan", "c"=>"aronia");
asort ($owoce);
//tablice asocjacyjne od najmniejszej do największej
// rsort($owoce);
// tablice asocjacyjne od największej do najmniejszej
// przypisuje nowe klucze !!!
//ksort($owoce);
// tablice asocjacyjne według klucza od najmniejszej do największej
//krsort($owoce);
// tablice asocjacyjne od według klucza od największej do najmniejszej
reset ($owoce); // Funkcja ta powoduje powrót do pierwszego elementu tablicy
while (list ($klucz, $wartosc) = each ($owoce)) {
    echo "$klucz = $wartosc <br>";
}

?>
------------------------------------------------------
Zadanie 6.7 /217
Skrypt oblicza ilość liczb parzystych i nieparzystych
w tablicy.
------------------------------------------------------
<?php
    $tab = array(3, 5, 5, 7, 9, 3, 1, 7);
    echo "Zawartość tablicy przed sortowaniem: <br/>";
    foreach($tab as $x)
    {
        echo "$x ";
    }
    sort($tab);
    echo "<br/>Zawartość tablicy po sortowaniu: <br/>";
    foreach($tab as $x)
    {
        echo "$x ";
    }
    $parzyste=0;
    $nieparzyste=0;
    foreach($tab as $x)
    {
       if ($x%2==0) $parzyste++;
       else $nieparzyste++;
    }
    echo "<br>Liczb parzystych: $parzyste <br>";
    echo "Liczb nieparzystych: $nieparzyste <br>";

?>
===================================
6.8.2 Funkcje daty i czasu /217
====================================

Funkcje daty i czasu time() 6.57
----------------------------------------------
<?php
    echo time();
?>

Funkcja getdate() 6.58
------------------------------
<?php
    $data = getdate();
    $dzien= $data["mday"];
    $miesiac=$data["mon"];
    $rok=$data["year"];
    if ($dzien<10) $dzien="0".$dzien;
    if ($miesiac<10) $miesiac="0".$miesiac;
    echo "Bieżąca data to: $dzien-$miesiac-$rok r.";
?>

Funkcja date() 6.59/str. 220
-----------------------------
<?php
	//formatowanie w odpowiedni sposób daty i czasu
    echo date("Y-m-d") . "<br/>";
    echo date("d-m-Y") . "<br/>";
    echo date("G:i:s") . "<br/>";
    echo date("H-i-sa") . "<br/>";
    echo date("Y-m-d") . "<br/>";
    echo date("Y-m-d G:i:s") . "<br/>";
?>

Funkcja mktime() 6.60
----------------------------------------------------------
funkcja zwraca znacznik czasu daty podanej jako argument
<?php
    $czas=mktime(16, 30, 0, 12, 24, 2015);
    echo date("d-m-Y G:i", $czas)."<br/";
    echo date("Y-m-d G:i:s",$czas);
?>

Funkcje formatowania ciągów nl2br() 6.61
------------------------------------------
Funkcja ta przed każdym znakiem końca linii automatycznie wstawi
znak <br> i zwróci przetworzony tekst.
<?php
//tekst heredoc
$tekst=<<<TX
Na cóż czekamy zebrani na rynku?
Dziś mają tu przyjść barbarzyńcy.
Dlaczego taka bezczynność w senacie?
Senatorowie siedzą - czemuż praw nie uchwalą?
TX;
    echo "<b>Tekst przed użyciem funkcji nl2br():</b><br/>";
    echo $tekst."<br/><br/>";
    echo "<b>Tekst po użyciu funkcji nl2br(): <br/><br/>";
    echo nl2br($tekst);
?>

Funkcja wordwrap() 6.62 i 6.63
------------------------------------------------------------
Funkcja służy do formatowania kolumny 75 znaków.
<?php
$tekst=<<<TX
    Na cóż czekamy, zebrani na rynku? Dziś mają tu przyjść barbarzyńcy. Dlaczego
    taka bezczynność w senacie? Senatorowie siedzą - czemuż praw nie uchwalają?
TX;
    echo wordwrap($tekst);
    echo "<br>====================<br>";
    echo wordwrap($tekst, 30, "<br>\n");

?>
Funkcja wordwrap() 6.64
---------------------------------------------------------
<?php
    $tekst="Potrzebne informacje znajdują się pod adresem: ";
    $tekst.="http://helion/kategorie/podreczniki-szkolne/technik-informatyk";
    echo wordwrap($tekst, 40, "<br>\n",true);


?>

Funkcje zmiany wielkości liter
-------------------------------------------
<?php
  $duze_litery="TO SĄ DUŻE LITERY";
  $male_litery="to są małe litery";
  echo $duze_litery." zamieniam: ".strtolower($duze_litery)."<br>";
  echo $male_litery." zamieniam: ".strtoupper($male_litery);


?>

Funkcje analizowania ciągu znaków
Funkcja sprawdzająca długość ciągu 6.65
--------------------------------------------
<?php
$napis="Senatorowie siedzą - czemuż praw nie ustalają?";
echo 'Tekst:"'.$napis.'"';
$dl=strlen($napis);
echo "ma długość $dl znaków <br>";
?>

Indeksowanie ciągu znaków 6.66
--------------------------------
<?php
$napis="To jest przykład napisu o senatorach, co siedzą";
echo $napis[0];
echo $napis[20];
?>

Znajdowanie podciągów 6.67
------------------------------
<?php
$dane="Jan Kowalski, ul. Długa 23, 80-874 Gdańsk, tel. 600334455890";
$tel=strstr($dane,"tel.");
echo $tel;
?>

Przykład 6.68
------------------
<?php
$dane="Jan Kowalski, ul. Długa 23, 80-874 Gdańsk, tel. 600334455890";
echo "Ciąg główny:".$dane."<br>";
$tel=strstr($dane,"tel.");
if ($tel==false)
echo "brak numeru telefonu";
else
echo "Znaleziony podciąg: ", $tel;
?>

Przykład 6.69
-------------------
<?php
$dane="Jan Kowalski, ul. Długa 23, 80-874 Gdańsk, tel. 600334455890";
echo substr($dane,4,8);
?>

Odliczanie od końca ciągu 6.70
-------------------------------------
<?php
$dane="Jan Kowalski, ul. Długa 23, 80-874 Gdańsk, tel. 600334455890";
echo substr($dane,-0,14);
?>

Funkcja strtok() 6.71
-----------------------------------
<?php
$dane="Jan Kowalski, ul. Długa 23, 80-874 Gdańsk, tel. 600334455890";
$znak=",";
$ciag=strtok($dane,$znak);
while (is_string($ciag)
{
	if($ciag)
	{
		echo "$ciag<br>";
	}
	$ciag=strtok($znak);
}
?>
Dołączanie plików 6.72
--------------------------
skrypt1.php
<?php
echo "<p>Plik został dołączony</p>";
?>

strona1.php
<!DOCTYPE html>
<html>
<head>
	<title>Strona1</title>
</head>
<body>
<p>Witamy na pierwszej stronie</p>
<?php
include('skrypt1.php');
?>
</body>
</html>

Czy plik istnieje 6.74
--------------------------
<?php
if(file_exists('skrypt.php'))
{
	echo "Plik został znaleziony.";
}
?>

Czy podana nazwa jest plikem 6.75
---------------------------------------
<?php
$p='plik.txt';
if is_file($p)
{
	echo "To jest plik.";
}
?>

Tworzenie i usuwanie pliku
---------------------------------
<?php

touch('plik.txt');
if(file_exists('plik.txt'))
{
	echo "Plik został znaleziony. ";
}
echo "Rozmiar pliku: ".filesize("plik.txt")."<br>";
unlink('plik.txt');
?>

Dopisywanie tekstu do pliku 6.80
---------------------------------
<?php
$tekst="Barbarzńcy, gdy przyjdą, ustanowią prawa.\n";
if(!$p=fopen('dane.txt','a'))
{
	echo "Nie można otworzyć pliku dane.txt";
}
else
{
	if(fwrite($p,$text)===false)
	{
		echo "Zapis do pliku nie powiódł się";
	}
	else
	{
		echo $tekst;
	}
	fclose($p);
}
?>

Odczyt danych 6.81
---------------------------
<?php
if(!$p=fopen('dane.txt','r'))
{
	echo "Nie można otworzyć pliku dane.txt";
}
else
{
	while(!feof($p))
	{
		$w=fgets($p,100);
		echo "$w<br>";
	}
	fclose($p);
}
?>

Odczyt danych z pliku (po znaku) 6.82
------------------------------
<?php
if(!$p=fopen('dane.txt','r'))
{
	echo "Nie można otworzyć pliku dane.txt";
}
else
{
	while(($z=fgetc($p)))!==false)
	{
		echo $z;
	}
	fclose($p);
}
?>

-------------------------------------------------------
mkdir('nazwa_katalogu) - tworzenie katalogu
rmdir('nazwa_katalogu) - usuwanie katalogu
opendir('nazwa_katalogu) - otwieranie katalogu
readdir('nazwa_katalogu) - czytanie zawartości katalogu
--------------------------------------------------------

Odczyt danych z pliku (po bloku) 6.83
--------------------------------------
<?php
if(!$p=fopen('dane.txt','r'))
{
	echo "Nie można otworzyć pliku dane.txt";
}
else
{
	while(!feof($p))
	{
		$b=fred($p,32);
		echo "$b<br>";
	}
    fclose($p);
}
?>

Odczyt zawartości wskazanego katalogu readdir 6.84
-------------------------------------------
<?php
$katalog="./";
if($deskr=opendir($katalog))
{
	while($plik=readdir($deskr))!==false)
		echo "$plik<br>";
	closedir(deskr);
}
else
{
	echo "Nie można otworzyć katalogu";
}
?>
Odczyt zawartości wskazanego katalogu scandir 6.85
-------------------------------------------
<?php
$katalog="./";
$tablica=scandir($katalog);
foreach($tablica as $plik)
{
	echo "$plik<br>";
}
?>
Praktyczne zastosowanie operacji na plikach 6.86/ str. 240
Dodawanie komentarza na stronie
------------------------------------------------------------
plik skrypt1.php

<?php
if (isSet($_POST['komentarz']))
{
	$tekst = substr($_POST['komentarz'],0,255);
	$tekst=strip_tags($tekst)."\n";
	if (!$op=fopen('opinie.txt','a'))
	{
		echo "Błąd!. Nie można otworzyć pliku opinie.txt";
	}
	else
	{
		if(fwrite($op, $tekst)===false)
		{
			echo "Dodanie komentarza nie powodło się";
		}
	}

}
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>OPinie użytkowników</title>
</head>
<body>
   <div>
       <form action="skrypt1.php" method="post">
           <p><b>Dodaj swój komentarz na temat globalnego ocieplenia</b><br/>
           (maksymalnie 255 znaków).</p>
           <textarea name="komentarz"  cols="50" rows="6" wrap="virtual"></textarea><br>
           <input type="submit" value="Wyślij">
       </form>
   </div>

<p><b>Dodane opinie</b></p><br>
   <div>
      <?php
       $opinie='';
       if(file_exists('./opinie.txt'))
      {
        $opinie=file_get_contents('./opinie.txt');
		$opinie=nl2br($opinie);
      }
	  if($opinie!='')
	  {
		  echo $opinie;
	  }
	  else
	  {
		  echo "Brak opinii na temat globalnego ocieplenia.";
	  }
?>
   </div>

</body>
</html>

Funkcje wyjścia 6.87
------------------------
<?php
if(!$p=foprn('dane.txt','r'))
{
	exit ("Nie można otworzyć pliku dane.txt");
}
else
{
	//wykonanie działań na danych
}
?>
=========================================
6.10 Obiekty str. 243
=========================================

6.10.1 Definiowanie klasy i obiektu /243
-----------------------------------------
<?php
class nazwa_klasy
{
	//definicja klasy
}
class nowa
{

}
$nazwa_zmiennej= new nazwa_klasy();
$obiekt_1 = new nowa();
?>

Składowe klasy - właściwości i metody 6.88 /244
--------------------------------------------
<?php
class osoba
{
  public $id, $nazwisko, $imie;
  function wpiszNazwisko($arg1)
  {
	  $this->nazwisko=$arg1;
  }
  function pobierzNazwisko()
  {
	  return $this->nazwisko;
  }
  function wpiszImie($arg2)
  {
	  $this->imie=$arg2;
  }
  function pobierzImie()
  {
	  return $this ->imie;
  }
  function wpiszId($arg3)
  {
	  $this->id=$arg3;
  }
  function pobierzId()
  {
	  return $this->id;
  }
}

?>
======================================
6.10.3 Tworzenie obiektów 6.89 / 246
======================================
<?php
class osoba
{
	public $id, $nazwisko, $imie;
	  function wpiszNazwisko($arg1)
  {
	  $this->nazwisko=$arg1;
  }
  function pobierzNazwisko()
  {
	  return $this->nazwisko;
  }
  function wpiszImie($arg2)
  {
	  $this->imie=$arg2;
  }
  function pobierzImie()
  {
	  return $this ->imie;
  }
  function wpiszId($arg3)
  {
	  $this->id=$arg3;
  }
  function pobierzId()
  {
	  return $this->id;
  }
}

$postac1= new osoba();
$postac2= new osoba();
$postac1 ->nazwisko='Kowalski';
$postac1->imie='Jan';
$postac1->id=1;

$postac2->wpiszNazwisko('Nowak');
$postac2->wpiszImie('Adam');
$postac2->wpiszId(2);

echo $postac1->nazwisko." ".$postac1->imie;
echo "<br>";
echo $postac2->pobierzNazwisko()." ".$postac2->pobierzImie();
?>
=============================
6.10.4 Hermetyzacja str. 248
=============================
Hermetyzacja 6.90
-------------------------
<?php
class osoba
{
	private $nazwisko, $imie;
   public function wpiszNazwisko($arg1)
  {
	  $this->nazwisko=$arg1;
  }
  public function pobierzNazwisko()
  {
	  return $this->nazwisko;
  }
  public function wpiszImie($arg2)
  {
	  $this->imie=$arg2;
  }
  public function pobierzImie()
  {
	  return $this ->imie;
  }
}

$postac1= new osoba();
$postac2= new osoba();

//$postac1 ->nazwisko='Kowalski';
//$postac1->imie='Jan';

$postac2->wpiszNazwisko('Nowak');
$postac2->wpiszImie('Adam');

//echo $postac1->nazwisko." ".$postac1->imie;
echo "<br>";
echo $postac2->pobierzNazwisko()." ".$postac2->pobierzImie();
?>

Konstruktor i destrukor 6.91
---------------------------------
<?php
class osoba
{
	public $nazwisko, $imie;
	function __construct()
	{
		$this -> nazwisko="Anonim";
		$this -> imie="Gall";
	}
	public function wpiszNazwisko($arg1)
	{
	  $this->nazwisko=$arg1;
	}
	public function pobierzNazwisko()
	{
	  return $this->nazwisko;
	}
	public function wpiszImie($arg2)
	{
	  $this->imie=$arg2;
	}
	public function pobierzImie()
	{
	  return $this ->imie;
	}

}
$postac1=new osoba();
$postac2=new osoba();

$postac2->wpiszNazwisko('Nowak');
$postac2->wpiszImie('Adam');

echo $postac1->pobierzNazwisko(), $postac1->pobierzImie();
echo "<br>";
echo $postac2->pobierzNazwisko(),$postac2->pobierzImie();
?>

Destruktor - eksperyment
------------------------------
<?php
class osoba
{
	public $nazwisko, $imie;
	function __construct()
	{
		$this -> nazwisko="Anonim";
		$this -> imie="Gall";
	}
	public function wpiszNazwisko($arg1)
	{
	  $this->nazwisko=$arg1;
	}
	public function pobierzNazwisko()
	{
	  return $this->nazwisko;
	}
	public function wpiszImie($arg2)
	{
	  $this->imie=$arg2;
	}
	public function pobierzImie()
	{
	  return $this ->imie;
	}
	function __destruct()
	{
		echo "Teraz zadziałał destruktor";
	}

}
{
$postac2=new osoba();

$postac2->wpiszNazwisko('NOwak');
$postac2->wpiszImie('Adam');
}

$postac1=new osoba();
echo $postac1->pobierzNazwisko(), $postac1->pobierzImie();
echo "<br>";
echo $postac2->pobierzNazwisko(),$postac2->pobierzImie();
?>
===================================
Zadanie
Klasa Czolg
Dwa prywatne pola:
 kolor
 amunicja
Tworzymy obiekt klasy Czolg
wprowadzamy kolor i ilość amunicji.
====================================

===================
6.10.6 Dziedziczenie
===================

Dziedziczenie 6.92
-------------------------
<?php
class osoba
{
   public $nazwisko, $imie;
   public function wpiszNazwisko($arg1)
  {
	  $this->nazwisko=$arg1;
  }
  public function pobierzNazwisko()
  {
	  return $this->nazwisko;
  }
  public function wpiszImie($arg2)
  {
	  $this->imie=$arg2;
  }
  public function pobierzImie()
  {
	  return $this ->imie;
  }
}
class klient extends osoba
{
	public $adres;
	public function wpiszAdres($arg3)
	{
		$this->adres=$arg3;
	}
	public function pobierzAdres()
	{
		return $this ->adres;
	}
}
$osoba1=new osoba();
$osoba1->wpiszNazwisko('Żak');
$osoba1->wpiszImie('Ewa');
echo "Dane obiektu klasy osoba <br>";
echo $osoba1->pobierzNazwisko()." ".$osoba1->pobierzImie();
echo "<br>";

$klient1=new klient();
$klient1->wpiszNazwisko('Król');
$klient1->wpiszImie('Marcin');
$klient1->wpiszAdres('Warszawa ul. Kręta 7');

echo "Dane obiektu klasy klient <br>";
echo $klient1->pobierzNazwisko()." ".$klient1->pobierzImie()." ".$klient1->pobierzAdres();
echo "<br>";
?>
===============================
Zadanie
  Klasa Helikopter dziedziczy po klasie
  Czolg i ma dodatkowo metode do
  latania.
===============================
Przykład zastosowania klasy ze strony kursu Józefa Kańczugowskiego

plik: style.css
----------------
.przycisk
{
  display:block;
  position:absolute;
  height:30px;
  background-color:green;
  line-height:30px;
  text-align:center;
  font-family:Arial;
  font-size:17px;
  color:white;
  font-weight:bold;
  border:3px solid silver;
  letter-spacing:4px;
  cursor:default;
}

.przycisk:active
{
  border:1px solid silver;
}

plik: klasa.php
-----------------
<?php
class Przyciski
{
  public $pozycja_x='20';
  public $pozycja_y='20';
  public $szerokosc='200';
  public $napis='Przycisk';
  public $kolor='green';
  public $adres='http://www.teacher.webd.pl';

  public function wyswietl()
  {
    echo '<a href="'.$this->adres.'" style="text-decoration:none;">'."\n";
      echo '<div class="przycisk" style="left:'.$this->pozycja_x.'px;top:'
        .$this->pozycja_y.'px;width:'.$this->szerokosc.'px;background-color:'
        .$this->kolor.';">'."\n";
        echo $this->napis."\n";
      echo '</div>'."\n";
    echo '</a>';
  }
}
?>

plik: index.php
-----------------
<!doctype html>
<html>
  <head>
    <title>Przyciski</title>
    <meta charset="utf-8" />
    <link rel="stylesheet" type="text/css" href="style.css" />
  </head>
  <body>
    <?php
      require_once('klasa.php');

      $przycisk1=new Przyciski();
      $przycisk1->napis='Odsyłacz do strony autora';
      $przycisk1->szerokosc='400';
      $przycisk1->wyswietl();

      $przycisk2=new Przyciski();
      $przycisk2->pozycja_y='60';
      $przycisk2->napis='Odsyłacz do strony szkoły';
      $przycisk2->adres='http://glowacki.p9.pl';
      $przycisk2->szerokosc='400';
      $przycisk2->kolor='red';
      $przycisk2->wyswietl();

	  $przycisk3=new Przyciski();
      $przycisk3->pozycja_y='100';
      $przycisk3->napis='Odsyłacz do strony szkoły :) ';
      $przycisk3->adres='http://zszglogow.pl';
      $przycisk3->szerokosc='400';
      $przycisk3->kolor='blue';
      $przycisk3->wyswietl();
    ?>
  </body>
</html>

Przesłanianie składowych 6.93
-------------------------------------
Kod 6.93 Został uzupełniony o definicję metody

<?php

class klient extends osoba
{
	public $adres;
	public function wpiszAdres($arg3)
	{
		$this ->adres=$args3;
	}
	public function pobierzAdres()
	{
		return $this->adres;
	}
	public function pobierzImie()
	{
		return "imię nieznane";
	}
}
?>

Zgłaszanie wyjątków 6.95 / 259
-------------------------------------
<?php
 try {
	 throw new Exception("Testowanie wyjątku",27);
 }

 catch (Exception $e) {
	 echo "Problem w kodzie: ".$e->getCode()."<br/>";
	 echo "Treść komunikatu: ".$e->getMessage()."<br/>";
	 echo "W pliku: ".$e->getFile()."<br/>";
	 echo "W wierszu".$e->getLine()."<br/>";
 }
?>

==============================
6.11 Formularze str. 259
==============================
---------------------------------------------
Przykład z Helion 7,96 str. 260
---------------------------------------------

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Przykład z Helion 7,96 str. 260</title>
</head>
<body>
   <form action="skript_form.php" method="post">
       <h3>Formularz kontaktowy</h3>
       Nazwisko: <br>
       <input type="text" name="nazwisko" size="30"><br>
       Imię: <br>
       <input type="text" name="imie" size="30"><br>
       Zawód: <br>
       <input type="text" name="zawod" size="30"><br>
       Adres e-mail: <br>
      <input type="email" name="adres" size="30"><br>
      <h3>Wykształcenie:</h3>
      <input type="radio" value="podst" name="wyksztalcenie" checked>Podstawowe <br>
      <input type="radio" value="sred" name="wyksztalcenie" checked>Średnie <br>
      <input type="radio" value="wyzsze" name="wyksztalcenie" checked>Wyższe <br><br>

      <input type="checkbox" name="opcje" >
      Zgadzam się na przetwarzanie moich danych osobowych <br><br>
      <input type="submit" value="Wyślij" name="wyslij">&nbsp; &nbsp;
      <input type="reset" value="Wyczyść" name="zeruj">

    </form>

</body>
</html>
---------------------------------------------------------------------
skript_form.php
------------------
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Nazwa: skript_form.php</title>
</head>
<body>
<?php
 echo "<b>Odpowiedź z PHP:</b><br>";
 echo "<b>".$_POST['nazwisko']."</b><br>";
 echo "<b>".$_POST['imie']."</b><br>";
 echo "<b>".$_POST['zawod']."</b><br>";
 echo "<b>".$_POST['adres']."</b><br>";

if(!isSet($_POST['wyksztalcenie']))
    echo "<br/> Proszę wybrać <b>wykształcenie</b>";
else
    echo "Zostało wybrane wykształcenie: {$_POST['wyksztalcenie']}.";

// Dopisz kod sprawdzający czy została wykonana zgoda na przetwarzanie danych osobowych

?>

</body>
</html>
--------------------------------------------------------------------------


Funkcja isSet str.262
Przykład 6.98
_______________________________________

<?php
if(!isSet($_POST['wyksztalcenie'])) {
    echo "<br/> Proszę wpisać <b>wykształcenie</b>";
else
    echo "Zostało wybrane wykształcenie: {$_POST['wyksztalcenie']}.";
}
?>

Przykad 6.99
_______________________________________

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Przykład z Helion 7,99 str. 263</title>
</head>
<body>
   <form action="skript_form.php" method="post">
       <h3>Formularz kontaktowy</h3>
       Nazwisko i imię <br>
       <input type="text" name="nazw" size="40"><br>
       <b>Wybór języka</b><br><br>
       <select name="jezyki[]" multiple>
       <option value="Język angielski">Język angielski</option>
       <option value="Język niemiecki">Język niemiecki</option>
       <option value="Język francuski">Język francuski</option>
       <option value="Język wloski">Język wloski</option>
       <option value="Język rosyjski">Język rosyjski</option>
       <option value="Język hiszpański">Język hiszpański</option>
       </select>
       <p><input type="submit" value="Wyślij" name="wyslij"></p>
    </form>
	<!--multiple oznacza, że można zaznaczyć kilka wartości za pomocą
	wciśniętego przycisku Ctrl -->
</body>
</html>
---------------------------------------------------------------------
skript_form.php
------------------
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Nazwa: skrypt_form.php</title>
</head>
<body>
 <?php
	if(!empty($_POST['jezyki']))
	{
		echo "<p><b>".$_POST['nazw']."</b> zna:</p>";
		echo "<ul>"
		foreach($_POST['jezyki'] as $wartosc)
		{
			echo "<li>$wartosc</li>";
		}
		echo "</ul>";
	}
	else
		echo "<p><b>".$_POST['nazw']."</b> nie zna żadnego języka.</p>";
 ?>

</body>
</html>
==================================
6.11.3 Przesyłanie plików na serwer str. 268
==================================
/*
Formularze służące do przesyłania plików na serwer muszą posiadać atrybuty:
- enctype
- action
- method
*/

Przykad 6.100 / 269
---------------------------------
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Przekazywanie plików Przykład 6.100</title>
</head>
<body>
   <form enctype="multipart/form-data" action="odbierz_plik.php" method="post">
       <input type="hidden" name="max_file_size" value="40960">
       <p>
           Wyślij plik
           <input type="file" name="plik1" size="30">
       </p>
       <p><input type="submit" value="Wyślij" name="wyslij"></p>
   </form>
</body>
</html>

Przykład 6.101
kod zapisany w pliku odbierz_plik.php
------------------------------------------------------------
 <?php
$katalog_plik="./"; //katalog docelowy
$max_rozm = $_POST['max_file_size'];
if (is_uploaded_file($_FILES['plik1']['tmp_name']))
{
    if ($_FILES['plik1']['size']>$max_rozm)
    {
        echo "Błąd - plik ma zbyt duży rozmiar";
    }
    else
    {
        echo "Plik:<b>".$_FILES['plik1']['name']."</b>został odebrany.<br>";
        if (isSet($_FILES['plik1']['type']))
            echo "Typ pliku:".$_FILES['plik1']['type']."<br>";
            move_uploaded_file($_FILES['plik1']['tmp_name'], $katalog_plik.$_FILES['plik1']['name']);
    }
}
else
    echo "Błąd podczas przesyłania pliku";

?>

Zadanie 6.17 / str. 271
Do opracowane w poprzednim zadaniu formularza dodaj pole umożliwiające przesłanie pliku ze zdjęciem. Przyjmij, że przesłame pliki mogą być w formacie JPG, JPEG lub PNG. Ich rozmiar nie może przekroczyć 900 kB. Zmodyfikuj skrypt PHP tak, aby możliwe było odbieranie pliku przesłanego przez formlarz.

=========================
6.12 PLiki cookies i sesje str. 271
=========================
6.12.1 Pliki cookies w PHP
-----------------------------------------

Przykład 6.102 / 272
Przykład pliku cookie sprawdzającego, czy jesteś stałym klientem
----------------------------------------------------------------------

<?php
setcookie("pismo", "Na skróty", time()+3600, "/","localhost",false);
       if(isset($_COOKIE["pismo"]))
        echo "<p>Jesteś naszym stałym klientem</p>";
       else
        echo "<p>Witamy po raz pierwszy na naszej stronie</p>";
?>

Przykład 6.104 / str. 273
Zostanie utworzony plik cookie wizyta. Termin wygaśnięcia to 30 dni od chwili
jego utworzenia 2 592 000 = 60s * 60min *24godz * 30dni.
------------------------------------------------------------------------------
<?php
$mies = 2592000 + time();
setcookie("wizyta", date("F jS - g: ia"), $mies);
?>

Skrypt odczytujący zawartość pliku cookie str. 273
------------------------------------------
<?php
	if(isset($_COOKIE['wizyta']))
	{
		$ostatnia = $_COOKIE['wizyta'];
		echo "Witamy ponownie! <br> Ostatni raz odwiedziłes nas".$ostatnia;
	}
	else
	{
		echo "Witamy na naszej stronie";
	}
?>


================================
Przesyłanie danych użytkownika
================================
Przykład 6.105 / str. 274
<?php
if(!isset($_COOKIE['dane']) && !isset($_POST['nazw'])){
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Dane użytkownika</title>
</head>
<body>
   <form action="rejestracja.php" method="post">
       Podaj nazwisko i imię: <br>
       <input type="text" name="nazw" id="nazw">
       <input type="submit" value="Wyślij">
   </form>
<?php
}
else
{
    if(isset($_POST['nazw'])){
        setcookie('dane',$_POST['nazw'], time()+60*60*244*365);
        echo "<p>Dziękujemy za wprowadzenie danych.</p>";
	}
	else
		echo "<p>Witamy po raz kolejny! ".$_COOKIE['dane']."</p>";
}
?>
</body>
</html>

Zliczanie liczby odwiedzin
---------------------------
Przykład 6.106 / str. 275
<?php
if(!isset($_COOKIE['odwiedz'])){
    $odw = 1;
}
else {
$odw = intval($_COOKIE['odwiedz'])+1;
}
setcookie("odwiedz",$odw,time()+60*60*24*365);
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Odwiedziny</title>
</head>
<body>
   <?php
        if($odw==1)
            $wyraz="raz";
       else
            $wyraz="razy";
       echo "W ciągu ostatniego roku odwiedziłeś naszą stronę $odw $wyraz.<br> ";
    ?>

</body>
</html>

  Zadanie 6.18/str. 276
     Zmodyfikuj skrypt z przykładu 6.105 dodając instrukcje weryfikujące
     poprawność wprowadzania danych.

Zadanie 6.19/ str. 277
     Napisz skrypt, w którym będzie tworzony plik cookie zapamiętujący wprowadzoną przez formularz
     datę urodzin użytkownika. Skrypt powinien wyświetlać informację, za ile dni użytkownik będzie
     obchodził urodziny.
<?php
if(!isset($_COOKIE['urodz']) && !isset($_POST['urodz'])) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
    Podaj date:<br>
    <input type="date" name="urodz" id="urodz">
    <p><input type="submit" value="Wyślij" name="wyslij"></p>
</form>
<?php
} else {
    if(isset($_POST['urodz']))
    {
        setcookie('urodz',$_POST['urodz'], time()+60*60*24);
        echo "<p>Dziękujemy za wprowadzenie danych";
    } else {
        $now = new DateTime();
        $expD = explode("-", $_COOKIE['urodz']);
        $bday = date("Y") ."-".$expD[1]."-".$expD[2];

        if(date("m")>$expD[1] ||(date("m")==$expD[1] &&date("d")>$expD[2] ))
        {
            $bday = (date("Y")+1) ."-".$expD[1]."-".$expD[2];
        }
        $dtbday = new DateTime($bday);
        $diff = $now->diff($dtbday);

        echo "<p>Witamy po raz kolejny! ".$diff->days." dni do urodzin</p>";
    }
}
?>
</body>
</html>


BAZY DANYCH W PHP
====================
Nawiązanie połączenia
----------------------
Przykład 6.113 / str. 290
<?php
	//$do_bazy = mysql_connect('localhost','root','');
	$do_bazy = mysqli_connect('localhost','root','');
	if (!$do_bazy){
		exit ("Błąd połączenia z serwerem MySQL.");
	}
	else {
		echo "Połączono z serwerem baz danych.<br>";
	}
?>

Wybór bazy
-------------
Przykład 6.114 / str. 292
<?php
	$do_bazy = mysql_connect('localhost','root','');
	if (!$do_bazy){
		exit ("Błąd połączenia z serwerem MySQL.");
	}
	else {
		echo "Połączono z serwerem baz danych.<br>";
		if(!mysql_select_db('biblioteka',$do_bazy)){
			echo "Błąd podczas wyboru bazy danych";
		}
		else {
			echo "Wybrana baza danych to: biblioteka.<br>";
			//operacje na wybranej bazie danych
		}
		mysql_close($do_bazy); //pamiętaj o zamknięciu
	}
?>

to samo obiektowe:
---------------------
<?php
$do_bazy = new mysqli();
$do_bazy ->connect('localhost','root','','biblioteka');
if (!$do_bazy){
	exit ("Błąd połączenia z serwerem MySQL.");
}
else {
	echo "Połączono z serwerem baz danych.<br>";
}
?>
------------------------------------
to samo z wyborem bazy biblioteka
------------------------------------
<?php
// Nawiązanie połączenia z serwerm
$do_bazy = new mysqli('localhost','root','');
// Wybranie bazy danych
$do_bazy->select_db('biblioteka');
if (!$do_bazy){
	exit ("Błąd połączenia z serwerem MySQL.");
}
else {
	echo "Połączono z serwerem baz danych.<br>";
}
// Zamykanie połączenia
$do_bazy->close();
?>
------------------------------
Pobieranie danych z bazy
------------------------------
<?php
// Nawiązanie połączenia z serwerm
$do_bazy = new mysqli('localhost','root','','biblioteka');
// Utworzenie zapytania
$zapytanie = 'SELECT IDAutor, imie, nazwisko FROM autorzy ORDER by nazwisko';
// Przesłanie zapytania
$wynik = $do_bazy->query($zapytanie,MYSQLI_STORE_RESULT);
//Przetwarzanie wyników
while(list($IDAutor,$imie,$nazwisko)=$wynik->fetch_row())
	printf("(%s) -  %s %s.<br>",$IDAutor,$imie,$nazwisko);
$do_bazy->close();
?>
----------------------------------------------------------------
Pobieranie danych z bazy w postaci obiektu
-----------------------------------------------
<?php
// Nawiązanie połączenia z serwerm
$do_bazy = new mysqli('localhost','root','','biblioteka');
// Utworzenie zapytania
$zapytanie = 'SELECT IDAutor, imie, nazwisko FROM autorzy ORDER by nazwisko';
// Przesłanie zapytania
$wynik = $do_bazy->query($zapytanie);
//Przetwarzanie wyników fetch_object() wynik w postaci obiektu
while($row = $wynik->fetch_object())
{
	$IDAutor = $row->IDAutor;
	$imie = $row->imie;
	$nazwisko=$row->nazwisko;
	printf("(%s): %s %s <br>",$IDAutor,$imie,$nazwisko);
}
// Zwolnienie pamięci
$wynik->free();
// Tu można zadać kolejne zapytanie
$do_bazy->close();
?>
--------------------------------------------------------------
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Teraz pracownicy</title>
</head>
<body>
<?php
   /*
   Wyświetlenie wszystkich informacji z bazy nazwisko_pracownicy.
   */
	$db = new mysqli('localhost','root','','nazwisko_pracownicy');
	$zapytanie = 'select id,nazwisko,imie,stanowisko,dzial,sekcja,wynagrodzenie,data_zatrudnienia,data_urodzenia from pracownicy';
	$db->query('SET NAMES utf8');
    $db->query('SET CHARACTER_SET utf8_unicode_ci');
	$wynik = $db->query($zapytanie,MYSQLI_STORE_RESULT);
	while(list($id,$nazwisko,$imie,$stanowisko,$dzial,$sekcja,$wynagrodzenie,$data_zatrudnienia,$data_urodzenia) = $wynik->fetch_row())
		printf("%d %s %s %s %s %s %s %s %s <br>" ,$id,$nazwisko,$imie,$stanowisko,$dzial,$sekcja,$wynagrodzenie,$data_zatrudnienia,$data_urodzenia);
	$db->close();

?>
</body>
----------------------------------------------------------------------------------------------------


<!--///////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
Mirosław Zelent PHP cz.1
-------------------------------
index.php
_____________

<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="utf-8" />
	<title>Piekarnia</title>
</head>

<body>

	<h1>Zamówienie online</h1>
	<form action="order.php" method="post">
		Ile pączków (0.99 PLN/szt):
		<input type="text" name="paczkow" />
			<br /><br />
		Ile grzebieni (1.29 PLN/szt):
		<input type="text" name="grzebieni" />
			<br /><br />
		<input type="submit" value="Wyślij zamówienie" />
	</form>

</body>
</html>

order.php
_____________

<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="utf-8" />
	<title>Podsumowanie zamówienia</title>
</head>

<body>

<?php

	$paczkow = $_POST['paczkow'];
	$grzebieni = $_POST['grzebieni'];
	$suma = 0.99 * $paczkow + 1.29 * $grzebieni;

echo<<<END

	<h2>Podsumowanie zamówienia</h2>

	<table border="1" cellpadding="10" cellspacing="0">
	<tr>
		<td>Pączek (0.99PLN/szt)</td> <td>$paczkow</td>
	</tr>
	<tr>
		<td>Grzebień (1.29PLN/szt)</td> <td>$grzebieni</td>
	</tr>
	<tr>
		<td>SUMA</td> <td>$suma PLN</td>
	</tr>
	</table>
	<br /><a href="index.php">Powrót do strony głównej</a>

END;

?>

</body>
</html>

<!--
Zadanie z czytaniem z pliku na różne sposoby
-------------------------------------------------
-->
<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8">
		<title>Operacje na pliku.</title>
	</head>
	<body>
		<h1>Ćwiczymy operacje z plikami</h1>
		<p>napisy.txt</p>
		<?php
		$fp=fopen("napisy.txt","r");
		$tekst = fread($fp,10);
              echo "Oto odczytana zawartość <br/>";
			  echo $tekst;
		fclose($fp);
			  echo "<br>Teraz całość pliku <br>";
	    $fp=fopen("napisy.txt","r");
	    $rozmiar_pliku=filesize("napisy.txt");
		$tekst2 = fread($fp,$rozmiar_pliku);
		echo $tekst2;
		echo "<br>";
		fclose($fp);
		echo "<br>Teraz z tablicą<br>";
		$fp=fopen("napisy.txt","r");
		$text3=file('napisy.txt');
		fclose($fp);
		foreach($text3 as $line_num=>$line)
		{
			echo "Linia #<b>$line_num</b>:".$line."<br>";
		}
			//count - ilość elementów w tablicy
		$ile_liczb=count($text3);
		echo "Ile liczb:".$ile_liczb."<br>";
		echo "Ile znaków jest w wierszu <br>";
			//strlen - ilość znaków w łańcuchu
		for($i=0;$i<$ile_liczb-1;$i++)
		{
			echo "Linia #".$i."-".strlen($text3[$i])."<br>";
		}
		echo "Liczba binarna na liczbę dziesiętną"."<br>";
			//bindec - zamiana liczby binarnej na dziesiętną
		for($i=0;$i<$ile_liczb-1;$i++)
		{
			echo "Linia #".$i."-".$text3[$i]."-".bindec($text3[$i])."<br>";
		}
        ?>
	</body>
</html>
<!--
-------------------------------
Dane czytane z formularza:
-------------------------------
-->
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Ćwiczymy formularzowe wprowadzanie danych do skryptu</title>
    <style>
    #container {
        width: 1000px;
        margin-left:auto;
        margin-right:auto;
    }
    </style>

</head>
<body>
<div id="container">
  <h2>Formularz wprowadzania danych</h2>
   <form action="index.php" method="post">
       Podaj liczbe 1:
       <input type="text" name="liczba1"/>
       <br/><br/>
       Podaj liczbe 2:
       <input type="text" name="liczba2"/>
       <br/><br/>
       <input type="submit" value="Wykonaj"/>
   </form>
   <?php
     $liczba1=$_POST['liczba1'];
     $liczba2=$_POST['liczba2'];
      echo "Liczba1=".$liczba1."<br/>";
      echo "Liczba2=".$liczba2."<br/>";

    ?>

</div>
</body>
</html>
<!--
--------------------------------------------------------------------------------------------------------
Zadanie
Napisz skrypt, który odczytuje dwie liczby i wykonuje na nich operacje
matematyczne.
___________________________________________________________
-->
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Ćwiczymy z formularzem</title>

</head>
<body>
  <h2>Formularz wprowadzania danych</h2>
   <form  action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
       Podaj liczbe a:
       <input type="text" name="liczba_a"/>
       <br/><br/>
       Podaj liczbe b:
       <input type="text" name="liczba_b"/>
       <br/><br/>
       <input type="submit" value="Wykonaj"/>
   </form>

   <?php
   if (isset($_POST['liczba_a']))
    {
     $a = $_POST['liczba_a'];
     $b = $_POST['liczba_b'];
      echo "<br><br><br>";
      echo "a=".$a."<br/>";
      echo "b=".$b."<br/>";
      echo "a+b=".($a+$b)."<br/>";
      echo "a-b=".($a-$b)."<br/>";
      echo "a*b=".($a*$b)."<br/>";
      if ($b!=0)
        {
        echo "a/b=".($a/$b)."<br/>";
        echo "a%b=".$a%$b."<br/>";
        }
      else
        echo "nie dziele przez 0<br/>";
        echo "a<sup>b</sup>=".pow($a,$b)."<br/>";
   }
    ?>
</body>
</html>

<!--
________________________________________________________________________
Zadanie
Napisz skrypt, który wczytuje dwie liczby i demonstruje użycie operatorów bitowych.
________________________________________________________________________
-->
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Ćwiczymy z formularzem</title>
<style>
body {
    background-color:black;
    color:grey;
}
</style>

</head>
<body>
  <h2>Formularz wprowadzania danych</h2>
   <form  action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
       Podaj liczbe a:
       <input type="text" name="liczba_a"/>
       <br/><br/>
       Podaj liczbe b:
       <input type="text" name="liczba_b"/>
       <br/><br/>
       <input type="submit" value="Wykonaj"/>
   </form>

   <?php

    if (isset($_POST['liczba_a']))
    {
        $arg1=$_POST['liczba_a'];
        $arg2=$_POST['liczba_b'];

        //iloczyn bitowy AND
        echo "Wynikiem działania $arg1 & $arg2 jest ";
        echo $arg1 & $arg2;
        echo ".<br />";
        //suma bitowa OR
        echo "Wynikiem działania $arg1 | $arg2 jest ";
        echo $arg1 | $arg2;
        echo ".<br />";
        //bitowa różnica symetryczna XOR
        echo "Wynikiem działania $arg1 ^ $arg2 jest ";
        echo $arg1 ^ $arg2;
        echo ".<br />";

    }

    ?>
</body>
</html>

<!--
__________________________________________________________
Zadanie
Napisz skrypt, który rozwiązuje równanie kwadratowe dla danych a, b i c.
__________________________________________________________
-->
<?php
//deklaracje zmiennych
$A = 1;
$B = 1;
$C = -2;

//wyświetlenie parametrów równania
echo "Parametry równania: <br />";
echo "A = $A, B = $B, C = $C <br />";

//sprawdzenie, czy jest to równanie kwadratowe
if ($A == 0){
  //$A jest równe zero, równanie nie jest kwadratowe
  echo "To nie jest równanie kwadratowe: A = 0!";
}
else{
  //A jest różne od zera, równanie jest kwadratowe

  //obliczenie delty
  $delta = $B * $B - 4 * $A * $C;

  //jeśli delta mniejsza od zera
  if ($delta < 0){
     echo "Delta < 0 <br />";
     echo "To równanie nie ma rozwiązania w zbiorze liczb rzeczywistych!";
  }
  //jeśli delta większa lub równa zero
  else{
     //jeśli delta jest równa zero
     if ($delta == 0){
       //obliczenie wyniku
       $wynik = - B / (2 * A);
       echo "Rozwiązanie: x = $wynik";

     }
     //jeśli delta jest większa od zera
     else{
       //obliczenie wyników
       $wynik = (- $B + sqrt($delta)) / (2 * $A);
       echo "Rozwiązanie: x1 = $wynik";
       $wynik = (- $B - sqrt($delta)) / (2 * $A);
       echo ", x2 = $wynik";
     }
  }
}
?>

<!--
  Zadanie
  Napisz skrypt, który wczytuje zadany plik na serwer
  i wyświetla zawartość pliku.
-->
Plik index.html
-----------------------
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Przekazywanie plików Przykład 6.100</title>
</head>
<body>
   <form enctype="multipart/form-data" action="odbierz_plik.php" method="post">
       <input type="hidden" name="max_file_size" value="40960">
       <p>
           Wyślij plik
           <input type="file" name="plik1" size="30">
       </p>
       <p><input type="submit" value="Wyślij" name="wyslij"></p>
   </form>
</body>
</html>

Plik odbierz_plik.php
--------------------------

<?php
$katalog_plik="./"; //katalog docelowy
$max_rozm = $_POST['max_file_size'];
if (is_uploaded_file($_FILES['plik1']['tmp_name']))
{
    if ($_FILES['plik1']['size']>$max_rozm)
    {
        echo "Błąd - plik ma zbyt duży rozmiar";
    }
    else
    {
        echo "Plik:<b>".$_FILES['plik1']['name']."</b> został odebrany.<br>";
        if (isSet($_FILES['plik1']['type']))
            echo "Typ pliku:".$_FILES['plik1']['type']."<br>";
            move_uploaded_file($_FILES['plik1']['tmp_name'], $katalog_plik.$_FILES['plik1']['name']);
            echo "<h2>Zawartość pliku</h2><br>";
        $fp=fopen($_FILES['plik1']['name'],"r");
        $tekst = fread($fp,$_FILES['plik1']['size']);
		echo $tekst;
		fclose($fp);
    }
}
else
    echo "Błąd podczas przesyłania pliku";
?>














