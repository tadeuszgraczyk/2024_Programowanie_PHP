======================================
5.4. Język definiowania danych (DDL)
======================================
/*
1. Tworzenie nowych obiektów CREATE.
2. Zmiana struktury istniejących obiektów ALTER.
3. Usuwanie istniejących obiektów DROP.
*/
--------------------------
SHOW  DATABASES;

Tworzenie bazy 5.2
---------------------
CREATE DATABASE ksiegarnia_internetowa;


Usunięcie bazy danych 5.3
-----------------------------
DROP DATABASE ksiegarnia_internetowa;

===========================================
5.4.1 Tworzenie i usuwanie tabel str. 149
===========================================
/*
1. Tworzenie tabel.
	- Każda tabela musi mieć unikatową nazwę i waściciela,
	- Każda kolumna musi mieć unikatową nazwę,
	- Nazwa tabel i kolumn musi być zgodna ze standardami SQL,
	- Każda kolumna musi mieć zdefiniowany typ,
	- Jeśli kolumna jest typu znakowego, trzeba podać jej maksymalną dlugość,
	- Utworzone tabele są puste.

*/

Tworzenie tabeli 5.5
------------------------
USE ksiegarnia_internetowa;
CREATE TABLE Klient
(
  id_klienta int,
  nazwisko nvarchar(60) NOT NULL,
  imie nvarchar(40) NOT NULL,
  kod_pocztowy nvarchar(60),
  miejscowosc nvarchar(50),
  ulica nvarchar(50),
  nr_domu nvarchar(7),
  PESEL nvarchar(11) NOT NULL,
  telefon nvarchar(12),
  adres_e_mail nvarchar(70)
	
);

Tworzenie tabeli książki 5.6
-----------------------------
CREATE TABLE Ksiazki
(
  id_ksiazki INT,
  tytul nvarchar(100) NOT NULL,
  autor nvarchar(80) NOT NULL,
  cena float,
  wydawnictwo nvarchar(20),
  temat nvarchar(30),
  miejsce_wydania nvarchar (28),
  jezyk_ksiazki nvarchar(15),
  opis nvarchar(100)
);

Usuwanie tabeli 5.7
--------------------
DROP TABLE Ksiazki;

Tworzenie schematów 5.8
---------------------------
CREATE SCHEMA Zasoby;
=====================================
5.4.2. Schematy str.152
=====================================
/*
1. Schematy i usprawnienie w zarządzaniu tabelami bazy danych.
2. Przykad tworzenia schematu.
3. Jawne i niejawne przypisanie obiektu do schematu.

*/

Tworzenie tabel w schemacie 5.9 
-------------------------------
CREATE SCHEMA Magazyn
CREATE TABLE Ksiazki
(
  id_ksiazki INT,
  tytul nvarchar(100) NOT NULL,
  cena FLOAT,
  wydawnictwo nvarchar(20)
);
CREATE TABLE Autor
(
  id_autora INT,
  nazwisko nvarchar(100) NOT NULL,
  imie nvarchar(30)NOT NULL
);

Tworzenie tabeli w schemacie 5.10 
-------------------------------------
CREATE TABLE Zasoby.Ksiazki
(
  id_ksiazki INT,
  tytul nvarchar(100) NOT NULL,
  autor nvarchar(80) NOT NULL,
  cena FLOAT,
  wydawnictwo nvarchar(20),
  temat nvarchar(30),
  miejsce_wydania nvarchar (28),
  jezyk_ksiazki nvarchar(15),
  opis nvarchar(100)
);

/*
Domyślny schemat użytkownika
-----------------------------*/
DEFAULT_SCHEMA CREATE USER
lub ALTER USER
=============================================
5.4.3 Zmaiana struktury tabeli str. 154
=============================================
/*

*/
Dodanie kolumny 5.11
---------------------------
ALTER TABLE Ksiazki
ADD liczba_stron nvarchar (5);

Zmiana definicji istniejącej kolumny 5.12
-------------------------------------------

ALTER TABLE Ksiazki
ALTER COLUMN rok_wydania nvarchar (4) NOT NULL;
//to rozwiązanie dla SQL Server/MS ACCESS

