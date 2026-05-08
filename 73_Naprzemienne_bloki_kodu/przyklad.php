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
