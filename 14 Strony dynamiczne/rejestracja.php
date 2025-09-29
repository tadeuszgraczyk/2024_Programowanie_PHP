<?php # rejestracja.php #2
// Ten skrypt wykonuje polecenie INSERT, by dodać wiersz do tabeli użytkowników.

$page_title = 'Zarejestruj się';
include ('includes/naglowek.html');

// Sprawdamy, czy formularz został wysłany
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  require('mysqli_connect.php'); // nazwiązujemy połączenie z bazą danych
 // require('../mysqli_connect.php'); // nazwiązujemy połączenie z bazą danych

  $errors = array(); // inicjalizujemy tablicę błędów
  
  // sprawdzamy imię
  if (empty($_POST['first_name'])) {
    $errors[] = 'Zapomniałeś podać swoje imię!';
  } else {
    $fn = mysqli_real_escape_string($dbc, trim($_POST['first_name']));
  }
  
  // sprawdzamy nazwisko
  if (empty($_POST['last_name'])) {
    $errors[] = 'Zapomniałeś podać swoje nazwisko!';
  } else {
    $ln = mysqli_real_escape_string($dbc, trim($_POST['last_name']));
  }
  
  // sprawdzamy adres e-mail
  if (empty($_POST['email'])) {
    $errors[] = 'Zapomniałeś podać swój adres e-mail!';
  } else {
    $e = mysqli_real_escape_string($dbc, trim($_POST['email']));
  }
  
  // sprawdzamy, czy użytkownik wprowadził hasło i czy w obu polach jest ono takie samo
  if (!empty($_POST['pass1'])) {
    if ($_POST['pass1'] != $_POST['pass2']) {
      $errors[] = 'Za drugim razem wpisałeś inne hasło!';
    } else {
      $p = mysqli_real_escape_string($dbc, trim($_POST['pass1']));
    }
  } else {
    $errors[] = 'Zapomniałeś wprowadzić hasło!';
  }
  
  if (empty($errors)) { // jeśli formularz poprawnie wypełniony...
  
    // rejestrujemy użytkownika w bazie danych
    
    // tworzymy zapytanie
    $q = "INSERT INTO users (first_name, last_name, email, pass, registration_date) VALUES ('$fn', '$ln', '$e', SHA2('$p', 512), NOW() )";   
    $r = @mysqli_query ($dbc, $q); // wykonujemy zapytanie
    if ($r) { // jeśli poprawnie wykonane...
    
      // wyświetlamy komunikat
      echo '<h1>Dziękujemy!</h1>
      <p>Zostałeś zarejestrowany.</p><p><br></p>';
    
    } else { // jeśli zapytanie nie zostało poprawnie wykonane...
      
      // wyświetlamy komunikat dla użytkownika
      echo '<h1>Błąd systemu</h1>
      <p class="error">Nie zostałeś zarejestrowany z powodu awarii naszego systemu.  Przepraszamy za kłopot.</p>'; 
      
      // wyświetlamy komunikat uruchomieniowy
      echo '<p>' . mysqli_error($dbc) . '<br><br>Zapytanie: ' . $q . '</p>';
            
    } // koniec instrukcji if ($r).
    
    mysqli_close($dbc); // zamykamy połączenie z bazą danych
    
    // dołączamy stopkę i kończymy działanie skryptu.
    include ('includes/stopka.html'); 
    exit();
    
  } else { // wyświetlamy błędy
  
    echo '<h1>Błąd!</h1>
    <p class="error">Wystąpiły następujące błędy:<br>';
    foreach ($errors as $msg) { // wyświetlamy każdy komunikat o błędzie
      echo " - $msg<br>\n";
    }
    echo '</p><p>Spróbuj jeszcze raz.</p><p><br></p>';
    
  } // koniec instrukcji if (empty($errors))

  mysqli_close($dbc); // zamykamy połączenie z bazą danych

} // koniec głównej instrukcji warunkowej (wysłania formularza)
?>
<h1>Zarejestruj się</h1>
<form action="rejestracja.php" method="post">
  <p>Imię: <input type="text" name="first_name" size="15" maxlength="20" value="<?php if (isset($_POST['first_name'])) echo $_POST['first_name']; ?>" ></p>
  <p>Nazwisko: <input type="text" name="last_name" size="15" maxlength="40" value="<?php if (isset($_POST['last_name'])) echo $_POST['last_name']; ?>" ></p>
  <p>Adres e-mail: <input type="text" name="email" size="20" maxlength="80" value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>"  ></p>
  <p>Hasło: <input type="password" name="pass1" size="10" maxlength="20" value="<?php if (isset($_POST['pass1'])) echo $_POST['pass1']; ?>" ></p>
  <p>Potwierdź hasło: <input type="password" name="pass2" size="10" maxlength="20" value="<?php if (isset($_POST['pass2'])) echo $_POST['pass2']; ?>" ></p>
  <p><input type="submit" name="submit" value="Zarejestruj" ></p>
</form>
<?php include ('includes/stopka.html'); ?>