ALTER TABLE Ksiazki
MODIFY COLUMN rok_wydania nvarchar (4) NOT NULL;
//tak to wygląda dla My SQL/Oracle

Usunięcie kolumny z tabeli 5.13
-------------------------------------
ALTER TABLE Ksiazki
DROP COLUMN liczba_stron;

Usunięcie z tabeli księgarnia internetowa 5.14
-------------------------------------------------
USE ksiegarnia_internetowa;
GO
ALTER TABLE Ksiazki
DROP COLUMN Autor;
ALTER TABLE Ksiazki
ADD id_autora int NOT NULL;
===================================
5.4.4. ATRYBUTY KOLUMN str. 155
===================================
/*
1. Definiowanie klucza podstawowego.
2. Atrybut NOT NULL - nie mogą wystąpić wartości puste.
3. Atrybut automatycznego wzrostu wartości IDENTITY (1,1)
	niestety nie działa w MySQL - tutaj AUTO_INCREMENT
4. Atrybut DEFAULT i wprowadzanie wartości domyślnej.
5. Atrybut UNIQUE - wartości w kolumnie nie mogą się powtarzać.
5. Atrybut CHECK i definiowanie warunków ograniczających zakres danych.

*/
Definiowanie klucza podstawowego podczas tworzenia tabeli Zamówienia
Atrybuty kolumn Primary KEY 5.15
-------------------------------------
CREATE TABLE Zamowienia
(
  id_zamowienia int PRIMARY KEY,
  id_klienta int NOT NULL,
  [data zlozenia zamowienia] datetime,
  [data wyslania] datetime,
  [koszt wysylki] float,
  id_faktury int
);
/* To nie zadziala z powodu spacji w nazwie.
*/
CREATE TABLE Zamowienia
(
  id_zamowienia int PRIMARY KEY,
  id_klienta int NOT NULL,
  data_zlozenia_zamowienia datetime,
  data_wyslania datetime,
  koszt_wysylki float,
  id_faktury int
);

Atrybut NOT NULL
Blokowanie wartości NULL podczas tworzenia tabeli Ksiazki 5.16 
---------------------------------------------------------------
CREATE TABLE Ksiazki
(
	id_ksiazki int NOT NULL PRIMARY KEY,
	tytul nvarchar (100)NOT NULL,
	......
);

Atrybut IDENTITY
Definiowanie ograniczeń dla kolumn podczas tworzenia tabeli Autor 5.17 
------------------------------------------------------------------------

CREATE TABLE Autor
(
	id_autora INT IDENTITY(1, 1) NOT NULL PRIMARY KEY,
	nazwisko nvarchar(50) NOT NULL,
	imie nvarchar(30) NOT NULL,
	narodowosc nvarchar(30),
	okres_tworzenia nvarchar(35),
	jezyk nvarchar(30),
	[rodzaj tworczosci] nvarchar(35),
	osiagniecia nvarchar(100)
);
/*To niestety nie będzie dzialalo
IDENTITY - auto_increment w SQL/Oracle
*/
CREATE TABLE Autor
(
	id_autora INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
	nazwisko nvarchar(50) NOT NULL,
	imie nvarchar(30) NOT NULL,
	narodowosc nvarchar(30),
	okres_tworzenia nvarchar(35),
	jezyk nvarchar(30),
	rodzaj_tworczosci nvarchar(35),
	osiagniecia nvarchar(100)
);

Atrybut DEFAULT /*dla wartości domyślnych */5.18
----------------------------------------------
CREATE TABLE Ksiazki
(
  id_ksiazki INT,
  tytul nvarchar(100) NOT NULL,
  autor nvarchar(80) NOT NULL,
  cena FLOAT,
  wydawnictwo nvarchar(20),
  temat nvarchar(30),
  miejsce_wydania nvarchar (28),
  jezyk_ksiazki nvarchar(15),
  rok_wydania nvarchar(4) NOT NULL DEFAULT '2014',
  opis nvarchar(100)
);

