<?php # Listing 9.7 - zmiana_hasla.php
// Ten skrypt pozwala użytkownikowi zmienić hasło.

$page_title = 'Zmień swoje hasło';
include ('includes/naglowek.html');

// Sprawdzamy, czy formularz został wysłany...
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  require('../mysqli_connect.php'); // nawiązujemy połączenie z bazą danych
    
  $errors = []; // inicjujemy tablicę błędów
  
  // sprawdzamy adres e-mail
  if (empty($_POST['email'])) {
    $errors[] = 'Zapomniałeś podać swój adres e-mail!';
  } else {
    $e = mysqli_real_escape_string($dbc, trim($_POST['email']));
  }
  
  // sprawdzamy, czy użytkownik wprowadził dotychczasowe hasło
  if (empty($_POST['pass'])) {
    $errors[] = 'Zapomniałeś wprowadzić dotychczasowe hasło!';
  } else {
    $p = mysqli_real_escape_string($dbc, trim($_POST['pass']));
  }

  // sprawdzamy, czy użytkownik wprowadził w obu polach takie samo hasło
  if (!empty($_POST['pass1'])) {
    if ($_POST['pass1'] != $_POST['pass2']) {
      $errors[] = 'Za drugim razem wpisałeś inne hasło!';
    } else {
      $np = mysqli_real_escape_string($dbc, trim($_POST['pass1']));
    }
  } else {
    $errors[] = 'Zapomniałeś wprowadzić nowe hasło!';
  }
  
  if (empty($errors)) { // jeśli w formularzu nie było błędów...
  
    // sprawdzamy, czy została wprowadzona poprawna kombinacja e-mail/hasło
    $q = "SELECT user_id FROM users WHERE (email='$e' AND pass=SHA2('$p', 512) )";
    $r = @mysqli_query($dbc, $q);
    $num = @mysqli_num_rows($r);
    if ($num == 1) { // poprawna
    
      // pobieramy id użytkownika
      $row = mysqli_fetch_array($r, MYSQLI_NUM);

      // tworzymy polecenie UPDATE
      $q = "UPDATE users SET pass=SHA2('$np', 512) WHERE user_id=$row[0]";
      $r = @mysqli_query($dbc, $q);
      
      if (mysqli_affected_rows($dbc) == 1) { // jeżeli polecenie zostało wykonane poprawnie...
      
        // wyświetlamy komunikat
        echo '<h1>Dziękujemy!</h1>
        <p>Hasło zostało zmienione. W rozdziale 12. będziesz mógł się zalogować!</p><p><br></p>'; 
      
      } else { // jeżeli polecenie nie zostało wykonane poprawnie...
      
        // wyświetlamy komunikat dla użytkownika
        echo '<h1>Błąd systemu</h1>
        <p class="error">Hasło nie zostało zmienione z powodu awarii naszego systemu. Przepraszamy za kłopot.</p>'; 
        
        // wyświetlamy komunikat uruchomieniowy
        echo '<p>' . mysqli_error($dbc) . '<br><br>Zapytanie: ' . $q . '</p>';
        
      }

      mysqli_close($dbc); // zamykamy połączenie z bazą danych

      // dołączamy stopkę i kończymy skrypt (aby nie wyświetlił formularza)
      include ('includes/stopka.html'); 
      exit();
        
    } else { // użytkownik wpisał nieprawidłową kombinację e-mail/hasło.
      echo '<h1>Błąd!</h1>
      <p class="error">Podałeś niewłaściwy adres e-mail bądź hasło.</p>';
    }
    
  } else { // wyświetlamy komunikaty o błędach
  
    echo '<h1>Błąd!</h1>
    <p class="error">Wystąpiły następujące błędy:<br>';
    foreach ($errors as $msg) { // wyświetlamy każdy komunikat o błędzie
      echo " - $msg<br>\n";
    }
    echo '</p><p>Spróbuj jeszcze raz.</p><p><br></p>';
    
  } // Koniec instrukcji warunkowej if (empty($errors)) 

  mysqli_close($dbc); // zamykamy połączenie z bazą danych
    
} // Koniec głównej instrukcji warunkowej (wysłania formularza).
?>
<h1>Zmień hasło</h1>
<form action="zmiana_hasla.php" method="post">
  <p>Adres e-mail: <input type="email" name="email" size="20" maxlength="60" value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>" > </p>
  <p>Aktualne hasło: <input type="password" name="pass" size="10" maxlength="20" value="<?php if (isset($_POST['pass'])) echo $_POST['pass']; ?>" ></p>
  <p>Nowe hasło: <input type="password" name="pass1" size="10" maxlength="20" value="<?php if (isset($_POST['pass1'])) echo $_POST['pass1']; ?>" ></p>
  <p>Potwierdź nowe hasło: <input type="password" name="pass2" size="10" maxlength="20" value="<?php if (isset($_POST['pass2'])) echo $_POST['pass2']; ?>" ></p>
  <p><input type="submit" name="submit" value="Zmień moje hasło!"></p>
</form>
<?php include ('includes/stopka.html'); ?>