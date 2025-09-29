<?php #  pokaz_uzytkownikow.php #2
// Ten listing odczytuje wszystkie rekordy z tabeli users.

$page_title = 'Zobacz zarejestrowanych użytkowników';
include ('includes/naglowek.html');

// wyświetlamy nagłówek strony
echo '<h1>Zarejestrowani użytkownicy</h1>';

require_once ('../mysqli_connect.php'); // nawiązujemy połączenie z bazą danych
    
// tworzymy zapytanie
$q = "SELECT CONCAT(last_name, ', ', first_name) AS name, DATE_FORMAT(registration_date, '%d %M %Y') AS dr FROM users ORDER BY registration_date ASC";   
$r = @mysqli_query ($dbc, $q); // wykonujemy zapytanie

// określamy liczbę zwróconych rekordów
$num = mysqli_num_rows($r);

if ($num > 0) { // jeżeli zapytanie zwróciło jakieś rekordy, to je wyświetlamy

  // wyświetlamy liczbę użytkowników
  echo "<p>W chwili obecnej mamy $num zarejestrowanych użytkowników.</p>\n";

  // wyświetlamy nagłówek tabeli
  echo '<table width="60%">
  <thead>
  <tr>
    <th align="left">Nazwisko</th>
    <th align="left">Data rejestracji</th>
  </tr>
  </thead>
  <tbody>
';
  
  // pobieramy i wyświetlamy wszystkie rekordy
  while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
    echo '<tr><td align="left">' . $row['name'] . '</td><td align="left">' . $row['dr'] . '</td></tr>
    ';
  }

  echo '</tbody></table>'; // zamykamy tabelę
  
  mysqli_free_result ($r); // zwalniamy zasoby

} else { // jeżeli zapytanie nie zostało wykonane pomyślnie...

  echo '<p class="error">Aktualnie nie ma żadnych zarejestrowanych użytkowników.</p>';

}

mysqli_close($dbc); // zamykamy połączenie z bazą danych

include ('includes/stopka.html');
?>