Atrybut UNIQUE - /*wartości nie mogą się powtarzać */5.19
----------------------------------------------------------
CREATE TABLE Ksiazki
(
	.........
	tytul varchar(100) NOT NULL UNIQUE,
	.........

);

Przykad 5.20/157
Definiowanie ograniczeń podczas tworzenia tabeli.
-------------------------------------------------
CREATE TABLE Ksiazki
(
...
rok_wydania int CHECK (BETWEEN 2010 AND 2014)

);


Warunek logiczny CHECK - zakres danych wprowadzanych do kolumny
/*Może wystąpić z NOT AND i OR */
----------------------------------------------------------------
CREATE TABLE Ksiazki
(
	...
	rok_wydania int CHECK (BETWEEN 2010 AND 2014),
	...
);
Przykład 5.21/158
CREATE TABLE Klient
(
  id_klienta int IDENTITI (1,1) NOT NULL PRIMARY KEY,
  nazwisko nvarczar (60) NOT NULL,	
  imie nvarchar (40) NOT NULL,
  kod_pocztowy nvarczar (6),
  miejscowosc nvarchar (50) DEFAULT 'Warszawa',
  ulica nvarchar (50),
  PESEL nvarchar (11) NOT NULL,
  telefon nvarchar (12) UNIQUE,
  adres_e_mail nvarchar (70)
);

Przykład 5.22/158

CREATE TABLE Ksiazki
(
  id_ksiazki int IDENTITY (1,1) NOT NULL PRIMARY KEY,
  tytul nvarchar (100) NOT NULL,
  id_autora int NOT NULL,
  cena money,
  wydawnictwo nvarchar (20),
  temat nvarchar (30),
  miejsce_wydania nvarchar (28),
  jezyk_ksiazki nvarchar (15),
  opis nvarchar (100)
);


========================================
5.5 Manipulowanie danymi (DML) str. 159
========================================
/*
1. SELECT - wybiera dane z bazy danych.
2. INSERT - umieszcza nowe wiersze w tabeli,
3. UPDATE - zmienia zawartość istniejącego wiersza,
4. DELETE - usuwa wiersze z tabeli.
*/
===================================
5.5.1 Instrukcja INSERT str. 159
===================================

Wstawianie nowych wierszy 5.23/159
--------------------------------------

INSERT INTO Ksiazki (tytul, id_autora, cena, wydawnictwo, temat)
VALUES ('Projektowanie stron internetowych',1 ,35 ,'Helion','Internet' );

Wprowadzanie kilku wierszy jednocześnie 5,.24/160
-----------------------------------------------------------------
CREATE DATABASE ksiegarnia_internetowa;
USE ksiegarnia_internetowa;

CREATE TABLE Ksiazki
(
   tytul varchar(30),
   id_autora int(3),
   cena float,
   wydawnictwo varchar(30), 
   temat varchar(50)
);
INSERT INTO Ksiazki (tytul, id_autora, cena, wydawnictwo, temat)
VALUES ('Aplikacje internetowe', 2, 57, 'Helion', 'Internet'),
('Programowanie w PHP', 2, 72, 'Helion', 'Initernet'),
('SQL Server 2008', 3, 45, 'PWN', 'Bazy danych');

Wprowadzanie danych do tabeli 5.25/160
---------------------------------------
INSERT INTO Klient (nazwisko, imie, PESEL)
VALUES ('Nowak','Andrzej', '78021203121'),
('KOwalski','Jan', '810912902821');

=====================================
5.5.2 Instrukcja UPDATE str. 160
=====================================

Aktualizowanie istniejących wierszy 5.26/160
------------------------------------------------
UPDATE Ksiazki SET [jezyk polski]='polski'
WHERE [rok wydania]>=2012;

Przykad 2
-----------------------------------
UPDATE Ksiazki SET cena=50
WHERE cena<60;
------------------------------------

Przykad 5.27/161
---------------------
UPDATE Klient SET kod_pocztowy = '87-100', miejscowosc = 'Torun', 
ulica = "Szeroka", nr_domu=34
WHERE nazwisko='Nowak' AND imie='Andrzej';

=========================================
5.5.3 Instrukcja DELETE str. 161
=========================================

Usunięcie wszystkich wierszy tabeli 5.28/161
-------------------------------------
DELETE FROM Klient;

Usunięcie wybranych 5.29/161
DELETE FROM Klient
WHERE miejscowosc='Opole';

=====================================
5.5.4 Instrukcja SELECT str. 161
=====================================

SELECT [ALL | DISTINCT] [TOP n [PERCENT]]{
(nazwa_kolumny | wyrażenie | IDENTITYCOL | ROWGUIDCOL[ [AS] nazwa_kolumny]
| nazwa_kolumny=wyrażenie} [,...n]
FROM nazwa_tabeli
----------------
IDENTITYCOL zwraca wartość kolumny IDENTITY,
ROWGUIDCOL zwraca wartość globalnego identyfikatora.

Nazwiska i imiona z tabeli Klient 5.30/162
------------------------------------------------

SELECT nazwisko, imie
FROM Klient;

Wszystkie kolumny tabeli Klient 5.31
--------------------------------------
SELECT *
FROM Klient;

----------------------------------------------------------------------
Klauzula DISTINCT /* eliminacja powtórek w wyświetlanych wierszach*/
----------------------------------------------------------------------
/*infromacja z jakich miejscowości pochdzą klienci */

Przykład 5.32/162
-----------------------
SELECT DISTINCT kod_pocztowy, miejscowosc
FROM Klient;

===============================
Wyrażenia w instrukcji SELECT
===============================
/* obliczamy marżę na książkach*/
Przykład 5.33/163
-----------------------
SELECT tytul, cena, cena*0.07 AS [Marża]
FROM Ksiazki;

/*Ostateczna cena książki z marżą */
Przykad 5.34/163
------------------
SELECT tytul, cena+cena*0.07 AS [Cena sprzedaży]
FROM Ksiazki;

/*Połączenie danych klienta z kilku kolumn tabeli */

Przykad 5.35/163
-----------------
SELECT nazwisko+' '+imie AS Klient, kod_pocztowy+' '+miejscowosc AS Miasto,
ulica+' '+nr_domu AS Adres
FROM Klient;

=====================
Sortowanie
====================
Przykad 5.36/163
----------------
SELECT tytul, cena
FROM Ksiazki
ORDER BY tytul;

SELECT tytul, cena
FROM Ksiazki
ORDER BY 2;

Przykład 5.37
------------------
SELECT tytul, cena
FROM Ksiazki
ORDER BY cena DESC;

Przykład 5.38/164
-------------------
SELECT tytul, rok_wydania, cena
FROM Ksiazki
ORDER BY rok_wydania ASC, cena DESC;

======================================
Wybieranie wierszy - klauzula WHERE
======================================

Przykład 5.39/164
------------------
SELECT tytul, cena
FROM Ksiazki
WHERE rok_wydania=2012;

SELECT tytul, cena
FROM Ksiazki
WHERE cena BETWEEN 50 AND 100;

Przykad 5.40/164
------------------

SELECT nazwisko, imie
FROM Klient
WHERE nazwisko LIKE'A%';

Przykad 5.41/165
------------------

SELECT nazwisko, imie
FROM Klient
WHERE adres_e_mail IS NULL;

Przykad 5.42/165
--------------------
SELECT nazwisko, imie
FROM Klient
WHERE miejscowosc='Warszawa' AND adres_e_mail IS NULL;

=========================
Klauzula TOP
=========================
/*wybieranie określonej liczby wierszy*/

Przykład 5.43/165
/*najdroższa książka*/

SELECT TOP 1 tytul, wydawnictwo, rok_wydania, cena
FROM Ksiazki
ORDER BY cena DESC;

/*jeśli więce książek w tej cenie*/

Przykład 5.44/166
------------------
SELECT TOP 1 WITH TIES tytul, wydawnictwo, rok_wydania, cena
FROM Ksiazki
ORDER BY cena DESC;

============================================
5.5.5 Grupowanie danych
=========================
/*Działają na wartościach wybranego pola w grupie wierszy
Zwracają pojedynczą wartość: suma, średnia, liczba wierszy itp.*/
Podstawowe funkcje to:
- COUNT (nazwa_kolumny) liczba wierszy
- SUM (nazwa_kolumny)
- AVG (nazwa_kolumny)
- MAX (nazwa_kolumny)
- MIN (nazwa_kolumny)

Przykład 5.45/166--
--------------------
SELECT COUNT(*) AS 'Liczba klientów'
FROM Klient;

Przykad 5.46/167
----------------
SELECT COUNT (kod_pocztowy) AS 'Liczba klientów'
FROM Klient;

Przykad 5.47/167
--------------------
SELECT AVG(cena) AS 'Średnia cena książek'
FROM Ksiazki;

Przykad 5.48/167
------------------
SELECT COUNT (DISTINCT miejscowosc) AS 'Liczba miejscowosci'
FROM Klient;

Przykad 5.49/167
-------------------
SELECT COUNT (tytul) AS 'Liczba tytuów'
FROM Ksiazki
WHERE rok_wydania>2008;

Przykad 5.50/167
-------------------
SELECT MAX(cena)-MIN(cena)
FROM Ksiazki;
/*różnica między maksymalną i minimalną ceną */

=============================
Klauzula GROUP BY
=============================
/* grupowanie wierszy*/
Przykad 5.51/168
---------------
SELECT TOP 3 COUNT(tytul), temat
FROM Ksiazki
GROUP BY temat
ORDER BY 1 DESC;

===================
Klauzula HAVING
===================
/* Określa które wiersze zostaną zwrócone przez GROUP BY*/

Przykad 5.52/168
-----------------
SELECT temat, COUNT(tytul)
FROM Ksiazki
GROUP BY temat
HAVING COUNT(tytul)>=5
ORDER BY 2 DESC;

======================
5.6 Łączenie tabel
======================
5.6.1 Polączenie wewnętrzne i zewnetrzne 
==========================================
Klauzula realizująca połączenie ma postać
-----------------------------------------
tabela1 INNER JOIN tabela2
ON tabela1.kolumna1= tabela2.kolumna2
-----------------------------------------
Przykład 5.53/169
-------------------
SELECT Klient.nazwisko, Klient.imie, Zamowienia.[data zlozenia zamowienia],
Rejestracja_zamowienia.[liczba_egz], Ksiazki.tytul, Autor.nazwisko, Autor.imie
FROM Klient INNER JOIN Zamowienia
ON Klient.id_klienta=Zamowienia.id_klienta
INNER JOIN Rejestracja_zamowienia
ON Zamowienia.id_zamowienia=Rejestracja_zamowienia.id_zamowienia
INNER JOIN Ksiazki
ON Rejestracja_zamowienia.id_ksiazki=Ksiazki.id_ksiazki
INNER JOIN Autor
ON Ksiazki.id_autora=Autor.id_autora
WHERE Zamowienia.[data zamowienia] BETWEEN '2012-06-1' AND '2012-06-30';

/* W przykłądzie prześledzimy historię zamówień z czerwca 2012 roku
Zobaczymy nazwisko i imię klienta, datę złożenia zamówienia, liczbę zamówionych egzemplarzy
oraz tytuł i nazwisko autora 
Połączenia wewnętrzne to domyślny typ połączeń. Wynikiem są wiersze tabeli której w polu klucza
podstawowego i obcego znajdują się pasujące dane.

Co do połączeń zewnętrznych OUTER JOIN
----------------------------------------

: LEFT OUTLER JOIN - wszystkie wiersze pierwszej tabeli i pasujące z drugiej,
: RIGHT OUTER JOIN - wszystkie wiersze z drugiej tabeli i pasujące z pierwszej,
:FULL OUTER JOIN - wszyskie pasujące i niepasujące wiersze z obu tabel

*/

Przykad 5.54/170
--------------------

SELECT Zamowienia.[data zlozenia zamowienia], Zamowienia.[koszt wysylki],
Faktura.nr_faktury, Faktura.sposob_platnosic
FROM Zamowienia LEFT OUTER JOIN Faktura
ON Zamowienia.nr_faktury=Faktura.nr_faktury;





